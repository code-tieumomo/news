<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
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
    	User::create([
    		'name' => 'UETNEWS-ADMIN',
    		'email' => 'uetnews.admin@gmail.com',
    		'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
    		'role_id' => Role::where('name', '=', 'admin')->first()->id,
    		'remember_token' => Str::random(10)
    	]);

        User::factory()->count(50)->create();
    }
}
