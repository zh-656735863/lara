<?php

use Illuminate\Database\Seeder;
//引入文章ORM模型
use App\Models\Article;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Article::class,20)->create();
    }
}
