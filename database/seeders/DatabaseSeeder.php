<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\PurchaseHistory;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        $user1 = \App\Models\User::factory()->create([
            'first_name' => 'David',
            'last_name' => 'Smith',
            'username' => 'davidsm',
            'email' => 'davidsmith@gmail.com',
            'password' => bcrypt('davidsmithpassword')
        ]);
        PurchaseHistory::factory(15)->create(['user_id' => $user1['id']]);

        $user2 = \App\Models\User::factory()->create([
            'first_name' => 'Random',
            'last_name' => 'Person',
            'username' => 'randomperson',
            'email' => 'randomperson@gmail.com',
            'password' => bcrypt('randompersonpassword')
        ]);
        PurchaseHistory::factory(15)->create(['user_id' => $user2['id']]);

        $user3 = \App\Models\User::factory()->create([
            'first_name' => 'John',
            'last_name' => 'Doe',
            'username' => 'johndoe',
            'email' => 'johndoe@gmail.com',
            'password' => bcrypt('johndoepassword')
        ]);
        PurchaseHistory::factory(15)->create(['user_id' => $user3['id']]);
    }
}
