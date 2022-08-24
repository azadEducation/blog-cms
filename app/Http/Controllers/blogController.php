<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use \App\Models\Blog;

class blogController extends Controller
{
    public function blogIndex()
    {
        if (Auth::check() && Auth::user()->role == 'User') {
            $blogArr = Blog::where('user_id', Auth::user()->id)->whereDate('end_date', '>', now())->get();
        } else{
            $blogArr = Blog::whereDate('end_date', '>', now())->get();
        }
        return view('home')->with(compact('blogArr'));
    }
    public function newBlog()
    {
        return view('new-blog');
    }

    public function blogForm(Request $request)
    {

        $validator = $request->validate([
            'title' => 'required',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'is_active' => 'required',
            'description' => 'required',
            'image' => 'required|mimes:png,jpg,jpeg|max:2048',
        ]);

        if ($validator) {
            if (!isset($validator['id'])) {
                $newImage = time() . "_blog." . $request->image->extension();
                $request->image->move(public_path('blog_images'), $newImage);
                $validator['image'] = $newImage;
            }
            if (Auth::user()->role != 'Admin') {
                $validator['user_id'] = Auth::user()->id;
            }
            Blog::create($validator);
            return redirect()->route('dashboard')->with(['success' => 'New Blog created successfully']);
        } else {
            return redirect()->back();
        }
    }
    public function blogUpdateForm(Request $request)
    {

        $validator = $request->validate([
            'id' => 'required',
            'title' => 'required',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'is_active' => 'required',
            'description' => 'required',
        ]);

        if ($validator) {
            Blog::where('id',$validator['id'])->update($validator);
            return redirect()->route('dashboard')->with(['success' => 'Blog updated successfully']);
        } else {
            return redirect()->back();
        }
    }

    public function updateBlog($blogId)
    {
        if (Auth::user()->role == 'Admin') {
            $blogDetail = Blog::where('id', $blogId);
        } else {
            $blogDetail = Blog::where('id', $blogId)->where('user_id', Auth::user()->id)->get();
            if (sizeof($blogDetail) == 0) {
                return redirect()->back()->with(["error" => "You don't have own blog."]);
            }
        }
        $blogDetail = $blogDetail[0];
        return view('update-blog')->with(compact('blogDetail'));
    }

    public function deleteBlog($blogId)
    {
        if (Auth::user()->role != 'Admin') {
            $blogDetail = Blog::where('id', $blogId)->where('user_id', Auth::user()->id)->get();
            if (sizeof($blogDetail) == 0) {
                return redirect()->back()->with(["error" => "You don't have own blog."]);
            }
        }
        Blog::destroy($blogId);
        return redirect()->route('dashboard')->with(['success' => 'successfully deleted blog']);
    }
}
