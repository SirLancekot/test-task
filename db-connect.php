<?php
    $host = 'localhost'; 
    $database = 'demis'; 
    $user = 'root'; 
    $password = ''; 
    
    $link = mysqli_connect($host, $user, $password, $database) 
    or die("Error: " . mysqli_error($link));