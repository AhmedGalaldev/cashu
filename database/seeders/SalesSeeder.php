<?php

namespace Database\Seeders;

use App\Models\Sales;
use Illuminate\Database\Seeder;

class SalesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Sales::create(['user_id'=>2,'payment'=>5000]);
    }
}
