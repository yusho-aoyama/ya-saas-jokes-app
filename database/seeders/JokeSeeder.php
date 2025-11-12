<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Joke;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JokeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $seedJokes = [
            [
                'title' => 'Skeleton Fight',
                'content' => "<p>Why don't skeletons fight each other? </p><p>Because they don't have the guts.</p>",
                'categories' => ['Skeleton'],
            ],
            [
                'title' => 'Pirate Maths',
                'content' => "<p>What type of Maths are pirates best at?</p><p>Algebra. Because they are good at finding X.</p>",
                'categories' => ['Pirate', 'Maths'],
            ],

            [
                'title' => "Charging Rhino",
                'description' => "<p>How do you keep a Rhino from charging?</p><p>Take away its credit card.</p>",
                "categories" => ['animal',],
            ],

            [
                'title' => "Actors",
                'description' => "<p>How many actors does it take to change a light bulb?</p><p>Only one-they don't like to share the spotlight.</p>",
                "categories" => ['lightbulb',],
            ],

            [
                'title' => "Aerobic Instructors",
                'description' => "<p>How many aerobics instructors does it take to change a lightbulb ?</p><p>Five.</p><p>Four to do it in perfect synchrony and one to stand there going, \"To the left, and to the left, and to the left, and to the left, and take it out, and put it down, and pick it up, and put it in, and to the right, and to the right, and to the right, and to the right...\"</p>",
                "categories" => ['lightbulb',],
            ],

            [
                'title' => "Mechanics",
                'description' => "<p>How many auto mechanics does it take to change a light bulb?</p><p>Six - One to force it with a hammer and five to go out for more bulbs.</p>",
                "categories" => ['lightbulb',],
            ],

            [
                'title' => "Computer",
                'description' => "<p>How do you praise a computer?</p><p>Say 'Data Boy'!</p>",
                "categories" => ['unknown',], 1
            ],

            [
                'title' => "Law Professor",
                'description' => "<p>How many law professors does it take to change a lightbulb?</p><p>Hell, you need 250 just to lobby for the research grant.</p>",
                "categories" => ['lightbulb',],
            ],

            [
                'title' => "Definition of Diplomacy",
                'description' => "<p><em>Diplomacy:</em> The ability to tell a person to go to hell in such a way that they look forward to the trip.</p>",
                "categories" => ['unknown',],
            ],

            [
                'title' => "Lone Bones",
                'description' => "<p>Why didn't the skeleton go to the dance?</p><p>Because it had no body to go with.</p>",
                "categories" => ['unknown',],
            ],

            [
                'title' => "All Things",
                'description' => "<p>All things are possible - except skiing through a revolving door.</p>",
                "categories" => ['one-liner',],
            ],

            [
                'title' => "Cow",
                'description' => "<p>Knock, Knock</p><p>Who's there?</p><p>Cows go.</p><p>Cows go who?</p><p>No, silly! Cows go moo!</p>",
                "categories" => ['knock-knock',],
            ],

            [
                'title' => "WOWOLFOL",
                'description' => "<p>What is represented by `WOWOLFOL`?</p><p>Wolf in sheep's clothing (wool)!</p>",
                "categories" => ['animal', 'geek'],
            ],

            [
                'title' => "Great Plains",
                'description' => "<p><em>Teacher:</em> John, where are the Great Plains?</p><p><em>John:</em> At the airport.</p>",
                "categories" => ['dad', 'pun',],
            ],

            [
                'title' => "Yum #1",
                'description' => "<p>What do you call a dog in the sun?</p><p>A Hot Dog!</p>",
                "categories" => ['animal',],
            ],

            [
                'title' => "It aint' heavy...",
                'description' => "<p>Why do people wear shamrocks on St. Patrick\'s day?</p><p>Regular rocks are too heavy!</p>",
                "categories" => ['dad', 'pun', 'irish'],
            ],

            [
                'title' => "Lightbulbs and Country Singers",
                'description' => "<p>How many country singers does it take to screw in a light bulb?</p><p>1 to screw it in,<br>and 3 to write a song about it.</p>",
                "categories" => ['lightbulb','music'],
            ],

            [
                'title' => "Snake and a Kangaroo",
                'description' => "<p>What do you get when you cross a snake and a kangaroo?</p><p>A jump rope</p>",
                "categories" => ['animal',],
            ],

            [
                'title' => "The Psychologist Handyman",
                'description' => "<p>How many psychologists does it take to change a light bulb?</p><p>Only one, but the bulb has got to WANT to change.</p>",
                "categories" => ['lightbulb','psychology',],
            ],

            [
                'title' => "Surrealist Lightbulbs",
                'description' => "<p>How many surrealists does it take to change a light bulb?</p><p>Fish!</p>",
                "categories" => ['lightbulb','art and design',],
            ],

            [
                'title' => "Actors in the Spot-Lightbulb",
                'description' => "<p>How many actors does it take to change a light bulb?</p><p>Only one-they don't like to share the spotlight.</p>",
                "categories" => ['lightbulb',],
            ],

            [
                'title' => "Aerobic Instructors",
                'description' => "<p>How many aerobics instructors does it take to change a lightbulb ?</p><p>Five. Four to do it in perfect synchrony and one to stand there going \"To the left, and to the left, and to the left, and to the left, and take it out, and put it down, and pick it up, and put it in, and to the right, and to the right, and to the right, and to the right...\"</p>",
                "categories" => ['lightbulb',],
            ],

            [
                'title' => "Mechanics",
                'description' => "<p>How many auto mechanics does it take to change a light bulb?</p><p>Six - One to force it with a hammer and five to go out for more bulbs.</p>",
                "categories" => ['lightbulb',],
            ],

            [
                'title' => "FBI",
                'description' => "<p>How many FBI agents does it take to change a lightbulb?</p><p>Shut up! We'll be asking the questions here.</p>",
                "categories" => ['lightbulb','police',],
            ],

            [
                'title' => "Philosophers",
                'description' => "<p>How many philosophers does it take to change a lightbulb?</p><p>3\. One to change it and the other two to argue whether the lightbulb really exists.</p>",
                "categories" => ['lightbulb',],
            ],

            [
                'title' => "Marketing the Lightbulb",
                'description' => "<p>How many telemarketers does it take to change a light bulb?</p><p>Only one, but he has to do it while you're eating dinner.</p>",
                "categories" => ['lightbulb',],
            ],

            [
                'title' => "Lawyer vs Dry Cleaner",
                'description' => "<p>What's the difference between a dry cleaner and a lawyer?</p><p>The cleaner pays if he loses your suit.</p><p>A lawyer can lose your suit and still take you to the cleaners.</p>",
                "categories" => ['lawyer',],
            ],

            [
                'title' => "Managers",
                'description' => "<p>How many managers does it take to change a light bulb?</p><p>We've formed a task force to study the problem of why light bulbs burn out and to figure out what, exactly, we as supervisors can do to make the bulbs work smarter, not harder.</p>",
                "categories" => ['lightbulb','managers',],
            ],

            [
                'title' => "Department of Shipping Lightbulbs",
                'description' => "<p>How many shipping department personnel does it take to change a light bulb?</p><p>We can change the bulb in seven to ten working days,<br>but if you call before 2 p.m. and pay an extra $15, we can get it changed overnight.</p>",
                "categories" => ['lightbulb',],
            ],

            [
                'title' => "Information Service Lightbulbs",
                'description' => "<p>How many management information services guys does it take to change a light bulb?</p><p>MIS has received your request concerning your hardware problem and has assigned you request number 39712.</p><p>Please use this number for any future reference to the light bulb issue.</p>",
                "categories" => ['lightbulb','geek',],
            ],

            [
                'title' => "Sick Bird",
                'description' => "<p>What is the definition of a sick bird?</p><p>Illegal</p>",
                "categories" => ['animal','bird','pun',],
            ],

            [
                'title' => "Kangaroo and a Sheep",
                'description' => "<p>What do you get when you cross a kangaroo and a sheep?</p><p>A sweater with pockets</p>",
                "categories" => ['animal',],
            ],


            [
                'title' => "Bird Doctor",
                'description' => "<p>What does a vet give a sick bird?</p><p>Tweetment</p>",
                "categories" => ['animal','bird','pun','doctor'],
            ],

        ];

        // Grab all the User IDs from the database to be used for random seeding
        $users = User::all()->pluck('id', 'id')->toArray();

        foreach ($seedJokes as $seedJoke) {

            $categoryList = $seedJoke['categories'] ?? ['Unknown'];
            unset($seedJoke['categories']);

            // only insert the joke if the title is not empty
            $title = $seedJoke['title'] ?? null;
            if (!is_null($title)) {

//                $joke = Joke::updateOrCreate([
//                    'title' => $seedJoke['title'],
//                    'content' => $seedJoke['content'],
//                    'user_d' => $users[array_rand($users)],
//                ]);
//
                foreach ($categoryList as $category) {
                    Category::firstOrCreate(['title' => $category]);
                }
//
//                if (!empty($categoryList)) {
//                    $categoryIds = Category::whereIn('title', $categoryList)
//                        ->get()
//                        ->pluck('id')
//                        ->toArray();
//                    $joke->categories()->sync($categoryIds);
//                }

            }
        }
    }
}
