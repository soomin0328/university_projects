<?php
echo "<script>alert('접속중입니다.')</script>";
$conn = oci_connect("B589058","B589058","203.249.87.162:1521/orcl");
if(!$conn){
   echo "Oricale Connect Error";
   exit();
}

$stmt = oci_parse($conn, "insert into R_RESERVE (TIME,R_NUMBER) values ('10:00', 'Ride1')");
oci_execute($stmt);
oci_commit($stmt);

$stmt = oci_parse($conn, "insert into R_RESERVE (TIME,R_NUMBER) values ('11:00', 'Ride1')");
oci_execute($stmt);
oci_commit($stmt);

$stmt = oci_parse($conn, "insert into R_RESERVE (TIME,R_NUMBER) values ('13:00', 'Ride1')");
oci_execute($stmt);
oci_commit($stmt);

$stmt = oci_parse($conn, "insert into R_RESERVE (TIME,R_NUMBER) values ('10:00', 'Ride2')");
oci_execute($stmt);
oci_commit($stmt);

$stmt = oci_parse($conn, "insert into R_RESERVE (TIME,R_NUMBER) values ('11:00', 'Ride2')");
oci_execute($stmt);
oci_commit($stmt);

$stmt = oci_parse($conn, "insert into R_RESERVE (TIME,R_NUMBER) values ('13:00', 'Ride2')");
oci_execute($stmt);
oci_commit($stmt);

$stmt = oci_parse($conn, "insert into R_RESERVE (TIME,R_NUMBER) values ('10:00', 'Ride3')");
oci_execute($stmt);
oci_commit($stmt);

$stmt = oci_parse($conn, "insert into R_RESERVE (TIME,R_NUMBER) values ('11:00', 'Ride3')");
oci_execute($stmt);
oci_commit($stmt);

$stmt = oci_parse($conn, "insert into R_RESERVE (TIME,R_NUMBER) values ('13:00', 'Ride3')");
oci_execute($stmt);
oci_commit($stmt);

session_start();
$id=$_SESSION[id];
$time=(string)$_POST['group2'];
$r_number=(string)$_POST['group1'];
$seat = (string)$_POST['seat'];

/*
$conn = oci_connect("B589058","B589058","203.249.87.162:1521/orcl");

if(!$conn){
   echo "Oricale Connect Error";
   exit();
}
*/

$stmt0 = oci_parse($conn, "select $seat from r_reserve where time = '$time' and r_number='$r_number'");
oci_execute($stmt0);
$num_rows = oci_fetch_all($stmt0, $rows, null, null, OCI_FETCHSTATEMENT_BY_ROW);

//echo "<script>alert(' !!!!좌석이 이미 있습니다.');location.href='reserve0.php'</script>";
echo "seat = ".(string)$seat."<br>";
echo "ddddddd = ".(int)$rows[0][$seat];

	if((int)$rows[0][$seat] == $id )
		echo "<script>alert('본인 좌석 입니다.');location.href='reserve0.php'</script>";
	else if((int)$rows[0][$seat]){
		echo "<script>alert('예약된 좌석 입니다.');location.href='reserve0.php'</script>";
	}
 	else {
		
		$stmt = oci_parse($conn, "update R_RESERVE set $seat = '$id' where time = '$time' and r_number = '$r_number'");
		oci_execute($stmt);
		oci_commit($stmt);

		$stmt3 = oci_parse($conn,"insert into R_RESERVER(P_NUMBER,R_NUMBER,TIME,seat) values ('$id','$r_number','$time','$seat')");
		oci_execute($stmt3);
 		oci_commit($stmt3);

 		oci_free_statement($stmt);
		oci_free_statement($stmt0);
		echo "<script>alert('좌석이 예약 되었습니다.');location.href='reserve0.php'</script>";
	
	}
	/*;location.href='reserve0.php'*/
?>


<?
/*
php
$getPN2=$_POST['a'];

#R_RESERVE 테이블에 있는 R_NUMBER와 TIME값을 받아옴.
$stmt = oci_parse($conn, "select R_NUMBER,TIME from R_RESERVE where time = '$time' and r_number = '$r_number'");
oci_execute($stmt);
$num_rows = oci_fetch_all($stmt, $rows, null, null, OCI_FETCHSTATEMENT_BY_ROW);

$t1 = $rows[$num_rows-1][R_NUMBER]; #새로 입력받은 R_NUMBER값
$t2 = $rows[$num_rows-1][TIME]; #새로 입력받은 TIME값

#$getPN2는 TABLE에서 입력한 회원번호, $t1은 R_NUMBER, $t2는 TIME
$stmt3 = oci_parse($conn,"insert into R_RESERVER(P_NUMBER,R_NUMBER,TIME) values ('$id','$t1','$t2')");
oci_execute($stmt3);
oci_commit($stmt3);
*/
oci_free_statement($stmt);
oci_free_statement($stmt3);
oci_close($conn);

?>

<?/*
<script>
window.open('reserve0.php', 'second');
   window.close('reserve.php','default');
   
</script>*/
?>
