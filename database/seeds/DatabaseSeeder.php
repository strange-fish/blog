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
//      factory(App\User::class, 50)->create();

      factory(App\Article::class,50)->create()->each(function (App\Article $art) {
        $art->categories()->attach(random_int(1,4));
      });
    }
}
