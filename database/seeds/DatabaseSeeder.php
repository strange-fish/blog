<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//      $tagArray = ['shopping', 'computer', 'games', 'news'];
//      foreach ($tagArray as $name) {
//        $cate = new \App\Category;
//        $cate->name = $name;
//        $cate->save();
//      }
//      factory(App\User::class, 50)->create();

      factory(App\Article::class,50)->create()->each(function (App\Article $art) {
        $art->categories()->attach(random_int(1,4));
      });
    }
}
