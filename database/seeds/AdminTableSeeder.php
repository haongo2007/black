<?php

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
        	'name' => 'Admin',
        	'phone' => '0972918120',
        	'avatar' => '/avatar/default.jpg',
        	'email' => 'haongodev@gmail.com',
        	'password' => '$2y$10$Ft7m4RPOSh1zEKW4ESHKK.1IyK4pdcvtCCnDS0qHWEkcnGG/kmD2K'
        ]);
        $role = Role::create(['name' => 'Admin','guard_name' => 'web']);
        $user->assignRole('Admin');
    }
}
