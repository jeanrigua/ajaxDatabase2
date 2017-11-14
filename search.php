<?php
//created by Jean
    $lastname = "";
    $firstname = "";
    $email = "";
    $sql = "";

    if (isset($_POST['searchlastname']))
    {
        $lastname =  $_POST['searchlastname'];
        $sql = "Select * from userinfo where lastname='" .$lastname . "';";
    }
    else if (isset($_POST['searchfirstname']))
    {
        $firstname = $_POST['searchfirstname'];
        $sql = "Select * from userinfo where firstname='" .$firstname . "';";
    }

    else if (isset($_POST['searchemail']))
    {
        $email = $_POST['searchemail'];
        $sql = "Select * from userinfo where email='" .$email . "';";
    }
  
    $server = 'localhost';
    $username = 'jeanstuart';
    $password = 'mabuhay1923';
    $dbname = 'signup';

    $connection = mysqli_connect($server,$username,$password,$dbname);

    if (!$connection){
        echo "problem connecting";
    } 
    else {
        //echo "connected successfully, ";
    }

    $query = mysqli_query($connection, $sql);
    if ($query){
         //Fetch rows if successful 
        echo "  <table><thead>
            <tr>
                <th>First name</th>
                <th>Last name</th>
                <th>Email </th>
                <th>Gender </th>
                <th>Status </th>
                <th>Phone </th>
            </tr>
        </thead><tbody>";
        while ($row = mysqli_fetch_row($query)){
            printf("<tr>
                    <td>%s</td>
                    <td>%s</td>
                    <td>%s</td>
                    <td>%s</td>
                    <td>%s</td>
                    <td>%s</td>
                </tr> " 
        , $row[1], $row[2], $row[3], $row[5], $row[6], $row[7]);
        }
        echo " </tbody></table>    ";
        mysqli_free_result($query);
        mysqli_close($connection);
    } else {
        echo "mysql_query error - cound't search signup table";
    }
?>