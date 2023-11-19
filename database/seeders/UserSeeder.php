<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'email_verified_at' => Carbon::now(),
            'password' => Hash::make('12345678'),
        ])->assignRole(['admin','seller','client']);

        // seller
        User::create([
            'name' => 'seller',
            'email' => 'seller@seller.com',
            'email_verified_at' => Carbon::now(),
            'password' => Hash::make('12345678'),
        ])->assignRole('seller');

        // client
        User::create([
            'name' => 'client',
            'email' => 'client@client.com',
            'email_verified_at' => Carbon::now(),
            'password' => Hash::make('12345678'),
        ])->assignRole('client');
    }
}
