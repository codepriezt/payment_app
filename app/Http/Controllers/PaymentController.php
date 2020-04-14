<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Classes\Charge;

use App\User;


class PaymentController extends Controller
{
    
    public function payment()
    {

        $users = User::all()->toArray();
              $collection = collect($users);

                $iterate = $collection->map(function($item , $key){
                    
                    $user = [$item['id'] , $item['username'] , $item['amount']];

            
                    $charge = new Charge();

                   $pay = $charge->collect($user);

                    return $pay;

                });

                return $iterate;


    
    }
}
