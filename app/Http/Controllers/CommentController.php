<?php

namespace App\Http\Controllers;
use App\Models\Comment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;
use Illuminate\Validation\ValidationException;



class CommentController extends Controller
{
    public function store(Request $request)
    {

        try{
            $validatedData = $request->validate([
                'user_name' => 'required|string|regex:/^[A-Za-z0-9]+$/',
                'email' => 'required|email',
                'home_page' => 'nullable|url',
                'captcha' => 'required|captcha',  //captcha
                'text' => 'required|string',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',

            ]);

        } catch (ValidationException $e) {

            return response()->json(['errors' => $e->validator->errors()], 422);
        }

        $comment = new Comment;
        $comment->user_name = $validatedData['user_name'];
        $comment->email = $validatedData['email'];
        $comment->home_page = $validatedData['home_page'];
        $comment->captcha = $validatedData['captcha'];
        $comment->text = $validatedData['text'];
        $comment->parent_id = $request->input('parent_id');
        $comment->root_id = $request->input('root_id');

        if ($request->hasFile('image')) {
            $uploadedFile = $request->file('image');
            $path= $uploadedFile->store('comment_images','public');
            $image = Image::make(storage_path('app/public/' . $path));
                    
            // aspectRatio() - сохранение пропорций
            $image->resize(320, 240, function ($constraint) {
                $constraint->aspectRatio();
            });
            $image->save();

            $comment->image_path = $path;        }

        $comment->save();

        return redirect()->route('comments.show', ['id' => $comment->id]);

    }

    public function show(Request $request)
    {
        $sortBy = $request->input('sort_by', 'created_at');
        $sortOrder = $request->input('sort_order', 'desc');
    
        $mainComments = Comment::with('replies')
            ->whereNull('parent_id')
            ->orderBy($sortBy, $sortOrder)
            ->simplePaginate(25);

        return view('main', compact('mainComments'));
    }
    
}
