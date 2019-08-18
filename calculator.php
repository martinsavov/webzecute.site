<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>WEBzecute | Calculate your website cost</title>

    <!-- Font Awesome Icons -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:400,700" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic' rel='stylesheet' type='text/css'>


    <!-- Theme CSS - Includes Bootstrap -->
    <link href="css/creative.min.css" rel="stylesheet">

    <link rel="shortcut icon" href="/img/favicon.ico" type="image/x-icon">
    <link rel="icon" href="/img/favicon.ico" type="image/x-icon">

</head>

<body id="page-top">
    <!-- Navigation -->
        <nav class="navbar navbar-expand-lg" id="mainNav">
            <div class="container">
                <a class="navbar-brand js-scroll-trigger" href="http://webzecute.site/"><img src="img/logo2.png"></a>
    <!--            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">-->
    <!--                <span class="navbar-toggler-icon"></span>-->
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto my-2 my-lg-0">
                        <li class="nav-item">
                            <button style="color: #0b0b0b;" class="btn-light" onclick="goBack()">Go Back</button>
                        </li>

                    </ul>
                </div>
            </div>
        </nav>
    <h4 class="text-center display-4">Price Calculator</h4>
    <form action="calculator.php" method="post">
        <div class="container">
            <div class="form-group">
                <label for="technology" class="font-weight-bold">Technology<small style="color: red">*</small></label>
                <select multiple class="form-control" id="technology" name="technology" onchange="choice();">
                    <option value="100" >WordPress (100 €)</option>
                    <option value="250">Static Custom Website - HTML+CSS, JavaScript (250 €)</option>
                    <option value="600">Dynamic Custom Website - PHP, HTML+CSS, <br>JavaScript (600 €)</option>
                </select>
            </div>
            <div class="form-group">
                <label for="numOfPages" class="font-weight-bold">Number Of Pages<small style="color: red">*</small></label>
                <select multiple class="form-control" id="numOfPages" name="numOfPages" onchange="choice();">
                    <option value="50" >1-10 (50 €)</option>
                    <option value="100">10-20 (100 €)</option>
                    <option value="150">20-30 (150 €)</option>
                    <option value="250">30+ (250 €)</option>
                </select>
            </div>
            <div class="form-group">
                <label for="responsive" class="font-weight-bold">Responsive Design?<small style="color: red">*</small></label>
                <select multiple class="form-control" id="responsive" name="responsive" onchange="choice();">
                    <option value="50" >Yes (50 €)</option>
                    <option value="0">No (0 €)</option>
                </select>
            </div>
            <div class="form-group">
                <label for="dbIntegration" class="font-weight-bold">Database Integration. (Search engine, Simple CMS)<small style="color: red">*</small></label>
                <select multiple class="form-control" id="dbIntegration" name="dbIntegration" onchange="choice();">
                    <option value="250">Yes (250 €)</option>
                    <option value="0" >No (0 €)</option>
                </select>
            </div>
            <div>
                <p class="h4">Total <span class="h4" id = "total" style="color: #00A0E3"> </span> <span style="color: #00A0E3">€</span>
                    <p><small class="text-muted mark">Please fill all questions</small></p>
            </div>

            <div style="margin-top: 5%; margin-bottom: 5%;">
                    <label for="email">Send us your form. We will check it out and get back to you as soone as possible.</label>
                <div>
                    <input class="form-control col-md-6" type="email" placeholder="You email here"
                           id="email" name="email" aria-describedby="emailHelp" >
                    <input class="btn btn-secondary" type="submit" id="submit" style="margin-top: 1%;" value="SEND" name="submit">
                </div>
            </div>
        </div>
    </form>



    <script>
        function goBack() {
            window.history.back();
        }

        function choice() {
            var total = 0.0;
            document.getElementById("total").innerHTML = total;
            var technology = document.getElementById("technology");
            var techonologyValue = Number(technology.options[technology.selectedIndex].value);

            var numOfPages = document.getElementById("numOfPages");
            var numOfPagesValue = Number(numOfPages.options[numOfPages.selectedIndex].value);

            var responsive = document.getElementById("responsive");
            var responsiveValue = Number(responsive.options[responsive.selectedIndex].value);

            var dbIntegration = document.getElementById("dbIntegration");
            var dbIntegrationValue = Number(dbIntegration.options[dbIntegration.selectedIndex].value);
            total = techonologyValue + numOfPagesValue + responsiveValue + dbIntegrationValue;
            document.getElementById("total").innerHTML = total;
            // alert(total);
        }

        document.getElementById("total").innerHTML = 0;

    </script>
    <script src="js/calculatorJS.js"></script>
</body>
</html>
<?php
/**
 * Created by PhpStorm.
 * User: Alex
 * Date: 13.8.2019 г.
 * Time: 14:05
 */

if (isset($_POST["submit"]) ){
    if (isset($_POST["technology"]) &&
        isset($_POST["numOfPages"]) &&
        isset($_POST["responsive"]) &&
        isset($_POST["dbIntegration"]) ) {

        $technology = $_POST["technology"];
        $numOfPages = $_POST["numOfPages"];
        $responsive = $_POST["responsive"];
        $dbIntegretion = $_POST["dbIntegration"];
        $total = $technology + $numOfPages + $responsive + $dbIntegretion;
        echo "<p>$total</p>";
    }elseif(empty($technology) || empty($numOfPages)|| empty($responsive) || empty($dbIntegretion)){
        echo "<p>Please answer to all questions</p>";
    }
}
?>

