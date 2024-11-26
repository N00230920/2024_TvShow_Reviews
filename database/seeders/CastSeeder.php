<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Cast;

class CastSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Cast::insert([
            ['name'=> 'Jeremy Shada', 
            'image' => 'Shada.png',
            'character' => 'Finn the Human'
            ],

            ['name'=> 'Michael B. Jordan', 
            'image' => 'Jordan.png',
            'character' => 'Terence'
            ],

            ['name'=> 'Zach Callison', 
            'image' => 'Callison.png',
            'character' => 'Steven Universe'
            ],

            ['name'=> 'Justin Roiland', 
            'image' => 'Roiland.png',
            'character' => 'Korvo'
            ],

            ['name'=> 'Taliesin Jaffe', 
            'image' => 'Jaffe.png',
            'character' => 'Percy de Rolo'
            ],

            ['name'=> 'Mike Haimoto', 
            'image' => 'Haimoto.png',
            'character' => 'Thorfinn'
            ],
        ]);
    }
}
