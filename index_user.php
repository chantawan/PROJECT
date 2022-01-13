<?php
include "connect.php";

if(!isset($_SESSION['m_id'])){
   header('Location: login_user.php');
}

$m_id = $_SESSION['m_id'];
$m_username = $_SESSION['m_username'];

date_default_timezone_set("Asia/Bangkok");

?>
<!doctype html>
<html>

<head>
  <link rel="icon" href="img/logo.png" type="image/png">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <script src="js/bootstrap.bundle.min.js"></script>
  <script src="js/jquery-3.5.1.min.js"></script>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <style>
    * {
      font-family: 'supermarket';
    }

    body {
      background-image: url('img/blackgroup.jpg');
      background-repeat: no-repeat;
      background-position: center center;
      background-attachment: fixed;
      background-size: 100% 100%, auto;
    }
    .clear {
      clear: both;
    }
    #show_table{
      /* background-color: rgba(255,255,255,0.4); */
    }
    #show_about{
      background-color: rgba(0,0,0 ,0.5);
    }
    #show_2{
      background-image: url('img/paper.png');
      background-repeat: no-repeat;
      background-position: left left;
      /* background-attachment: fixed; */
      background-size: 70% 70%, auto;
      height:500px;
      padding-top:100px;
      padding-left:150px;
      font-size:180px;
      -webkit-text-stroke: 2px white;
    }
    .navbar{
      position:fixed;
      width:100%;
      z-index:1;
    }
    .test{
      background-image: url('img/paper.png');
      background-repeat: no-repeat;
      background-position: center center;
      /* background-attachment: fixed; */
      background-size: 80% 80%, auto;
      height:500px;
      padding-top:100px;
      padding-left:150px;
      font-size:180px;
      -webkit-text-stroke: 2px white;
    }
    #i-stadium{
      z-index:1;
    }
    .shadowx{
      box-shadow:  8px 8px rgba(0, 0, 0, 0.25);
      border:2px solid #F3E3D9;
    }
    .bgcon2{
        background-color: rgba(255,255,255,0.7);
        box-shadow: 0 0px 10px 0 rgb(0,0,0);
    }

  </style>
  <title>หน้าแรก</title>
</head>

