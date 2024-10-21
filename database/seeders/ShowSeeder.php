<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Show;
use Carbon\Carbon;

class ShowSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $currentTimestamp = Carbon::now();
        Show::insert([
        ['title' => 'Adventure Time',
        'image' => 'images/Adventure_Time.png',
        'genre' => 'Action',
        'overview' => 'Twelve- year-old Finn battles evil in the Land of Ooo. Assisted by his magical dog, Jake, Finn roams the Land of Ooo righting wrongs and battling evil.',
        'where_to_watch' => 'Netflix',
        'number_of_episodes' => 150,
        'air_date' => 2010,
        'end_date' => 2018,
        'created_at' => $currentTimestamp,
        'updated_at' => $currentTimestamp
        ],

        ['title' => 'Solar Opposites',
        'image' => 'images/solar.png',
        'genre' => 'Adult Animation',
        'overview' => 'A family of aliens move to middle America, where they debate whether life is better there or on their home planet.',
        'where_to_watch' => 'Disney+',
        'number_of_episodes' => 40,
        'air_date' => 2020,
        'end_date' => '0ngoing',
        'created_at' => $currentTimestamp,
        'updated_at' => $currentTimestamp
        ],

        ['title' => 'Love,Death & Robots',
        'image' => 'images/LDR.png',
        'genre' => 'Adult Animation, Action',
        'overview' => 'A collection of animated short stories that span various genres including science fiction, fantasy, horror and comedy.',
        'where_to_watch' => 'Netflix',
        'number_of_episodes' => 50,
        'air_date' => 2019,
        'end_date' => 'ongoing',
        'created_at' => $currentTimestamp,
        'updated_at' => $currentTimestamp
        ],

        ['title' => 'The Legend of Vox Machina',
        'image' => 'images/VM.png',
        'genre' => 'Action, Adventure, Adult Animation',
        'overview' => 'After saving the realm from evil and destruction at the hands of the most terrifying power couple in Exandria, Vox Machina is faced with saving the world once again-this time, from a sinister group of dragons known as the Chroma Conclave.',
        'where_to_watch' => 'Prime Video',
        'number_of_episodes' => 33,
        'air_date' => 2022,
        'end_date' => 'ongoing',
        'created_at' => $currentTimestamp,
        'updated_at' => $currentTimestamp
        ],

        ['title' => 'Vinland Saga',
        'image' => 'images/Vinland.png',
        'genre' => 'Anime, Action',
        'overview' => 'Following a tragedy, Thorfinn embarks on a journey with the man responsible for it to take his life in a duel as a true and honorable warrior to pay homage.',
        'where_to_watch' => 'Prime Video',
        'number_of_episodes' => 48,
        'air_date' => 2019,
        'end_date' => 2023,
        'created_at' => $currentTimestamp,
        'updated_at' => $currentTimestamp
        ]

        ]);
    }
}
