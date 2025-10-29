<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
// add use lines
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $seedCategories = [
            ['id'=>1, 'title'=>'Unknown',],
            ['id'=>100, 'title'=>'pirate', 'description' => "Aaaaarrrrgh! Me jocular hearties!",],
            ['title'=>'lightbulb', 'description' => 'Some bright spark thinks they are funny.',],
            ['title'=>'dad', 'description' => "Don't you love the bad jokes dad's tell.",],
            ['title'=>'pun', 'description'=>'These are usually very corny.'],
            ['title'=>'knock-knock', 'description'=>'You know you need yto check the door...',],
        ];


        foreach ($seedCategories as $seedCategory){
            $category = Category::firstOrCreate(
                ['id'=>$seedCategory['id'] ?? 0],
                $seedCategory
            );
        }
    }
}
