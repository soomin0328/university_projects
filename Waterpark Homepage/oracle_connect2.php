<?php
$conn = oci_connect("B589065","B589065","203.249.87.162:1521/orcl");

if(!$conn){
        echo "Oricale Connect Error";
        exit();
}

$stmt  = oci_parse($conn, "select * from 현입장고객");
oci_execute($stmt);



$num_rows = oci_fetch_all($stmt, $rows, null, null, OCI_FETCHSTATEMENT_BY_ROW);

echo ".$num_rows.<br/>";

//if($num_rows<2){
       // $stmt = oci_parse($conn, "create table team7_table (id int not null, name varchar(50) not null, primary key(id))");
       // oci_execute($stmt);
       // oci_commit($conn);

        $stmt = oci_parse($conn, "insert into 현입장고객(고객번호, 이름, 성별, 비밀번호) values('54559574', '안치현', '남','1234')");
        oci_execute($stmt);
        oci_commit($stmt);

        $stmt = oci_parse($conn, "insert into 현입장고객(고객번호, 이름, 성별, 비밀번호) values('98767654', '김수민', '여', '2345' )");
        oci_execute($stmt);
        oci_commit($stmt);

        echo "!!!!table created<br/>";

        $stmt = oci_parse($conn, "select * from 현입장고객");
        oci_execute($stmt);
        $num_rows = oci_fetch_all($stmt, $rows, null, null, OCI_FETCHSTATEMENT_BY_ROW);
//}
echo "Record Count : ".$num_rows."<br/>";

echo "<table width='500' cellpadding='0' cellspacing='0' border='1'>";

foreach($rows as $row){
        echo "<tr>";
        echo "<td>".$row[고객번호]."</td>";
	echo "<td>".$row[이름]."</td>";
	echo "<td>".$row[성별]."</td>";
        echo "<td>".$row[비밀번호]."</td>";
        echo "</tr>";
}

echo "</table>";

oci_free_statement($stmt);
oci_close($conn);
?>

<!DOCTYPE html>
<html>
<head>
        <title>로그인</title>
</head>
<body>
        <p>오라클 연동</p>
</body>
</html>
