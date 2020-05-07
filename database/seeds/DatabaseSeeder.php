<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * 调用编写好的种子文件
     *
     * @return void
     */
    public function run()
    {
        $this->call(ArticleSeeder::class);
        $this->call(list1Seeder::class);
        $this->call(list2Seeder::class);
        $this->call(list3Seeder::class);
        $this->call(familySeeder::class);
        $this->call(UsersSeeder::class);
    }
}
