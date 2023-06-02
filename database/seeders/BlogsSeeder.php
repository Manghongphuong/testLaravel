<?php

namespace Database\Seeders;

use App\Models\Blogs;
use App\Models\Categories;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Faker\Factory as Faker;

class BlogsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach (Categories::all() as $danhMucTin) {
            foreach (range(1, 10) as $item) {
                $faker = Faker::create();
                Blogs::create([
                    'id_category' =>  $danhMucTin->id,
                    'title' =>  $danhMucTin->ten . " " . $item,
                    'synopsis' =>  "Tom tat" . $danhMucTin->ten . " " . $item,
                    'content' =>  $faker->Text,
                    'image' => Str::random(20) . '.' . 'png',
                ]);
            }
        }
    }
}
