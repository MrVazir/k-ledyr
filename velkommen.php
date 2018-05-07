<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="images/icons/ben
	.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->

<?php session_start(); ?>
<div class="body content">
    <div class="welcome">
        <div class="alert alert-success"><?= $_SESSION['message'] ?></div>
        <img src="<?= $_SESSION['billede'] ?>"><br />
        Velkommen <span class="user"><?= $_SESSION['navn'] ?></span>
        <?php
        $mysqli = new mysqli("", "", "", "");
        $sql = "SELECT navn, alder, race, perkstraek, yngl, tricks, boerst, pleje, snakke, ynglaktiv, billede FROM users";
        $result = $mysqli->query($sql);
        ?>
        <div id='registered'>
        <span>Alle kæledyr:</span>
        <?php
        while($row = $result->fetch_assoc()){

            echo "<div class='userlist'><span>$row[navn]</span><br />";
            echo "<img src='$row[billede]'></div>";
        }
        ?>  
        </div>
    </div>
</div>