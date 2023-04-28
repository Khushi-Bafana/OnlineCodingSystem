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

    $subArray = $tranHandle->getAllSubmission($_SESSION["className"]);
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
        <span style="display: block; margin-bottom: 3em;"></span>
        <div class="container">
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">QNAME</th>
                    <th scope="col">STATUS</th>
                    <th scope="col">STUDENT</th>
                    </tr>
                </thead>
                <tbody>
                <?php 
                    for ($row = 0; $row < count($subArray); $row += 1) {
                        echo '<tr>';
                        for ($col = 0; $col < 4; $col += 1) {
                            echo '<td>' . $subArray[$row][$col] . '</td>';
                        }
                        echo '</tr>';
                    }
                ?>
                </tbody>
            </table>
        </div>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>
    </body>
</html>
