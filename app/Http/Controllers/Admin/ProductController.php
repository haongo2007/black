<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\Categories;
use App\Models\Brand;
use App\Http\Requests\ProductRequest;
use App\Models\ProductAttributeKeys;
use App\Models\ProductAttributeValues;
use App\MyHelper\RecursiveCategories;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\ProductImages;
use Image;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Products $products,Request $request)
    {
        if(Request()->ajax()) {
            return $datatables = datatables()->of($products->select('*')->with('GetCategoriesName:id,name'))
            ->addColumn('action', function($row) {
                $name = 'products';
                return view('admin.component.button.action' , compact('row','name'));
            })
            ->editColumn('price', function($row) {
                return number_format($row->price);
            })
            ->addColumn('path', function($row) {
                $url = asset('storage').$row->GetImages[0]->value;
                $img = Image::make($url)->resize(100,null,function($constraint){
                    $constraint->aspectRatio();
                });
                return '<img src="'.$img->encode('data-url').'" alt="" style="max-width: 100px">';
            })
            ->addColumn('creator', function($row) {
                return $row->belongsToUser->name;
            })
            ->rawColumns(['action','tags','path'])
            ->addIndexColumn()
            ->make(true);
        }
        return view('admin.product.index',['products' => $products->paginate(5)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories_all = Categories::select('name','id','parent')->get()->toArray();
        $data_tree = RecursiveCategories::data_tree($categories_all);
        $brand = Brand::all();
        $keysattr = ProductAttributeKeys::all();
        return view('admin.product.create',['categories' => $data_tree , 'brand' => $brand, 'key_attr' => $keysattr]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        $slug = Str::slug($request->name, '-');
        $request->request->add(['slug' => $slug]);
        $request->request->add(['creator_id' => Auth::user()->id]);
        $request->request->add(['tags' => json_encode($request->tags)]);
        $request->request->add(['price' => str_replace(',', '', $request->price)]);
        if ($request->discount) {
            $request->request->add(['discount' => str_replace(',', '', $request->discount)]);
        }
        $product = Products::create($request->except(['value_attr','key_attr','option']));
        if ($images = $request->file('image')) {
            $product_attr_value = ProductAttributeValues::create([
                'value' => $request->value_attr,
                'product_attribute_key_id' => $request->key_attr,
                'product_id' => $product->id,
                'option' => $request->has('code_color') ? $request->code_color : null,
            ]);
            $productimages = [];
            foreach ($images as $image) {
                $extension = $image->getClientOriginalExtension();
                $filename  = $slug.'-'.Str::random(5).'.'.$extension;
                $image->storeAs('public/products/'.$slug, $filename);
                $paths[]   = '/products/'.$slug.'/'.$filename;
                array_push($productimages,['value' => '/products/'.$slug.'/'.$filename, 'product_id' => $product->id, 'key_attr_id' => $request->key_attr]);
            }
            ProductImages::insert($productimages);
        }
        return redirect()->route('admin.products.index')->withStatus(__('Product successfully created.'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Products::find($id);
        return view('admin.product.info',compact('product'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Products::findOrfail($id);
        foreach ($product->GetImages() as $key => $value) {
            /* each delete image */              
            $old_file = 'public/'.$value->value;
            if (Storage::exists($old_file)) {
                Storage::delete($old_file);
            }
        }
        Storage::deleteDirectory('public/products/'.$product->slug);
        /* delete record value attr */
        ProductImages::where('product_id',$product->id)->delete();
        $product->delete();
        return redirect()->route('admin.products.index')->withStatus(__('Product successfully deleted.'));
    }
}
