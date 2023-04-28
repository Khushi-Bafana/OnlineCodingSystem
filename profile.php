<?php
    
    include "transactionHandler.php";

    session_start();

    $tranHandle = new TransactionHandler();

    if ($_SESSION["status"] !== "active") {
        session_unset();
        header('Location: http://localhost/lainCodeMonger_V2/');
    }

    if (isset($_POST["change_password"])) {
        $message = NULL;
        $status = $tranHandle->changePassword($_SESSION["name"], $_POST["old_password"], $_POST["new_password"]);
        if ($status === "DONE") {
            $message = "Password has been changed!!!";
        } else if ($status === "NOTFOUND") {
            $message = "You have entered wrong password!!!";
        } else {
            $message = "Had some issue dont know what";
        }
        echo '<script>';
        echo 'alert("' . $message . '");';
        echo '</script>';
    }

    if (isset($_POST["logout"])) {
        session_unset();
        header('Location: http://localhost/lainCodeMonger_V2/');
    }

    $details = $tranHandle->getUserDetails($_SESSION["name"]);
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
        <div class="article-clean">
            <header class="header bg-white">
                <nav class="navbar navbar-expand-lg fixed-top py-3 bg-dark">
                    <div class="container"><a href="<?php echo "http://localhost/lainCodeMonger_V2/classes_" . $_SESSION["type"] . ".php" ?>" class="navbar-brand text-uppercase font-weight-bold" style="color: white;">LAIN CM</a>
                        <button type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler navbar-toggler-right"><i style="color:white;" class="fa fa-bars"></i></button>
                        <div id="navbarSupportedContent" class="collapse navbar-collapse">      
                            <ul class="navbar-nav ml-auto">
                                <li class="nav-item p-1"><form action="?" method="POST"><button type="submit" name="logout" class="btn btn-success">LOG OUT</button></form></li>
                            </ul>
                        </div>
                    </div>
                </nav>
            </header>
        </div>
        <span style="display: block; margin-bottom: 8em;"></span>
        <?php 
            echo '<div class="d-flex justify-content-center align-items-center" style="font-size: 32px; font-weight: bold;">';
            echo '  <div class="card bg-light shadow-lg" style="width: 30rem;">';
            echo '      <img class="card-img-top" src="images/avatar.png" alt="Card image cap">';
            echo '      <div class="card-body">';
            echo '          <h5 class="card-title">Name:- ' . $details[0] . '</h5><hr />';
            echo '          <h5 class="card-title">Email:- ' . $details[1] . '</h5><hr />';
            echo '          <h5 class="card-title">Type:- ' . $details[2] . '</h5>';
            echo '          <button id="changePassword" class="btn btn-danger">Change Password</button>';
            echo '      </div>';
            echo '  </div>';
            echo '</div>';
        ?>
        <div id="classForm" class="modal">
            <div class="modal-content">
                <span class="close">&times;</span>
                <h2 class="text-center">Change Password</h2><br>
                <form action="?" method="POST">
                    <div class="form-group">
                        <label for="_oldpassword">Old Password</label>
                        <input type="password" name="old_password" id="_oldpassword" class="form-control" placeholder="Enter old password" required>
                    </div>
                    <div class="form-group">
                        <label for="_newpassword">New Password</label>
                        <input type="password" name="new_password" id="_newpassword" class="form-control" placeholder="Enter new password" required>
                    </div>
                    <div class="d-flex justify-content-center align-items-center" style="font-size: 27px; font-weight: bold;">
                        <button type="submit" name="change_password" class="btn btn-success mt-3">Change</button>
                    </div>
                </form>
            </div>
        </div>
        <script src="js/modalStudent.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>
    </body>
</html>
