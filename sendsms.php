<?php

function send_msg($to, $sms)
{
    $api_url = "http://msg.msgclub.net/rest/services/sendSMS/sendGroupSms?AUTH_KEY=(YOUR AUTH TOKEN HERE FROM MSGCLUB)&message=" . $sms .
        "&senderId=SISTEK&routeId=1&mobileNos=" . $to . "&smsContentType=english";

    $ret = file($api_url);
    //echo $ret;exit;
    $sess = explode(":", $ret[0]);
    if ($sess[0] != "OK") {
        $result = $ret[0];
        //echo $result;exit;
        return $result;
    } else {
        echo "Authentication failure: " . $ret[0];
    }
}

if (isset($_POST['Submit'])) {
    $phone = $_POST['phone'];
    // echo $phone;
    $sms = $_POST['sms'];
    // echo $sms;

    $message = urlencode($sms);

    send_msg($phone, $message);
}

?>

<!DOCTYPE html>
<html>

<head>
    <style>
        body {
            text-align: center;
        }

        h1 {
            background: -webkit-radial-gradient(#8e2584, #fb0303);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        textarea {
            color: #834d9b;
            width: 250px;
            height: 80px;
            border: #df8da8 solid 5px;
            border-radius: 8px;
            text-transform: capitalize;
        }

        input[type=submit] {
            margin-top: 8px;
            color: limegreen;
            background-color: lightgoldenrodyellow;
            width: 100px;
            height: 30px;
            font-size: 20px;
            border: chocolate;
            border-style: groove;
            border-radius: 5px;
            font-family: fantasy;
        }
    </style>
</head>

<body>
    <h1>&hearts;SAGAR</h1>

    <form action="" method="POST">
        <p>copy below text and paste in input box</p>
        <span style="cursor: copy;">You are registered as {#var#} your LOGIN ID is {#var#} and PASSWORD for login is
            {#var#} SISTEK
        </span>

        <p>
            <label>Phone : <input type="number" name="phone" id="phone" /></label>
        </p>
        <p>
        <p>
            <label>Text SMS : <textarea id="sms" name="sms"></textarea></label>
        </p>
        <p>
            <input type="submit" name="Submit" value="Send SMS" />
        </p>


    </form>
</body>

</html>

<script>
    const span = document.querySelector("span");

    span.onclick = function() {
        document.execCommand("copy");
    }

    span.addEventListener("copy", function(event) {
        event.preventDefault();
        if (event.clipboardData) {
            event.clipboardData.setData("text/plain", span.textContent);
            console.log(event.clipboardData.getData("text"))
        }
    });
</script>