<!DOCTYPE html>
<html>
    <head lang="en">
        <meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1">
        <title>Add Post</title>

        <link rel="stylesheet" href="reset.css" type="text/css"/>
        <link rel="stylesheet" href="addPost.css" type="text/css"/>
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

                        <a class="col-sm-1" href = "logout.php" style="color:red;">Logout</a>
                    </div>
                </div>
            </nav>
        </header>

        <section>

            <form id="mainform" method="POST" action="addPost.php">
                <fieldset>
                    <legend><p>Add Blog</p></legend>

                    <?php
                        $title = $_POST["title"];

                        $mainbody = $_POST["mainbody"];

                        echo "<p><input id=\"inputTitle\" name=\"title\" value=\"$title\"/></p>";

                        echo "<p><textarea id=\"inputMainText\" name=\"mainbody\" rows=\"8\" col=\"45\" maxlength=\"1998\">$mainbody</textarea></p>";

                    ?>


                    <p>
                        <button id="postForm" type="submit" >Post</button>

                        <input id="clearbtn" type="button" value="Clear" onclick="clearFunction()"/>

                        <input id="preview" type="submit" value="Preview" formmethod="POST" formaction="preview.php"/>

                    </p>

                </fieldset>
            </form>


        </section>

        <script src="addPost.js"></script>
    </body>
</html>