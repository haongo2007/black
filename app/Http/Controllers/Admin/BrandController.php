<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;
use App\Http\Requests\BrandRequest;
use Illuminate\Support\Facades\Storage;
use App\MyHelper\Permission;

class BrandController extends Controller
{   
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Brand $brand,Request $request)
    {
        if(Request()->ajax()) {
            return $datatables = datatables()->of($brand->select('*'))
            ->addColumn('action', function($row) {
                $name = 'brand';
                return view('admin.component.button.action' , compact('row','name'));
            })
            ->editColumn('image', function($row) {
                return '<img src="'.asset('storage').$row->image.'" alt="" style="max-width: 100px">';
            })
            ->rawColumns(['action','image'])
            ->addIndexColumn()
            ->make(true);
        }
        return view('admin.brand.index',['brands' => $brand->paginate(5)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.brand.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BrandRequest $request, Brand $brand)
    {   
        if($request->image->isValid()){
            $imageName = time().'.'.$request->image->extension();
            $request->image->storeAs(
                'public/brand/',$imageName
            );
            $brand->image = '/brand/'.$imageName;
        }
        $brand->name = $request->name;
        $brand->sort_order = $request->sort_order;
        $brand->save();
        return redirect()->route('admin.brand.index')->withStatus(__('Brand successfully created.'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $brand = Brand::find($id);

        return view('admin.brand.edit', compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BrandRequest $request, Brand  $brand)
    {
        if ($request->hasFile('image')){
            if($request->image->isValid()){
                $old_file = 'public/'.$brand->image;
                if (Storage::exists($old_file)) {
                    Storage::delete($old_file);
                }
                $imageName = time().'.'.$request->image->extension();
                $request->image->storeAs(
                    'public/brand/',$imageName
                );
                $brand->image = '/brand/'.$imageName;
            }
        }
        $brand->name = $request->name;
        $brand->sort_order = $request->sort_order;
        $brand->update();

        return redirect()->route('admin.brand.index')->withStatus(__('Brand successfully updated.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $brand = Brand::find($id);
        $old_file = 'public/'.$brand->image;
        if (Storage::exists($old_file)) {
            Storage::delete($old_file);
        }
        $brand->delete();
        return redirect()->route('admin.brand.index')->withStatus(__('Brand successfully deleted.'));
    }
}
