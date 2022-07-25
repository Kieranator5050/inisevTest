<?php

namespace App\Http\Controllers;

use App\Events\PostCreated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use App\Models\Post;

class PostController extends Controller
{
    //
    public function store(Request $request)
    {
        //Assuming a website id is provided or obtained when a request is sent
        $validator = Validator::make($request->all(),[
            'website_id'=>['required',Rule::exists('websites','id')],
            'title'=>['required'],
            'description'=>['required']
        ]);

        if($validator->fails())
        {
            return response()->json($validator->errors());
        }

        Post::create([
            'website_id'=>$request['website_id'],
            'title'=>$request['title'],
            'description'=>$request['description']
        ]);

        event(new PostCreated());

        return ['success'=>'Post Created'];
    }
}
