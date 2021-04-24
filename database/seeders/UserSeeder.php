<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create(['name' => 'admin']);
        Role::create(['name' => 'user']);
        $roleWriter = Role::create(['name' => 'writer']);
        Permission::create(['name' => 'create posts']);
        Permission::create(['name' => 'update posts']);
        Permission::create(['name' => 'delete posts']);
        $roleWriter->givePermissionTo('create posts', 'update posts', 'delete posts');

    	$userAdmin = User::create([
    		'name' => 'UETNEWS-ADMIN',
    		'email' => 'uetnews.admin@gmail.com',
    		'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
    		'remember_token' => Str::random(10)
    	]);
        $userAdmin->assignRole('admin');

        $userRoles = ['user', 'writer'];
        $users = User::factory()->count(100)->create();
        foreach ($users as $user) {
            $user->assignRole(Arr::random($userRoles));
        }
    }
}
