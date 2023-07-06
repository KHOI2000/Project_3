<?php

    if (!function_exists('connect')) { 
        function connect() {
            $connect = mysqli_connect("db","root","example","quanlyshop");
            return $connect;
        }
    }
?>