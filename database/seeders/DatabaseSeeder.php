<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        \App\Models\User::factory()->create([
            'name' => 'Admin',
            'role' => 'Admin',
            'email' => 'admin@homebound.com',
            'phone_number' => '393711093807',
            'password' =>'$2y$10$COw6abnAOid.mwPQS9hnyuciMgrsGF/Hgywsccrhiordw/Tt2m1tW' // 123456789
        ]);
    }
}
