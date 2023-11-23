<?php

namespace App\Http\Controllers;
use App\Models\Comment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;
use Illuminate\Validation\ValidationException;

class CommentController extends Controller
{
    public function validateData(Request $request)
    {
        $validator = validator($request->all(), [
            'user_name' => 'required|string|regex:/^[A-Za-z0-9]+$/',
            'email' => 'required|email',
            'home_page' => 'nullable|url',
            'captcha' => 'required|captcha',
            'text' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }
        return 'success';
    }

    public function uploadImage(Request $request)
    {
        if ($request->hasFile('image')) {
            $uploadedFile = $request->file('image');
            $username = $request->input('user_name');
            $filename = time() . '_' . $username . '.' . $uploadedFile->getClientOriginalExtension();

            $path = $uploadedFile->storeAs('comment_images', $filename, 'public');

            $image = Image::make(storage_path('app/public/' . $path));

            $maxWidth = 320;
            $maxHeight = 240;

            if ($image->width() > $maxWidth || $image->height() > $maxHeight) {
                $image->resize($maxWidth, $maxHeight, function ($constraint) {
                    $constraint->aspectRatio();
                });

                $image->save(storage_path('app/public/' . $path));
            }

            return $path;
        }
    }

    public function store(Request $request)
    {
        $validationResult = $this->validateData($request);

        if ($validationResult !== 'success') {
            return $validationResult;
        }

        $comment = new Comment;
        $comment->user_name = $request['user_name'];
        $comment->email = $request['email'];
        $comment->home_page = $request['home_page'];
        $comment->avatar_image_path = $request->input('avatar');
        $comment->text = $request['text'];
        $comment->parent_id = $request->input('parent_id');

        $imagePath = $this->uploadImage($request);
        if ($imagePath) {
            $comment->image_path = $imagePath;
        }
        $comment->save();

        return redirect()->route('comments.show', ['id' => $comment->id]);

    }

    public function show(Request $request)
    {
        $sortBy = $request->input('sort_by', 'created_at');
        $sortOrder = $request->input('sort_order', 'desc');
        $avatar = $this->selectAvatar();

        $mainComments = Comment::with('replies')
            ->whereNull('parent_id')
            ->orderBy($sortBy, $sortOrder)
            ->simplePaginate(25);

        return view('main', compact('mainComments','avatar'));
    }
    public function selectAvatar():array
    {
        $avatarPath = storage_path('app/public/avatar_memoji_images');
        $avatarFiles = File::allFiles($avatarPath);

        $avatars = [];

        foreach ($avatarFiles as $file) {
            $avatars[pathinfo($file->getFilename(), PATHINFO_FILENAME)] = $file->getFilename();
        }

        return $avatars;
    }

}
