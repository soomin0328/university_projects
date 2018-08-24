<!DOCTYPE html>
<html>
<head>
  <title>Hongik Water Park</title>
  <meta charset="EUC-KR">
  
  <script type="text/javascript">

    function setDisable(elementid) {

      var el = document.getElementById(elementid);

      el.disabled = 'true';
      el.style.background='red';

    }
   
 </script>


 <style>
 body{
  font-family: "Comic Sans MS"
}
table,td,th{
  border:1px solid pink;
}

th{
  background-color:pink;
  color:white;
}
body {
  text-align: center;
  margin: 0;
}
ul {
  list-style: none;
  margin: 10;
  padding : 10;
  overflow: hidden;
  background-color: white;
  font-family: "Comic Sans MS";
}
li {
  float : left;
}
li a {
  display: block;
  color: #000093;
  text-align: center;
  padding: 12px 35px;
  text-decoration: none;
  font-size: 14pt;
}
a:hover:not(.active) {
  color:#2478FF;
}
.active {
  border: 1px solid #2478FF;
  background-color: #2478FF;
  border-radius: 30px;
  color: white;   
  font-size: 1.95em;
  font-family: "Comic Sans MS";
}
.choice {
  border: 1px solid #2478FF;
  border-radius: 30px;
  color: #2478FF;
  font-size: 1em;
  font-family: "Comic Sans MS"
}
img {
  width: 100%;
  height: 100%;
}
.layer{
  width: 500px;
  margin: 0 auto;
  border: 1px solid white;
}
</style>
</head>
<body>
 <ul>
  <li><a class="active" href="http://cic.hongik.ac.kr/b_team/b_team7/"><b>Hongik Water Park</b></a></li>
  <li><a href="http://cic.hongik.ac.kr/b_team/b_team7/">Home</a></li>
  <li><a href="http://cic.hongik.ac.kr/b_team/b_team7/info0.php">Info.</a></li>
  <li><a href="http://cic.hongik.ac.kr/b_team/b_team7/login0.php">Enroll</a></li>
  <li><a href="http://cic.hongik.ac.kr/b_team/b_team7/out0.php">Delete</a></li>
  <li><a href="http://cic.hongik.ac.kr/b_team/b_team7/reserve0.php">Reserve</a></li>
  <li><a href="http://cic.hongik.ac.kr/b_team/b_team7/rent0.php">Rent</a></li>
  <li><a href="http://cic.hongik.ac.kr/b_team/b_team7/food0.php">Food</a></li>
  <li><a  class="choice" href="http://cic.hongik.ac.kr/b_team/b_team7/locker0.php">Locker</a></li>

