<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        // User::factory()->create([
        //     'name' => 'Admin',
        //     'role' => 'Admin',
        //     'email' => 'admin@homebound.com',
        //     'phone_number' => '393711093807',
        //     'password' => '$2y$10$COw6abnAOid.mwPQS9hnyuciMgrsGF/Hgywsccrhiordw/Tt2m1tW' // 123456789
        // ]);
        User::factory()->create([
            'name' => 'Admin',
            'role' => 'Admin',
            'email' => 'admin@mail.com',
            'phone_number' => '1234567489',
            'password' => Hash::make('admin786') // 123456789
        ]);
    }
}
