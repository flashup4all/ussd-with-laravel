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
            $response="CON Internet Mobile: \n";
            $response .= "1. Acheter un forfait \n";
            $response .= "2. Consultation volume \n";
            $response .= "3. Plus d'informations \n";
            $response .= "4. Acheter pour un tiers \n";
            $response .= "5. Facebook Flex \n";
            $response .= "0. RETOUR \n";
        }
        if(isset($level[0]) && $level[0] == 3 && isset($level[1]) && $level[1] == 1 && !isset($level[2]))
        {
            $response="CON Acheter un forfait internet \n";
            $response .="1. Heure\n";
            $response .="2. Offres Journalueres \n";
            $response .="3. Offres Hebdomadaires \n";
            $response .="4. Offres Mensuelles \n";
            $response .="5. Offres Speciales \n";
            $response .= "0. RETOUR";
        }
        if(isset($level[0]) && $level[0] == 3 && isset($level[1]) && $level[1] == 1 && isset($level[2]) && $level[2] == 5 && !isset($level[3]))
        {
            $response="CON Offres Speciales\n";
            $response .="1. Nuit Soft 95F: 300Mo valable de 23h a 05h\n";
            $response .="2. Weekend 550F: 1024Mo \n";
            $response .="3. Reseaux Sociaux \n";
            $response .="4. Video \n";
            $response .= "0. RETOUR";
        }

        if(isset($level[0]) && $level[0] == 3 && isset($level[1]) && $level[1] == 1 && isset($level[2]) && $level[2] == 5 && isset($level[3]) && $level[3] == 3 && !isset($level[4]))
        {
            $response="CON Reseaux Sociaux valable pour Facebook, Whatapp, Twitter, Viver\n";
            $response .="1. Start 100F: 180Mo valable 24heures\n";
            $response .="2. Jour 100F: 360Mo valable 24heures\n";
            $response .= "0. RETOUR";
        }

        if(isset($level[0]) && $level[0] == 3 && isset($level[1]) && $level[1] == 1 && isset($level[2]) && $level[2] == 5 && isset($level[3]) && $level[3] == 3 && isset($level[4]) && $level[4] == 1 && !isset($level[5]))
        {
            $response="CON Vour serez debite de 100FCFA pour benefide 180Mo valable pour tout Facebook, Twitter, Whatapp et Viber jour.\n";
            $response .="1. Confirmer\n";
            $response .="2. Annuler\n";
            $response .= "0. RETOUR";
        }

        if(isset($level[0]) && $level[0] == 3 && isset($level[1]) && $level[1] == 1 && isset($level[2]) && $level[2] == 5 && isset($level[3]) && $level[3] == 3 && isset($level[4]) && $level[4] == 1 && isset($level[5]) && $level[5] == 1 && !isset($level[6]))
        {
            
            $response="END Transaction Successfull \n";
            $response .="thanks for patronage \n";
           
        }
            header('Content-type: text/plain');
            echo $response;
        //}
    }
}