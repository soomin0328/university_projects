<?php
	$start=$_POST['startHost'];
	$end=$_POST['endHost'];

	$connect=mysql_connect("localhost","root","qsefthuko01");
	mysql_select_db("mnv", $connect);
	mysql_query("set names utf8", $connect);
	$sqlrec="insert into hosts values('$name','$start','$end')";
	$info=mysql_query($sqlrec, $connect);
?>
<script>window.open('msy.html');</script>
