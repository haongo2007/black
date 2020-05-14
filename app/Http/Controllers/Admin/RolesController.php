<?php

namespace App\Http\Controllers\Admin;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
class RolesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Role $role,Request $request)
    {
        if(Request()->ajax()) {
            return $datatables = datatables()->of($role->select('*')->with('permissions'))
            ->addColumn('action', function($row) {
                $name = 'roles';
                return view('admin.component.button.action' , compact('row','name'));
            })
            ->addColumn('permission', function($row) {
                if($row->name == 'Admin'){
                    return '<span class="badge badge-danger ml-1">All</span>';
                }
                return view('admin.component.modal.view' , compact('row'));
            })
            ->rawColumns(['action','permission'])
            ->addIndexColumn()
            ->make(true);
        }
        return view('admin.role.index',['roles' => $role->paginate(5)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permission = Permission::all();
        return view('admin.role.create',compact('permission'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $role = Role::create(['name' => $request->name]);
        if($request->permission){
            $role->givePermissionTo($request->permission);
        }
        return redirect()->route('admin.roles.index')->withStatus(__('Roles successfully created.'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $permission = Permission::all();
        $role = Role::find($id);
        return view('admin.role.edit',compact('role','permission'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {
        $role->update($request->only('name'));
        if($request->permission){
            $role->syncPermissions($request->permission);
        }
        return redirect()->route('admin.roles.index')->withStatus(__('Roles successfully updated.'));
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
