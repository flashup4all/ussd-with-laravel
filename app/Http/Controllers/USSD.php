<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
class USSD extends Controller
{
    public static function ussd(Request $request)
    {
        //$request->all();
        $text=$request->input('text');
        $session_id = $request->input('sessionId');
        $phone_number = $request->input('phoneNumber');
        $service_code = $request->input('serviceCode');
        $network_code = $request->input('networkCode');
        $level = explode("*", $text);
        //if (isset($text)) {
   
        if ( $text == "" ) {
            $response="CON MOOV\n";
            $response .= "1. IZY Heures Plus\n";
            $response .= "2. Moov Folie \n";
            $response .= "3. Internet Mobile \n";
            $response .= "4. IZY SMS \n";
            $response .= "5. International \n";
            $response .= "6. Roaming \n";
            $response .= "7. IZY Flex \n";
            $response .= "8. Offres Perso \n";
            $response .= "0. Exit";
        }
        if(isset($level[0]) && $level[0] == 3 && !isset($level[1]))
        {
            $response="END INTERNET MOBILE \n";
            $response .= "1. Acheter un forfait \n";
            $response .= "2. Consultation volume \n";
            $response .= "3. Plus d'informations \n";
            $response .= "4. Acheter pour un tiers \n";
            $response .= "5. Facebook Flex \n";
            $response .= "0. RETOUR \n";
        }
        // if(isset($level[0]) && $level[0] == 2 && !isset($level[1]))
        // {
        //     $response="CON Select Bank \n";
        //     $response .="1. GTB\n";
        //     $response .="2. First Bank \n";
        //     $response .="3. Access Bank \n";
        //     $response .="4. FCMB \n";
        //     $response .= "0. back";
        // }
        if(isset($level[0]) && $level[0] == 3 && isset($level[1]) && $level[1] == 1 && isset($level[1]) && !isset($level[3]))
        {
            $response="CON enter Acct. No.\n";
           
        }
        if(isset($level[0]) && $level[0] == 2  && isset($level[1])  && isset($level[2]))
        {
            
            $response="END Transaction Successfull \n";
            $response .="thanks for patronage \n";
           
        }
            header('Content-type: text/plain');
            echo $response;
        //}
    }
}