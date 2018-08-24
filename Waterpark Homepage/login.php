
<?php
$num=$_POST['Cus_num'];
$name=$_POST['Cus_name'];
$sex=$_POST['Cus_sex'];
$end=$_POST['Cus_end'];
$pass=$_POST['Cus_pass'];

$conn = oci_connect("B589058","B589058","203.249.87.162:1521/orcl");

if(!$conn){
	echo "Oricale Connect Error";
	exit();
}

$stmt = oci_parse($conn, "insert into C_ENPEO (P_NUMBER, NAME, SEX, ENDTIME, PASSWORD) values ('$num', '$name', '$sex', '$end', '$pass')");
oci_execute($stmt);
oci_commit($stmt);

oci_free_statement($stmt);
oci_close($conn);
?>


<script>
window.open('login0.php', 'second');
</script>