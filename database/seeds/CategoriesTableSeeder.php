<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            "化学",
            "物理",
            "宇宙",
            "コンピュータ",
            "生物"
        ];
        
        $list = [];
        foreach($categories as $category) {
            $list[] = [
                "name" => $category,
            ];
        }

        DB::table("categories")->insert($list);
    }
}
