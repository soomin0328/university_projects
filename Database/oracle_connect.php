<?php
$conn = oci_connect("db_id","db_pw","203.249.87.162:1521/orcl");
 
if(!$conn){
        echo "Oricale Connect Error";
        exit();
}
 
$stmt  = oci_parse($conn, "select * from team7_table");
oci_execute($stmt);
 
$num_rows = oci_fetch_all($stmt, $rows, null, null, OCI_FETCHSTATEMENT_BY_ROW);
if($num_rows<1){
        $stmt = oci_parse($conn, "create table team7_table (id int not null, name varchar(50) not null, primary key(id))");
        oci_execute($stmt);
        oci_commit($conn);
 
        $stmt = oci_parse($conn, "insert into team7_table(id, name) values (1, 'hong')");
        oci_execute($stmt);
        oci_commit($stmt);
 
        $stmt = oci_parse($conn, "insert into team7_table(id, name) values(2, 'kim')");
        oci_execute($stmt);
        oci_commit($stmt);
 
        echo "table created<br/>";
 
        $stmt = oci_parse($conn, "select * from team7_table");
        oci_execute($stmt);
        $num_rows = oci_fetch_all($stmt, $rows, null, null, OCI_FETCHSTATEMENT_BY_ROW);
}
echo "Record Count : ".$num_rows."<br/>";
 
echo "<table width='500' cellpadding='0' cellspacing='0' border='1'>";
 
foreach($rows as $row){
        echo "<tr>";
        echo "<td>".$row[ID]."</td>";
        echo "<td>".$row[NAME]."</td>";
        echo "</tr>";
}
 
echo "</table>";
 
oci_free_statement($stmt);
oci_close($conn);
?>