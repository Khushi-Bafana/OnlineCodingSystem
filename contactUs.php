<?php 

    if (isset($_POST["contact"])) {
        $finalMsg = "Email:- " . $_POST["user_email"] . " Message:- " . $_POST["user_message"] . ".";
        $sendMsg = wordwrap($finalMsg, 1000);
        mail("xcoderultimate963@gmail.com", "Message", $sendMsg);
        echo '<script>';
        echo 'alert("Message as been sent!!");';
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
            <header class="header bg-white">
            <nav class="navbar navbar-expand-lg fixed-top py-3">
                <div class="container"><a href="http://localhost/lainCodeMonger_V2" class="navbar-brand text-uppercase font-weight-bold" style="color: #F94552;">LAIN CM</a>
                    <button type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler navbar-toggler-right"><i class="fa fa-bars"></i></button>
                    
                    <div id="navbarSupportedContent" class="collapse navbar-collapse">
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item active"><a href="" class="nav-link text-uppercase font-weight-bold" style="color: #F94552;">Features<span class="sr-only">(current)</span></a></li>
                            <li class="nav-item"><a href="" class="nav-link text-uppercase font-weight-bold" style="color: #F94552;">Learn</a></li>
                            <li class="nav-item"><a href="" class="nav-link text-uppercase font-weight-bold" style="color: #F94552;">Join In</a></li>
                        </ul>
                    </div>
                </div>
            </nav>
            </header>
            <span style="display: block; margin-bottom: 5em;"></span>
            <div class="container p-5">
                <div class="row">
                    <div class="col-sm bg-light shadow-lg border rounded py-3">
                        <h2 class="text-center" style="color: #F94552;">Contact Us</h2><br>
                        <form action="?" method="POST">
                            <div class="form-group">
                                <label for="_email">Email</label>
                                <input type="text" name="user_email" id="_email" class="form-control" placeholder="Email" required>
                            </div>
                            <div class="form-group">
                                <label for="_message">Enter your message</label>
                                <textarea rows="15" name="user_message" id="_message" class="form-control" placeholder="Message" required></textarea>
                            </div>
                            <div class="d-flex justify-content-center align-items-center" style="font-size: 27px; font-weight: bold;">
                                <button type="submit" name="contact" class="btn btn-danger mt-3">Submit</button>
                            </div>
                        </form>
                    </div>
            </div>
        </div>
    </body>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>
</html>
