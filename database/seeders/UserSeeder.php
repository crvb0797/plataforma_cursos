<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

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
            'name' => 'Carlos Villatoro',
            'email' => 'carlos@villatoro.dev',
            'password' => bcrypt('Mante123.')
        ]);
        User::factory(79)->create();
    }
}
