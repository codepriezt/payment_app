<?php

namespace App\Classes;

use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use DB;

use App\Payment;


class Charge
{

	
   public function collect($user){
          
           

           $result = array();
           $postdata_array = array('username' => $user[1], 'amount' => $user[2]);

            $post = array_map(function($data){
                      return $data;
            },$postdata_array);

                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, "https://api.paystack.co/transaction/charge_authorization");
                curl_setopt($ch, CURLOPT_POST, 1);
                curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($postdata));  //Post Fields
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    
              
    
                  $headers = [
                    'Authorization: Bearer pk_test_414633c96cf8206f221c2efa81c4dfa9d08',
                    'Content-Type: application/json',
                ];
    
    
                curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    
                $request = curl_exec($ch);
    
                curl_close($ch);
          
  
           $result = json_decode($request, true);

           return $result;
           if (array_key_exists('data', $result) && array_key_exists('status', $result['data'])) {

            if ($result['data']['status'] == 'success') {

                // save the processed data here 
         }
 
  
       }

   }
}
