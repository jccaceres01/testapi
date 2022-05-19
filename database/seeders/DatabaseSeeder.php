<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'Julio Caceres',
            'email' => 'jcesar01@hotmail.es',
            'password' => \Hash::make('Password1')
        ]);

        \App\Models\Contacts::factory(300)->create();
    }
}
