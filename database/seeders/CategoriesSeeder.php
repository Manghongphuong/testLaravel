<?php

namespace Database\Seeders;

use App\Models\Categories;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $danhMucTin = [
            'SweetSoft1',
            'SweetSoft2',
            'SweetSoft3',
            'SweetSoft4',
        ];
        foreach ($danhMucTin as $item) {
            Categories::create([
                'name_ct' => $item,
            ]);
        };
    }
}
