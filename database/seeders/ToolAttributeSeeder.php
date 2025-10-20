<?php

namespace Database\Seeders;

use App\Models\ToolAttribute;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ToolAttributeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ToolAttribute::factory(100)->create();
    }
}
