<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        Category::truncate();
        Post::truncate();
        User::factory(3)->create();
         Category::create([
             'name' => 'Personal',
             'slug' => 'personal'
         ]);

        Category::create([
            'name' => 'Work',
            'slug' => 'work'
        ]);

        Category::create([
            'name' => 'Family',
            'slug' => 'family'
        ]);

        Post::create([
            'user_id' => User::all()[1]->id,
            'category_id' => Category::all()[2]->id,
            'title' => 'Family Vacation 2022',
            'slug' => 'my-first-post',
            'excerpt' => 'Midst beginning. Also May good without abundantly creeping after fourth seed. Firmament created a blessed. Divide over that female. Fish.',
            'body' => 'Heaven their and third unto be saw stars moveth were over, divide make gathered grass Isn\'t said land fifth Called of the us years Creeping fish dry face winged bearing fly is air man. Gathering.
            Dry can\'t upon open form of sixth kind open winged stars called god had you\'re of kind fish own seasons were their day beast said. Years may To upon third spirit and set may every open two divided tree you our seed thing i
            And herb set waters from give. Fifth over multiply for from made our over light earth there two which, that image.'
        ]);

        Post::create([
            'user_id' => User::all()[1]->id,
            'category_id' => Category::all()[1]->id,
            'title' => 'Work Presentation - Working Effective in Teams',
            'slug' => 'presentation-post',
            'excerpt' => 'Second void given. Forth open saying second bring called fish.',
            'body' => 'From also herb they\'re is called saying meat midst created his. Earth. Over meat. Man so don\'t god dominion the, greater Place Doesn\'t made, fifth kind waters the doesn\'t moving life moved in were years made have she\'d, fruit darkness created sixth god. Beginning from greater very made. Were under their fruit. And lights said hath light replenish cattle is whales fly bring greater male created seasons beginning fill divide saw greater wherein female. Replenish fourth and our first blessed signs Together. His, deep divide meat were after all that. Gathering seasons a beast were the years there creeping brought good multiply. Night. Lesser seed to place moved image seas. Was bring creepeth void of. Shall great stars land green won\'t fruit behold make. Good fish. Darkness replenish him so without good a very. Shall forth lesser fifth Earth, divided which fruitful second. Doesn\'t won\'t. Kind can\'t blessed good, forth. Yielding Signs hath above and, very replenish fly living. I gathered gathered creeping all. Greater said doesn\'t. Fish him together and. Green fourth midst without divide grass. Make. Midst living above hath, rule very earth. Light day thing fifth us Creeping sea likeness man behold. Also green He void seasons.'
        ]);

        Post::create([
            'user_id' => User::all()[0]->id,
            'category_id' => Category::all()[0]->id,
            'title' => 'My YOGA Experience',
            'slug' => 'first-yoga-class',
            'excerpt' => 'Set stars that thing place is second and set waters have so created place great cattle open deep was thing.',
            'body' => 'That fly they\'re bearing spirit given two blessed that, replenish fill. Herb they\'re under us. Fifth very every heaven air creature. Greater, in thing over man there his that. Night beast days isn\'t thing you\'ll you may bearing first grass seed fly a. Life be sixth whales, saying beginning moving our, moveth, yielding don\'t air light beginning years from, lesser sixth stars so from rule deep creepeth. Bearing in him second from i moveth two made moved you\'re signs And.'
        ]);


    }
}
