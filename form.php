<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
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

    #show_member {
      display: none;
    }

    #show_index {
      display: block;
    }

    #show_divistion {
      display: none;
    }

    #show_topup {
      display: none;
    }

    #show_history {
      display: none;
    }
    
    th.thcenter {
      text-align: center;
    }

    #modal {
      background: rgba(0, 0, 0, 0.7);
      position: fixed;
      left: 0;
      top: 0;
      width: 100%;
      height: 100%;
      z-index: 100;
      display: none;
    }

    .bgLeft {
      background: rgba(0, 0, 0, 0.5);
    }

    .glow-on-hover {
      width: 220px;
      height: 50px;
      border: none;
      outline: none;
      color: #fff;
      background: #111;
      cursor: pointer;
      position: relative;
      z-index: 0;
      border-radius: 10px;
    }

    .glow-on-hover:before {
      content: '';
      background: linear-gradient(45deg, #ff0000, #ff7300, #fffb00, #48ff00, #00ffd5, #002bff, #7a00ff, #ff00c8, #ff0000);
      position: absolute;
      top: -2px;
      left: -2px;
      background-size: 400%;
      z-index: -1;
      filter: blur(5px);
      width: calc(100% + 4px);
      height: calc(100% + 4px);
      animation: glowing 20s linear infinite;
      opacity: 0;
      transition: opacity .3s ease-in-out;
      border-radius: 10px;
    }

    .glow-on-hover:active {
      color: #000
    }

    .glow-on-hover:active:after {
      background: transparent;
    }

    .glow-on-hover:hover:before {
      opacity: 1;
    }

    .glow-on-hover:after {
      z-index: -1;
      content: '';
      position: absolute;
      width: 100%;
      height: 100%;
      background: #111;
      left: 0;
      top: 0;
      border-radius: 10px;
    }

    @keyframes glowing {
      0% {
        background-position: 0 0;
      }

      50% {
        background-position: 400% 0;
      }

      100% {
        background-position: 0 0;
      }
    }
  </style>
<title>Import Document</title>
<div class="container">
    <div class="row">
      <div class="col-md-12">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark mx-auto" style="width:100%">
          <div class="container-fluid">
            <div class="col-md-6">
              <a class="navbar-brand" href="index_admin.php"><img src="img/logo.png" width="5%">
              สำนักงานเทศบาลเมืองปัตตานี
              </a>
            </div>
            <div class="col-md-6" style="text-align:right;">
              <img src="img/logout.png" width="4%"><a href="logout.php?option=1"
                style="text-decoration:none; color:white;"> Logout </a>
            </div>
          </div>
        </nav>
      </div>
    </div>
</head>
<body>

      <div class="row" style="width:100%; padding-left:1% ">
        <div class="col-2 bgLeft" style="height:10vh; "><br>
        <div class="dropdown">
          <button class="btn btn-warning btn-sm dropdown-toggle" style="width:100%; margin-bottom:3%;" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
           การจัดการเอกสาร
          </button>
          <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
            <li><a class="dropdown-item" href="formupload.php">นำเข้าเอกสาร</a></li>
            <li><a class="dropdown-item" href="#">ส่งออกเอกสาร</a></li>
            <li><a class="dropdown-item" href="#">เอกสารนำเข้า</a></li>
          </ul>
        </div>
        </div>
</head>
<body>
<?php
//1. เชื่อมต่อ database: 
include('connect2.php');  //ไฟล์เชื่อมต่อกับ database ที่เราได้สร้างไว้ก่อนหน้าน้ี
//2. query ข้อมูลจากตาราง: 
$query = "SELECT * FROM uploadfile ORDER BY fileID asc" or die("Error:" . mysqli_error()); 
//3. execute the query. 
$result = mysqli_query($con, $query); 
//4 . แสดงข้อมูลที่ query ออกมา: 

//ใช้ตารางในการจัดข้อมูล
echo "<table border='1' align='center' width='500'>";
//หัวข้อตาราง
echo "<tr align='center' bgcolor='#FFCC33'><td>File ID</td><td>File</td><td>date_create</td></tr>";
while($row = mysqli_fetch_array($result)) { 
  echo "<tr>";
  echo "<td align='center'>" .$row["fileID"] .  "</td> "; 
  //echo "<td><a href='.$row['fileupload']'>showfile</a></td> ";
  echo "<td>"  .$row["fileupload"] . "</td> ";  
  echo "<td align='center'>" .$row["dateup"] .  "</td> ";
  echo "</tr>";
}
echo "</table>";
//5. close connection
mysqli_close($con);
?>
<br/>
<form action="add_file_db.php" method="post" enctype="multipart/form-data" name="upfile" id="upfile">
  <p>&nbsp;</p>
  <table width="700" border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
      <td height="40" colspan="2" align="center" bgcolor="#33CC66">Form Upload&nbsp;File</td>
    </tr>
    <tr>
      <td width="126" bgcolor="#33FF66">&nbsp;</td>
      <td width="574" bgcolor="#33FF66">&nbsp;</td>
    </tr>
    <tr>
      <td align="center" bgcolor="#33FF66">File Browser</td>
      <td bgcolor="#33FF66"><label>
        <input type="file" name="fileupload" id="fileupload"  required="required"/>
      </label></td>
    </tr>
    <tr>
      <td bgcolor="#33FF66">&nbsp;</td>
      <td bgcolor="#33FF66">&nbsp;</td>
    </tr>
    <tr>
      <td bgcolor="#33FF66">&nbsp;</td>
      <td bgcolor="#33FF66"><input type="submit" name="button" id="button" value="Upload" /></td>
    </tr>
    <tr>
      <td bgcolor="#33FF66">&nbsp;</td>
      <td bgcolor="#33FF66">&nbsp;</td>
    </tr>
  </table>
  <p>&nbsp;</p>
</form>
</body>
</html>
</div>