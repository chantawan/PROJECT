<?php
include "connect.php";

if(!isset($_SESSION['emp_id'])){
   header('Location: login_user.php');
}

$emp_id = $_SESSION['emp_id'];
$emp_firstname = $_SESSION['emp_firstname'];
$Position_name = $_SESSION['Position_name'];

date_default_timezone_set("Asia/Bangkok");

?>
<!doctype html>
<html>

<head>
  <link rel="icon" href="img/logoUser.png" type="image/png">
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
    .text-pacha{
      background-repeat: no-repeat;
      height:50px;
      font-size:64px;
      -webkit-text-stroke: 2px white;
    }
    body {
      background-image: url('img/background.jpg');
      background-repeat: no-repeat;
      background-position: center center;
      background-attachment: fixed;
      background-size: 100% 100%, auto;
    }
    .clear {
      clear: both;
    }

    #show_about{
      background-color: rgba(0,0,0 ,0.5);
    }
    #show_his{
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
          <a class="nav-link" aria-current="page" href="index_user.php">หน้าแรก</a>
          <a class="nav-link" href="document_recive.php">เอกสารถึงตัวท่าน</a>
          <a class="nav-link" href=".php">แฟ้มเอกสาร</a>
          <a class="nav-link" href=".php">คู่มือ</a>
          <a class="nav-link" href="logout.php?option=2">ออกจากระบบ</a>     
        </div>   
      </div>
      <div style="text-align:right; float:right;">
        <label style="color:#FFFFFF83">ชื่อผู้ใช้ : <?php echo $emp_firstname ?> &nbsp</label>
        <label style="color:#FFFFFF83">บทบาท : <?php echo $Position_name ?> &nbsp</label>
      </div>
    </div>
  </nav>
  <div>
    <div class="col-10 mb-10" id="show_his" align="center" >
    <h3 class="text-pacha"><br>ข่าวประชาสัมพันธ์</h3>
    <div class="table-responsive-sm" style = "margin-top:10%;">
              <table class="table table-bordered table-sm" style="border:1px; width:auto%">
                <thead>
                  <tr style="background-color:#212529; color:white;">
                    <th class="thcenter"></th>
                  </tr>
                </thead>
                <tbody id="pacha" style="border:1px; width:20%">
                  <?php                 
                    $sql_query = "SELECT board_name
                    FROM board
                    ORDER BY `board_id` ASC";

                    $result = mysqli_query($conn,$sql_query);
                    $num_row = mysqli_num_rows($result);

                    while($row = $result->fetch_assoc()) {
                  ?>	
                      <th>
                          <?php
                      echo "<td>"."<img src='".$row['board_name']."' width='50%' hight>"."</td>"?>
                      </th>
                    <?php	
                    }                            
                    ?>
                </tbody>
                <tbody id="myTable5" style="border:1px; width:100%">

                </tbody>
              </table>
            </div>
<div class="row mx-auto" id="show_about">
<h2 class="text-white" style="padding-left:150px"><br><img src="img/logoUser.png" width="10%" alt=""> เทศบาลเมืองปัตตานี
ถนนเดชา ตำบลสะบารัง อำเภอเมือง จังหวัดปัตตานี 94000</h2>
        <p class="text-white" style="font-size:20px;">
        <img src="img/phone.png" width="5%" alt=""> โทร. 073-335918<br><br>
        <img src="img/phone.png" width="5%" alt=""> โทรสาร 073-335919<br><br>
        <img src="img/registration.jpg" width="5%" alt=""> saraban@patta<br>
      </div>
      
    </div>

  
</body>

</html>