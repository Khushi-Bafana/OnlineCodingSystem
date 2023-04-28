<?php 

    include "transactionHandler.php";

    session_start();

    $tranHandler = new TransactionHandler();

    if ($_SESSION["status"] !== "active") {
        session_unset();
        header('Location: http://localhost/lainCodeMonger_V2/');
    }

    if (isset($_POST["logout"])) {
        session_unset();
        header('Location: http://localhost/lainCodeMonger_V2/');
    }

    //$doneArray = $tranHandler->getDoneOnes($_SESSION["name"]);
    //$undoneArray = $tranHandler->getUndoneOnes($doneArray);

    $doneArray = NULL;
    $undoneArray = NULL;

    if (isset($_GET["class_name"])) {
        $_SESSION["className"] = $_GET["class_name"];
        //maybe add a checker to see if the student or the teacher is the part of the class
        $doneArray = $tranHandler->getDoneOnesNew($_SESSION["name"], $_GET["class_name"]);
        $undoneArray = $tranHandler->getUndoneOnesNew($_GET["class_name"], $doneArray);
    } else { }
?>
<!Doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>LAIN VCA</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
        <link rel='stylesheet' type='text/css' href='css/navAndFooter.css' />
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
            <?php $choice = ($_SESSION["type"] == "teacher") ? TRUE : FALSE; include "reuseHTML/navBar.php";  ?>
        </div>
        <span style="display: block; margin-bottom: 9em;"></span>
        <div class="d-flex justify-content-center align-items-center" style="font-size: 32px; font-weight: bold;">
            <p id="textHere" class="text-center">UNSUBMITTED ANSWERS</p>
        </div>
        <div class="d-flex justify-content-center align-items-center" style="font-size: 32px; font-weight: bold;">
            <hr style="width: 80%;">
        </div>
        <?php 
            /*function your_array_diff($arraya, $arrayb) {

                foreach ($arraya as $keya => $valuea) {
                    if (in_array($valuea, $arrayb)) {
                        unset($arraya[$keya]);
                    }
                }
                return $arraya;
            }
            if (empty($doneArray)) {
                $undoneArray = NULL;
            }*/
            $iter = 0;
            foreach ($undoneArray as $arr) {
                echo '<div class="d-flex justify-content-center align-items-center" style="font-size: 32px; font-weight: bold;">';
                echo '  <div class="card bg-light shadow-lg px-3 border rounded" style="width: 80%;">';
                echo '      <div class="card-body">';
                echo '          <form action="http://localhost/lainCodeMonger_V2/editor.php" method="GET">';
                echo '          <label style="font-size:25px;" class="card-title">' . $arr[0] . '</label>';
                echo '          <br><div id="colap' . $iter . '" class="collapse">';
                echo '              <p class="card-text" style="font-size: 15px;">' . $arr[1] . '</p>';
                echo '          </div>';
                echo '          <button data-toggle="collapse" data-target="#colap' . $iter . '" type="button" class="btn btn-dark mt-3">SEE ALL</button>';
                echo '          <button type="submit" name="subEdit" value="' . $arr[0] . '" class="btn btn-danger mt-3">SOLVE</button>';
                echo '          </form>';
                echo '      </div>';
                echo '  </div>';
                echo '</div><br>';
                $iter += 1;
            }
        ?>
        <span style="display: block; margin-bottom: 5em;"></span>
        <div class="d-flex justify-content-center align-items-center" style="font-size: 32px; font-weight: bold;">
            <p id="textHere" class="text-center">SUBMITTED ANSWERS</p>
        </div>
        <div class="d-flex justify-content-center align-items-center" style="font-size: 32px; font-weight: bold;">
            <hr style="width: 80%;">
        </div>
        <?php 
            $iter = 0;
            while ($iter < count($doneArray)) {
                echo '<div class="d-flex justify-content-center align-items-center" style="font-size: 32px; font-weight: bold;">';
                echo '  <div class="card bg-light shadow-lg px-3 border rounded" style="width: 80%;">';
                echo '      <div class="card-body">';
                echo '          <h5 class="card-title">' . $doneArray[$iter][0] . '</h5>';
                echo '          <div id="colap' . $iter . '" class="collapse">';
                echo '              <p class="card-text" style="font-size: 15px;">' . $doneArray[$iter][1] . '</p>';
                echo '          </div>';
                echo '          <button data-toggle="collapse" data-target="#colap' . $iter . '" type="button" class="btn btn-dark mt-3">SEE ALL</button>';
                echo '      </div>';
                echo '  </div>';
                echo '</div><br>';
                $iter += 1;
            }
        ?>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>
    </body>
</html>
