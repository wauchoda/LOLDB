<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
    session_start();
    //echo 'test' . $_SESSION["userID"];
    if ($_SESSION["userID"]) {
        echo 'Yes';
        echo "Hello " . $_SESSION["userID"];
    }
    else
    {
        echo 'NO';
    }
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body><p>hello world</p>
        
    </body>
</html>
