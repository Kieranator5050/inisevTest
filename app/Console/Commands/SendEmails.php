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
        //Mail::to(['kieranjag@hotmail.com'])->send(new newPost(Post::first()));
        return 0;
    }
}
