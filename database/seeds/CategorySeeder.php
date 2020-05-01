<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->truncate();

        $categories = [
            'all',
            'front',
            'back',
            'infra',
            'other'
        ];

        foreach ($categories as $category) {
            $data[] = [
                'name' => $category
            ];
        }

        DB::table('categories')->insert($data);
    }
}
