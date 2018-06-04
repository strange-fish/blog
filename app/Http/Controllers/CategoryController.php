<?php

namespace App\Http\Controllers;

use App\Tag;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
      $categories = Tag::query()->paginate(15)->get();
      return self::success($categories);
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
      $name = $request->get('name');
      try {
        Tag::query()->create(['name' => $name]);
        return self::success();
      } catch (\Exception $e) {
        return self::fail($e);
      }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Tag  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Tag $category)
    {
        //
      return self::success($category);
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Tag  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tag $category)
    {
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tag  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tag $category)
    {
      try {
        $category->delete();
        return self::success();
      } catch (\Exception $e) {
        logger('fail to delete!', $e);
        return self::fail();
      }
    }

}
