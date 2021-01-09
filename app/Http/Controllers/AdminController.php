<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Story;
use Carbon\Carbon;
use App\Comment;
use App\User;
use App\Profile;
use Illuminate\Support\Facades\Hash;
use Brian2694\Toastr\Facades\Toastr;
use Yajra\Datatables\Datatables;

class AdminController extends Controller
{
    public function ViewStory()
    {
        $data = Story::all();

        return view('backend.admin.viewstory', compact('data'));
    }


    public function ListedStory()
    {
        $data = Story::where('status', 1)->get();
        return view('backend.admin.listedstory', compact('data'));
    }

    public function unListedStory()
    {
        $data = Story::where('status', 0)->get();
        return view('backend.admin.unlistedstory', compact('data'));
    }



    public function BlockedStory($id)
    {
        Story::where('id', $id)
            ->update([
                'status' => 0,
                'updated_at' => Carbon::now()
            ]);
        return back();
    }

    public function UnBlockedStory($id)
    {
        Story::where('id', $id)
            ->update([
                'status' => 1,
                'updated_at' => Carbon::now()
            ]);
        return back();
    }


    public function ShowComments()
    {

        $data = Comment::all();

        return view('backend.admin.viewcomment', compact('data'));
    }

    public function DeleteComments($id)
    {
        Comment::where('id', $id)->delete();
        Toastr::error('Comment Deleted ', 'Success', ["positionClass" => "toast-top-right"]);

        return back();
    }

    public function ViewUserList()
    {
        $data = User::where('user_type', 'user')
            ->get();
        return view('backend.admin.viewuser', compact('data'));
    }

    public function BlockUserList($id)
    {
        User::where('id', $id)->update([
            'email' => 'blocked',
            'updated_at' => Carbon::now()
        ]);

        Story::where('user_id', $id)->delete();

        Toastr::error('User Blocked ', 'Success', ["positionClass" => "toast-top-right"]);

        return back();
    }

    public function AdminList()
    {
        $data = User::where('user_type', 'admin')
            ->get();
        return view('backend.admin.adminlist', compact('data'));
    }

    public function AddAdmin(Request $request)
    {
        $data = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'user_type' => $request->admin,
            'password' => Hash::make($request->password)
        ]);
        return back();
    }

    public function deleteAdmin($id)
    {

        User::where('id', $id)->delete();
        Toastr::error('Admin Deleted ', 'Success', ["positionClass" => "toast-top-right"]);

        return back();
    }
}
