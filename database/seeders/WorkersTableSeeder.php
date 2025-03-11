<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WorkersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('workers')->insert([
            [
                'email' => 'john.doe@example.com',
                'payment_type' => 30000,
                'role_type' => 'admin',
                'name' => 'John Doe'
            ],
            [
                'email' => 'jane.smith@example.com',
                'payment_type' => 20000,
                'role_type' => 'manager',
                'name' => 'Jane Smith'
            ],
            [
                'email' => 'alex.johnson@example.com',
                'payment_type' => 10000,
                'role_type' => 'employee',
                'name' => 'Alex Johnson'
            ],
            [
                'email' => 'mary.wilson@example.com',
                'payment_type' => 20000,
                'role_type' => 'manager',
                'name' => 'Mary Wilson'
            ],
            [
                'email' => 'peter.parker@example.com',
                'payment_type' => 10000,
                'role_type' => 'employee',
                'name' => 'Peter Parker'
            ],
        ]);
    }
}
