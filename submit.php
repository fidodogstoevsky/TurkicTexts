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
				<h2>Data Submission</h2>

				<h1>How to submit data:</h1>

				<p>Fill in the fields for your chosen submission type (artifact, token, source, etc). NOTE: if for example you wish to submit both an artifact and a token, you must make each submission individually. Once you click the submit button only the fields that correspond to that button will be submitted and any other data will not be saved. </p>

				<h1>Contribute an artifact:</h1>

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

				<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
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

		</article>
		</section>


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
					if (isset($_POST['artifactsubmit']))  {

						$label = $mysqli->real_escape_string($_REQUEST["label"]);
						$language = $mysqli->real_escape_string($_REQUEST["language"]);
						$script = $mysqli->real_escape_string($_REQUEST["script"]);
						$origin_date = $mysqli->real_escape_string($_REQUEST["origin_date"]);
						$origin_location = $mysqli->real_escape_string($_REQUEST["origin_location"]);
						$material = $mysqli->real_escape_string($_REQUEST["material"]);
						$dimensions = $mysqli->real_escape_string($_REQUEST["dimensions"]);
						$discovery_location = $mysqli->real_escape_string($_REQUEST["discovery_location"]);
						$discovery_date = $mysqli->real_escape_string($_REQUEST["discovery_date"]);
						$current_location = $mysqli->real_escape_string($_REQUEST["current_location"]);
						
						$sql = "INSERT INTO artifacts (`label`, `language`, `script`, `origin_date`, `origin_location`, `material`, `dimensions`, `discovery_location`, `discovery_date`, `current_location`) VALUES ('$label', '$language', '$script', '$origin_date', '$origin_location', '$material', '$dimensions', '$discovery_location', '$discovery_date', '$current_location')";

						if ($mysqli->query($sql) === true){
							echo "Record inserted successfully. Thank you for your contribution, please contribute again!";
						} else {
							echo "ERROR: Could not execute $sql. " . $mysqli->error;
						}
					} elseif (isset($_POST['testsubmit'])) {
						$test = $mysqli->real_escape_string($_REQUEST["test"]);
						$sql = "INSERT INTO test (`name`) VALUES ('$test')";
						
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


		<footer>
			<p>Thank you!</p>
		</footer>

	</body>

</html>

