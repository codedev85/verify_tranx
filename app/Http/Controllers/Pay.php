<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use KingFlamez\Rave\Facades\Rave as Flutterwave;
use Paystack;

class Pay extends Controller
{
    //
  public function verify(Request $request)
  {
      request()->validate([
          'reference' => 'required'
      ]);

//      $ref =  "2666912";
      $ref = $request->reference;
      $data = Flutterwave::verifyTransaction($ref);

      if($data['status'] == "success")
      {
          $amount = $data['data']['amount'];

          $verify = new \App\Models\Verify();
          $verify->amount = $amount;
          $verify->user_id = auth()->user()->id;
          $verify->verify_count = 1;
          $verify->save();

          $amount = \App\Models\Verify::where('user_id', auth()->user()->id)->pluck('amount')->sum();
          $count = \App\Models\Verify::where('user_id', auth()->user()->id)->pluck('verify_count')->count();
          return view('home' , compact('amount','count'));
      }

      return back();



  }
}
