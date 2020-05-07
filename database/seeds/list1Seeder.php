<?php

use Illuminate\Database\Seeder;
use App\Models\list1;
class list1Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(list1::class,5)->create();
    }
}
