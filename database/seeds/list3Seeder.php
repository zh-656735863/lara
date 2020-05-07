<?php

use Illuminate\Database\Seeder;
use App\Models\list3;
class list3Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(list3::class,5)->create();
    }
}
