<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        User::create([
            'name' => '',
            'email' => '' . time() . '', //Faking a unique email using timestamp
            'password' => Hash::make(''), //Password is hashed for security.
            'role' => 'admin',
        ]);
    }
}
