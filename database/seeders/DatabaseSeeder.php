<?php

namespace Database\Seeders;

use App\Models\ToolClass;
use App\Models\User;
use Database\Factories\ToolClassFactory;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        //llammos a los factory
        $this->call(ToolClassSeeder::class);
        $this->call(ToolTypeSeeder::class);
        $this->call(ToolAttributeSeeder::class);

        //Llamamos seeder para roles
        $this->call(RoleSeeder::class);

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
    }
}
