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

				<h2>Contribute an artifact:</h2>

				<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">


					Name: <input type="text" name="name"></br>
					Message: <input type="text" name="message"></br>
					<input type="submit" name="submit" value="Submit"></br>
				<form>

				<!--

				<p>

				<table>
				
				<tr>
				<th>Label</th>
				<th>Language</th>
				<th>Script</th>
				<th>Origin Date</th>
				<th>Origin Location</th>
				<th>Material</th>
				<th>Dimensions</th>
				<th>Discovery Location</th>
				<th>Discovery Date</th>
				<th>Current Location</th>
				<th>Submit</th>
				</tr>
				<tr>

				<form method="post" action=php goes here>
				<table>
							<td>
						<input type="text" name="label" size="4"  /><br/>
					</td>
					<td>
						<input type="text" name="language" size="4" /><br/>
					</td>
					<td>
						<input type="text" name="script" size="4"  /><br/>
					</td>
					<td>
						<input type="text" name="origin_date" size="4" /><br/>
					</td>
					<td>	
						<input type="text" name="origin_location" size="4" /><br/>
					</td>
					<td>
						<input type="text" name="material" size="4" /><br/>
					</td>
					<td>
						<input type="text" name="dimensions" size="4" /><br/>
					</td>
					<td>
						<input type="text" name="discovery_location" size="4" /><br/>
					</td>
					<td>
						<input type="text" name="discovery_date" size="4" /><br/>
					</td>
					<td>
						<input type="text" name="current_location" size="4" /><br/>
					</td>
					<td>
						<input type="submit" name="artifactsubmit" value="Submit">
					</td>
				</form>
			</tr>

					</p>
				-->
		


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
					if (isset($_POST['submit']))  {
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

