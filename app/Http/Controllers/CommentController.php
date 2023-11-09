<?php

namespace App\Http\Controllers;
use App\Models\Comment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class CommentController extends Controller
{
    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'user_name' => 'required|string|regex:/^[A-Za-z0-9]+$/',
            'email' => 'required|email',
            'home_page' => 'nullable|url',
            'captcha' => 'required|string|regex:/^[A-Za-z0-9]+$/',
            'text' => 'required|string',
        ]);

        $comment = new Comment;
        $comment->user_name = $validatedData['user_name'];
        $comment->email = $validatedData['email'];
        $comment->home_page = $validatedData['home_page'];
        $comment->captcha = $validatedData['captcha'];
        $comment->text = $validatedData['text'];
        $comment->parent_id = $request->input('parent_id');
        $comment->root_id = $request->input('root_id');


        $comment->save();

        return redirect()->route('comments.show', ['id' => $comment->id]);
    }

    public function show()
    {
        $mainComments = Comment::with('replies')->whereNull('parent_id')->simplePaginate(25);
        //добавить root_id
    //dd($mainComments->links());
        return view('main', compact('mainComments'));
    }
}
