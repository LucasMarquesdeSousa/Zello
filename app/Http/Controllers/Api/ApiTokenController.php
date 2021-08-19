<?php

use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

Class ApiTokenController extends Controller{

     /**
     * Update the authenticated user's API token.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function update(Request $request){
        $tokrn = Str::random(60);
        $request->user()->forceFill([
            'api_token'=>hash('sha256', $tokrn),
        ])->save();

        return ['token'=>$tokrn];
    }
}