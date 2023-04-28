<?php 

    include "transactionHandler.php";

    session_start();

    $tranHandle = new TransactionHandler();

    $testVariable = "test";

    if (isset($_GET["subEdit"])) {
        $qArrayH = $tranHandle->getPrParams($_GET["subEdit"]);
        $questionH = $qArrayH[0];
        $answerH = $qArrayH[1];
        $_SESSION["que"] = $answerH;
        $_SESSION["qU"] = $_GET["subEdit"];
        $_SESSION["qT"] = $questionH;
    }

    //remember to change it later
    if ($_SESSION["status"] !== "active" || $_SESSION["type"] !== "teacher") {
        //header('Location: http://localhost/lainCodeMonger/');
    }

    if (isset($_POST["logout"])) {
        session_unset();
        header('Location: http://localhost/lainCodeMonger_V2/');
    }

    if (isset($_POST["pSub"])) {
        //echo $_SESSION["que"];
        if ($_POST["pAns"] === $_SESSION["que"]) {
            if($tranHandle->subMitProgram($_SESSION["qU"], $_POST["pText"], $_SESSION["qT"], $_POST["pStatus"], $_SESSION["name"], $_SESSION["className"])) {
                echo '<script>';
                echo 'alert("ANSWER SUBMITTED SUCCESFULL!!!");';
                echo '</script>';
                header('Location: http://localhost/lainCodeMonger_V2/dashboard.php?class_name=' . $_SESSION["className"]);
            }
        } else {
            $stat = $_POST["pStatus"] . "BUT NOT MATCHED";
            if($tranHandle->subMitProgram($_SESSION["qU"], $_POST["pText"], $_SESSION["qT"], "PASSED BUT ANSER NOT MATCHED", $_SESSION["name"], $_SESSION["className"])) {
                echo '<script>';
                echo 'alert("ANSWER SUBMITTED SUCCESFULL!!!");';
                echo '</script>';
                header('Location: http://localhost/lainCodeMonger_V2/dashboard.php?class_name=' . $_SESSION["className"]);
            }
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
        <script src = "https://code.jquery.com/jquery-1.10.2.js"></script>
        <script src = "https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <style>
            form .form-control::-webkit-input-placeholder { 
                color: #3ff84b;
            }
            form .form-control::-moz-placeholder {
                color: #3ff84b;
            }
            form .form-control:-ms-input-placeholder {
                color: #3ff84b;
            }
            form .form-control:placeholder {
                color: #3ff84b;
            }
        </style>
    </head>
    <body>
        <div class="article-clean">
            <?php $choice = FALSE; include "reuseHTML/navBar.php"; ?>
        </div>
        <span style="display: block; margin-bottom: 9em;"></span>
        <div class="d-flex justify-content-center align-items-center" style="font-size: 32px; font-weight: bold;">
            <p class="text-center">CREATE PROGRAM</p>
        </div>
        <span style="display: block; margin-bottom: 2em;"></span>
        <div class="container">
            <div class="form-group mt-4 rounded">
                <label>QUESTIONS:- <?php echo $questionH; ?></label>
            </div>
            <select class="form-control bg-light" name="language" id="language" required>
                <option value="c">C</option>
                <option value="java">JAVA</option>
                <option value="cpp">C++</option>
                <option value="php">PHP</option>
                <option value="perl">PERL</option>
                <option value="python3">PYTHON</option>
                <option value="pascal">PASCAL</option>
                <option value="kotlin">KOTLIN</option>
            </select><br>
            <form class="bg-light shadow-lg px-3 border rounded"action="?" method="POST">
                <div class="form-group mt-4">
                    <textarea type="text" style="background: #080637; color: #3ff84b;" id="codeTxt" name="pText" class="form-control" placeholder="ENTER THE PROGRAM HERE" rows="15" required></textarea>
                </div>
                <div class="form-group mt-4">
                    <div class="row">
                        <div class="col"><input type="text" style="background: #080637; color: #3ff84b;" id="status" name="pStatus" class="form-control" placeholder="STATUS WILL LOAD HERE" readonly /></div>
                        <div class="col"><input type="text" style="background: #080637; color: #3ff84b;" id="ramL" name="pRam" class="form-control" placeholder="RAM WILL LOAD HERE" readonly /></div>
                        <div class="col"><input type="text" style="background: #080637; color: #3ff84b;" id="ansL" name="pAns" class="form-control" placeholder="ANSWER WILL LOAD HERE" readonly /></div>
                    </div>
                </div>
                <div class="d-flex justify-content-center align-items-center">
                    <button type="submit" name="pSub" style="background: #10bd00" class="btn btn-dark mt-3">SUBMIT</button>
                    <pre> </pre>
                    <button type="button" id="pRun" name="pRun" style="background: #ff4538;" class="btn btn-dark mt-3">RUN</button>
                </div>
            </form>
        </div>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>
    </body>
</html>
<script src="js/compileApi.js"></script>
