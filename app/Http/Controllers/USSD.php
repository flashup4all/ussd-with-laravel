<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class USSD extends Controller
{
    public static function ussd(Request $request)
    {
    	 $request->all();
    	$text=$request->input('text');
        $phonenumber=$request->input('MSISDN');
        $serviceCode=$request->input('serviceCode');
        $level = explode("*", $text);
        //if (isset($text)) {
    
        $user = false;
        if(!$user)
        {
            if ( $text == "" ) {
                $response="CON please select default language.\n";
                $response .= "1. English\n";
                $response .= "2. Hausa \n";
                $response .= "3. Igbo \n";
                $response .= "4. Yoruba \n";
                $response .= "0. Cancel";
            }
            if(isset($level[0]) && $level[0] !='')
            {
                $response="CON Enter Fullname,age,gender. eg(John Doe, 19, M/F) \n";
                //$response .= "0. back";
            }
            if(isset($level[0]) && $level[0] !='' && isset($level[1]))
            {
                $response="CON enter State of residence \n";
                //$response .= "0. back";
            }
            if(isset($level[0]) && $level[0] !='' && isset($level[1]) && $level[1] != '' && isset($level[2]) && $level[2] != '')
            {
                $response="CON Enter Enter LGA \n";
                //$response .= "0. back";
            }
            if(isset($level[0]) && $level[0] !=''  && isset($level[1]) && $level[1] != '' && isset($level[2]) && $level[2] != '' && isset($level[3]) && $level[3] != '')
            {
                $response="CON Enter address \n";
                //$response .= "0. back";
            }
            if(isset($level[0]) && $level[0] !=''  && isset($level[1]) && $level[1] != '' && isset($level[2]) && $level[2] != '' && isset($level[3]) && $level[3] != '' && isset($level[4]) && $level[4] != '')
            {
                $response="END Thank you for Registering! \n";
                //$response .= "0. back";
            }

        }
        if($user)
        {
            if ( $text == "" ) {
                $response="CON Welcome to DatPay.\n";
                $response .= "1. Check Balance\n";
                $response .= "2. Make Payment \n";
                $response .= "3. Transfer Funds  \n";
                $response .= "4. Fund Wallet \n";
                $response .= "5. Pay Bills \n";
                $response .= "5. Airtime Recharge \n";
                $response .= "5. Airtime Topup \n";
                $response .= "5. Cardless Withdrawal \n";
                $response .= "0. Exit";
            }

            switch ($level[0]) {
                case 1:
                        $response="END Your account balance is $1000.00 \n";
                    break;
                case 2:
                        $response="CON Enter Account Number \n";
                        if(isset($level[1]) && $level[1] !='')
                        {
                            $response="CON Select Bank \n";
                            $response .= "1. GT Bank \n";
                            $response .= "2. Zenith Bank \n";
                            $response .= "2. Access Bank \n";
                        }
                        if(isset($level[1]) && $level[1] !='' && isset($level[2]) && $level[2] !='')
                        {
                            $response="CON Enter your 4 digit Pin \n";
                        }
                        if(isset($level[1]) && $level[1] !='' && isset($level[2]) && $level[2] !='' && isset($level[3]) && $level[3] !='')
                        {
                            $response="END Transfer Successful to John Doe \n";
                        }
                    break;
                default:
                    # code...
                    break;
            }
            
            
            /*if(isset($level[0]) && $level[0] == 2  && !isset($level[1]))
            {
                $response="CON Enter Mobile Number \n";
               
            }
            if(isset($level[0]) && $level[0] == 2  && !isset($level[1]))
            {
                $response="CON Select bank account \n";
                $response .= "1. GT Bank \n";
                $response .= "2. Zenith Bank \n";
                $response .= "0. back";
            }
            
            if(
                isset($level[0]) && $level[0] == 2  && isset($level[1]) && strlen((string)$level[1]) > 1 && isset($level[2]) && strlen((string)$level[2]) > 1)
            {
               $response="CON enter pin \n";
                
                // $response .= "0. back";
            }
            if(
                isset($level[0]) && $level[0] == 2  && isset($level[1]) && strlen((string)$level[1]) > 1 && isset($level[2]) && strlen((string)$level[2]) > 1 && isset($level[3]) && strlen((string)$level[3]) > 1)
            {
               $response="END Transaction Succesfull \n";
                
                // $response .= "0. back";
            }
            if(isset($level[0]) && $level[0] == 2  && isset($level[1]) && $level[1] == 1 && isset($level[2]))
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
            }*/
        }
        
       /* else if(isset($level[2]) && $level[2]!="" && !isset($level[3])){
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
