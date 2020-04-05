<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\Categories;
use App\Models\Brand;
use App\Http\Requests\ProductAddRequest;
use App\Models\KeysAttribute;
use App\Models\ValuesAttribute;
use App\Models\Attribute;
use App\MyHelper\RecursiveCategories;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

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
            return $datatables = datatables()->of($products->select('*'))
            ->addColumn('action', function($row) {
                $orther = 'products';
                return view('admin.component.action_button' , compact('row','orther'));
            })
            ->editColumn('price', function($row) {
                return number_format($row->price);
            })
            ->editColumn('image', function($row) {
                $image = asset('storage').json_decode($row->hasManyAttr[0]->hasManyValuesAttr[0]->image)[0];
                return '<img src="'.$image.'" alt="" style="max-width: 100px">';
            })
            ->addColumn('creator', function($row) {
                return $row->belongsToUser->name;
            })
            ->rawColumns(['action','image','tags'])
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
        $keysattr = KeysAttribute::all();
        return view('admin.product.create',['categories' => $data_tree , 'brand' => $brand, 'key_attr' => $keysattr]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductAddRequest $request)
    {
        $product = new Products();
        $attribute = new Attribute();
        $vl_attribute = new ValuesAttribute();
        $slug = Str::slug($request->name, '-');
        
        if ($images = $request->file('image')) {
            foreach ($images as $image) {
                $extension = $image->getClientOriginalExtension();
                $filename  = $slug.'-'.Str::random(5).'.'.$extension;
                $image->storeAs('public/products/'.$slug, $filename);
                $paths[]   = '/products/'.$slug.'/'.$filename;
            }
        }
        $product->name = $request->name;
        $product->slug = $slug;
        $product->price = $request->price;
        $product->discount = $request->discount;
        $product->in_stock = $request->stock;
        $product->description = $request->description;
        $product->tags = json_encode($request->tags);
        $product->creator_id = Auth::user()->id;
        $product->categories_id = $request->categories;
        $product->brand_id = $request->brand;
        $product->save();

        $attribute->product_id = $product->id;
        $attribute->key_attr_id = $request->key_attr;
        $attribute->save();

        $vl_attribute->value = $request->value_attr;
        $vl_attribute->image = json_encode($paths);
        $vl_attribute->optional = $request->optional;
        $vl_attribute->attribute_id = $attribute->id;
        $vl_attribute->save();

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
        $product = Products::find($id);
        $id_vl_attr = [];
        foreach ($product->hasManyAttr as $key => $value) {
            /* each delete image */
            foreach ($value->hasManyValuesAttr as $key => $vl_attr) {
                foreach (json_decode($vl_attr->image) as $key => $file) {               
                    $old_file = 'public/'.$file;
                    if (Storage::exists($old_file)) {
                        Storage::delete($old_file);
                    }
                }
            }
            $id_vl_attr[] = $value->id;
        }
        Storage::deleteDirectory('public/products/'.$product->slug);
        /* delete record value attr */
        ValuesAttribute::whereIn('attribute_id',$id_vl_attr)->delete();
        Attribute::whereIn('id',$id_vl_attr)->delete();
        $product->delete();
        return redirect()->route('admin.products.index')->withStatus(__('Product successfully deleted.'));
    }
}
