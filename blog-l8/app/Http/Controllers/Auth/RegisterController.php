<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Auth\UpdateProfileRequest;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;
use Alert;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    public function index()
    {
        $users = User::latest()->get();
        $sidebar = 'users';
        return view('auth.data_users', compact('users', 'sidebar'));
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */

    public function store(Request $request)
{
    $this->validate($request, [
        'username' => 'required|min:6|max:16',
        'name' => 'required|string|min:5|max:150',
        'email' => 'required|string|email|max:120|unique:users',
        'password' => 'required|string|confirmed|min:8',
        'photo'     => 'required|image|mimes:png,jpg,jpeg|max:3048',
    ]);

    // UPLOAD IMAGE IN STORAGE
    $photo = $request->file('photo');
    $photo->storeAs('public/users', $photo->hashName());

    $user = User::create([
        'username' => $request->username,
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
        'photo' => $photo->hashName(),
    ]);

    if($user){
        Alert::success('BERHASIL', 'Data User Berhasil Disimpan!');
        return redirect('/users');
    }else{
        Alert::warning('GAGAL', 'Data User Gagal Disimpan!');
        return redirect('/users');
    }
}

public function edit(Request $request)
{
    $sidebar = 'users';
    return view('auth.edit_profile', [
        'user' => $request->user()
    ], compact('sidebar'));
}

public function update(UpdateProfileRequest $request)
{
    if($request){
        if($request->file('photo') == "") {
            $request->user()->update(
                $request->all()
            );

        } else {

            // DELETE OLD IMAGE FROM STORAGE
            Storage::disk('local')->delete('public/users/'.$request->photo);

            // UPLOAD NEW IMAGE IN STORAGE
            $photo = $request->file('photo');
            $photo->storeAs('public/users', $photo->hashName());

            $request->user()->update([
                'username' => $request->username,
                'name' => $request->name,
                'email' => $request->email,
                'photo' => $photo->hashName(),
            ]);

        }
        Alert::success('BERHASIL', 'Update Profile Berhasil!');
        return redirect('/users');
    }else{
        Alert::warning('GAGAL', 'Update Profile Gagal!');
        return redirect('/users');
    }
}

public function delete($id)
    {
      $user = User::findOrFail($id);
      Storage::disk('local')->delete('public/users/'.$user->photo);
      $user->delete();
    
      if($user){
        return redirect('/users');
    }else{
        Alert::warning('GAGAL', 'Data User Gagal Dihapus!');
        return redirect('/users');
    }
    }
}