<body>

  <nav class="navbar navbar-expand-lg navbar-dark bg-dark" style="width:100%">
    <div class="container-fluid">
      <img src="img/football.png"  width="2%" alt=""><a class="navbar-brand" href="index_user.php"> &nbsp</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
        aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
          <a class="nav-link" aria-current="page" href="page_booking.php">จองสนาม</a>
          <a class="nav-link" href="history_booking.php">ประวัติการจอง</a>
          <a class="nav-link" href="history_topup.php">ประวัติการเติมCoin</a>
          <a class="nav-link" href="edit_profile.php">แก้ไขข้อมูลส่วนตัว</a>
          <a class="nav-link" href="contact.php">ติดต่อ</a>     
        </div>   
      </div>
      <div style="text-align:right; float:right;">
        <label style="color:#FFFFFF83">ชื่อผู้ใช้ : <?php echo $m_username ?> &nbsp</label><img src="img/logout.png" width="4%"><a href="logout.php?option=2"style="text-decoration:none; color:white;"> Logout </a>
      </div>
    </div>
  </nav>

  <div>
    <div class="test">
      <img src="img/i-stadium.png" id="i-stadium" class="text-dark animate__animated animate__fadeInDown" style="width:45%;"> 
    </div>
    <div id="show_table"><br>
      <center><img src="img/h1.gif" style="width:20%"></center>
      <br>
      <table class="table table-responsive-md mx-auto bgcon2" style="border:1px; width:50%">
        <thead>
          <tr style="background-color:#212529; color:white;">
            <th class="thcenter">ชื่อสนาม</th>
            <th class="thcenter">เวลาเริ่ม</th>
            <th class="thcenter">เวลาสิ้นสุด</th>
          </tr>
        </thead>
        <tbody id="booking_now" style="border:1px; width:100%">
          <?php                 
            $search_date2 = date("Y-m-d");

            $sql_query = "SELECT  stadium_name , time_start , time_end  
            FROM booking a, member b, stadium c
            WHERE a.stadium_id = c.stadium_id and b.m_id = a.m_id and a.booking_date = '$search_date2' ORDER BY `a`.`time_start` ASC";

            $result = mysqli_query($conn,$sql_query);
            $num_row = mysqli_num_rows($result);

            while($row = $result->fetch_assoc()) {
          ?>	
              <tr style="background-color:white; color:black;">
                  <td><?=$row['stadium_name'];?></td>
                  <td><?=$row['time_start'];?></td>
                  <td><?=$row['time_end'];?></td>
              </tr>
            <?php	
            }                            
            ?>
            
        </tbody>
      </table><br>
    </div>
    <div class="row mx-auto" id="show_about">
      <br>
      <div class="col-2 mb-5"><br> <br><br>
      <h3 style="transform: rotate(-90deg); color:white;"><hr style="color:white">เกี่ยวกับเรา</h3>
      </div>
      <div class="col-5 mb-5" style="padding-right:0px;" ><br> <br>
        <img src="img/Computer.png" width="85%" class="shadowx">
      </div>
      <div class="col-5 mb-5" style="color:white; font-size:20px; padding-left:0px;"><br><br>
        
      ระบบสารบรรณอิเล็กทรอนิกส์ สำหรับหน่วยงานภาครัฐ <br>
      ระบบให้บริการรับส่ง หนังสือ จัดเก็บเอกสาร เพื่อส่งต่อ<br>
      สั่งการและลงนามในเอกสารหรือส่งเข้าระบบหนังสือเวียน<br>
      ที่มีการลงนาม รับทราบ ผ่านระบบด้วยวิธีการทาง<br>
      อิเล็กทรอนิกส์ สามารถจำกัดสิทธิ์ในการเข้าถึงเอกสาร<br>
      รองรับการปฏิบัติงานของผู้ใช้งานได้พร้อมๆ กัน<br>
    </div>
    </div>
    <div class="col-10 mb-10" id="show_2" align="right">
    <h3 class="text-dark"><br><br><br><br><br>ประวัติการจัดตั้งเทศบาล</h3>
    <h3 class="text-dark">การจัดตั้งเทศบาลเมืองปัตตานีในเริ่มแรกได้รวมตำบล<br>
                          อันเป็นที่ตั้งศาลากลางจังหวัดปัตตานีจำนวน 3 ตำบล<br>
                          ได้แก่ ตำบลสะบารัง ตำบลอาเนาะรู และตำบลจะบังติกอตราพระราชกฤษฎีกา
                          จัดตั้งเป็นเทศบาลเมืองปัตตานีเมื่อพุทธศักราช 2478 โดยอาศัยอำนาจแห่งพระราชบัญญัติจัดระเบียบเทศบาลพุทธศักราช 2476</h3><br>
      <div class="col-6 mb-4 mx-auto"><br><br>
      </div>
    </div>
    
    <div class="row mx-auto" id="show_about">
    <h2 class="text-white" style="padding-left:150px"><br><img src="img/logo.png" width="10%" alt=""> เทศบาลเมืองปัตตานี
ถนนเดชา ตำบลสะบารัง อำเภอเมือง จังหวัดปัตตานี 94000</h2>
      <div class="col-8 mb-5 mx-auto"><br>

        <p class="text-white" style="font-size:20px;">
        <img src="img/phone.png" width="5%" alt=""> โทร. 073-335918<br><br>
        <img src="img/phone.png" width="5%" alt=""> โทรสาร 073-335919<br><br>
        <img src="img/registration.jpg" width="5%" alt=""> saraban@patta<br>
      </div>
      
    </div>

  </div> 
</body>

</html>