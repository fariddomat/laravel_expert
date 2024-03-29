<?php

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'super_admin',
            'email' => 'super_admin@project.com',
            'password' => bcrypt('00@11@22$33'),
        ]);
        $user->attachRole('superadministrator');

        $blogger = User::create([
            'name' => 'blogger',
            'email' => 'blogger@project.com',
            'password' => bcrypt('00@11@22$33'),
        ]);
        $blogger->attachRole('blogger');
    }
}
