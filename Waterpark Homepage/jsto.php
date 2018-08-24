<?php
$num=$_POST['cnum_rent'];
$conn = oci_connect("B589065","B589065","203.249.87.162:1521/orcl");

if(!$conn){
	echo "Oracle Connect Error";
	exit();
}

//$q="select STOCK from GOODS where G_NUMBER = 1";
$q=oci_parse($conn,"insert into P_USELIST(P_NUMBER) values ('$num')");
$stmt = oci_parse($conn, $q);

oci_execute($stmt);
oci_commit($stmt);



//echo "<table border='1'> <tr> <th>field1</th> <th>field2</th> <th>field3</th> </tr>";
//$n =1;
//while(($row =coi_fetch_array($stmt,OCI_UNM))!=false){
//	echo $row[3]."<br>";
//}
//$_GET['jj']=$row[SNAME];
oci_free_statement($stmt);

oci_close($conn);
?>

<script>
	window.open('rent.html', 'second');
</script>
