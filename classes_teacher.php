<?php
    
    include "transactionHandler.php";

    session_start();

    $tranHandle = new TransactionHandler();

    if ($_SESSION["status"] !== "active") {
        session_unset();
        header('Location: http://localhost/lainCodeMonger_V2/');
    }

    if (isset($_POST["add_class"])) {
        if ($tranHandle->register_class($_POST["class_name"], $_POST["class_passcode"], $_SESSION["name"], "empty", $_POST["class_description"])) {
            header("Location: http://localhost/lainCodeMonger_V2/classes_teacher.php");
        } else {
            echo '<script>';
            echo 'alert("Class registeration unsuccessfull!!!");';
            echo '</script>';
        }
    }

    if (isset($_POST["logout"])) {
        session_unset();
        header('Location: http://localhost/lainCodeMonger_V2/');
    }

    $classesHere = $tranHandle->getClasses($_SESSION["name"]);
?>
<!Doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>LAIN VeCA</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
        <link rel='stylesheet' type='text/css' href='css/navAndFooter.css' />
        <link rel='stylesheet' type='text/css' href='css/modal.css' />
    </head>
    <body>
        <style>
            @media (max-width: 991px) {
                #textHere {
                    font-size: 22px;
                }
            }
        </style>
        <div class="article-clean">
            <header class="header bg-white">
                <nav class="navbar navbar-expand-lg fixed-top py-3 bg-dark">
                    <div class="container"><a href="http://localhost/lainCodeMonger_V2/classes_student.php" class="navbar-brand text-uppercase font-weight-bold" style="color: white;">LAIN CM</a>
                        <button type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler navbar-toggler-right"><i style="color:white;" class="fa fa-bars"></i></button>
                        <div id="navbarSupportedContent" class="collapse navbar-collapse">      
                            <ul class="navbar-nav ml-auto">
                                <li class="nav-item p-1"><a href="http://localhost/lainCodeMonger_V2/profile.php"><button type="submit" name="showPro" class="btn btn-success">SHOW PROFILE</button></a></li>
                                <li class="nav-item p-1"><button id="addForm" class="btn btn-success">ADD CLASS</button></li>
                                <li class="nav-item p-1"><form action="?" method="POST"><button type="submit" name="logout" class="btn btn-success">LOG OUT</button></form></li>
                            </ul>
                        </div>
                    </div>
                </nav>
            </header>
        </div>
        <span style="display: block; margin-bottom: 8em;"></span>
        <div class="d-flex justify-content-center align-items-center" style="font-size: 32px; font-weight: bold;">
            <p id="textHere" class="text-center">MY CLASSES</p>
        </div>
        <div class="d-flex justify-content-center align-items-center" style="font-size: 32px; font-weight: bold;">
            <hr style="width: 80%;">
        </div>
        <div class="container" style="min-width: 80%;">
            <div class="row">
                <?php
                    foreach($classesHere as $class) {
                        echo '<div class="col-sm-3 d-flex justify-content-center" style="padding-top: 25px;">';
                        echo '  <div class="card bg-light shadow-lg" style="width: 95%;">';
                        echo '      <img class="card-img-top" src="images/class.png" alt="Card image cap">';
                        echo '      <div class="card-body">';
                        echo '          <h5 class="card-title">' . $class[0] .'</h5>';
                        echo '          <a href="http://localhost/lainCodeMonger_V2/dashboard.php?class_name=' . $class[0] . '" class="btn btn-success">Check</a>';
                        echo '      </div>';
                        echo '  </div>';
                        echo '</div>';
                    }
                ?>
            </div>
        </div>
        <div id="classForm" class="modal">
            <div class="modal-content">
                <span class="close">&times;</span>
                <h2 class="text-center">Add Class</h2><br>
                <form action="?" method="POST">
                    <div class="form-group">
                        <label for="_name">Name</label>
                        <input type="text" name="class_name" id="_name" class="form-control" placeholder="Enter the name" required>
                    </div>
                    <div class="form-group">
                        <label for="_description">Description</label>
                        <input type="text" name="class_description" id="_description" class="form-control" placeholder="Enter the description" required>
                    </div>
                    <div class="form-group">
                        <label for="_passcode">Passcode</label>
                        <input type="password" name="class_passcode" id="_passcode" class="form-control" placeholder="Enter the passcode" required>
                    </div>
                    <div class="d-flex justify-content-center align-items-center" style="font-size: 27px; font-weight: bold;">
                        <button type="submit" name="add_class" class="btn btn-success mt-3">Add</button>
                    </div>
                </form>
            </div>
        </div>
        <script src="js/modal.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>
    </body>
</html>
