<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/* Subscriber
 * -id
 * -website_id (1 website)
 * -name
 * -email
 */
class Subscriber extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function website()
    {
        return $this->belongsTo(Website::class);
    }
}
