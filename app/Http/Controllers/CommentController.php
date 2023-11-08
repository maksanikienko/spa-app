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

        $comment->save();

        return redirect()->route('comments.show', ['id' => $comment->id]);
    }

    public function show()
    {
        $comments = Comment::all();
    
        return view('main', ['comments' => $comments]);
    }
}
