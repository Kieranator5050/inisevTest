<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\Post;

class PostController extends Controller
{
    //
    public function store()
    {
        //Assuming a website id is provided or obtained when a request is sent
        $attributes = request()->validate([
            'website_id'=>[Rule::exists('websites','id')],
            'title'=>['required'],
            'description'=>['required']
        ]);

        Post::create($attributes);

        return ['success'=>'Post Created'];
    }
}
