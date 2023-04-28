<?php 
    
    include "transactionHandler.php";

    session_start();

    $tranHandle = new TransactionHandler();

    $_SESSION["status"] = "NSETTED";

    if ($_SESSION["status"] == "active") {
        header('Location: http://localhost/lainCodeMonger_V2/classes_' . $_SESSION["type"] . '.php');
    }

    if (isset($_POST["login"])) {
        if ($tranHandle->login_user($_POST["user_email"], $_POST["user_pass"])) {
            $userArray = $tranHandle->getUserFromEM($_POST["user_email"]);
            $_SESSION["name"] = $userArray[0];
            $_SESSION["type"] = $userArray[1];
            $_SESSION["email"] = $_POST["user_email"];
            $_SESSION["status"] = "active";
            header('Location: http://localhost/lainCodeMonger_V2/classes_' . $_SESSION["type"] . '.php');
            //header('Location: http://localhost/lainCodeMonger/dashboard.php');
        } else {
            echo '<script>';
            echo 'alert("Login unsuccessfull!!!");';
            echo '</script>';
        }
    }

    if (isset($_POST["register"])) {
        if ($tranHandle->register_user($_POST["user_name"], $_POST["user_email"], $_POST["user_type"], sha1($_POST["user_pass"]))) {
            $_SESSION["name"] = $_POST["user_name"];
            $_SESSION["type"] = $_POST["user_type"];
            $_SESSION["email"] = $_POST["user_email"];
            $_SESSION["status"] = "active";
            header('Location: http://localhost/lainCodeMonger_V2/classes_' . $_SESSION["type"] . '.php');
        } else {
            echo '<script>';
            echo 'alert("Registeration unsuccessfull!!!");';
            echo '</script>';
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>LAIN CM</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
        <link rel='stylesheet' type='text/css' href='css/navAndFooter.css' />
    </head>
    <body>
        <div class="article-clean">
            <header class="header bg-white">
            <nav class="navbar navbar-expand-lg fixed-top py-3">
                <div class="container"><a href="#" class="navbar-brand text-uppercase font-weight-bold" style="color: #F94552;">LAIN CM</a>
                    <button type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler navbar-toggler-right"><i class="fa fa-bars"></i></button>
                    
                    <div id="navbarSupportedContent" class="collapse navbar-collapse">
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item active"><a href="" class="nav-link text-uppercase font-weight-bold" style="color: #F94552;">Features<span class="sr-only">(current)</span></a></li>
                            <li class="nav-item"><a href="" class="nav-link text-uppercase font-weight-bold" style="color: #F94552;">Learn</a></li>
                            <li class="nav-item"><a href="" class="nav-link text-uppercase font-weight-bold" style="color: #F94552;">Join In</a></li>
                            <li class="nav-item"><a href="http://localhost/lainCodeMonger_V2/contactUs.php" class="nav-link text-uppercase font-weight-bold" style="color: #F94552;">Contact Us</a></li>
                        </ul>
                    </div>
                </div>
            </nav>
            </header>
            <span style="display: block; margin-bottom: 5em;"></span>
            <section style="background:#F94552">
                <div class="container">
                    <div class="row justify-content-md-center">
                        <div class="col-lg-6">
                            <img src="images/1.png" class="img-fluid">
                        </div>
                        <div class= "col-lg-6 d-flex justify-content-center align-items-center">
                            <div style="color:white;">
                                <div style="font-size: 20px; font-weight: bold">
                                    Lain Code Monger web app.
                                </div>
                                <div style="font-size: 30px; font-weight: bold">
                                    Now handling practicals in<br> pandemic just became easy
                                </div>
                                With code monger you can handle all of your programming<br>
                                practicals online with all of the features you need<br>
                                Manage assignmnets with our account system and track<br>
                                students performance with our app.
                                <div style="font-size: 20px; font-weight: bold">
                                    See Lain Code Monger Web App in action.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <span style="display: block; margin-bottom: 3em;"></span>
            <section style="">
            <div class="container">
                <div class="row justify-content-md-center justify-content-around shadow-lg p-3 mb-5 bg-white rounded">
                    <div class="col-lg-6 d-flex justify-content-center align-items-center">
                        <div class="row justify-content-md-center">
                            <div class="col-xs-6 d-flex justify-content-center align-items-center"><img src="images/4.png" class="img-fluid"></div>
                            <div class="col-xs-6 d-flex justify-content-center align-items-center">
                                <p class="text-center" style="font-size: 14px;">Open your account with LCM<br>
                                You can create your account in just few seconds just fill<br>
                                all the neceary details and the account will be created if <br>
                                everything went right you will be able to login right away<br>
                                subscribe to Lain Monger.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 d-flex justify-content-center align-items-center">
                        <div class="row justify-content-md-center">
                            <div class="col-xs-6 d-flex justify-content-center align-items-center"><img src="images/5.png" class="img-fluid"></div>
                            <div class="col-xs-6 d-flex justify-content-center align-items-center">
                                <p class="text-center" style="font-size: 14px;">Choose proper account type.<br>
                                This is really an important option this will determine whether<br>
                                you get certain privilages or not if you are not a teacher you can<br>
                                not add questions or listing the submisiions done by studetns.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </section>
            <span style="display: block; margin-bottom: 4em;"></span>
            <section>
            <div class="container">
                <div class="row">
                <div class="col-sm-6">
                    <div class="card" style="background: #F94552">
                    <div class="card-body">
                        <h5 class="card-title" style="color: white;">Adding Questions</h5>
                        <p class="card-text" style="color: white;">
                        With our system teachers can assign task to thier respective students
                        really easily all they need is a onlne account as a teacher and they
                        can start adding programming questions in few minutes.
                        </p>
                    </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="card" style="background: #F94552">
                    <div class="card-body">
                        <h5 class="card-title" style="color: white;">Online coding</h5>
                        <p class="card-text" style="color: white;">
                        With our system our clients can do programming online. 
                        When students click on solve on a perticulars task's button.
                        they will redirected to the editor where they can compile and  submit.
                        </p>
                    </div>
                    </div>
                </div>
                </div>
                <span style="display: block; margin-bottom: 2em;"></span>
                <div class="row">
                <div class="col-sm-6">
                    <div class="card" style="background: #F94552">
                    <div class="card-body">
                        <h5 class="card-title" style="color: white;">List submittion</h5>
                        <p class="card-text" style="color: white;">
                        With our system teachers have live tracking of assignment's
                        submission with submission page. The submission page will show
                        the student name and whethere he passed the assignmnet or not.
                        </p>
                    </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="card" style="background: #F94552">
                    <div class="card-body">
                        <h5 class="card-title" style="color: white;">Track work</h5>
                        <p class="card-text" style="color: white;">
                        With our system you can track all your assignmnets 
                        his assignment and submits then work
                        will be devided in done and undone section so he can keep track of work.
                        </p>
                    </div>
                    </div>
                </div>
                </div>
            </div>
            </section>
            <span style="display: block; margin-bottom: 4em;"></span>
            <div class="d-flex justify-content-center align-items-center" style="font-size: 27px; font-weight: bold;">
                <p class="text-center" style="color: #F94552;">LOG IN HERE OR REGISTER IN SECONDS</p>
            </div>
            <div class="container p-5">
                <div class="row">
                    <div class="col-sm-5 bg-light shadow-lg border rounded py-3">
                        <h2 class="text-center" style="color: #F94552;">Login</h2><br>
                        <form action="?" method="POST">
                            <div class="form-group">
                                <label for="_email">Email</label>
                                <input type="text" name="user_email" id="_email" class="form-control" placeholder="Email" required>
                            </div>
                            <div class="form-group">
                                <label for="_pass">Password</label>
                                <input type="password" name="user_pass" id="_pass" class="form-control" placeholder="Password" required>
                            </div>
                            <div class="d-flex justify-content-center align-items-center" style="font-size: 27px; font-weight: bold;">
                                <button type="submit" name="login" class="btn btn-danger mt-3">Login</button>
                            </div>
                        </form>
                    </div>
                    <div class="col-sm-6 bg-light shadow-lg rounded border py-3 offset-sm-1">
                        <h2 class="text-center" style="color: #F94552;">Register</h2><br>
                        <form action="?" method="POST" novalidate>
                        <div class="form-group">
                            <label for="_rname">Name</label>
                            <input type="text" name="user_name" id="_rname" class="form-control" placeholder="Name" required>
                        </div>
                        <div class="form-group">
                            <label for="_remail">Email</label>
                            <input type="email" name="user_email" id="_remail" class="form-control" placeholder="Email" required>
                        </div>
                        <div class="form-group">
                            <label for="_rtype">Type</label>
                            <select class="form-control" name="user_type" id="_rtype" required>
                                <option value="teacher">TEACHER</option>
                                <option value="student">STUDENT</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="_rpass">Password</label>
                            <input type="password" name="user_pass" id="_rpass" class="form-control" placeholder="Password" required>
                        </div>
                        <div class="d-flex justify-content-center align-items-center" style="font-size: 27px; font-weight: bold;">
                            <button type="submit" name="register" class="btn btn-danger mt-3">Sign Up</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
            <span style="display: block; margin-bottom: 3em;"></span>
            <section>
                <div class="footer-clean" style="background: rgb(209, 206, 206);">
                    <footer>
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-lg-3 item social" style="color: #F94552;"><a href="#"><i class="icon ion-social-facebook"></i></a><a href="#"><i class="icon ion-social-twitter"></i></a><a href="#"><i class="icon ion-social-snapchat"></i></a><a href="#"><i class="icon ion-social-instagram"></i></a>
                                    <p class="copyright" style="color: #F94552;">LAIN CM © 2021</p>
                                </div>
                            </div>
                        </div>
                    </footer>
                </div>
            </section>
        </div>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>
    </body>
</html>
