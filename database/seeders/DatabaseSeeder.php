<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Nugi Kusuma Wardana',
            'username' => 'Nugi Wardana',
            'email' => 'nugi.wardana@gmail.com',
            'password' => bcrypt('nugi1208')
        ]);
    }
}
