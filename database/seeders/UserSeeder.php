<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

/**
 * Class UserSeeder
*/
class UserSeeder extends Seeder
{
    /**
     * @return void
     */
    public function run()
    {
        User::factory()->count(50)->create();
    }
}
