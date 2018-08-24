


<!DOCTYPE html>
<html>
<head>
   <title>Hongik Water Park</title>

    <script type="text/javascript">
      function button_event2(){
         alert("ENROLL DELETE");
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
      <li><a class="choice" href="http://cic.hongik.ac.kr/b_team/b_team7/out0.php">Delete</a></li>
      <li><a href="http://cic.hongik.ac.kr/b_team/b_team7/reserve0.php">Reserve</a></li>
      <li><a href="http://cic.hongik.ac.kr/b_team/b_team7/rent0.php">Rent</a></li>
      <li><a href="http://cic.hongik.ac.kr/b_team/b_team7/food0.php">Food</a></li>
      <li><a  href="http://cic.hongik.ac.kr/b_team/b_team7/locker0.php">Locker</a></li>
  </ul>
</br>
</br>
</br>
<p style="text-align: center; font-size: 25px; ">&nbsp;<b> Enter the your number and password for delete!!</b></p>
</br>
<table style="margin-left:auto;margin-right: auto;text-align: center;">
   <tr>
      <th>Custom number</th>
      <th>Password</th>
   </tr>

   <form action="out.php" method="post">
      <tr>
         <td>
            <INPUT TYPE="text" NAME="Cus_num_d">
         </td>
         <td>
            <INPUT TYPE="password" NAME="Cus_pass_d">
         </td>

      </tr>

   </table>
</br>
<div class="layer" style="text-align: center;">
   <INPUT TYPE="submit" VALUE="DELETE" onclick="location.href='out.php';button_event2();">

</div>
</form>
</body>
</html>