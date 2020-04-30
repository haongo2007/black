<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Hash;
use App\Http\Requests\ProfileRequest;
use App\Http\Requests\PasswordRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    /**
     * Show the form for editing the profile.
     *
     * @return \Illuminate\View\View
     */
    public function edit()
    {
        return view('admin.profile.edit');
    }

    /**
     * Update the profile
     *
     * @param  \App\Http\Requests\ProfileRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(ProfileRequest $request)
    {
        if ($request->hasFile('avatar')){
            if($request->avatar->isValid()){
                $old_file = 'public/'.auth()->user()->avatar;
                if (Storage::exists($old_file) && strpos(auth()->user()->avatar,'default') == false) {
                    Storage::delete($old_file);
                }
                $imageName = time().'.'.$request->avatar->extension();
                $request->avatar->storeAs(
                    'public/avatar/',$imageName
                );
                auth()->user()->avatar = '/avatar/'.$imageName;
            }
        }
        auth()->user()->name = $request->name;
        auth()->user()->phone = $request->phone;
        auth()->user()->email = $request->email;
        auth()->user()->update();

        return back()->withStatus(__('Profile successfully updated.'));
    }

    /**
     * Change the password
     *
     * @param  \App\Http\Requests\PasswordRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function password(PasswordRequest $request)
    {
        auth()->user()->update(['password' => Hash::make($request->get('password'))]);

        return back()->withStatus(__('Password successfully updated.'));
    }
}
