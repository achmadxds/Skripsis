<?php
if (!defined("BASEPATH")) exit("No direct script access allowed");

/**
 * 
 */
class Wa
{
    function kirimWablas($phone, $msg)
    {
        $key = 'UM48K0ZE7DGM9OUWWAEC';
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://panel.rapiwha.com/send_message.php?apikey=UM48K0ZE7DGM9OUWWAEC&number=".urlencode($phone)."&text=".urlencode($msg)."",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            return $response;
        }
    }
}
