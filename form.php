<?php 
    $formdata = explode('&', $_POST['data']);
     parse_str( $_POST['data'], $values);

     // connecting to database

     $server = 'localhost';
     $username = 'jeanstuart';
     $password = 'mabuhay1923';
     $dbname = 'signup';

     $connection = mysqli_connect($server,$username,$password,$dbname);

     if (!$connection){
         echo "problem connecting";
     } 
     else {
         echo "connected successfully, ";
     }

    $encryptedPassword = password_hash($values['password'],PASSWORD_DEFAULT); 

    $sql = "Insert into userinfo (firstname,lastname,email,password,gender,status,phone)
            VALUES('" 
            .$values['firstname'] . "', '" 
            .$values['lastname']  . "', '" 
            .$values['email']     . "', '" 
            .$encryptedPassword  . "', '"
            .$values['gender']  . "', '" 
            .$values['status']  . "', '" 
            .$values['phone']    . "') ;";

    $query = mysqli_query($connection, $sql);
    if ($query){
        echo "1 row inserted";
    } else {
        echo "mysql_query error - cound't insert to the signup table";
    }
?>