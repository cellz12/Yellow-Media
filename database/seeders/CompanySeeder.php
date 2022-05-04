<?php

namespace Database\Seeders;

use App\Models\Company;
use Illuminate\Database\Seeder;

/**
 * Class CompanySeeder
*/
class CompanySeeder extends Seeder
{
    /**
     * @return void
     */
    public function run()
    {
        Company::factory()->count(50)->create();
    }
}
