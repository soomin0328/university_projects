<?php
$num_d=$_POST['Cus_num_d'];
$pass_d=$_POST['Cus_pass_d'];

$conn = oci_connect("B589058","B589058","203.249.87.162:1521/orcl");

if(!$conn){
	echo "Orcale Connect Error";
	exit();
}

$stmt = oci_parse($conn, "delete from r_reserver where P_NUMBER = '$num_d'");
oci_execute($stmt);
oci_commit($stmt);

oci_free_statement($stmt);
oci_close($conn);
?>
<?php
$num_d=$_POST['Cus_num_d'];
$pass_d=$_POST['Cus_pass_d'];

$conn = oci_connect("B589058","B589058","203.249.87.162:1521/orcl");

if(!$conn){
	echo "Orcale Connect Error";
	exit();
}

$stmt = oci_parse($conn, "delete from C_ENPEO where P_NUMBER = '$num_d' and PASSWORD = '$pass_d'");
oci_execute($stmt);
oci_commit($stmt);

$stmt = oci_parse($conn, "delete from p_uselist where P_NUMBER = '$num_d'");
oci_execute($stmt);
oci_commit($stmt);

$stmt = oci_parse($conn, "delete from locker where P_NUMBER = '$num_d'");
oci_execute($stmt);
oci_commit($stmt);

oci_free_statement($stmt);
oci_close($conn);
?>

<script>
	window.open('out0.php', 'second');
</script>