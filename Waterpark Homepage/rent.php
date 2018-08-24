<?php
session_start();
$jack = $_POST['jack'];
$tb = $_POST['tb'];

$conn = oci_connect("B589058","B589058","203.249.87.162:1521/orcl");

if(!$conn){
	echo "Orcale Connect Error";
	exit();
}


$stmt2 = oci_parse($conn, "update GOODS set STOCK = STOCK - ".$jack." where G_NUMBER in ('1')");
oci_execute($stmt2);
oci_commit($stmt2);
oci_free_statement($stmt2);



$stmt2 = oci_parse($conn, "update GOODS set STOCK = STOCK - ".$tb." where G_NUMBER in ('2')");
oci_execute($stmt2);
oci_commit($stmt2);
oci_free_statement($stmt2);


$jack = $_POST['jack'];
$tb = $_POST['tb'];
$id=$_SESSION[id];
$sum = $_POST["sum"];

$stmt3 = oci_parse($conn, "select p_number from P_USELIST where p_number = '$id'");
oci_execute($stmt3);
$num_rows = oci_fetch_all($stmt3, $rows, null, null, OCI_FETCHSTATEMENT_BY_ROW);

if((int)$num_rows == 0){


$stmt = oci_parse($conn, "insert into P_USELIST(P_NUMBER,G1,G2,cost) values ('$id','$jack','$tb','$sum')" );

oci_execute($stmt);
oci_commit($stmt);
oci_free_statement($stmt);
}




$stmt1 = oci_parse($conn, "select G1 from P_USELIST where P_NUMBER = '".$id."'");
oci_execute($stmt1);
$num_rows = oci_fetch_all($stmt1, $rows, null, null, OCI_FETCHSTATEMENT_BY_ROW);

if( $num_rows > 0 && (int)$rows[0][G1]) {

	$stmt = oci_parse($conn, "update P_USELIST set G1 = G1 + '".$jack."' where P_NUMBER = '".$id."'");
	oci_execute($stmt);
	oci_commit($stmt);
	echo (int)$rows[0][G1]."not null<br>";
} else {
	$stmt = oci_parse($conn, "update P_USELIST set G1 = '".$jack."' where P_NUMBER = '".$id."'");
	oci_execute($stmt);
	oci_commit($stmt);
	echo "null<br>";

}

$stmt1 = oci_parse($conn, "select G2 from P_USELIST where P_NUMBER = '".$id."'");
oci_execute($stmt1);
$num_rows = oci_fetch_all($stmt1, $rows, null, null, OCI_FETCHSTATEMENT_BY_ROW);

if( $num_rows > 0 && (int)$rows[0][G2]) {
	$stmt = oci_parse($conn, "update P_USELIST set G2 = G2 + '".$jack."' where P_NUMBER = '".$id."'");
	oci_execute($stmt);
	oci_commit($stmt);
	echo (int)$rows[0][G2]."not null<br>";
} else {
	$stmt = oci_parse($conn, "update P_USELIST set G2 = '".$jack."' where P_NUMBER = '".$id."'");
	oci_execute($stmt);
	oci_commit($stmt);
	echo "null<br>";
}

if((int)$num_rows != 0){
$stmt = oci_parse($conn, "update P_USELIST set cost = cost + '".$sum."' where P_NUMBER = '".$id."'");
oci_execute($stmt);
oci_commit($stmt);
oci_free_statement($stmt);
}

oci_close($conn);

?>
<script type="text/javascript">
	window.open('rent0.php', 'second');
</script>
