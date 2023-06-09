<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Listing;
use Illuminate\Database\Seeder;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //\App\Models\listings::factory(10)->create();
        $user = User::factory()->create([
            'name'=> 'Dogukan Dg',
            'role'=>'employer',
            'phone'=>'123456789',
            'email' => 'dogukan1@gmail.com',
            
        ]);
        
        Listing::factory(6) -> create(
            [
                'user_id'=>$user->id
            ]
        );

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}