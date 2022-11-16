<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Admin
        DB::table('users')->insert([
            'first_name'        => 'admin',
            'last_name'         => 'admin',
            'email'             => 'admin@example.com',
            'password'          => 'admin',
            'email_verified_at' => now(),
            'remember_token'    => Str::random(10),
            'type'              => 'admin'
        ]);
        User::factory()->times(99)->create();
    }
}
