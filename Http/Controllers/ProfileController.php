<?php

namespace Modules\Profile\Http\Controllers;

use App\Models\Profile\Profile;
use App\Models\User;
use Auth;
use File;
use Illuminate\Routing\Controller;
use Image;
use Redirect;
use Request;
use Validator;

class ProfileController extends Controller
{
    public function show()
    {

        if (Request::has('id')) {
            $id = Request::get('id');
            $user = User::find($id);

            return view('profile::show', ['user' => $user]);

        } elseif (Request::has('user_name')) {

            $name = Request::get('user_name');
            $user = User::where(['name' => $name])->first();

            return view('profile::show', ['user' => $user]);

        } else {

            $user = Auth::user();
            return view('profile::show', ['user' => $user]);

        }

        return view('profile::show', ['user' => $user]);
    }

    public function password_get()
    {

        $user = Auth::user();
        return view('profile::password', ['user' => $user]);
    }

    public function password_post()
    {
        $user = Auth::user();

        $data = Request::all();
        $valid = Validator::make($data, ['password' => 'required|min:6|confirmed']);

        if ($valid->fails()) {
            return Redirect::back()->withErrors($valid)->withInput();
        }

        $user->password = bcrypt($data['password']);
        $user->save();
        return Redirect::back()->withErrors(trans('profile::messages.done'));
    }

    public function info_get()
    {

        $user = Auth::user();
        return view('profile::info', ['user' => $user]);
    }

    public function info_post()
    {
        $user = Auth::user();
        $data = array();

        $data['name'] = Request::get('name');
        $data['family'] = Request::get('family');
        $data['mobile'] = Request::get('mobile');

        $data['image'] = Request::file('image');

        $validator = Validator::make($data, [
            'name' => 'required',
            'image' => 'nullable|mimes:jpeg,bmp,png | max:1000',
            'mobile' => 'required|regex:/(09)[0-9]{9}/|unique:usermodule_users,mobile,' . $user->id . '|',
        ]);
        if ($validator->fails()) {
            return Redirect::back()->withInput()->withErrors($validator);
        }

        if ($data['image'] != "" && $data['image']->isValid()) {

            $image_url = $user->image;
            $image_url = parse_url($image_url)['path'];
            $image_url = public_path($image_url);
            //$public_path = str_replace('base', 'public_html', base_path());

            File::delete($image_url);
            $destinationPath = 'uploads/profile';
            // upload path
            $extension = Request::file('image')->getClientOriginalExtension();
            // getting image extension
            $fileName = $user->id . '_' . ProfileController::generateRandomString() . '.' . $extension;
            // renameing image
            Request::file('image')->move($destinationPath, $fileName);
            $f_image = url('uploads/profile') . '/' . $fileName;
            $user->image = $f_image;
            $user->save();

            return Redirect::back()->withErrors(trans('profile::messages.done'));
        } elseif ($data['image'] != "") {
            return Redirect::back()->withErrors(trans('profile::messages.invalid_image'));
        }

        $user->name = $data['name'];
        $user->family = $data['family'];
        $user->mobile = $data['mobile'];

        $user->save();

        return Redirect::back()->withErrors(trans('profile::messages.done'));
    }

    public function email_get()
    {

        $user = Auth::user();
        return view('profile::email', compact(['user']));
    }

    public function email_post()
    {
        $user = Auth::user();

        $data = Request::all();
        $valid = Validator::make($data, ['email' => 'required|email|unique:users,email,' . $user->id]);

        if ($valid->fails()) {
            return Redirect::back()->withErrors($valid)->withInput();
        }

        $user->email = $data['email'];
        $user->save();
        return Redirect::back()->withErrors(trans('profile::messages.done'));
    }

}
