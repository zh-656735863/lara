<?php

use Illuminate\Database\Seeder;
use App\Models\list2;

class list2Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(list2::class,5)->create();
    }
}
