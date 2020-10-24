<?php

    if($_SERVER['REQUEST_METHOD'] == 'POST'){

        //Data to connect to SQL Database.
        $server_name = getenv("MYSQL_SERVICE_HOST");
        $db_port = getenv("MYSQL_SERVICE_PORT");
        $db_user = getenv("DATABASE_USER");
        $db_password = getenv("DATABASE_PASSWORD");
        $db_name = getenv("DATABASE_NAME"); 


        //Establishes a connection to my SQL Database.
        $connection = new mysqli($server_name,$db_user,$db_password,$db_name);

        // Checks connection
        if ($connection->connect_error) {
            die("Connection failed: " . $connection->connect_error);
        }


        $title = $_POST["title"];
        $mainbody = $_POST["mainbody"];


        session_start();
        $_SESSION["post_title"]=$title;
        $_SESSION["post_body"]=$mainbody;//why did i do this?


        date_default_timezone_set("Europe/London");
        $date = date("d F Y");
        $time = date("h:i:sa");

        $SQLQueryAddPost = "INSERT INTO blogPostTable (PDate,PTime,Title,Body) VALUES ('$date','$time','$title','$mainbody')";
        $connection->query($SQLQueryAddPost);

        header("Location: viewBlog.php");
        die();

    }
?>