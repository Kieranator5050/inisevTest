<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Post;
use App\Models\Website;
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
        $websites=collect();
        for($i=0;$i<random_int(50,100);$i++)
        {
            $websites->push(Website::factory()->create());
        }

        foreach ($websites as $website){
            for($i=0;$i<random_int(5,20);$i++)
            {
                Post::factory()->create([
                    'website_id'=>$website
                ]);
            }
        }
    }
}
