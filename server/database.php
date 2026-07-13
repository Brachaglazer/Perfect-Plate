<?php

    // Create connection
    function getConnection() {
        $servername = "localhost";
        $username = "bracha";
        $password = "perfectplate";
        $dbname = "perfect_plate";
        $conn = mysqli_connect($servername, $username, $password, $dbname);
        return $conn;
    }
?>