<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/*
 * Post
 * -id
 * -website_id (1 website)
 * -title
 * -description
 */
class Post extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function website()
    {
        return $this->belongsTo(Website::class);
    }
}
