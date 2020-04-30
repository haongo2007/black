<?php

namespace App\Http\Controllers\Admin;

use Spatie\Permission\Models\Permission;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Guard;
use Route;

class PermissionsController extends Controller
{
    public function __construct()
    {
        
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Permission $permission,Request $request)
    {
        if(Request()->ajax()) {
            return $datatables = datatables()->of($permission->select('*'))
            ->addColumn('action', function($row) {
                $name = 'permissions';
                return view('admin.component.button.action' , compact('row','name'));
            })
            ->rawColumns(['action'])
            ->addIndexColumn()
            ->make(true);
        }
        return view('admin.permission.index',['permission' => $permission->paginate(5)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $page = config('permission.models.page');
        return view('admin.permission.create',compact('page'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $name = []; 
        $guard_name = $request->guard_name ?? Guard::getDefaultName(static::class);
        foreach($request->name as $key => $val){
            array_push($name,['name' => $val,'guard_name' => $guard_name,'page' => $request->page[$key],'action' => $request->action[$key],]);
        }
        Permission::insert($name);
        return redirect()->route('admin.permissions.index')->withStatus(__('Permission successfully created.'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $permission = Permission::findOrfail($id);
        $page = config('permission.models.page');
        return view('admin.permission.edit',compact('permission','page'));
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
        $permission = Permission::findOrfail($id);
        $permission->update($request->all());
        return redirect()->route('admin.permissions.index')->withStatus(__('Permission successfully updated.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
