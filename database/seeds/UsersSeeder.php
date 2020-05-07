<?php

use Illuminate\Database\Seeder;
use App\Models\Users;
class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Users::class,5)->create();
    }
}
