

<!DOCTYPE HTML>
<!DOCTYPE html>
<html>
<head>
	<title>Hongik Water Park</title>
	<style>
	body {
		font-family: "Comic Sans MS"
	}
	table,td,th{
		border:1px solid pink;
	}

	th{
		background-color:pink;
		color:white;
	}
	body {
		margin: 0;
	}
	ul {
		list-style: none;
		margin: 10;
		padding : 10;
		overflow: hidden;
		background-color: white;
		font-family: "Comic Sans MS";
	}
	li {
		float : left;
	}
	li a {
		display: block;
		color: #000093;
		text-align: center;
		padding: 12px 35px;
		text-decoration: none;
		font-size: 14pt;
	}
	a:hover:not(.active) {
		color:#2478FF;
	}
	.active {
		border: 1px solid #2478FF;
		background-color: #2478FF;
		border-radius: 30px;
		color: white;	
		font-size: 1.95em;
		font-family: "Comic Sans MS";
	}
	.choice {
		border: 1px solid #2478FF;
		border-radius: 30px;
		color: #2478FF;
		font-size: 1em;
		font-family: "Comic Sans MS"
	}
	.layer{
		width: 500px;
		margin: 0 auto;
		border: 1px solid white;
	}
</style>
</head>
<body>
	<ul>
		<li><a class="active" href="http://cic.hongik.ac.kr/b_team/b_team7/"><b>Hongik Water Park</b></a></li>
		<li><a href="http://cic.hongik.ac.kr/b_team/b_team7/">Home</a></li>
		<li><a class = "choice" href="http://cic.hongik.ac.kr/b_team/b_team7/info.php">Info.</a></li>
		<li><a href="http://cic.hongik.ac.kr/b_team/b_team7/login0.php">Enroll</a></li>
		<li><a href="http://cic.hongik.ac.kr/b_team/b_team7/out0.php">Delete</a></li>
		<li><a href="http://cic.hongik.ac.kr/b_team/b_team7/reserve0.php">Reserve</a></li>
		<li><a href="http://cic.hongik.ac.kr/b_team/b_team7/rent0.php">Rent</a></li>
		<li><a href="http://cic.hongik.ac.kr/b_team/b_team7/food0.php">Food</a></li>
		<li><a href="http://cic.hongik.ac.kr/b_team/b_team7/locker0.php">Locker</a></li>
	</ul>
</br>
<div style="margin-left:auto;margin-right: auto;text-align: center;">
	<h2><b>Customer's information</b></h2>

	<?php
	session_start();
	$_SESSION[id];
	$_SESSION[pass];

	$conn = oci_connect("B589058","B589058","203.249.87.162:1521/orcl");

	if(!$conn){
		echo "Oricale Connect Error";
		exit();
	}

	echo "<h2>Now login id: $_SESSION[id]</h2>";

	$c_number = $_SESSION["id"];

	$stmt  = oci_parse($conn, "select P_NUMBER,NAME,SEX,ENDTIME from C_ENPEO where P_NUMBER = '$c_number'");
	oci_execute($stmt);

	$num_rows = oci_fetch_all($stmt, $rows, null, null, OCI_FETCHSTATEMENT_BY_ROW);
	?>

	<table style="margin-left:auto;margin-right: auto;text-align: center;">
		<tr>
			<th>P_NUMBER</th>
			<th>NAME</th>
			<th>SEX</th>
			<th>ENDTIME</th>
		</tr>
		<?
		foreach($rows as $row){
			echo "<tr>";
			echo "<td>".$row[P_NUMBER]."</td>";
			echo "<td>".$row[NAME]."</td>";
			echo "<td>".$row[SEX]."</td>";
			echo "<td>".$row[ENDTIME]."</td>";
			echo "</tr>";
		}
		?>
	</table><br/><br/>
<!-- 
	<?php
	echo "<td>".$row[P_NUMBER]."</td>";
	?> -->

	<br>
	<h2 style="text-align: center; font-size: 25px; "><b>Reservation information of rides<b></h2>
		<?php
		$c_number = $_SESSION["id"];

		$stmt  = oci_parse($conn, "select P_NUMBER,R_NUMBER,TIME,SEAT from R_RESERVER where P_NUMBER='$c_number'");
		oci_execute($stmt);

		$num_rows = oci_fetch_all($stmt, $rows, null, null, OCI_FETCHSTATEMENT_BY_ROW);
		?>
		<table style="margin-left:auto;margin-right: auto;text-align: center;">
			<tr>
				<th>P_NUMBER</th>
				<th>R_NUMBER</th>
				<th>TIME</th>
				<th>SEAT</th>

			</tr>
			<?
			foreach($rows as $row){
				echo "<tr>";
				echo "<td>".$row[P_NUMBER]."</td>";
				echo "<td>".$row[R_NUMBER]."</td>";
				echo "<td>".$row[TIME]."</td>";
				echo "<td>".$row[SEAT]."</td>";
				echo "</tr>";
			}
			?>
		</table><br/><br/>
<h2 style="text-align: center; font-size: 25px; "><b>Locker information<b></h2>
			<?php
		$c_number = $_SESSION["id"];
 
		$stmt  = oci_parse($conn, "select L_NUMBER , LOCATION FROM LOCKER where P_NUMBER='$c_number'");
		oci_execute($stmt);

		$num_rows = oci_fetch_all($stmt, $rows, null, null, OCI_FETCHSTATEMENT_BY_ROW);
		?>
		<table style="margin-left:auto;margin-right: auto;text-align: center;">
			<tr>
				<th>LOCKER_NUMBER</th>
				<th>LOCATION</th>
			</tr>
			<?
			foreach($rows as $row){
				echo "<tr>";
					echo "<td>".$row[L_NUMBER]."</td>";
					echo "<td>".$row[LOCATION]."</td>";
				echo "</tr>";
			}
			?>

		</table><br/><br/>

		<h2 style="text-align: center; font-size: 25px; "><b>USE_LIST information<b></h2>
			<?php
		$c_number = $_SESSION["id"];
 
		$stmt  = oci_parse($conn, "select M1,M2,M3,G1,G2,COST FROM P_USELIST where P_NUMBER='$c_number'");
		oci_execute($stmt);

		$num_rows = oci_fetch_all($stmt, $rows, null, null, OCI_FETCHSTATEMENT_BY_ROW);
		?>
		<table style="margin-left:auto;margin-right: auto;text-align: center;">
			<tr>
				<th>Pizza Count</th>
				<th>Chicken Count</th>
				<th>Churus Count</th>
				<th>Life_Jacket Count</th>
				<th>Tube Count</th>
				<th>Total Cost</th>
			</tr>
			<?
			foreach($rows as $row){
				echo "<tr>";
					echo "<td>".$row[M1]."</td>";
					echo "<td>".$row[M2]."</td>";
					echo "<td>".$row[M3]."</td>";
					echo "<td>".$row[G1]."</td>";
					echo "<td>".$row[G2]."</td>";
					echo "<td>".$row[COST]."</td>";
				echo "</tr>";
			}
			?>

		</table><br/><br/>

		<div class="layer">
		</br>
		<div style="text-align: center;">
			<INPUT TYPE="submit" VALUE="back" onclick="location.href='info0.php'">
		</div>
	</form>
	<br>
	<form action="logout.php">
		<INPUT TYPE="submit" VALUE="logout"/>
	</form>
	<br><br><br>
</div>
<?
oci_free_statement($veri);
oci_free_statement($stmt);
oci_close($conn); ?>
</body>
</html>