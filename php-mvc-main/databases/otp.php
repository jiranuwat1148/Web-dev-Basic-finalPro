<?php

function generateOtp($userId = 1){
    $prefix = str_pad((string)$userId, 2, '0', STR_PAD_LEFT);
    $genOtp = rand(1000,9999);
    return $prefix . $genOtp;
}

function getExpireTime(){
    return date('y-m-d H:i:s', strtotime('+5 minutes'));
}

function isExpire($expireDateTime){
    $expirtimestamp = strtotime($expireDateTime);
    $currentTime = time();
    return $currentTime > $expirtimestamp;
}

function otpindatabse($input){
    $getconn = getConnection();
    $sql = 'select * from otps';
    $result = $getconn->query($sql);
    $allOtp = $result -> fetch_all(MYSQLI_ASSOC);

    $input = trim($input);

    foreach ($allOtp as $row) {
        if ($input == $row['otp_id']) { 
            if (isExpire($row['expired'])) {
               return 'otp is expire';
            }else {
                $otp_id = $row['otp_id'];
                
                $extractUserId = (int)substr($input , 0, 2);

                $checkSql = "SELECT * FROM checkins WHERE otp_id = '$otp_id'";
                $res = getConnection() -> query($checkSql);


                if ($res->num_rows > 0) {
                    return 'You are checked in'; 
                }else {

                    $insertSql = "INSERT INTO checkins (user_id, otp_id) VALUES ($extractUserId, '$otp_id')";
                    getConnection() -> query($insertSql);
                    return 'checkin success';
                }
            }
        }
    }
    return false;
}
