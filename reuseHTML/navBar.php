<header class="header bg-white">
    <nav class="navbar navbar-expand-lg fixed-top py-3 bg-dark">
        <div class="container"><a href="<?php echo "http://localhost/lainCodeMonger_V2/classes_" . $_SESSION["type"] . ".php" ?>" class="navbar-brand text-uppercase font-weight-bold" style="color: white;">LAIN CM</a>
            <button type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler navbar-toggler-right"><i style="color:white;" class="fa fa-bars"></i></button>
            <div id="navbarSupportedContent" class="collapse navbar-collapse">
                
                <ul class="navbar-nav ml-auto">
                    <?php 
                        if ($choice) {
                            echo '<li class="nav-item p-1"><a href="http://localhost/lainCodeMonger_V2/createQuestion.php"><button type="submit" name="addQ" class="btn btn-success">ADD PROGRAM</button></a></li>';
                            echo '<li class="nav-item p-1"><a href="http://localhost/lainCodeMonger_V2/showSubmission.php"><button type="submit" name="listSub" class="btn btn-success">LIST SUBMISSION</button></a></li>';
                        }
                        echo '<li class="nav-item p-1"><form action="?" method="POST"><button type="submit" name="logout" class="btn btn-success">LOG OUT</button></form></li>';
                    ?>
                </ul>
            </div>
        </div>
    </nav>
</header>
