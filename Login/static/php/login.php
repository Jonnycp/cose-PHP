<?php
require "checkInputs.php";

    if (isset($_POST["email"]) && isset($_POST["password"])) {
        $email = cleanInputs($_POST["email"]);
        $password = cleanInputs($_POST["password"]);

        if (controlliInput($email) && controlliInput($password)) {
            $time;
            if(isset($_POST["remember"])){
               $time = time() + 60*60*24;
            }else{
                $time = 0;
            }
            setcookie("email", $email, $time, "/", false, true);
            setcookie("password", $password, $time, "/", false, true);

        }
    }

    if(isset($_POST["exit"])){
        setcookie("email", "", time() - 3600, "/", false, true);
        setcookie("password", "", time() - 3600, "/", false, true);
        $_POST = [];
    }
?>