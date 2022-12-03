<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class roleTableseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_user = new  Role();
        $role_user->name = 'User';
        $role_user->description = 'A default user';
        $role_user->save();

        $role_agent = new  Role();
        $role_agent->name = 'Agent';
        $role_agent->description = 'An Agent';
        $role_agent->save();

        $role_admin = new  Role();
        $role_admin->name = 'Admin';
        $role_admin->description = 'An admin';
        $role_admin->save();
    }
}
