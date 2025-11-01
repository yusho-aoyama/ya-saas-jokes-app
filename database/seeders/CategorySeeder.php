<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $seedCategories = [
            [
                'id' => 1, 'title' => 'Unknown',
            ],
            [
                'description' => 'This will not be added'
            ],
            [
                'id' => 100, 'title' => 'pirate',
                'description' => "Aaaaarrrrgh! Me Jocular hearties!",
            ],
            [
                'title' => 'lightbulb',
                'description' => 'Some bright spark thinks they are funny.',
            ],
            [
                'title' => 'dad',
                'description' => "Don't you love the bad jokes dad's tell.",
            ],
            [
                'title' => 'pun',
                'description' => 'These are usually very corny.',
            ],
            [
                'title' => 'halloween',
            ],
            [
                'title' => 'one-liner',
            ],
            [
                'title' => 'knock-knock',
                'description' => 'You know you need to check the door...',
            ],
            [
                'title' => 'lawyer',
            ],
            [
                'title' => 'geek',
            ],
            [
                'title' => 'programming',
            ],
            [
                'title' => 'web',
            ],
            [
                'title' => 'mum',
            ],
            [
                'title' => 'dog',
            ],
            [
                'title' => 'cat',
                'description' => 'Some of these may come with claws...'
            ],
            [
                'title' => 'bird',
            ],
            [
                'title' => 'animal',
            ],
            [
                'title' => 'Mum',
                'description' => 'Humorous takes on mothers, often featuring "mum jokes" or exaggerations of mum behavior.',
            ],
            [
                'title' => 'Science',
                'description' => 'Jokes based on scientific concepts, experiments, or famous scientists.',
            ],
            [
                'title' => 'Maths',
                'description' => 'Numerical or logical jokes involving equations, geometry, or math-related puns.',
            ],
            [
                'title' => 'Pirate',
                'description' => 'Jokes using pirate lingo, characters, and sea-faring humor.',
            ],
            [
                'title' => 'Kids',
                'description' => 'Clean, simple jokes that are especially funny and appropriate for children.',
            ],
            [
                'title' => 'food',
                'description' => 'Jokes centered on eating, cooking, or food-related wordplay.',
            ],
            [
                'title' => 'Programming',
                'description' => 'Jokes that play on coding, software bugs, or developer life.',
            ],

        ];

        foreach ($seedCategories as $seedCategory) {

            // only insert the category if the title is not empty
            $title = $seedCategory['title'] ?? null;

            if (!is_null($title)) {

                $category = Category::updateOrCreate(
                    ['title' => $title],
                    [
                        'title' => Str::of($seedCategory['title'])->title(),
                        'description' => $seedCategory['description']??null,
                    ]
                );

            }

        }
    }
}
