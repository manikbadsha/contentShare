<?php

namespace App\Http\Controllers;

use App\User;
use App\Profile;
use Illuminate\Support\Facades\Hash;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

use Carbon\Carbon;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function register()
    {
        return view('auth.user');
    }


    public function UserRegister(Request $request)

    {



        if ($image = $request->file('image')) {

            $destinationPath = public_path() . '/profile_image/';
            $profileImage = str::random(5) . "-" . time() . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);


            $data = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'user_type' => $request->user,
                'password' => Hash::make($request->password)
            ]);


            Profile::insert([
                'user_id' => $data->id,
                'name' => $data->name,
                'email' => $data->email,
                'image' => 'profile_image/' . $profileImage,
                'dob' => $request->dob,
                'phone' => $request->phone,
                'gender' => $request->gender,
                'created_at'  => Carbon::now(),


            ]);

            return redirect('login');
        }
    }
    public function UserProfile()
    {
        $user_info = Profile::where('user_id', Auth::user()->id)->first();
        return view('backend.user.dashbord', compact('user_info'));
    }

    public function UserProfileUpdate(Request $request)
    {

        if ($image = $request->file('image')) {

            $destinationPath = public_path() . '/profile_image/';
            $profileImage = str::random(5) . "-" . time() . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);



            $data = User::where('id', Auth::user()->id)->update([
                'name' => $request->name,
                'email' => $request->email,


            ]);

            Profile::where('user_id', Auth::user()->id)->update([


                'dob' => $request->dob,
                'name' => $data->name,
                'email' => $data->email,
                'image' => 'profile_image/' . $profileImage,
                'phone' => $request->phone,



                'updated_at'  => Carbon::now(),
            ]);

            Toastr::success('User Info Update Success', 'Success', ["positionClass" => "toast-top-right"]);

            return back();
        } else {

            $data = User::where('id', Auth::user()->id)->update([
                'name' => $request->name,
                'email' => $request->email,


            ]);

            Profile::where('user_id', Auth::user()->id)->update([


                'dob' => $request->dob,
                'name' => $request->name,
                'email' => $request->email,


                'phone' => $request->phone,



                'updated_at'  => Carbon::now(),
            ]);

            Toastr::success('User Info Update Success', 'Success', ["positionClass" => "toast-top-right"]);

            return back();
        }
    }
}
