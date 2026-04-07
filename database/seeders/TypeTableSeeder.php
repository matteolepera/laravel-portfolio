<?php

namespace Database\Seeders;

use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = ["Full stack", "Front-end", "Back-end", "UX/UI"];

        foreach ($categories as $category) {
            $newType = new Type();

            $newType->name = $category;

            $newType->save();

        }
    }
}
