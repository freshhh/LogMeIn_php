<?php

$db_user_name = "root";
$db_password = "";
$db_location = "localhost";
$db_name = "badBoyFresh";

$db_conn = mysqli_connect($db_location,$db_user_name,$db_password,$db_name);
//$db_select = mysqli_select_db($db_connection, $db_name);

if($db_conn->connect_error){
            die("Connection didnt go through: ".$db_conn->connect_error);

            }else { }
                     






//$test = "lowe me nuh";




?>