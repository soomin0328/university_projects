

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
	<br><br><br>
	<div style="margin-left:auto;margin-right: auto;text-align: center;">
		<?php
		$conn = oci_connect("B589058","B589058","203.249.87.162:1521/orcl");

		if(!$conn){
			echo "Oricale Connect Error";
			exit();
		}
		?>
		<h1><b>Will show you your Information.</b></h2>
			<h2><b>Please enter your Custom number & Password</b></h2>
			<br><br>

			<table style="margin-left:auto;margin-right: auto;text-align: center;">
				<tr>
					<th>Custom_number</th>
					<th>Password</th>

				</tr>

				<form action="info0.php" method="post">
					<tr>
						<td>
							<INPUT TYPE="text" NAME="id">

						</td>
						<td>
							<INPUT TYPE="password" NAME="pass">
						</td>
					</tr>
				</table>
				<div class="layer">
				</br>
				<INPUT TYPE="submit" VALUE="LOGIN">
			</form>
			<form action="logout.php">
				<INPUT TYPE="submit" VALUE="logout"/>
			</form><br>

			<?php
			session_start();
			$id = $_POST[id];
			$pass = $_POST[pass];
			$veri  = oci_parse($conn, "select password from c_enpeo where p_number = '$id'");
			oci_execute($veri);
			$num_rows = oci_fetch_all($veri, $rows, null, null, OCI_FETCHSTATEMENT_BY_ROW);

			if(!isset($_SESSION[id])) {

				echo "current state : not login";

			} else{
				echo "Now already login state!!";
			}
			if($num_rows < 1){
				echo "<p> There is not custom number </p>";
			} else {

				$veri_pass = $rows[0][PASSWORD];
				$str = strcmp($veri_pass, $pass);

				if($str > 0 && $pass > 0) {

					echo "<script>alert('로그인 성공.');
					location.href='info1.php'</script>";
					$_SESSION[id] = $id;
					$_SESSION[pass] = $pass;

				} else if($str < 0) {
					echo "<p>wrong password</p>";
				}
			}
			?>

			<?php
			oci_free_statement($veri);
			oci_free_statement($stmt);
			oci_close($conn); ?>

		</div>
	</body>
	</html>