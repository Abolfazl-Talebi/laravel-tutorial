<?php

namespace App\Http\Controllers\back;

use App\Article;
use App\Comment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;



class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $comments = Comment::orderBy('id', 'DESC')->paginate(20);
        return view('back.comments.comments', compact('comments'));
    }



    public function edit(Comment $comment)
    {
        return view('back.comments.edit', compact('comment'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Articles  $articles
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comment $comment)
    {

        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'body' => 'required'
        ]);


        try {
            $comment->update($request->all());
        } catch (Exception $exception) {
            return redirect(route('admin.comments.edit'))->with('warning', $exception->getCode());
        }

        $msg = "ذخیره ی نظر با موفقیت انجام شد";
        return redirect(route('admin.comments'))->with('success', $msg);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Articles  $articles
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment)
    {
        try {
            $comment->delete();
        } catch (Exception $exception) {
            return redirect(route('admin.comments'))->with('warning', $exception->getCode());
        }

        $msg = "آیتم مورد نظر حذف گردید";
        return redirect(route('admin.comments'))->with('success', $msg);
    }

    public function updatestatus(Comment $comment)
    {
        if ($comment->status == 1) {
            $comment->status = 0;
        } else {
            $comment->status = 1;
        }

        $comment->save();
        $msg = "بروزرسانی با موفقیت انجام شد";
        return redirect(route('admin.comments'))->with('success', $msg);
    }
}
