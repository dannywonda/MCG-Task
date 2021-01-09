<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Course;
use App\Models\Tag;
use App\Models\User;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $courses = [
            'python' => [ 
                'link'     => 'sO1ctUNQ1k8',
                'image'    => 'https://img-a.udemycdn.com/course/240x135/629302_8a2d_2.jpg'
            ],
            'java' => [ 
                'link'     => 'RRubcjpTkks',
                'image'    => 'https://img-a.udemycdn.com/course/240x135/533682_c10c_4.jpg'
            ],
            'javascript' => [ 
                'link'      => 'W6NZfCO5SIk',
                'image'     => 'https://img-a.udemycdn.com/course/240x135/851712_fc61_6.jpg'
            ],
            'php' => [ 
                'link'      => 'XBj_le81sAc',
                'image'     => 'https://i.ytimg.com/an_webp/XBj_le81sAc/mqdefault_6s.webp?du=3000&sqp=CMTj4_8F&rs=AOn4CLBYuIbjOMY77_8jFXa9Y902I8G-dg'
            ],
            'javascript' => [ 
                'link'      => 'W6NZfCO5SIk',
                'image'     => 'https://i.ytimg.com/an_webp/W6NZfCO5SIk/mqdefault_6s.webp?du=3000&sqp=CPqw4_8F&rs=AOn4CLCLVHnKDQwIlbuFc74JXl_TAW2n4g'
            ],
            'sport' => [ 
                'link'      => 'UBMk30rjy0o',
                'image'     => 'https://i.ytimg.com/an_webp/UBMk30rjy0o/mqdefault_6s.webp?du=3000&sqp=CK6w4_8F&rs=AOn4CLDKNKWh4L3eDYZpwEa2gY9DkbZTjQ'
            ],
            'mechanic' => [ 
                'link'      => 'irr0gtAa0Os',
                'image'     => 'https://i.ytimg.com/an_webp/irr0gtAa0Os/mqdefault_6s.webp?du=3000&sqp=CLe74_8F&rs=AOn4CLCxaazCB_faWvNcI4OLtxPZhBrcqA'
            ],
            'react' => [ 
                'link'      => 'MRIMT0xPXFI',
                'image'     => 'https://i.ytimg.com/an_webp/MRIMT0xPXFI/mqdefault_6s.webp?du=3000&sqp=CJyF5P8F&rs=AOn4CLCqOnjVVfO3MUeDFhlQDdoRNFywXw'
            ],
        ];

        \App\Models\User::factory(10)->create();
        
        // Add new tags
        $tags = [
            'school', 'learning', 'fun', 'games'
        ];

        foreach ($tags as $tag) {
            Tag::create([
                'name'   => $tag,
                'slug'   => $tag,
                'categories' => 'tag'
            ]);
        }

        foreach ($courses as $key => $course) {
            $co = Course::create([
                'name'          => ucwords($key) . ' Tutorial',
                'slug'          => $key . '_tutorial',
                'author'        => User::inRandomOrder()->first()->name,
                'rating'        => rand(1,5),
                'price'         => rand(1,40). '.00',
                'votes'         => rand(100, 300),
                'link'          => $course['link'],
                'image'         => $course['image'],
                'description'   => 'This is a ' . $key . ' Course. You will learn about about ' . $key . ' which will help you in the future.',
                'categories'    => 'course'
            ]);

            $co->tags()->attach(Tag::inRandomOrder()->get());
        }

        // Example to test the keywords search
        $co1 = Course::create([
            'name'          => 'Maths Tutorial',
            'slug'          => 'maths_tutorial',
            'author'        => User::inRandomOrder()->first()->name,
            'rating'        => rand(1,5),
            'price'         => rand(1,40). '.00',
            'votes'         => rand(100, 300),
            'link'          => 'dAgfnK528RA',
            'image'         => 'https://i.ytimg.com/an_webp/dAgfnK528RA/mqdefault_6s.webp?du=3000&sqp=CMCD5P8F&rs=AOn4CLAwPZYlJRs0Hud5v1UKuX-1EO9kTg',
            'description'   => 'This is a Maths Course. You will learn about about Maths which will help you in the future and also learn about react.',
            'categories'    => 'course'
        ]);
        
        $co1->tags()->attach(Tag::inRandomOrder()->get());

    }
}
