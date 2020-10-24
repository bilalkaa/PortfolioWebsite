<?php
    //Data to connect to SQL Database.
    $server_name="localhost";
    $db_user="root";
    $db_password="";
    $db_name="portfolioDatabase";

    //Sets a connection to the server.
    $connect = new mysqli($server_name,$db_user,$db_password);

    //Handles if there's a connection error to the SQL Database.
    if($connect->connect_error){
        die("Connection Failed:".$connect->connect_error);
    }

    //SQL code that creates a database called "potfolioDatabase" if it doesn't already exist.
    $SQLQueryCreateDB = "CREATE DATABASE IF NOT EXISTS $db_name";
    //Performs the query.
    $connect->query($SQLQueryCreateDB);
    //Closes the connection.
    $connect->close();

    //Establishes a connection to my SQL Database.
    $connection = new mysqli($server_name,$db_user,$db_password,$db_name);


    //SQL code that creates a table.
    $SQLQueryCreateLoginTable = "CREATE TABLE IF NOT EXISTS adminLoginTable (id int NOT NULL AUTO_INCREMENT PRIMARY KEY, Email VARCHAR(255), Password VARCHAR(255))";
    $connection->query($SQLQueryCreateLoginTable);

    //Checks if the admin details exist.
    $SQLQueryCheckAdminDetails = "SELECT * FROM adminLoginTable WHERE Email='adminbilal@email.com' AND Password='password1'";
    $result = $connection->query($SQLQueryCheckAdminDetails);

    //If admin details exist, nothing is done. Else, create the admin details.
    if(!($result->num_rows>0))
    {
        $SQLQueryAddAdminDetails = "INSERT INTO adminLoginTable (Email, Password) VALUES ('adminbilal@email.com','password1')";
        $connection->query($SQLQueryAddAdminDetails);
    }



    
    //Creates the table for blog post; if it doesn't already exist.
    $SQLBlogPostTable = "CREATE TABLE IF NOT EXISTS blogPostTable (postID int NOT NULL AUTO_INCREMENT PRIMARY KEY, PDate VARCHAR(255), PTime VARCHAR(255), Title VARCHAR(100), Body VARCHAR(2000))";
    $connection->query($SQLBlogPostTable);
    //Closes the connection.
    $connection->close();



?>

