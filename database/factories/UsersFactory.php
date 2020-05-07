php artisan db:seed <?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Users;
use Faker\Generator as Faker;

$factory->define(Users::class, function (Faker $faker) {
    return [
        'username' => $faker->name,
        'password' => bcrypt('admin'),
    ];
});
