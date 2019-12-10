<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class USSD extends Controller
{
     public static function ussd(Request $request)
    {
        //$request->all();
        $text=$request->input('text');
        $sessionId = $request->input('sessionId');
        $phonenumber = $request->input('phoneNumber');
        $sessionId = $request->input('sessionId');
        $serviceCode = $request->input('serviceCode');
        $networkCode = $request->input('networkCode');
        $level = explode("*", $text);
        //if (isset($text)) {
   
        if ( $text == "" ) {
            $response="CON Welcome Ink\n";
            $response .= "1. Mobile phones & accessoriese\n";
            $response .= "2. Heath & Beauty \n";
            $response .= "3. Home & Kitchen \n";
            $response .= "4. Fashion \n";
            $response .= "5. Computer accessories \n";
            $response .= "0. Exit";
        }
        if(isset($level[0]) /*&& $level[0] == 2*/  && !isset($level[1]))
        {
            $response="CON Health & Beauty \n";
            $response .="1. Beard Oil \n";
            $response .="2. Facial Wipe \n";
            $response .="3. Perfumes \n";
            $response .="4. Makeup \n";
            $response .= "0. back";
        }
        if(isset($level[0])/* && $level[0] == 2*/  && isset($level[1]))
        {
            $response="END thanks \n";
            $response .="Request Confirmed \n";
           
        }
        /*if(isset($level[0]) && $level[0] == 1  && isset($level[1]) && $level[1] == 0)
        {
            $response="CON Welcome to the registration portal.\nPlease enter you full name\n";
            $response .= "1. account balance\n";
            $response .= "2. Transfer \n";
            $response .= "3. Airtime topup \n";
            $response .= "0. Exit";
        }
        if(isset($level[0]) && $level[0] == 2  && !isset($level[1]))
        {
            $response="CON Select bank account \n";
            $response .= "1. GT Bank \n";
            $response .= "2. Zenith Bank \n";
            $response .= "0. back";
        }
        if(isset($level[0]) && $level[0] == 2  && !isset($level[1]))
        {
            $response="CON Select bank account \n";
            $response .= "1. GT Bank \n";
            $response .= "2. Zenith Bank \n";
            $response .= "0. back";
        }
        if(isset($level[0]) && $level[0] == 2  && isset($level[1]) && $level[1] == 0)
        {
            $response="CON Welcome to the registration portal.\nPlease enter you full name\n";
            $response .= "1. account balance\n";
            $response .= "2. Transfer \n";
            $response .= "3. Airtime topup \n";
            $response .= "0. Exit";
        }
        if(isset($level[0]) && $level[0] == 2  && isset($level[1]) && $level[1] == 1)
        {
            $response="CON enter account number \n";
            
            $response .= "0. back";
        }
        if(isset($level[0]) && $level[0] == 2  && isset($level[1]) && $level[1] == 1 && isset($level[2]) && $level[2] == 0)
        {
            $response="CON Select bank account \n";
            $response .= "1. GT Bank \n";
            $response .= "2. Zenith Bank \n";
            $response .= "0. back";
        }
        
        else if(isset($level[2]) && $level[2]!="" && !isset($level[3])){
            //Save data to database
            $data=array(
                'phonenumber'=>$phonenumber,
                'fullname' =>$level[0],
                'electoral_ward' => $level[1],
                'national_id'=>$level[2]
                );
            
            $response="END Thank you ".$level[0]." for registering.\nWe will keep you updated"; 
        }*/
            header('Content-type: text/plain');
            echo $response;
        //}
    }
}
