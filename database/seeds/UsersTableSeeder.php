<?php

use App\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::truncate();
        Role::truncate();
        User::truncate();

        $SuperAdminRole = Role::create(['name' => 'SuperAdmin']);
        $AdminRole = Role::create(['name' => 'Admin']);
        $UserRole = Role::create(['name' => 'User']);

        $user = new User;
        $user->name = 'Alfonso';
        $user->email = 'alfonso@gmail.com';
        $user->password = bcrypt('01020304');
        $user->save();
        $user->assignRole($SuperAdminRole);

        $user = new User;
        $user->name = 'Ramon';
        $user->email = 'ramon@gmail.com';
        $user->password = bcrypt('123456');
        $user->save();
        $user->assignRole($SuperAdminRole);

        $user = new User;
        $user->name = 'Pepe';
        $user->email = 'pepe@gmail.com';
        $user->password = bcrypt('01020304');
        $user->save();
        $user->assignRole($AdminRole);

        $user = new User;
        $user->name = 'Alex';
        $user->email = 'alex@gmail.com';
        $user->password = bcrypt('01020304');
        $user->save();
        $user->assignRole($UserRole);


        factory(User::class,30)->create()->each->assignRole($UserRole);
    }
}
