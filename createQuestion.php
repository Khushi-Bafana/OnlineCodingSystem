<?php 

    include "transactionHandler.php";

    session_start();

    $tranHandle = new TransactionHandler();

    if ($_SESSION["status"] !== "active" || $_SESSION["type"] !== "teacher") {
        header('Location: http://localhost/lainCodeMonger_V2/');
    }

    if (isset($_POST["logout"])) {
        session_unset();
        header('Location: http://localhost/lainCodeMonger_V2/');
    }

    if (isset($_POST["qSub"])) {
        $retV = ($tranHandle->add_questions($_POST["qname"], $_POST["qtext"], $_POST["qanswer"], $_SESSION["name"], $_SESSION["className"])) ? "SUCCESSFULL" : "UNSUCCESSFULL";
        echo '<script>';
        echo 'alert("Question added ' . $retV . '!!!");';
        echo '</script>';
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
            <?php $choice = FALSE; include "reuseHTML/navBar.php"; ?>
        </div>
        <span style="display: block; margin-bottom: 9em;"></span>
        <div class="d-flex justify-content-center align-items-center" style="font-size: 32px; font-weight: bold;">
            <p class="text-center">CREATE PROGRAM QUESTIONS</p>
        </div>
        <div class="container">
            <form class="bg-light shadow-lg px-3 border rounded"action="?" method="POST">
                <div class="form-group mt-4">
                    <input type="text" name="qname" class="form-control" placeholder="ENTER THE QUESTION HERE" required />
                </div>
                <div class="form-group mt-4">
                    <textarea type="text" name="qtext" class="form-control" placeholder="ENTER THE QUESTION TEXT HERE" rows="15" required></textarea>
                </div>
                <div class="form-group mt-4">
                    <input type="text" name="qanswer" class="form-control" placeholder="ENTER THE ANSWER HERE" required />
                </div>
                <div class="d-flex justify-content-center align-items-center">
                    <button type="submit" name="qSub" class="btn btn-dark mt-3">SUBMIT</button>
                </div>
            </form>
        </div>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>
    </body>
</html>
