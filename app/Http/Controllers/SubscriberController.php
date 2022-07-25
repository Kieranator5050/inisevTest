<?php

namespace App\Http\Controllers;

use App\Models\Subscriber;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class SubscriberController extends Controller
{
    public function store(Request $request)
    {
        //Assuming a website id is provided or obtained when a request is sent
        /*
         * Email validation check for if the email is already subscribed to the website
         */
        $validator = Validator::make($request->all(),[
            'website_id'=>[
                'required',
                Rule::exists('websites','id')
            ],
            'name'=>['required'],
            'email'=>[
                'required',
                'email',
                Rule::unique('subscribers')
                    ->where('website_id',$request['website_id'])
                    ->where('email',$request['email'])
            ]
        ]);

        if($validator->fails())
        {
            return response()->json($validator->errors());
        }

        Subscriber::create([
            'website_id'=>$request['website_id'],
            'name'=>$request['name'],
            'email'=>$request['email']
        ]);

        return ['success'=>'User Subscribed'];
    }
}
