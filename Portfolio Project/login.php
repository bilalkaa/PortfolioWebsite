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




        $email = $_POST["email"];
        $password = $_POST["password"];


 
        //Query to get admin details.
        $SQLQueryAdminDetails = "SELECT Email,Password FROM adminLoginTable WHERE Email='$email' AND Password='$password'";
        $QueryResult = $connection->query($SQLQueryAdminDetails);
        
        if($QueryResult->num_rows>0){
            session_start();

            $_SESSION['login_status'] = true;

            header("Location: addPost.html");
            die();
            
        }

        $connection->close();
    }
?>


<!DOCTYPE html>
<html>
    <head lang="en">
        <meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1">
        <title>Login</title>

        <link rel="stylesheet" href="reset.css" type="text/css"/>
        <link rel="stylesheet" href="login.css" type="text/css"/>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

        
    </head>

    <body>
        <header>
            <nav class="navbar navbar-expand-sm bg-dark navbar-dark ">
                <div class="container">
                    <a class="navbar-brand" href = "index.php">Bilal Kaaouachi</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item px-3"><a class="nav-link" href = "index.php">Return Home</a></li>
                            <li class="nav-item px-3"><a class="nav-link" href = "login.html">Login Again</a></li>
                        </ul>  
                    </div>
                </div>
            </nav>
        </header>

        <p style="color:red; background-color:white; text-align:center; font-size:4em;">Email or Password incorrect. Try again.</p>
        
    </body>
</html>