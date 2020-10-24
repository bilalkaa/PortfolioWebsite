<?php

?>

<!DOCTYPE html>
<html>
    <head lang="en">
        <meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1">
        <title>Blog</title>

        <link rel="stylesheet" href="reset.css" type="text/css"/>
        <link rel="stylesheet" href="viewBlog.css" type="text/css"/>
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
                        </ul>

                        <?php
                            session_start();
                            if(isset($_SESSION['login_status'])){
                                echo "<li class=\"nav-item px-3\"><a class=\"nav-link\" href = \"addPost.html\">Add Post</a></li>";
                            }
                        ?>

                        <?php
                            if(isset($_SESSION['login_status'])){
                                echo "<a class=\"col-sm-1\" href = \"logout.php\" style=\"color:red;\">Logout</a>";
                            }
                            else{
                                echo "<a class=\"col-sm-1\" href = \"login.html\">Login</a>";
                            }
                        ?>

                    </div>
                </div>
            </nav>
        </header>


        <form method="POST">
            <label>Filter Months:</label>
            <select name="filter">
                <option value="ALL" selected>ALL</option>
                <option value="%January%">January</option>
                <option value="%February%">February</option>
                <option value="%March%">March</option>
                <option value="%April%">April</option>
                <option value="%May%">May</option>
                <option value="%June%">June</option>
                <option value="%July%">July</option>
                <option value="%August%">August</option>
                <option value="%September%">September</option>
                <option value="%October%">October</option>
                <option value="%November%">November</option>
                 <option value="%December%">December</option>
            </select>            
            <input type="submit" name="monthfilter" value="Submit" />
        </form>
                            

        <?php

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




            $databaseEntryCount = "SELECT * FROM blogPostTable";
            $EntryCountQuery = $connection->query($databaseEntryCount);

            if(!($EntryCountQuery->num_rows>0))
            {
                header("Location: login.html");
                die();
            }


            if(isset($_POST["monthfilter"]) and $_POST["filter"] != "ALL"){
                $PostQuery = $connection->prepare("SELECT * FROM blogPostTable WHERE PDate LIKE ? ORDER BY postID DESC");
                $PostQuery->bind_param("s",$_POST["filter"]);
                $PostQuery->execute();
                $result = $PostQuery->get_result();
                while($row = $result->fetch_assoc()){
                    echo
                        "<section><h6>" . $row["PDate"] . ", " . $row["PTime"]
                        ."</h6><h2>" . $row["Title"] . "</h2><p>" . $row["Body"]
                        . "</p></section>";
                }
            }
            else{
                $query = ("SELECT * FROM blogPostTable ORDER BY postID DESC");
                $result = $connection->query($query);
                while($row = $result->fetch_assoc()){
                    echo
                        "<section><h6>" . $row["PDate"] . ", " . $row["PTime"]
                        ."</h6><h2>" . $row["Title"] . "</h2><p>" . $row["Body"]
                        . "</p></section>";
                }
            }

            $connection->close();

        ?>



    </body>
</html>