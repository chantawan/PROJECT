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
      background-color: rgb(255,255,255);
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
      background-size: 100% 100%, auto;
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
        <img src="img/123.jpg" width="85%" class="shadowx">
      </div>
      <div class="col-5 mb-5" style="color:white; font-size:20px; padding-left:0px;"><br><br>
        
      I-Stadium สนามฟุตบอลหญ้าเทียม 8 สนามที่ใหญ่ที่สุดในภาคใต้ <br>
      มีทั้ง Indoor Outdoor พร้อมสิ่งอำนวยความสะดวก นอกเหนือจากนี้แล้ว <br>
      ยังมีคลับเฮ้าส์ สปอร์ตคลับ สำหรับออกกำลังกาย อีกทั้งยังได้มิตรภาพ<br>
      และความสามัคคีจากการเล่นกีฬา สุขภาพดีไม่มีขาย ถ้าอยากได้มาที่<br><br>
      <center><img src="img/i-stadium2.png" width="60%"></center>
    </div>

    </div>

    <div class="row mx-auto" id="show_2">
    <center><h2 class="text-dark"><br>ทำไมต้องเล่นที่สนาม I-Stadium?</h2></center>
      <div class="col-6 mb-4 mx-auto"><br>
      <center><img src="img/11.png" width="70%"><br>
      <h3>ใหญ่สุด</h3><br>
        <p style="font-size:20px">สนามฟุตบอลหญ้าเทียม 8 สนาม<br>
        สนาม 7 คนขึ้นไป 6 สนาม<br>
        สนาม 5 คน 2 สนาม</p></center>
      </div>
      <div class="col-6 mb-4 mx-auto"><br>
      <center><img src="img/22.png" width="70%"><br>
      <h3>นุ่มกว่า</h3><br>
        <p style="font-size:20px">ด้วยเทคโนโลยี Shock pad<br>
        ใต้พื้นหญ้าช่วยดูดซับแรงกระแทก<br>
        เจ้าเดียวในหาดใหญ่</p></center>
      </div>
    </div>
    
    <div class="row mx-auto" id="show_about">
    <h2 class="text-white" style="padding-left:150px"><br>กฎระเบียบการใช้สนาม</h2>
      <div class="col-8 mb-5 mx-auto"><br>

        <p class="text-white" style="font-size:20px;">
        1. ห้ามผู้ใช้บริการ สูบบุหรี่ในสนามโดยเด็ดขาด สูบบุหรี่ในสนาม ปรับ 2,000 บาท<br>
        2. ห้ามเล่นการพนันในสนาม<br>
        3. งดอาหารและเครื่องดื่มที่มีแอลกอฮอล์<br>
        4. ห้ามนำสตั๊ดปุ่มเหล็กเข้าเล่นโดยเด็ดขาด<br>
        5. ห้ามนำสัตว์เลี้ยงเข้ามาในสนาม<br>
        6. กรุณาดูแลทรัพย์สินส่วนตัว ทางสนามจะไม่รับผิดชอบใดๆ กรณีสูญหาย</p>
      </div>
      
    </div>

  </div> 
</body>

</html>