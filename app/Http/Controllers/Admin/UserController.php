<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Role;
use App\Http\Requests\UserAddRequest;
use App\Http\Requests\UserUpdateRequest;
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
    public function index(User $model,Request $request)
    {
        if(Request()->ajax()) {
            return $datatables = datatables()->of($model->select('*'))
            ->addColumn('action', function($row) {
                $orther = 'user';
                return view('admin.component.action_button' , compact('row'));
            })
            ->editColumn('avatar', function($row) {
                return '<img src="'.asset('storage').$row->avatar.'" alt="" style="max-width: 100px">';
            })
            ->rawColumns(['action','avatar'])
            ->addColumn('role', function($row) {
                return $row->belongsToRole->name;
            })
            ->addIndexColumn()
            ->make(true);
        }
        return view('admin.users.index', ['users' => $model->paginate(5)]);
    }

    /**
     * Show the form for creating a new user
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $permission = Role::all();
        return view('admin.users.create',compact('permission'));
    }

    /**
     * Store a newly created user in storage
     *
     * @param  \App\Http\Requests\UserRequest  $request
     * @param  \App\User  $model
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(UserAddRequest $request, User $model)
    {   
        $model->name = $request->name;
        $model->password = Hash::make($request->password);
        $model->role_id = $request->role;
        $model->email = $request->email;
        $model->phone = $request->phone;
        if ($request->hasFile('avatar')){
            if($request->avatar->isValid()){
                $imageName = time().'.'.$request->avatar->extension();
                $request->avatar->storeAs(
                    'public/avatar/',$imageName
                );
                $model->avatar = '/avatar/'.$imageName;
            }
        }
        $model->save();
        

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
        if ($user->id == 1) {
            return redirect()->route('admin.user.index');
        }
    
        return view('admin.users.edit', compact('user','permission'));
    }

    /**
     * Update the specified user in storage
     *
     * @param  \App\Http\Requests\UserRequest  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UserUpdateRequest $request, User  $user)
    {
        $hasPassword = $request->password;

        $user->name = $request->name;
        $user->role_id = $request->role;
        $user->email = $request->email;
        $user->phone = $request->phone;
        if ($request->hasFile('avatar')){
            if($request->avatar->isValid()){
                $old_file = 'public/'.$user->avatar;
                if (Storage::exists($old_file)) {
                    Storage::delete($old_file);
                }
                $imageName = time().'.'.$request->avatar->extension();
                $request->avatar->storeAs(
                    'public/avatar/',$imageName
                );
                $user->avatar = '/avatar/'.$imageName;
            }
        }
        if ($hasPassword) {
            $user->password = Hash::make($request->password);
        }
        $user->update();

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
