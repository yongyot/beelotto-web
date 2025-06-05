<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SlotGameController extends Controller
{
    public function index()
    {
        $games = [
        
          /*      [
                    'id' => 1,
                    'game_id' => 'pg_game_1',
                    'game_name' => 'Game 01',
                    'rtp' => 96.0,
                    'volatility' => 'Low',
                    'win_rate' => 30.0,
                    'features' => 'Free Spins',
                    'image_url' => 'https://bmibalance.club/banner-slot-01.png',
                    'source' => 'pgslotplays.com',
                    "last_updated" => now()->toDateString()
                ],
                [
                    'id' => 2,
                    'game_id' => 'pg_game_2',
                    'game_name' => 'Game 02',
                    'rtp' => 96.2,
                    'volatility' => 'Medium',
                    'win_rate' => 32.5,
                    'features' => 'Multiplier',
                    'image_url' => 'https://bmibalance.club/banner-slot-02.png',
                    'source' => 'pgslotplays.com',
                    "last_updated" => now()->toDateString()
                ],
                [
                    'id' => 3,
                    'game_id' => 'pg_game_3',
                    'game_name' => 'Game 03',
                    'rtp' => 96.4,
                    'volatility' => 'High',
                    'win_rate' => 35.0,
                    'features' => 'Wild Symbols',
                    'image_url' => 'https://bmibalance.club/banner-slot-03.png',
                    'source' => 'pgslotplays.com',
                    "last_updated" => now()->toDateString()
                ],
                [
                    'id' => 4,
                    'game_id' => 'pg_game_4',
                    'game_name' => 'Game 04',
                    'rtp' => 96.6,
                    'volatility' => 'Low',
                    'win_rate' => 37.5,
                    'features' => 'Free Spins',
                    'image_url' => 'https://bmibalance.club/banner-slot-04.png',
                    'source' => 'pgslotplays.com',
                    "last_updated" => now()->toDateString()
                ],
                [
                    'id' => 5,
                    'game_id' => 'pg_game_5',
                    'game_name' => 'Game 05',
                    'rtp' => 96.8,
                    'volatility' => 'Medium',
                    'win_rate' => 40.0,
                    'features' => 'Multiplier',
                    'image_url' => 'https://bmibalance.club/banner-slot-05.png',
                    'source' => 'pgslotplays.com',
                    "last_updated" => now()->toDateString()
                ],
                [
                    'id' => 6,
                    'game_id' => 'pg_game_6',
                    'game_name' => 'Game 06',
                    'rtp' => 96.0,
                    'volatility' => 'High',
                    'win_rate' => 42.5,
                    'features' => 'Wild Symbols',
                    'image_url' => 'https://bmibalance.club/banner-slot-01.png',
                    'source' => 'pgslotplays.com',
                    "last_updated" => now()->toDateString()
                ],
                [
                    'id' => 7,
                    'game_id' => 'pg_game_7',
                    'game_name' => 'Game 07',
                    'rtp' => 96.2,
                    'volatility' => 'Low',
                    'win_rate' => 45.0,
                    'features' => 'Free Spins',
                    'image_url' => 'https://bmibalance.club/banner-slot-01.png',
                    'source' => 'pgslotplays.com',
                    "last_updated" => now()->toDateString()
                ]
            
            */
   /*       [
                'id' => 1,
                'game_id' => 'pg_game_1',
                'game_name' => 'Mahjong Ways 2',
                'rtp' => 96.0,
                'volatility' => 'Low',
                'win_rate' => 30.0,
                'features' => 'Free Spins',
                'image_url' => 'https://www.pgsoft.com/uploads/Games/Images/68715ede-f53e-4f94-8efe-2cbf07e70cfd.png',
                'source' => 'pgslotplays.com',
                "last_updated" => now()->toDateString()
            ],
            [
                'id' => 2,
                'game_id' => 'pg_game_2',
                'game_name' => 'Galactic Gems',
                'rtp' => 96.2,
                'volatility' => 'Medium',
                'win_rate' => 32.5,
                'features' => 'Multiplier',
                'image_url' => 'https://www.pgsoft.com/uploads/Games/Images/a6a0645e-2056-4bfe-9b13-4f26d9e56500.png',
                'source' => 'pgslotplays.com',
                      "last_updated" => now()->toDateString()
            ],
            [
                'id' => 3,
                'game_id' => 'pg_game_3',
                'game_name' => 'Restaurant Craze',
                'rtp' => 96.4,
                'volatility' => 'High',
                'win_rate' => 35.0,
                'features' => 'Wild Symbols',
                'image_url' => 'https://pgslotgames.net/wp-content/uploads/2021/02/Restaurant-Craze-LOGO.png.webp',
                'source' => 'pgslotplays.com',
                      "last_updated" => now()->toDateString()
            ],
            [
                'id' => 4,
                'game_id' => 'pg_game_4',
                'game_name' => 'Ninja vs Samurai',
                'rtp' => 96.6,
                'volatility' => 'Low',
                'win_rate' => 37.5,
                'features' => 'Free Spins',
                'image_url' => 'https://www.pgsoft.com/uploads/Games/Images/129a76ff-cd17-41ff-8deb-8c3d391c2bf2.png',
                'source' => 'pgslotplays.com',
                      "last_updated" => now()->toDateString()
            ],
            [
                'id' => 5,
                'game_id' => 'pg_game_5',
                'game_name' => 'Flirting Scholar',
                'rtp' => 96.8,
                'volatility' => 'Medium',
                'win_rate' => 40.0,
                'features' => 'Multiplier',
                'image_url' => 'https://www.pgsoft.com/uploads/Games/Images/4afc4039-1e93-47fc-b7c6-93129a57f4a2.png',
                'source' => 'pgslotplays.com',
                      "last_updated" => now()->toDateString()
            ],
            [
                'id' => 6,
                'game_id' => 'pg_game_6',
                'game_name' => 'Muay Thai Champion',
                'rtp' => 96.0,
                'volatility' => 'High',
                'win_rate' => 42.5,
                'features' => 'Wild Symbols',
                'image_url' => 'https://www.pgsoft.com/uploads/Games/Images/3534dd16-575c-4696-88c5-fba6304c8cbe.png',
                'source' => 'pgslotplays.com',
                      "last_updated" => now()->toDateString()
            ],
            [
                'id' => 7,
                'game_id' => 'pg_game_7',
                'game_name' => 'Leprechaun Riches',
                'rtp' => 96.2,
                'volatility' => 'Low',
                'win_rate' => 45.0,
                'features' => 'Free Spins',
                'image_url' => 'https://www.pgsoft.com/uploads/Games/Images/eb4ef96e-c572-4605-af79-7363db79d1b7.png',
                'source' => 'pgslotplays.com',
                      "last_updated" => now()->toDateString()
            ],
            [
                'id' => 8,
                'game_id' => 'pg_game_8',
                'game_name' => 'Genie s 3 Wishes',
                'rtp' => 96.4,
                'volatility' => 'Medium',
                'win_rate' => 47.5,
                'features' => 'Multiplier',
                'image_url' => 'https://www.pgsoft.com/uploads/Games/Images/6e24d56a-60d9-49d9-bd58-199ac0a30e1c.png',
                'source' => 'pgslotplays.com',
                      "last_updated" => now()->toDateString()
            ],
            [
                'id' => 9,
                'game_id' => 'pg_game_9',
                'game_name' => 'Cocktail Nights',
                'rtp' => 96.6,
                'volatility' => 'High',
                'win_rate' => 50.0,
                'features' => 'Wild Symbols',
                'image_url' => 'https://www.pgsoft.com/uploads/Games/Images/4afc4039-1e93-47fc-b7c6-93129a57f4a2.png',
                'source' => 'pgslotplays.com',
                      "last_updated" => now()->toDateString()
            ],
            [
                'id' => 10,
                'game_id' => 'pg_game_10',
                'game_name' => 'Destiny of Sun and Moon',
                'rtp' => 96.8,
                'volatility' => 'Low',
                'win_rate' => 52.5,
                'features' => 'Free Spins',
                'image_url' => 'https://www.pgsoft.com/uploads/Games/Images/45b6cabc-48db-499f-be93-dd06e4b818fd.png',
                'source' => 'pgslotplays.com',
                      "last_updated" => now()->toDateString()
            ],
            [
                'id' => 11,
                'game_id' => 'pg_game_11',
                'game_name' => 'Lucky Piggy',
                'rtp' => 96.0,
                'volatility' => 'Medium',
                'win_rate' => 30.0,
                'features' => 'Multiplier',
                'image_url' => 'https://www.pgsoft.com/uploads/Games/Images/cbc99249-8902-4c8d-9d52-16839d553a6f.png',
                'source' => 'pgslotplays.com',
                      "last_updated" => now()->toDateString()
            ],
            [
                'id' => 12,
                'game_id' => 'pg_game_12',
                'game_name' => 'Win Win Fish Prawn Crab',
                'rtp' => 96.2,
                'volatility' => 'High',
                'win_rate' => 32.5,
                'features' => 'Wild Symbols',
                'image_url' => 'https://www.pgsoft.com/uploads/Games/Images/f60111e4-7981-43c5-8154-2d866de25aa0.png',
                'source' => 'pgslotplays.com',
                      "last_updated" => now()->toDateString()
            ],
            [
                'id' => 13,
                'game_id' => 'pg_game_13',
                'game_name' => 'Butterfly Blossom',
                'rtp' => 96.4,
                'volatility' => 'Low',
                'win_rate' => 35.0,
                'features' => 'Free Spins',
                'image_url' => 'https://www.pgsoft.com/uploads/Games/Images/cc9e1cff-f7b7-4c42-885c-042909529531.png',
                'source' => 'pgslotplays.com',
                      "last_updated" => now()->toDateString()
            ],
            [
                'id' => 14,
                'game_id' => 'pg_game_14',
                'game_name' => 'Wild Bounty',
                'rtp' => 96.6,
                'volatility' => 'Medium',
                'win_rate' => 37.5,
                'features' => 'Multiplier',
                'image_url' => 'https://www.pgsoft.com/uploads/Games/Images/47558386-711e-4a2f-95cc-953a29f5b0e6.png',
                'source' => 'pgslotplays.com',
                      "last_updated" => now()->toDateString()
            ],
            [
                'id' => 15,
                'game_id' => 'pg_game_15',
                'game_name' => 'Mafia Mayhem',
                'rtp' => 96.8,
                'volatility' => 'High',
                'win_rate' => 40.0,
                'features' => 'Wild Symbols',
                'image_url' => 'https://www.pgsoft.com/uploads/Games/Images/99b8a358-9dcb-4ffe-b32f-750dee2da5df.png',
                'source' => 'pgslotplays.com',
                      "last_updated" => now()->toDateString()
            ],
            [
                'id' => 16,
                'game_id' => 'pg_game_16',
                'game_name' => 'Fortune Ox',
                'rtp' => 96.0,
                'volatility' => 'Low',
                'win_rate' => 42.5,
                'features' => 'Free Spins',
                'image_url' => 'https://www.pgsoft.com/uploads/Games/Images/dad28553-b44b-41d9-9e8f-1188f7ffd995.png',
                'source' => 'pgslotplays.com',
                      "last_updated" => now()->toDateString()
            ],
            [
                'id' => 17,
                'game_id' => 'pg_game_17',
                'game_name' => 'Lucky Neko',
                'rtp' => 96.2,
                'volatility' => 'Medium',
                'win_rate' => 45.0,
                'features' => 'Multiplier',
                'image_url' => 'https://www.pgsoft.com/uploads/Games/Images/1bb52586-61f5-41fc-a513-0164c34d0949.png',
                'source' => 'pgslotplays.com',
                      "last_updated" => now()->toDateString()
            ],
            [
                'id' => 18,
                'game_id' => 'pg_game_18',
                'game_name' => 'Buffalo Win',
                'rtp' => 96.4,
                'volatility' => 'High',
                'win_rate' => 47.5,
                'features' => 'Wild Symbols',
                'image_url' => 'https://www.pgsoft.com/uploads/Games/Images/4fac121e-72ee-461d-aa43-7a1b1e656e64.png',
                'source' => 'pgslotplays.com',
                      "last_updated" => now()->toDateString()
            ],
            [
                'id' => 19,
                'game_id' => 'pg_game_19',
                'game_name' => 'Spirited Wonders',
                'rtp' => 96.6,
                'volatility' => 'Low',
                'win_rate' => 50.0,
                'features' => 'Free Spins',
                'image_url' => 'https://www.pgsoft.com/uploads/Games/Images/199235bb-b8a9-4a54-a63f-0c7120724841.png',
                'source' => 'pgslotplays.com',
                      "last_updated" => now()->toDateString()
            ],
            [
                'id' => 20,
                'game_id' => 'pg_game_20',
                'game_name' => 'Dragon Tiger Luck',
                'rtp' => 96.8,
                'volatility' => 'Medium',
                'win_rate' => 52.5,
                'features' => 'Multiplier',
                'image_url' => 'https://www.pgsoft.com/uploads/Games/Images/de0f0574-0104-4277-aa4b-78ff297c3fd9.png',
                'source' => 'pgslotplays.com',
                      "last_updated" => now()->toDateString()
            ],
*/
            
        

            [
                'id' => 1,
                'game_id' => 'custom_game_1',
                'game_name' => 'Golden Mahjong',
                'rtp' => 96.0,
                'volatility' => 'Low',
                'win_rate' => 30.0,
                'features' => 'Free Spins',
                'image_url' => 'https://bmibalance.club/banner-slot-01-id1.png',
                'source' => 'customtracker.app',
                 "last_updated" => now()->toDateString()
            ],
            [
                'id' => 2,
                'game_id' => 'custom_game_2',
                'game_name' => 'Galaxy Riches',
                'rtp' => 96.2,
                'volatility' => 'Medium',
                'win_rate' => 32.5,
                'features' => 'Multiplier',
                'image_url' => 'https://bmibalance.club/banner-slot-01-id2.png',
                'source' => 'customtracker.app',
                 "last_updated" => now()->toDateString()
            ],
            [
                'id' => 3,
                'game_id' => 'custom_game_3',
                'game_name' => 'Chef Rush',
                'rtp' => 96.4,
                'volatility' => 'High',
                'win_rate' => 35.0,
                'features' => 'Wild Symbols',
                'image_url' => 'https://bmibalance.club/banner-slot-01-id3.png',
                'source' => 'customtracker.app',
                 "last_updated" => now()->toDateString()
            ],
            [
                'id' => 4,
                'game_id' => 'custom_game_4',
                'game_name' => 'Shinobi Showdown',
                'rtp' => 96.6,
                'volatility' => 'Low',
                'win_rate' => 37.5,
                'features' => 'Free Spins',
                'image_url' => 'https://bmibalance.club/banner-slot-01-id4.png',
                'source' => 'customtracker.app',
                 "last_updated" => now()->toDateString()
            ],
            [
                'id' => 5,
                'game_id' => 'custom_game_5',
                'game_name' => 'Scholar’s Luck',
                'rtp' => 96.8,
                'volatility' => 'Medium',
                'win_rate' => 40.0,
                'features' => 'Multiplier',
                'image_url' => 'https://bmibalance.club/banner-slot-01-id5.png',
                'source' => 'customtracker.app',
                 "last_updated" => now()->toDateString()
            ],
            [
                'id' => 6,
                'game_id' => 'custom_game_6',
                'game_name' => 'Muay Legends',
                'rtp' => 96.0,
                'volatility' => 'High',
                'win_rate' => 42.5,
                'features' => 'Wild Symbols',
                'image_url' => 'https://bmibalance.club/banner-slot-01-id6.png',
                'source' => 'customtracker.app',
                 "last_updated" => now()->toDateString()
            ],
            [
                'id' => 7,
                'game_id' => 'custom_game_7',
                'game_name' => 'Treasure Clover',
                'rtp' => 96.2,
                'volatility' => 'Low',
                'win_rate' => 45.0,
                'features' => 'Free Spins',
                'image_url' => 'https://bmibalance.club/banner-slot-01-id7.png',
                'source' => 'customtracker.app',
                 "last_updated" => now()->toDateString()
            ],
            [
                'id' => 8,
                'game_id' => 'custom_game_8',
                'game_name' => 'Genie Wishes',
                'rtp' => 96.4,
                'volatility' => 'Medium',
                'win_rate' => 47.5,
                'features' => 'Multiplier',
                'image_url' => 'https://bmibalance.club/banner-slot-01-id8.png',
                'source' => 'customtracker.app',
                "last_updated" => now()->toDateString()
            ],
            [
                'id' => 9,
                'game_id' => 'custom_game_9',
                'game_name' => 'Night Bar Win',
                'rtp' => 96.6,
                'volatility' => 'High',
                'win_rate' => 50.0,
                'features' => 'Wild Symbols',
                'image_url' => 'https://bmibalance.club/banner-slot-01-id9.png',
                'source' => 'customtracker.app',
                 "last_updated" => now()->toDateString()
            ],
            [
                'id' => 10,
                'game_id' => 'custom_game_10',
                'game_name' => 'Solar Destiny',
                'rtp' => 96.8,
                'volatility' => 'Low',
                'win_rate' => 52.5,
                'features' => 'Free Spins',
                'image_url' => 'https://bmibalance.club/banner-slot-01-id10.png',
                'source' => 'customtracker.app',
                 "last_updated" => now()->toDateString()
            ]
        
        ];

        return response()->json([
            'result' => true,
            'message' => 'ดึงข้อมูลสำเร็จ',
            'data' => $games
        ]);
    }
}
