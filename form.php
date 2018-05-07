<?php
session_start();
$_SESSION['message'] = '';
$mysqli = new mysqli("sql.itcn.dk:3306", "chri762z.EADANIA", "S74s0NntR7", "chri762z2.eadania");

//Formen bliver sendt med POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
        
        //set alle post variables
        $navn = $mysqli->real_escape_string($_POST['navn']);
        $alder = $mysqli->real_escape_string($_POST['alder']);
        $race = $mysqli->real_escape_string($_POST['race']);
        $perstraek = $mysqli->real_escape_string($_POST['perstraek']);
        $yngl = $mysqli->real_escape_string($_POST['yngl']);
        $tricks = $mysqli->real_escape_string($_POST['tricks']);
        $boerst = $mysqli->real_escape_string($_POST['boerst']);
        $pleje = $mysqli->real_escape_string($_POST['pleje']);
        $snakke = $mysqli->real_escape_string($_POST['snakke']);
        $ynglaktiv = $mysqli->real_escape_string($_POST['ynglaktiv']);
        $billede_path = $mysqli->real_escape_string('images/'.$_FILES['billede']['navn']);
        
        //File type kan kun være billede formater.
        if (preg_match("!image!",$_FILES['billede']['type'])) {
            
            //Kopir billeder til images folder.
            if (copy($_FILES['billede']['tmp_name'], $billede_path)){
                
                //set session variables
                $_SESSION['navn'] = $navn;
                $_SESSION['billede'] = $billede_path;
                $_SESSION['alder'] = $alder;
                $_SESSION['race'] = $race;
                $_SESSION['perkstraek'] = $perkstraek;
                $_SESSION['yngl'] = $yngl;
                $_SESSION['tricks'] = $tricks;
                $_SESSION['boerst'] = $boerst;
                $_SESSION['pleje'] = $pleje;
                $_SESSION['snakke'] = $snakke;
                $_SESSION['ynglaktiv'] = $ynglaktiv;


                //Inset user data til vores database.
                $sql = "INSERT INTO users (navn, alder, race, perkstraek, yngl, tricks, boerst, pleje, snakke, ynglaktiv, billede) "
                        . "VALUES ('$navn', '$alder', '$race', '$perkstraek' '$yngl', '$tricks', '$boerst', '$pleje', '$snakke', '$ynglaktiv', '$billede_path',)";
                
                //Hvis queryen er success, send bruger videre til velkommen.php page, done!
                if ($mysqli->query($sql) === true){
                    $_SESSION['message'] = "Registrering succesfuld! $navn er nu i systemet!";
                    header("location: velkommen.php");
                }
                else {
                    $_SESSION['message'] = "Brugeren kunne ikke blive addet til databasen";
                }
                $mysqli->close();          
            }
        }
        else {
            $_SESSION['message'] = "Kun upload GIF, JPG eller PNG billeder";
        }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Kæleforum</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

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
</head>
<body>

	<div class="bg-container-contact100" style="background-image: url(images/dyreform2.png);">

	</div>

	<div class="container-contact100">
		<div class="wrap-contact100">
			<button class="btn-hide-contact100">
				<i class="zmdi zmdi-close"></i>
			</button>

			<div class="contact100-form-title" style="background-image: url(images/kaeleforum2.png);">
			</div>



			<form class="contact100-form validate-form" action="form.php" method="post" autocomplete="off">

				<p> Tilmeld dit kæledyr nedenunder! </p>

				<div class="wrap-input100 validate-input">
					<input id="navn" class="input100" type="text" name="navn" placeholder="Navn på dit kæledyr:">
					<span class="focus-input100"></span>
					<label class="label-input100" for="navn">
						<span class="lnr lnr-poop m-b-2"></span>
					</label>
				</div>

					<div class="wrap-input100 validate-input">
					<input id="alder" class="input100" type="text" name="alder" placeholder="Alder:">
					<span class="focus-input100"></span>
					<label class="label-input100" for="alder">
						<span class="lnr lnr-poop m-b-2"></span>
					</label>
				</div>

					<div class="wrap-input100 validate-input">
					<input id="race" class="input100" type="text" name="race" placeholder="Race:">
					<span class="focus-input100"></span>
					<label class="label-input100" for="race">
						<span class="lnr lnr-poop m-b-2"></span>
					</label>
				</div>

					<div class="wrap-input100 validate-input">
					<input id="perstraek" class="input100" type="text" name="perstraek" placeholder="Personlighedstræk:">
					<span class="focus-input100"></span>
					<label class="label-input100" for="perstraek">
						<span class="lnr lnr-poop m-b-2"></span>
					</label>
				</div>


				<div class="wrap-input100 validate-input">
					<input id="yngl" class="input100" type="text" name="yngl" placeholder="Yndlings legetøj:">
					<span class="focus-input100"></span>
					<label class="label-input100" for="yngl">
						<span class="lnr lnr-poop m-b-5"></span>
					</label>
				</div>


				<div class="wrap-input100 validate-input">
					<input id="tricks" class="input100" type="text" name="tricks" placeholder="Tricks?:">
					<span class="focus-input100"></span>
					<label class="label-input100" for="tricks">
						<span class="lnr lnr-poop m-b-2"></span>
					</label>
				</div>

				<div class="wrap-input100 validate-input">
					<input id="boerst" class="input100" type="text" name="boerst" placeholder="Børster du dit dyrs tænder?:">
					<span class="focus-input100"></span>
					<label class="label-input100" for="boerst">
						<span class="lnr lnr-poop m-b-2"></span>
					</label>
				</div>

				<div class="wrap-input100 validate-input">
					<textarea id="pleje" class="input100" name="pleje" placeholder="Har du noget pleje i forbindelse med dit kæledyr?:"></textarea>
					<span class="focus-input100"></span>
					<label class="label-input100 rs1" for="pleje">
						<span class="lnr lnr-poop"></span>
					</label>
				</div>


				<div class="wrap-input100 validate-input">
					<textarea id="snakke" class="input100" name="snakke" placeholder="Hvis dit dyr kunne snakke, hvad ville det så sige?:"></textarea>
					<span class="focus-input100"></span>
					<label class="label-input100 rs1" for="snakke">
						<span class="lnr lnr-poop"></span>
					</label>
				</div>

				<div class="wrap-input100 validate-input">
					<textarea id="ynglaktiv" class="input100" name="ynglaktiv" placeholder="Hvad er din yndlings aktivitet at lave med dit dyr?:"></textarea>
					<span class="focus-input100"></span>
					<label class="label-input100 rs1" for="ynglaktiv">
						<span class="lnr lnr-poop"></span>
					</label>
				</div>

				<div class="wrap-input100 validate-input">

				    <div class="panel-heading clearfix">
				        <h3 class="panel-title pull-left">Upload billede</h3>
				        <div class="btn-group pull-right">
				          
				        </div>
				    </div>
				    <div class="file-tab panel-body">
				        <label class="btn btn-default btn-file">
				            <span>Gennemse</span>

				            <!-- Filen gemmes her -->
				            <input type="file" name="image-file">
				        </label>
				
				    </div>
				    <div class="url-tab panel-body">
				        <div class="input-group">
				            <input type="text" class="form-control" placeholder="Image URL" name="billede">
				            <div class="input-group-btn">
				                <button type="button" class="btn btn-default">Accepter</button>
				            </div>
				        </div>
				        <button type="button" class="btn btn-default">Fjern</button>

				        <!-- URL gemmes her -->

				        <input type="hidden" name="image-url" name="billede">
				    </div>
				</div>
						<!-- Tilmeld BTN -->

				<div class="container-contact100-form-btn">
					<button class="contact100-form-btn">
						Tilmeld
					</button>
				</div>
			</form>
		</div>
	</div>



<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>
	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
	<script>
	  window.dataLayer = window.dataLayer || [];
	  function gtag(){dataLayer.push(arguments);}
	  gtag('js', new Date());

	  gtag('config', 'UA-23581568-13');
	</script>
</body>
</html>
