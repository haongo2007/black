<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Categories;
use App\Http\Requests\CategoriesRequest;
use App\MyHelper\RecursiveCategories;
use Illuminate\Support\Facades\Storage;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Categories $categories,Request $request)
    {
        if(Request()->ajax()) {
            return $datatables = datatables()->of($categories->select('*'))
            ->addColumn('action', function($row) {
                $name = 'categories';
                return view('admin.component.button.action' , compact('row','name'));
            })
            ->editColumn('banner', function($row) {
                return '<img src="'.asset('storage').$row->banner.'" alt="" style="max-width: 100px">';
            })
            ->editColumn('parent', function($row) {
                if ($row->parent == 0) {
                    return '<span class="badge badge-info">Is parent</span>';
                }else{
                    $child_of = Categories::select('name')->find($row->parent);
                    return '<span class="badge badge-danger">'.$child_of->name.'</span>';
                }
            })
            ->rawColumns(['action','banner','parent'])
            ->addIndexColumn()
            ->make(true);
        }
        return view('admin.categories.index',['categories' => $categories->paginate(5)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $categories = Categories::all();
        $data_tree = RecursiveCategories::data_tree($categories);
        return view('admin.categories.create',compact('data_tree'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoriesRequest $request, Categories $categories)
    {   
        if($request->banner->isValid()){
            $imageName = time().'.'.$request->banner->extension();
            $request->banner->storeAs(
                'public/categories/',$imageName
            );
            $categories->banner = '/categories/'.$imageName;
        }
        $categories->name = $request->name;
        $categories->sort_order = $request->sort_order;
        $categories->parent = $request->parent;
        $categories->save();
        return redirect()->route('admin.categories.index')->withStatus(__('Categories successfully created.'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Categories::find($id);
        $categories_all = Categories::select('name','id','parent')->get()->toArray();
        $data_tree = RecursiveCategories::data_tree($categories_all);
        return view('admin.categories.edit',compact('data_tree','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoriesRequest $request, $id)
    {
        $categories = Categories::find($id);
        $find_child = Categories::where('parent',$id)->get()->count();
        if ($find_child > 0) {
            return redirect()->back()->withErrors(__('This category is currently a parent category and has '.$find_child.' subcategories, which cannot be changed'));
        }
        if ($request->hasFile('banner')){
            if($request->banner->isValid()){
                $old_file = 'public/'.$categories->banner;
                if (Storage::exists($old_file)) {
                    Storage::delete($old_file);
                }
                $imageName = time().'.'.$request->banner->extension();
                $request->banner->storeAs(
                    'public/categories/',$imageName
                );
                $categories->banner = $imageName;
            }
        }
        $categories->name = $request->name;
        $categories->sort_order = $request->sort_order;
        $categories->parent = $request->parent;
        $categories->update();

        return redirect()->route('admin.categories.index')->withStatus(__('Categories successfully updated.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $find_child = Categories::where('parent',$id)->get()->count();
        if ($find_child > 0) {
            return redirect()->back()->withErrors(__('This category is currently a parent category and has '.$find_child.' subcategories, which cannot be deleted'));
        }
        $categories = Categories::find($id);
        $old_file = 'public/'.$categories->banner;
        if (Storage::exists($old_file)) {
            Storage::delete($old_file);
        }
        $categories->delete();
        return redirect()->route('admin.categories.index')->withStatus(__('Categories successfully deleted.'));
    }
}
