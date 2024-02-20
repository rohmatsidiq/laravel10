<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DummySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 496; $i < 9500; $i++) {
            User::create([
                'name' => 'user ke ' . $i,
                'email' => 'user' . $i . '@mail.com',
                'password' => Hash::make('123456')
            ]);
        }
    }
}
