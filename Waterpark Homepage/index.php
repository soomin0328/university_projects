<!DOCTYPE html>
<html>
<head>
	<title>Hongik Water Park</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="initial-scale=1.0">
	<style>
	body {
		margin: 0 0;
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
	img {
		width: 100%;
		height: 500px;
	}

</style>
<script src = "http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<script src = "http://malsup.github.com/jquery.cycle2.js"></script>
</head>
<body>
	<ul>
		<li><a class="active" href="http://cic.hongik.ac.kr/b_team/b_team7/"><b>Hongik Water Park</b></a></li>
		<li><a href="http://cic.hongik.ac.kr/b_team/b_team7/">Home</a></li>
		<li><a href="http://cic.hongik.ac.kr/b_team/b_team7/info0.php">Info.</a></li>
		<li><a href="http://cic.hongik.ac.kr/b_team/b_team7/login0.php">Enroll</a></li>
		<li><a href="http://cic.hongik.ac.kr/b_team/b_team7/out0.php">Delete</a></li>
		<li><a href="http://cic.hongik.ac.kr/b_team/b_team7/reserve0.php">Reserve</a></li>
		<li><a href="http://cic.hongik.ac.kr/b_team/b_team7/rent0.php">Rent</a></li>
		<li><a href="http://cic.hongik.ac.kr/b_team/b_team7/food0.php">Food</a></li>
		<li><a href="http://cic.hongik.ac.kr/b_team/b_team7/locker0.php">Locker</a></li>
	</ul>
	
	<div class="cycle-slideshow"  data-cycle-timeout=1500>
		<img src="3.jpg" />
		<img src="5.jpg" />
		<img src="2.jpg" />
		<img src="4.jpg" />
	</div>
</br>
<footer style="font-family: Comic Sans MS; font-size: 16px; margin: 20px 0px 30px 90px;">
	<b style="font-size: 19px;">★Connect here</br></b>
&nbsp&nbsp&nbsp&nbsp Phone: 010-1234-5678</br>
&nbsp&nbsp&nbsp&nbsp Address: Sejong city, Korea.</br>
&nbsp&nbsp&nbsp&nbsp E-mail: ssminkk0328@gmail.com
</footer>

</body>
</html>


