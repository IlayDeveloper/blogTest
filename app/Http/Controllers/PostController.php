<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function postCreatePost(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|unique:posts|max:255',
            'content' => 'required',
        ]);
    }

    public function getCreatePost()
    {
        return view('post/_form');
    }

    public function deletePost($id)
    {

    }

    public function postEditPost($id)
    {

    }

    public function getEditPost($id)
    {

    }

    public function viewPost($id)
    {

    }

    public function showPostList()
    {

    }
}
