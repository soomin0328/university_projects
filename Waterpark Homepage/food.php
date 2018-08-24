 <?php
session_start();
$id=$_SESSION[id];
$piz = $_POST["piz"];
$ck = $_POST["ck"];
$chu = $_POST["chu"];
$sum = $_POST["sum"];

$conn = oci_connect("B589058","B589058","203.249.87.162:1521/orcl");

if(!$conn){
	echo "Orcale Connect Error";
	exit();
}

$stmt3 = oci_parse($conn, "select p_number from P_USELIST where p_number = '$id'");
oci_execute($stmt3);
$num_rows = oci_fetch_all($stmt3, $rows, null, null, OCI_FETCHSTATEMENT_BY_ROW);

if((int)$num_rows == 0){
$stmt = oci_parse($conn, "insert into P_USELIST(P_NUMBER,M1,M2,M3,cost) values ('$id','$piz','$ck','$chu','$sum')");
oci_execute($stmt);
oci_free_statement($stmt);
}






$stmt1 = oci_parse($conn, "select M1 from P_USELIST where P_NUMBER = '".$id."' ");
oci_execute($stmt1);
$num_rows = oci_fetch_all($stmt1, $rows, null, null, OCI_FETCHSTATEMENT_BY_ROW);


if( $num_rows > 0 && (int)$rows[0][M1]) {

	$stmt = oci_parse($conn, "update P_USELIST set M1 = M1 + '".$piz."' where P_NUMBER = '".$id."'");
	oci_execute($stmt);
	oci_commit($stmt);
	echo (int)$rows[0][M1]."not null<br>";
} else {
	$stmt = oci_parse($conn, "update P_USELIST set M1 = '".$piz."' where P_NUMBER = '".$id."'");
	oci_execute($stmt);
	oci_commit($stmt);
	echo "null<br>";

}




$stmt1 = oci_parse($conn, "select M2 from P_USELIST where P_NUMBER = '".$id."' ");
oci_execute($stmt1);
$num_rows = oci_fetch_all($stmt1, $rows, null, null, OCI_FETCHSTATEMENT_BY_ROW);


if( $num_rows > 0 && (int)$rows[0][M2]) {

	$stmt = oci_parse($conn, "update P_USELIST set M2 = M2 + '".$ck."' where P_NUMBER = '".$id."'");
	oci_execute($stmt);
	oci_commit($stmt);
	echo (int)$rows[0][G1]."not null<br>";
} else {
	$stmt = oci_parse($conn, "update P_USELIST set M2 = '".$ck."' where P_NUMBER = '".$id."'");
	oci_execute($stmt);
	oci_commit($stmt);
	echo "null<br>";

}





$stmt1 = oci_parse($conn, "select M3 from P_USELIST where P_NUMBER = '".$id."' ");
oci_execute($stmt1);
$num_rows = oci_fetch_all($stmt1, $rows, null, null, OCI_FETCHSTATEMENT_BY_ROW);


if( $num_rows > 0 && (int)$rows[0][M3]) {

	$stmt = oci_parse($conn, "update P_USELIST set M3 = M3 + '".$chu."' where P_NUMBER = '".$id."'");
	oci_execute($stmt);
	oci_commit($stmt);
	echo (int)$rows[0][M3]."not null<br>";
} else {
	$stmt = oci_parse($conn, "update P_USELIST set M3 = '".$chu."' where P_NUMBER = '".$id."'");
	oci_execute($stmt);
	oci_commit($stmt);
	echo "null<br>";

}




if((int)$num_rows != 0){
	$stmt = oci_parse($conn, "update P_USELIST set cost= cost +'".$sum."' where P_NUMBER='".$id."'");

	oci_execute($stmt);
	oci_commit($stmt);

	oci_free_statement($stmt);
}


oci_close($conn);

?>

<script type="text/javascript">
window.open('food0.php', 'second');
</script>