</ul>
<div class="layer">
  <?php
  $conn = oci_connect("B589058","B589058","203.249.87.162:1521/orcl");

  if(!$conn){
    echo "Oricale Connect Error";
    exit();
  }
  ?>
  <form action="locker.php" method="post">
    <br>
    <?php
    session_start();
    $_SESSION[id];
    $_SESSION[pass];
    echo "<h2>Now login id: $_SESSION[id]</h2>";

  // echo "<form action="logout.php">
  // <INPUT TYPE="submit" VALUE="logout"/>
  // </form>";
    ?>

    <br> 
    <h2>SELECT LOCKER NUMBER</h2><br>

    <h2 name="in"> Inside </h2>
    <input type="button"  id="01" value="01" onclick="document.getElementById('cInput').value=this.value;">
    <input type="button"  id="02" value="02" onclick="document.getElementById('cInput').value=this.value">
    <input type="button"  id="03" value="03" onclick="document.getElementById('cInput').value=this.value">
    <input type="button"   id="04" value="04" onclick="document.getElementById('cInput').value=this.value">                                                 
    <input type="button" value="05" onclick="document.getElementById('cInput').value=this.value">
    <input type="button" value="06" onclick="document.getElementById('cInput').value=this.value">
    <input type="button" value="07" onclick="document.getElementById('cInput').value=this.value">
    <input type="button" value="08" onclick="document.getElementById('cInput').value=this.value">
    <input type="button" value="09" onclick="document.getElementById('cInput').value=this.value">
    <input type="button" value="10" onclick="document.getElementById('cInput').value=this.value"><br>
    <input type="button" value="11" onclick="document.getElementById('cInput').value=this.value">
    <input type="button" value="12" onclick="document.getElementById('cInput').value=this.value">
    <input type="button" value="13" onclick="document.getElementById('cInput').value=this.value">
    <input type="button" value="14" onclick="document.getElementById('cInput').value=this.value">                                                 
    <input type="button" value="15" onclick="document.getElementById('cInput').value=this.value">
    <input type="button" value="16" onclick="document.getElementById('cInput').value=this.value">
    <input type="button" value="17" onclick="document.getElementById('cInput').value=this.value">
    <input type="button" value="18" onclick="document.getElementById('cInput').value=this.value">
    <input type="button" value="19" onclick="document.getElementById('cInput').value=this.value">
    <input type="button" value="20" onclick="document.getElementById('cInput').value=this.value"><br>
    <input type="button" value="21" onclick="document.getElementById('cInput').value=this.value">
    <input type="button" value="22" onclick="document.getElementById('cInput').value=this.value">
    <input type="button" value="23" onclick="document.getElementById('cInput').value=this.value">
    <input type="button" value="24" onclick="document.getElementById('cInput').value=this.value">                                                 
    <input type="button" value="25" onclick="document.getElementById('cInput').value=this.value">
    <input type="button" value="26" onclick="document.getElementById('cInput').value=this.value">
    <input type="button" value="27" onclick="document.getElementById('cInput').value=this.value">
    <input type="button" value="28" onclick="document.getElementById('cInput').value=this.value">
    <input type="button" value="29" onclick="document.getElementById('cInput').value=this.value">
    <input type="button" value="30" onclick="document.getElementById('cInput').value=this.value"><br>
    <input type="button" value="31" onclick="document.getElementById('cInput').value=this.value">
    <input type="button" value="32" onclick="document.getElementById('cInput').value=this.value">
    <input type="button" value="33" onclick="document.getElementById('cInput').value=this.value">
    <input type="button" value="34" onclick="document.getElementById('cInput').value=this.value">                                                 
    <input type="button" value="35" onclick="document.getElementById('cInput').value=this.value">
    <input type="button" value="36" onclick="document.getElementById('cInput').value=this.value">
    <input type="button" value="37" onclick="document.getElementById('cInput').value=this.value">
    <input type="button" value="38" onclick="document.getElementById('cInput').value=this.value">
    <input type="button" value="39" onclick="document.getElementById('cInput').value=this.value">
    <input type="button" value="40" onclick="document.getElementById('cInput').value=this.value"><br>
    <input type="button" value="41" onclick="document.getElementById('cInput').value=this.value">
    <input type="button" value="42" onclick="document.getElementById('cInput').value=this.value">
    <input type="button" value="43" onclick="document.getElementById('cInput').value=this.value">
    <input type="button" value="44" onclick="document.getElementById('cInput').value=this.value">                                                 
    <input type="button" value="45" onclick="document.getElementById('cInput').value=this.value">
    <input type="button" value="46" onclick="document.getElementById('cInput').value=this.value">
    <input type="button" value="47" onclick="document.getElementById('cInput').value=this.value">
    <input type="button" value="48" onclick="document.getElementById('cInput').value=this.value">
    <input type="button" value="49" onclick="document.getElementById('cInput').value=this.value">
    <input type="button" value="50" onclick="document.getElementById('cInput').
    value=this.value"><br><br><br>

    <h2 name ="out"> Outside </h2>
    <input type="button" value="51" onclick="document.getElementById('cInput').value=this.value">
    <input type="button" value="52" onclick="document.getElementById('cInput').value=this.value">
    <input type="button" value="53" onclick="document.getElementById('cInput').value=this.value">
    <input type="button" value="54" onclick="document.getElementById('cInput').value=this.value">                                                 
    <input type="button" value="55" onclick="document.getElementById('cInput').value=this.value">
    <input type="button" value="56" onclick="document.getElementById('cInput').value=this.value">
    <input type="button" value="57" onclick="document.getElementById('cInput').value=this.value">
    <input type="button" value="58" onclick="document.getElementById('cInput').value=this.value">
    <input type="button" value="59" onclick="document.getElementById('cInput').value=this.value">
    <input type="button" value="60" onclick="document.getElementById('cInput').value=this.value"><br>
    <input type="button" value="61" onclick="document.getElementById('cInput').value=this.value">
    <input type="button" value="62" onclick="document.getElementById('cInput').value=this.value">
    <input type="button" value="63" onclick="document.getElementById('cInput').value=this.value">
    <input type="button" value="64" onclick="document.getElementById('cInput').value=this.value">                                                
    <input type="button" value="65" onclick="document.getElementById('cInput').value=this.value">
    <input type="button" value="66" onclick="document.getElementById('cInput').value=this.value">
    <input type="button" value="67" onclick="document.getElementById('cInput').value=this.value">
    <input type="button" value="68" onclick="document.getElementById('cInput').value=this.value">
    <input type="button" value="69" onclick="document.getElementById('cInput').value=this.value">
    <input type="button" value="70" onclick="document.getElementById('cInput').value=this.value"><br>
    <input type="button" value="71" onclick="document.getElementById('cInput').value=this.value">
    <input type="button" value="72" onclick="document.getElementById('cInput').value=this.value">
    <input type="button" value="73" onclick="document.getElementById('cInput').value=this.value">
    <input type="button" value="74" onclick="document.getElementById('cInput').value=this.value">                                                 
    <input type="button" value="75" onclick="document.getElementById('cInput').value=this.value">
    <input type="button" value="76" onclick="document.getElementById('cInput').value=this.value">
    <input type="button" value="77" onclick="document.getElementById('cInput').value=this.value">
    <input type="button" value="78" onclick="document.getElementById('cInput').value=this.value">
    <input type="button" value="79" onclick="document.getElementById('cInput').value=this.value">
    <input type="button" value="80" onclick="document.getElementById('cInput').value=this.value"><br>
    <input type="button" value="81" onclick="document.getElementById('cInput').value=this.value">
    <input type="button" value="82" onclick="document.getElementById('cInput').value=this.value">
    <input type="button" value="83" onclick="document.getElementById('cInput').value=this.value">
    <input type="button" value="84" onclick="document.getElementById('cInput').value=this.value">                                                 
    <input type="button" value="85" onclick="document.getElementById('cInput').value=this.value">
    <input type="button" value="86" onclick="document.getElementById('cInput').value=this.value">
    <input type="button" value="87" onclick="document.getElementById('cInput').value=this.value">
    <input type="button" value="88" onclick="document.getElementById('cInput').value=this.value">
    <input type="button" value="89" onclick="document.getElementById('cInput').value=this.value">
    <input type="button" value="90" onclick="document.getElementById('cInput').value=this.value"><br>
    <input type="button" value="91" onclick="document.getElementById('cInput').value=this.value">
    <input type="button" value="92" onclick="document.getElementById('cInput').value=this.value">
    <input type="button" value="93" onclick="document.getElementById('cInput').value=this.value">
    <input type="button" value="94" onclick="document.getElementById('cInput').value=this.value">                                                 
    <input type="button" value="95" onclick="document.getElementById('cInput').value=this.value">
    <input type="button" value="96" onclick="document.getElementById('cInput').value=this.value">
    <input type="button" value="97" onclick="document.getElementById('cInput').value=this.value">
    <input type="button" value="98" onclick="document.getElementById('cInput').value=this.value">
    <input type="button" value="99" onclick="document.getElementById('cInput').value=this.value">
    <input type="button" value="100" onclick="document.getElementById('cInput').value=this.value"><br><br><br>

    Selected locker :  <input type="text" NAME ="seat" id="cInput">

    <br><br><br>

    <INPUT TYPE="submit" VALUE="SELECT" onclick="location.href='locker.php';">
  </form>

  <br><br>
  <form action="logout.php">
    <INPUT TYPE="submit" VALUE="logout"/>
  </form>

  <br/>

  <?php
  oci_free_statement($veri);
  oci_free_statement($stmt);
  oci_close($conn); ?>

  <br><br><br><br><br><br>

</div>
</body>
</html>