<?php

namespace App\Http\Controllers;

use App\Article;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;



class ArticleController extends Controller
{

  /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
      $this->middleware('auth:api');
    }

    public function index()
    {
      $articles = Article::with('author')->get();

      return self::success($articles);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
      $this->validate($request, [
        'title' => 'required|max:100',
        'content' => 'required',
      ]);
      Article::query()->create([
        'author_id' => Auth::id(),
        'title' => $request->get('title'),
        'content' => $request->get('content'),
      ])->save();
      return self::success();
    }

  /**
   * get the articles that belongs to the current user!
   * @return \Illuminate\Http\Response
   */

    public function getAdmin() {
      return self::success(Auth::user()->articles);
    }

    /**
     * Display the specified resource.
     *
     * @param  number $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
      $article = Article::with('categories')->find($id);

      return $article ? self::success($article) : self::fail("doesn't exist!");
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article)
    {
      $this->validate($request, ['title' => 'nullable|max:100']);

      $article->fill($request->all())->save();
      return self::success($article);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  number $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
      $article = Article::query()->find($id);
      if(!$article) return self::fail("doesn't exist!");
      try {
        $article->delete();
        return self::success();
      } catch(\Exception $e) {
        return self::fail();
      }
    }

    public function getComments(Article $article) {
      $comment = $article->comments()->get();

      return self::success($comment);
    }

    public function like($article, User $user) {
      $user->likeArticles()->syncWithoutDetaching($article);
      return self::success();
    }
    public function unlike($article) {
      $res = Auth::user()->likeArticles()->detach($article);
      return $res ? self::success() : self::fail('already deleted!');
    }
}
