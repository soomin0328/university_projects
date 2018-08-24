<!DOCTYPE html>
<html>
<head>
	<title>Hongik Water Park</title>
	<script type="text/javascript">


		function cal()
		{
		 var plus1=document.getElementById('jack').value;
         var plus2=document.getElementById('tb').value;
         var sum;
         
         sum =2000 * parseInt(plus1)+3000 * parseInt(plus2);
         document.getElementById('sum').value = sum;

		}

	</script>
	<style>
	body{
		text-align: center;
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
	img {
		width: 100%;
		height: 100%;
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
		<li><a href="http://cic.hongik.ac.kr/b_team/b_team7/info0.php">Info.</a></li>
		<li><a href="http://cic.hongik.ac.kr/b_team/b_team7/login0.php">Enroll</a></li>
		<li><a href="http://cic.hongik.ac.kr/b_team/b_team7/out0.php">Delete</a></li>
		<li><a href="http://cic.hongik.ac.kr/b_team/b_team7/reserve0.php">Reserve</a></li>
		<li><a class="choice" href="http://cic.hongik.ac.kr/b_team/b_team7/rent0.php">Rent</a></li>
		<li><a href="http://cic.hongik.ac.kr/b_team/b_team7/food0.php">Food</a></li>
		<li><a href="http://cic.hongik.ac.kr/b_team/b_team7/locker0.php">Locker</a></li>
	</ul>
</br>
</br>
<div style="margin-left:auto;margin-right: auto;text-align: center; ">
	<?php
	$conn = oci_connect("B589058","B589058","203.249.87.162:1521/orcl");

	if(!$conn){
		echo "Oricale Connect Error";
		exit();
	}
	?>

	<?php
	session_start();
	$_SESSION[id];
	$_SESSION[pass];
	echo "<h2>Now login id: $_SESSION[id]</h2>";
	?>
	
		<form action="rent.php" method="post">
			
		<br><br>
		<?
		$stmt  = oci_parse($conn, "select * from goods order by g_number asc");
		oci_execute($stmt);

		$num_rows = oci_fetch_all($stmt, $rows, null, null, OCI_FETCHSTATEMENT_BY_ROW);
		$t1 = $rows[0][STOCK];
		$t2 = $rows[1][STOCK];
		?>

		<table style="margin-left:auto;margin-right: auto;text-align: center;">
			<tr>	
				<th>Number</th>
				<th>Kind</th>	
				<th>Rent fee</th>
				<th>Stock</th>

			</tr>
			<?
			foreach($rows as $row){
				echo "<tr>";		
				echo "<td>".$row[G_NUMBER]."</td>";
				echo "<td>".$row[KIND]."</td>";
				echo "<td>".$row[REND_FEE]."</td>";
				echo "<td>".$row[STOCK]."</td>";
		
				echo "</tr>";
			}
			?>
		</table><br/><br/>
		life_jacket stock : <INPUT TYPE='text' id = 'jack' name='jack'> <br/>
		Tube stock : <INPUT TYPE='text' id = 'tb' name='tb'> <br/>
	</br><br>


	<input type="button" value="show fee" onclick="cal()">

	Cost : <input type='text' id="sum" name="sum"><br/>

	<br/>
	<INPUT TYPE="submit" VALUE="RENT" onclick="location.href='rent.php'">
</form>

<form action="logout.php">
	<INPUT TYPE="submit" VALUE="logout"/>
</form>
<br/>


<?
oci_free_statement($veri);
oci_free_statement($stmt);
oci_close($conn); ?>

</div>
</html>
