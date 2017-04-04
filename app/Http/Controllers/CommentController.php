<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use App\Course;

class CommentController extends Controller
{
    public function index($id)
    {
        return Comment::where('course_id', $id)->get();
    }

    public function save($id, Request $request)
    {
        $this->validate($request, [
            'body' => 'required|min:5'
        ]);

        $course = Course::find($id);
        $comment = $course->addComment($request->body);

        if($request->wantsJson()) {
            return response([
                'message' => 'Comment was created',
                'id' => $comment->id,
            ], 200);
        }

        return back();
    }

    public function delete($id, Request $request)
    {
        Comment::destroy($id);

        $message = 'Comment was removed';
        if($request->wantsJson()) {
            return response($message, 200);
        }

    }
}
