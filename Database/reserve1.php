


<!DOCTYPE html>
<html>
<head>
  <title>Hongik Water Park</title>
  <meta charset="EUC-KR">
  
  <script type="text/javascript">

   var openWin;

   function openChild()
   {

            // window.name = "부모창 이름"; 
            window.name = "parentForm";
            // window.open("open할 window", "자식창 이름", "팝업창 옵션");
            if(document.getElementById("r1").checked==true&&document.getElementById("t1").checked==true){
              openWin = window.open("ride1_10.html",
                "childForm", "width=570, height=350, resizable = no, scrollbars = no");
            }else if(document.getElementById("r1").checked==true&&document.getElementById("t2").checked==true){
              openWin = window.open("ride1_11.html",
                "childForm", "width=570, height=350, resizable = no, scrollbars = no");
            }else if(document.getElementById("r1").checked==true&&document.getElementById("t3").checked==true){
              openWin = window.open("ride1_13.html",
                "childForm", "width=570, height=350, resizable = no, scrollbars = no");
            }else if(document.getElementById("r2").checked==true&&document.getElementById("t1").checked==true){
              openWin = window.open("ride2_10.html",
                "childForm", "width=570, height=350, resizable = no, scrollbars = no");
            }else if(document.getElementById("r2").checked==true&&document.getElementById("t2").checked==true){
              openWin = window.open("ride2_11.html",
                "childForm", "width=570, height=350, resizable = no, scrollbars = no");
            }else if(document.getElementById("r2").checked==true&&document.getElementById("t3").checked==true){
              openWin = window.open("ride2_13.html",
                "childForm", "width=570, height=350, resizable = no, scrollbars = no");
            }else if(document.getElementById("r3").checked==true&&document.getElementById("t1").checked==true){
              openWin = window.open("ride3_10.html",
                "childForm", "width=570, height=350, resizable = no, scrollbars = no");
            }else if(document.getElementById("r3").checked==true&&document.getElementById("t2").checked==true){
              openWin = window.open("ride3_11.html",
                "childForm", "width=570, height=350, resizable = no, scrollbars = no");
            }else if(document.getElementById("r3").checked==true&&document.getElementById("t3").checked==true){
              openWin = window.open("ride3_13.html",
                "childForm", "width=570, height=350, resizable = no, scrollbars = no");
            }
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
      <li><a class="choice" href="http://cic.hongik.ac.kr/b_team/b_team7/reserve0.php">Reserve</a></li>
      <li><a href="http://cic.hongik.ac.kr/b_team/b_team7/rent0.php">Rent</a></li>
      <li><a href="http://cic.hongik.ac.kr/b_team/b_team7/food0.php">Food</a></li>
      <li><a href="http://cic.hongik.ac.kr/b_team/b_team7/locker0.php">Locker</a></li>
    </ul>
    <div class="layer">
     <?php
     session_start();
     $_SESSION[id];
     $_SESSION[pass];
     echo "<h2>Now login id: $_SESSION[id]</h2>";
     ?>

     <br> 
     <h2>SELECT RIDE NUMBER</h2>
     <form action="reserve.php" method="post">
      
     <label><input TYPE='radio' name='group1' value='Ride1' id='r1'/>Ride 1</label>
     <label><input TYPE='radio' name='group1' value='Ride2' id='r2'/>Ride 2</label>
     <label><input TYPE='radio' name='group1' value='Ride3' id ='r3'/>Ride 3</label>

     <br></br>
     <h2>SELECT TIME</h2>


     <label><input TYPE='radio' name='group2' value='10:00' id='t1'/>10:00</label>
     <label><input TYPE='radio' name='group2' value='11:00' id='t2'/>11:00</label>
     <label><input TYPE='radio' name='group2' value='13:00' id='t3'/>13:00</label>
     <br></br>

     <h2>SELECT SEAT</h2>


     <input type="button" value="SEAT SELECT" onclick="openChild()";
     ><br><br>
     Selected seats : <input type="text" id="pInput" name="seat">


     <br><br><br>
     <INPUT TYPE="submit" VALUE="RESERVE" onclick="location.href='reserve.php'">
   </div>
 </form>
 <br>
 <form action="logout.php">
  <INPUT TYPE="submit" VALUE="logout"/>
</form>
<br><br><br>
</body>
</html>