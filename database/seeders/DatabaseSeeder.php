<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Post;
use App\Models\Subscriber;
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
        //Seed website
        $websites=collect();
        for($i=0;$i<random_int(10,20);$i++)
        {
            $websites->push(Website::factory()->create());
        }

        //Create random post and subscriber data for each website
        foreach ($websites as $website){
            for($i=0;$i<random_int(0,5);$i++)
            {
                Post::factory()->create([
                    'website_id'=>$website,
                    'emailIsSent'=>1
                ]);
                if((bool)random_int(0,1))
                {
                    Subscriber::factory()->create([
                        'website_id'=>$website
                    ]);
                }
            }
        }
    }
}
