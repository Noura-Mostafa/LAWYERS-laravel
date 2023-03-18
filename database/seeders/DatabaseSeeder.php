<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Database\Seeders\user;
use Database\Seeders\court;
use Database\Seeders\company;
use Database\Seeders\contact;
use Database\Seeders\country;
use Illuminate\Database\Seeder;
use Database\Seeders\CreatePermissions;
use Database\Seeders\CreateAdminUserSeeder;

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

        //  $this->call(company::class);
        // $this->call(country::class);
        // $this->call(contact::class);
        // $this->call(user::class);
        // $this->call(court::class);
        // $this->call(CreatePermissions::class);
        $this->call(CreateAdminUserSeeder::class);
    }
}
