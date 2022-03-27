<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Student::factory(20)->create();
        \App\Models\Expense::factory(5)->create();
        \App\Models\Income::factory(5)->create();
        $this->call(RolePermission::class);
        \App\Models\User::factory(10)->create();
    }
}
