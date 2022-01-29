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
      background-image: url('img/background.jpg');
      background-repeat: no-repeat;
      background-position: center center;
      background-attachment: fixed;
      background-size: 100% 100%, auto;
    }
    .clear {
      clear: both;
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
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark" style="width:100%">
    <div class="container-fluid">
      <img src=""  width="2%" alt=""><a class="navbar-brand" href="index_user.php"> &nbsp</a>
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
  <br>
  <br>
  <br>
  <br>
  <br>
</head>
<body>
  <div class="container btn-success" style = "backgroud-color:back; width:11%; height:80px;
  padding: 0.5%;border: 3px solid black; text-align: ;" >
    <div class="col">
        <?php
        $sql_query = "SELECT COUNT(document_id) FROM document;
        where emp_id = '$emp_id'";
        $result = mysqli_query($conn,$sql_query);
        ?>
      เอกสารที่ยังไม่ได้อ่าน
      
    </div>
    
    </div>
    

    
</body>

</html>