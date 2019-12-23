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
        if(isset($level[0]) && $level[0] == 2  && !isset($level[1]))
        {
            $response="CON Health & Beauty \n";
            $response .="1. Beard Oil \n";
            $response .="2. Facial Wipe \n";
            $response .="3. Perfumes \n";
            $response .="4. Makeup \n";
            $response .= "0. back";
        }
        if(isset($level[0]) && $level[0] == 1  && !isset($level[1]))
        {
            $response="CON Mobile phones & accessoriese \n";
            $response .="1. HeadPhones \n";
            $response .="2. Car charger \n";
            $response .="3. Iphonex Pro \n";
            $response .="4. Blackberry \n";
            $response .= "0. back";
        }
        if(isset($level[0]) && $level[0] == 2  && isset($level[1]))
        {
            $response="END thanks \n";
            $response .="Request Confirmed \n";
           
        }
        if(isset($level[0]) && $level[0] == 1  && isset($level[1]))
        {
            
            $response="END thanks \n";
            $response .="Request Confirmed \n";
           
        }
            header('Content-type: text/plain');
            echo $response;
        //}
    }
}