<!DOCTYPE html>
<html>
    <head lang="en">
        <meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1">
        <title>Bilal Kaaouachi</title>

        <link rel="stylesheet" href="reset.css" type="text/css"/>
        <link rel="stylesheet" href="homepage.css" type="text/css"/>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

        
    </head>

    <body>
        <header>
            <nav class="navbar navbar-default fixed-top navbar-expand-sm bg-dark navbar-dark ">
                <div class="container">
                    <a class="navbar-brand" href = "homepage.php">Bilal Kaaouachi</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item px-3"><a class="nav-link" href = "#about">About</a></li>
                            <li class="nav-item px-3"><a class="nav-link" href = "#skills">Skills</a></li>
                            <li class="nav-item px-3"><a class="nav-link" href = "#education">Education</a></li>
                            <li class="nav-item px-3"><a class="nav-link" href = "#experience">Experience</a></li>
                            <li class="nav-item px-3"><a class="nav-link" href = "#portfolio">Portfolio</a></li>
                            <li class="nav-item px-3"><a class="nav-link" href = "#contact">Contact</a></li>
                            <li class="nav-item px-3"><a class="nav-link" href = "viewBlog.php">Blog</a></li>
                        </ul>

                        <?php
                            session_start();
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

        <div id="banner">
            <img src = "banner1.jpg" alt = "Image Not Found - Example of photography skills.">
        </div>

        <section id="about">
            <h1>About Myself</h1>

            <aside class="fullscreen">
                <figure>
                    <img src = "bilal.jpg" alt = "Image Not Found - Image of me!">
                    <figcaption>Switzerland when I visited CERN.</figcaption>
                </figure>
            </aside>
            <aside class="phonefriendly">
                <figure>
                    <img src = "bilal.jpg" alt = "Image Not Found - Image of me!">
                    <figcaption>Switzerland when I visited CERN.</figcaption>
                </figure>
            </aside>
            

            <div>
                <p>
                    My passion has always been technology since I was a child. I was always interested in computers and how they worked.
                    As I grew up my interest in the field persisted. Now I'm a student within the school of Electronic Engineering 
                    and Computer Sciecne at Queen Mary University of London. I'm studying Computer Science and find it very interesting.
                    I've always enjoyed problem solving and I like challenges.
                </p>



                <h3>What do I do during my free time?</h3>
                <ol>
                    <li>Films - I love watching films, talking about them and making them. I'm always working on a short film.</li>
                    <li>Programming - I enjoy creating my own programs, experiment and learn about how existing ones.</li>
                    <li>Photography - The banner of this website was taken by me! I love taking pictures and editing them.</li>
                    <li>Swimming - It's my favourite sport. It exercises the whole body and makes me feel alive.</li>
                </ol>
            </div>
                


        </section>
        
        <br><br>

        <section id="skills">
            <h1>Skills</h1>
            <p>I've got various skills relating to the field of Computer Science as well as other basic, but essential, skills for a workplace.</p>

            <div>
                <h4>My Main Skills</h4>
                <ul>
                    <li>Java Programming</li>
                    <li>Python Programming</li>
                    <li>HTML - Hypertext Markup Language</li>
                    <li>CSS - Cascading Style Sheets</li>
                    <li>Basic JavaScript and PHP scripting</li>
                    <li>Teamwork</li>
                    <li>Leadership</li>
                    <li>Communication</li>
                    <li>Organisation</li>
                    <li>Problem Solving</li>
                </ul>
            </div>
        </section>

        <section id="education">
            <div id="table-responsive">
                <h1>Education</h1>

                <p>I got my GCSE's and A Levels at Greig City Academy.</p>

                <h3 class="border-top">Qualifications</h3>
                <table class="table">
                    <colgroup>
                        <col>
                        <col>
                    </colgroup>

                    <tr>
                        <th>GCSE's in: </th>
                        <td>Maths, English Literature, English Language, Physics, Chemistry, Biology, Computer Science, Religious Education, Citizenship Studies, German and History</td>
                    </tr>

                    <tr>
                        <th>A Level in: </th>
                        <td>Maths, Physics and Computer Science</td>
                    </tr> 

                </table>
            </div>

        </section>

        <section id="experience">
            <h1>Experience</h1>
            <table>
                <colgroup>
                    <col>
                    <col>
                </colgroup>
                <thead>
                    <tr>
                        <th>Job Role</th>
                        <th>Job Description</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>2016 - Junior Administrator</td>
                        <td>When going to Greig City Academy I had a week work of experience at a General Practice called The Vale Practice. I was a junior administrator. I worked with computers and installed administration related softwares on staff computers. </td>
                    </tr>
                </tbody>
            </table>
        </section>

        <section id="portfolio">
            <h1>Portfolio</h1>

            <table>
                <colgroup>
                    <col>
                    <col>
                    <col>
                </colgroup>
                <thead>
                    <tr>
                        <th>Project Title</th>
                        <th>Description</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Python Quiz Game</td>
                        <td>
                            During my A Levels I made a childrens' game called "Magic Multiplaction" that encouraged practicing multiplication.
                            This project was programmed on Python and used GUI's and "sqlite3" to store data in a database. It has extensive documentation.
                        </td>
                    </tr>
                    <tr>
                        <td>Java Procedural Programming Chat Bot</td>
                        <td>
                            During my first semester of my first year at university, I was tasked to create a chat bot for my Procedural Programming
                            module. The objective was to utilise the basic features of Java to create a chat bot that stored relevant data on the user
                            and output it when required. I had to use techniques including reading and writing from a text file, bubblesort and linear search. 
                        </td>
                    </tr>
                    <tr>
                        <td>Java Object Oriented Game</td>
                        <td>
                            During my second semester of my first year at university, I made a game that had heavy use of object oriented techniques
                            called "Home Sick". This game was made for my Object Oriented Programming module. It also had a GUI.
                        </td>
                    </tr>
                    <tr>
                        <td>Online Portfolio</td>
                        <td>
                            This website and whole system was something I designed and made! I used HTML, CSS, Bootstrap, JavaScript and PHP to make this site.
                            I made this website for my Fundamentals of Web Technology module in my first year of University.
                        </td>
                    </tr>
                </tbody>
            </table> 
        </section>

        </br>

        <div id="contact">
            <footer>
                <p>Contact Information:  </p>
                <p> 
                    <a href="tel:123-456-7890"> Mobile: 123-456-7890 </a> | <a href="mailto:bilalkaa@outlook.com"> Email: bilalkaa@outlook.com </a>
                </p>
                <p><i>  Copyright © 2020 Mr Bilal Kaaouachi</i></p>
            </footer>
        </div>  

    </body>

</html>