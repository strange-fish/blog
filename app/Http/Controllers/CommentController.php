<?php

namespace App\Http\Controllers;

use App\Article;
use App\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{

    public function __construct()
    {
      $this->middleware('auth');
    }

  /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $user = Auth::user();

      $comment = new Comment;
      $comment->content = $request->get('content');

      $user->comments()->create($comment)->save();
      return self::success();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function show(Comment $comment)
    {
        //
      return self::success($comment);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comment $comment)
    {
        //
      $comment->content = $request->get('content');
      $comment->save();
      return self::success($comment);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment)
    {
      try {
        $comment->delete();
        return self::success();
      } catch (\Exception $e) {
        return self::fail();
      }
    }

    public function like(Comment $comment) {
      $comment->likes()->attach(Auth::user()->id);
      return self::success();
    }

    public function unLike(Comment $comment) {
      $comment->likes()->detach(Auth::user()->id);
      return self::success();
    }
}
