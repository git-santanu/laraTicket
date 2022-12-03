<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class userTableseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_user = Role::where('name','User')->first();
        $role_agent = Role::where('name','Agent')->first();
        $role_admin = Role::where('name','Admin')->first();

        $user = new User();
        $user->name = 'Test';
        $user->email = Str::random(10).'@gmail.com';
        $user->password = bcrypt('user');
        $user->save();
        $user->roles()->attach($role_user);

        $agent = new User();
        $agent->name = 'Agent';
        $agent->email = Str::random(10).'@gmail.com';
        $agent->password = bcrypt('agent');
        $agent->save();
        $agent->roles()->attach($role_agent);

        $admin = new User();
        $admin->name = 'Admin';
        $admin->email = Str::random(10).'@gmail.com';
        $admin->password = bcrypt('admin');
        $admin->save();
        $admin->roles()->attach($role_admin);
    }
}
