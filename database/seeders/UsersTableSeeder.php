<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User;
        $user->nama = "Maker";
        $user->username = "maker@gmail.com";
        $user->password = bcrypt('12345678');
        $user->role_name = 'maker';
        $user->save();

        $user = new User;
        $user->nama = "Approver";
        $user->username = "approver@gmail.com";
        $user->password = bcrypt('12345678');
        $user->role_name = 'approver';
        $user->save();
    }
}
