<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\DetailUser;
use App\Models\User;
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
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $user = User::create([
            'name'=>'admin',
            'email'=>'admin@gmail.com',
            "password"=> bcrypt("password"),
            'status'=>'4',
        ]);

        DetailUser::create([
            'user_id' => $user->id,
            'nohp' => '6281378375050'
        ]);
    }
}
