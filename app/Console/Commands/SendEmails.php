<?php

namespace App\Console\Commands;

use App\Mail\newPost;
use App\Models\Post;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class SendEmails extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'email:send';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send emails to subscribers';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        //Assuming that if a subscriber joins after a post is created the post is considered old
        $newPosts = Post::query()->where('emailIsSent','=',0)->get() ?? false;
        if(!$newPosts->isEmpty())
        {
            foreach ($newPosts as $post)
            {
                $subscribers = $post->website->subscribers;
                if(!$subscribers->isEmpty())
                {
                    foreach ($subscribers as $subscriber)
                    {
                        Mail::to($subscriber->email)->send(new newPost($post));
                    }
                }
                $post->emailIsSent = true;
            }
        }

        return 0;
    }
}
