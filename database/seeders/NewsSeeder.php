<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\News;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i < 12; $i++) { 
            $count = $i+1;
            $new = News::create([
                'name' => 'News ' . $count,
                'description' => 'News '.$count.' description',
                'image' => '1.jpg',
                'author' => 'User 1',
            ]);
        }
    }
}
