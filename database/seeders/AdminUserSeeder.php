<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'admin',
            'email' => 'admin@gmai.com',
            'email_verified_at' => date('Y-m-d H:i:s', time()),
            'password' => \bcrypt('admin1234'),
            'is_admin' => true
        ]);
    }
}
