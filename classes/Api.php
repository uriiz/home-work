<?php


class Api
{

    public static function getApiData($type)
    {
        $curl = curl_init();
        curl_setopt_array($curl, [
            CURLOPT_URL => "https://jsonplaceholder.typicode.com/".$type,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_CUSTOMREQUEST => "GET",
        ]);

        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);
        if ($err) {
            echo "Connection Error:" . $err;
        } else {
            return json_decode($response);
        }
    }
}