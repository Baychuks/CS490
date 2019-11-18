<?php
header("Content-Type: application/json");
header("Access-Control-Allow-Methods: POST");

        $ucid = $_POST['njitid'];
        $pwd  = $_POST['njitpassword']; 
        //enter ucid and psw into json for aaron
        $arr = array( "ucid" => $ucid,"pass" => $pwd);
        $data = json_encode($arr);
        //send data in curl to aaron
        $curl = curl_init('http://afsaccess3.njit.edu/~aar73/Hope.php');
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_COOKIEJAR,'cookie.txt');
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($curl);
        //result is response json from aaron
        curl_close($curl);
        echo $result;
        //https://web.njit.edu/~aar73/Hope.php

?>
