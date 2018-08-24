<?php
session_start();
$seat = $_POST["seat"];
$c_number = $_SESSION["id"];


$conn = oci_connect("B589058","B589058","203.249.87.162:1521/orcl");

if(!$conn){
	echo "Oricale Connect Error";
	exit();
}

if($seat>0&&$seat<51){
	$local="inside";
}else if($seat>50){
	$local ="outside";
}

$stmt0 = oci_parse($conn, "select L_NUMBER from locker");
oci_execute($stmt0);
$num_rows = oci_fetch_all($stmt0, $rows, null, null, OCI_FETCHSTATEMENT_BY_ROW);
if($num_rows > 0) {
	for ($i =0 ; $i < $num_rows ; $i++)
	{
		//echo "<script>alert('".(int)$rows[$i][L_NUMBER].",,,,$seat')</script>";
		if ((int)$rows[$i][L_NUMBER] == $seat)
			echo "<script>alert('!!!!이미 있는 좌석 입니다..');
    		location.href='locker0.php'</script>";
	}
}

$stmt = oci_parse($conn, "insert into LOCKER(L_NUMBER,P_NUMBER,USE,LOCATION) values ('$seat','$c_number','1','$local')");
oci_execute($stmt);
$success = oci_commit($stmt);



echo "<script>alert('좌석 선택 완료.');
location.href='locker0.php'</script>";



oci_free_statement($stmt);
oci_close($conn);
?>
<script>
	window.open('locker0.php', 'default');
</script>