<?php

namespace App\Mail;

use App\Models\Post;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class newPost extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    protected $post;

    /**
     * Create a new message instance.
     * @param Post $post
     * @return void
     */
    public function __construct(Post $post)
    {
        $this->post = $post;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('newPost')
                    ->with([
                        'title'=>$this->post->title,
                        'description'=>$this->post->description
                    ]);
    }
}
