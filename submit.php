<html>
	<head>
		<title>TurkicTexts Submit</title>
		
		<meta name="viewport" content="width=device-width, initial-scale=1">
		
		<link rel="stylesheet" href="styles.css">

		<style>
			body {background-color: #800000;}
		</style>

	</head>

	<body>

		<header>
			<h2><a style="text-decoration: none; color: inherit;" href="http://35.183.124.116/index.html">Interactive Turkic Texts Database</a></h2>
		</header>

		<section>
			<nav>
				<ul>
					<li><a href="http://35.183.124.116/explore.php">Explore texts</a><br/><br/>
					<li><a href="http://35.183.124.116/submit.php">Submit new texts</a>
				</ul>
			</nav>

			<article>
				<h1>Data Submission</h1>

				<p>

					<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
						Name: <input type="text" name="name" />
						<input type="submit" name="namesubmit" value="Submit"><br/>
						Message: <input type="text" name="message" />
						<input type="submit" name="messagesubmit" value="Submit"><br/>
					</form>

				<?php

				$servername  = "localhost";
				$username = "admin";
				$password = "TurkicTexts";
				$database = "TurkicTexts";

				$mysqli = new mysqli($servername, $username, $password, $database);

				if ($mysqli === false) {
					die ("Connection failed: " . $mysqli->connect_error);
				}

				if ($_SERVER['REQUEST_METHOD'] === 'POST') {
					if (isset($_POST['namesubmit']))  {
						$name = $mysqli->real_escape_string($_REQUEST["name"]);
						$message = $mysqli->real_escape_string($_REQUEST["message"]);
						$sql = "INSERT INTO testtwo (`name`, `message`) VALUES ('$name', '$message')";

						if ($mysqli->query($sql) === true){
							echo "Record inserted successfully. Thank you for your contribution, please contribute again!";
						} else {
							echo "ERROR: Could not execute $sql. " . $mysqli->error;
						}
					} else {
						//
					}
				}

				$mysqli->close();
				 
				?>

			</article>

		</section>

		<footer>
			<p>Thank you!</p>
		</footer>

	</body>

</html>

