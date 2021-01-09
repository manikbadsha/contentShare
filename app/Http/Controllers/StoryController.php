<?php

namespace App\Http\Controllers;

use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Story;
use Carbon\Carbon;
use App\Comment;

use Illuminate\Http\Request;

class StoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function AddStory()
    {
        return view('backend.story.story');
    }


    public function AddNewStory(Request $request)
    {


        if ($image = $request->file('image')) {

            $destinationPath = public_path() . '/profile_image/';
            $profileImage = str::random(5) . "-" . time() . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);



            Story::insert([

                'user_id' => Auth::user()->id,
                'status' => 1,

                'title' => $request->title,
                'image' => 'profile_image/' . $profileImage,
                'img_title' => $request->img_title,
                'story' => $request->story,

                'created_at'  => Carbon::now(),
            ]);

            Toastr::success('Story Added Success', 'Success', ["positionClass" => "toast-top-right"]);

            return back();
        }
    }

    public function ViewStory()
    {




        $data = Story::orderBy('id', 'desc')
            ->where('user_id', Auth::user()->id)
            ->paginate(5);

        return view('backend.story.viewstory', compact('data'));
    }

    public function deleteStory($id)
    {
        $data = Story::where('id', $id)->first();
        if ($data->image != null) {
            unlink($data->image);
        }
        Story::where('id', $id)->delete();
        Toastr::error('Story Deleted ', 'Success', ["positionClass" => "toast-top-right"]);

        return back();
    }

    public function EditStory($id)
    {
        $data = Story::where('id', $id)->first();

        return view('backend.story.edit_story', compact('data'));
    }


    public function UpdateStory(Request $request)
    {
        if ($image = $request->file('image')) {
            $story_info = Story::where('id', $request->product_id)->first();
            if ($story_info->image != null) {
                unlink($story_info->image);
            }

            $destinationPath = public_path() . '/profile_image/';
            $profileImage = str::random(5) . "-" . time() . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);



            Story::where('user_id', Auth::user()->id)->update([

                'user_id' => Auth::user()->id,
                'status' => 1,

                'title' => $request->title,
                'image' => 'profile_image/' . $profileImage,
                'img_title' => $request->img_title,
                'story' => $request->story,

                'updated_at'  => Carbon::now(),
            ]);

            Toastr::success('Story update Success', 'Success', ["positionClass" => "toast-top-right"]);

            return redirect('view/story');
        } else {
            Story::where('user_id', Auth::user()->id)->update([

                'user_id' => Auth::user()->id,
                'status' => 1,

                'title' => $request->title,

                'img_title' => $request->img_title,
                'story' => $request->story,

                'updated_at'  => Carbon::now(),
            ]);

            Toastr::success('Story update Success', 'Success', ["positionClass" => "toast-top-right"]);

            return redirect('view/story');
        }
    }



    public function AddComment($id, Request $request)
    {
        Comment::insert([
            'user_id' => Auth::user()->id,
            'story_id' => $id,
            'comment' => $request->comment,
            'created_at' => Carbon::now()

        ]);
        Toastr::success('Comment submitted ', 'Success', ["positionClass" => "toast-top-right"]);
        return back();
    }
}
