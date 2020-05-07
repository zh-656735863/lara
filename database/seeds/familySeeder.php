<?php

use Illuminate\Database\Seeder;
use App\Models\Family;
class familySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Family::class,200)->create();
    }
}
