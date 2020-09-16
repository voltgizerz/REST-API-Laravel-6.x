<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Quote;
use App\Http\Resources\QuoteResource;
use Illuminate\Http\Request;

class QuoteController extends Controller
{
    public function index()
    {
        $quotes = Quote::latest()->paginate(10);

        return QuoteResource::collection($quotes);
    }

    public function show(Quote $quote){

        return new QuoteResource($quote);
    }

    public function update(Request $request,Quote $quote){

        $quote->update([
            'message'=>$request->message
        ]);
        return new QuoteResource($quote);
    }


    public function store(Request $request){

        $this->validate($request,[
            'message'=>'required',
        ]);

        $quote=Quote::create([
            'user_id'=>auth()->id(),
            'message'=>$request->message,
        ]);

        return new QuoteResource($quote);

    }
}
