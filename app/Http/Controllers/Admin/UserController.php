<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;
use App\Models\User;
use App\Http\Requests\UserRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /**
     * Display a listing of the users
     *
     * @param  \App\User  $model
     * @return \Illuminate\View\View
     */
    public function index(User $user,Request $request)
    {
        if(Request()->ajax()) {
            return $datatables = datatables()->of($user->select('*')->with('roles'))
            ->addColumn('action', function($row) {
                $name = 'user';
                return view('admin.component.button.action' , compact('row','name'));
            })
            ->editColumn('avatar', function($row) {
                return '<img src="'.asset('storage').$row->avatar.'" alt="" style="max-width: 100px">';
            })
            ->addColumn('role', function($row) {
                return $row->getRoleNames();
            })
            ->rawColumns(['action','avatar'])
            ->addIndexColumn()
            ->make(true);
        }
        return view('admin.users.index', ['users' => $user->paginate(5)]);
    }

    /**
     * Show the form for creating a new user
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $role = Role::all();
        return view('admin.users.create',compact('role'));
    }

    /**
     * Store a newly created user in storage
     *
     * @param  \App\Http\Requests\UserRequest  $request
     * @param  \App\User  $model
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(UserRequest $request, User $user)
    {   
        $user->name = $request->name;
        $user->password = Hash::make($request->password);
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->save();
        $user->assignRole($request->role);
        return redirect()->route('admin.user.index')->withStatus(__('User successfully created.'));
    }

    /**
     * Show the form for editing the specified user
     *
     * @param  \App\User  $user
     * @return \Illuminate\View\View
     */
    public function edit(User $user)
    {
        $permission = Role::all();
        return view('admin.users.edit', compact('user','permission'));
    }

    /**
     * Update the specified user in storage
     *
     * @param  \App\Http\Requests\UserRequest  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UserRequest $request, User  $user)
    {
        $hasPassword = $request->password;

        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        if ($hasPassword) {
            $user->password = Hash::make($request->password);
        }
        $user->update();

        $user->syncRoles($request->role);
        
        return redirect()->route('admin.user.index')->withStatus(__('User successfully updated.'));
    }

    /**
     * Remove the specified user from storage
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(User  $user)
    {
        if ($user->id == 1) {
            return abort(403);
        }

        $user->delete();

        return redirect()->route('admin.user.index')->withStatus(__('User successfully deleted.'));
    }
}
