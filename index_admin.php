<?php
include "connect.php";

// Check user login or not
if(!isset($_SESSION['emp_id'])){
   header('Location: login_admin.php');
}

$emp_id = $_SESSION['emp_id'];
$emp_firstname = $_SESSION['emp_firstname'];
$Position_name = $_SESSION['Position_name'];
?>


<!DOCTYPE html>
<html lang="en">

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
  <title>ข้อมูลการจอง</title>

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
      width: 300px;
      height: 50px;
      border: none;
      outline: none;
      color: #fff;
      background: #111;
      cursor: pointer;
      position: relative;
      z-index: 0;
      border-radius: 50px;
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
  <title>Admin</title>
</head>

<body>
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
            <label style="color:#FFFFFF83">ชื่อผู้ใช้ : <?php echo $emp_firstname ?> &nbsp</label>
            <label style="color:#FFFFFF83">บทบาท : <?php echo $Position_name ?> &nbsp</label>
            </div>
          </div>
        </nav>
      </div>
    </div>
    <div class="container mx-auto" style="width:100%">
      <div class="row">
        <div class="col-2 bgLeft" style="height:150vh"><br>
        <div class="dropdown">
          <button class="btn btn-warning btn-sm dropdown-toggle" style="width:100%; margin-bottom:3%;" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
           การจัดการเอกสาร
          </button>
          <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
            <li><a class="dropdown-item" href="">นำเข้าเอกสาร</a></li>
            <li><a class="dropdown-item" href="#">ส่งออกเอกสาร</a></li>
            <li><a class="dropdown-item" href="form.php">เอกสารนำเข้า</a></li>
          </ul>
        </div>
          <button class="btn btn-warning btn-sm" style="width:100%; margin-bottom:3%;" onclick="show_divistion()">ข้อมูลกอง</button>
          <button class="btn btn-warning btn-sm" style="width:100%; margin-bottom:3%;"
            onclick="show_member()">ข้อมูลพนักงาน</button>
          <button class="btn btn-warning btn-sm" style="width:100%; margin-bottom:3%;"
            onclick="show_history()">สถิติการส่งเอกสาร</button>
          <button class="btn btn-warning btn-sm" style="width:100%; margin-bottom:3%;"
            onclick="show_topup()">คู่มือ</button>
           <button class="btn btn-danger btn-sm" style="width:100%; margin-bottom:3%;">
            <a class="nav-link" href="logout.php?option=1" style = "color:black">ออกจากระบบ</a></button> 
            
          <!-- Button trigger modal -->

          <!-- modal edit Divistion -->
          <div class="modal fade" id="exampleModal4" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header bg-success text-white">
                  <h5 class="modal-title" id="exampleModalLabel">แก้ไขข้อมูลกอง</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <input type="hidden" id="divistion_id">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="mb-3">
                        <input type="text" class="form-control" name="divistion_name" id="divistion_name"
                          placeholder="ชื่อสนาม">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="mb-3">
                      <input type="number" class="form-control" name="divistion_number" id="divistion_number"
                          placeholder="เบอร์โทรศัพท์มือถือกอง">
                      </div>
                    </div>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="clear_modal4">ปิด</button>
                  <button type="button" class="btn btn-success" id="save_edit_divistion" >ยืนยัน</button>
                </div>
              </div>
            </div>
          </div>

          <!-- Add Divistion -->
          <div class="modal fade" id="exampleModal5" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header bg-success text-white">
                  <h5 class="modal-title" id="exampleModalLabel">เพิ่มกอง</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="mb-3">
                        <input type="text" class="form-control" name="divistion_name" id="divistion_name2"
                          placeholder="ชื่อกอง">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="mb-3">
                      <input type="number" class="form-control" name="divistion_number" id="divistion_number2"
                          placeholder="เบอร์โทรศัพท์มือถือกอง">
                      </div>
                    </div>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="clear_modal5">ปิด</button>
                  <button type="button" class="btn btn-success" id="butsave_divistion" >ยืนยัน</button>
                </div>
              </div>
            </div>
          </div>

        </div>
        <div class="col-10" style="background-color:white">
          <div id="show_index"><br>
            <center>
              <h2>ประชาสัมพันธ์</h2>
            </center>
            <div class="table-responsive-sm">
              <table class="table table-bordered table-sm" style="border:1px; width:100%">
                <thead>
                  <tr style="background-color:#212529; color:white;">
                    
                  </tr>
                </thead>
                
                <tbody id="myTable5" style="border:1px; width:100%">

                </tbody>
              </table>
            </div>
          </div>
          
          <div id="show_history"><br>
            <center>
              <h2>สถิติการส่งเอกสาร</h2>
            </center>

            <div style="float:right">
            วัน/เดือน/ปี : <input id="myInput4" type="date"><br><br>
            </div>

            <div class="table-responsive-sm">
              <table class="table table-bordered table-sm" style="border:1px; width:100%">
                <thead>
                  <tr style="background-color:#212529; color:white;">
                    <th class="thcenter">วันที่ดำเนินการ</th>
                    <th class="thcenter">ชื่อเอกสาร</th>
                    <th class="thcenter">ประเภทเอกสาร</th>
                    <th class="thcenter">ชั้นความเร็วเอกสาร</th>
                    <th class="thcenter">ชั้นความลับเอกสาร</th>
                  </tr>
                </thead>
                <tbody id="myTable4" style="border:1px; width:100%">

                </tbody>
              </table>
            </div>
          </div>

          <div id="show_topup"><br>
            <center>
              <h2>คู่มือ</h2> 
            </center>

            <div class="table-responsive-sm">
              <img src="img/11.png" alt="">
            </div>
          </div>

          <div id="show_divistion"><br>
            <center>
              <h2>ข้อมูลกอง</h2>
            </center>

            <div style="float:right">
            ค้นหา : <input id="myInput2" type="text"><br><br>
            </div>

            <div class="table-responsive-sm">
              <table class="table table-bordered table-sm" style="border:1px; width:100%">
                <thead>
                  <tr style="background-color:#212529; color:white;">
                    <th class="thcenter">ชื่อกอง</th>
                    <th class="thcenter">เบอร์โทรศัพท์กอง</th>
                    <th class="thcenter">แก้ไข/ลบ</th>
                  </tr>
                </thead>
                <tbody id="myTable2" style="border:1px; width:100%">

                </tbody>
              </table>
              <button class="glow-on-hover" style="width:10%; height:35px;" type="button" data-bs-toggle="modal"
                data-bs-target="#exampleModal5">เพิ่มกอง</button>
            </div>
          </div>
  
          <div id="show_member"><br>
            <center>
              <h2>ข้อมูลสมาชิก</h2>
            </center>

            <div style="float:right">
            ค้นหา : <input id="myInput" type="text"><br><br>
            </div>

            <div class="table-responsive-sm">
              <table class="table table-bordered table-sm" style="border:1px; width:100%">
                <thead>
                  <tr style="background-color:#212529; color:white;">
                  <th class="thcenter">รหัสพนักงาน</th>
                    <th class="thcenter">ชื่อจริง</th>
                    <th class="thcenter">นามสกุล</th>
                    <th class="thcenter">เลขบัตรประชาชน</th>
                    <th class="thcenter">เพศ</th>
                    <th class="thcenter">บทบาท</th>
                    <th class="thcenter">กอง</th>
                    <th class="thcenter">อีเมลล์</th>
                    <th class="thcenter">เบอร์โทรศัพท์</th>
                    <th class="thcenter">แก้ไข/ลบ</th>                
                  </tr>
                </thead>
                <tbody id="myTable" style="border:1px; width:100%">
                </tbody>
              </table>
                <button class="glow-on-hover" style="width:10%; height:35px;" type="button" data-bs-toggle="modal"
                  data-bs-target="#exampleModal2">เพิ่มสมาชิก</button>
                  <div class="mb-3">
            </div>
          </div>                 
            <!-- Modal Edit Member-->
          <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header bg-success text-white">
                  <h5 class="modal-title" id="exampleModalLabel">แก้ไขข้อมูลสมาชิกของ</h5>
                  <input type="text"class="form-control" id="show_username" style="width:50%; margin-left:10px" readonly></input>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <input type="hidden" id="m_id">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="mb-3">
                        <input type="text" class="form-control" name="m_firstname" id="m_firstname"
                          placeholder="ชื่อจริง">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="mb-3">
                        <input type="text" class="form-control" name="m_lastname" id="m_lastname"
                          placeholder="นามสกุล">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-7">
                      <div class="mb-3">
                        <input type="email" class="form-control" name="m_email" id="m_email"
                          placeholder="ที่อยู่อีเมล">
                      </div>
                    </div>
                    <div class="col-md-5">
                      <div class="mb-3">
                      <input type="text" class="form-control" name="m_tel" id="m_tel" placeholder="เบอร์โทรศัพท์" onKeyUp="if(isNaN(this.value)){ Swal.fire({ icon: 'error', title: 'กรุณากรอกตัวเลข', }); this.value='';}"  required />
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="mb-3">
                        <textarea class="form-control" name="m_address" id="m_address" cols="30" rows="3" style=""
                          placeholder="ที่อยู่"></textarea>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="clear_modal">ปิด</button>
                  <button type="button" class="btn btn-success" id="save_edit">บันทึก</button>
                </div>
              </div>
            </div>
          </div>

          <!-- modal register -->
          <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                  <h5 class="modal-title" id="exampleModalLabel">เพิ่มสมาชิก</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="mb-3">
                        <input type="text" class="form-control" name="emp_firstname" id="emp_firstname2"
                          placeholder="ชื่อจริง">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="mb-3">
                        <input type="text" class="form-control" name="emp_lastname" id="emp_lastname2"
                          placeholder="นามสกุล">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="mb-3">
                        <input type="password" class="form-control" name="emp_password" id="emp_password2"
                          placeholder="รหัสผ่าน">
                      </div>
                    </div>
                  <div class="col-md-6">
                      <div class="mb-3">
                        <input type="number" class="form-control" name="emp_cardid" id="emp_cardid2"
                          placeholder="เลขบัตรประชาชน 13 หลัก">
                      </div>
                    </div>
                  
                    <div class="col-md-6">
                      <div class="mb-3">
                      <?php
                          $sql = "SELECT * from gender";

                          $result = mysqli_query($conn,$sql);
                        ?>
                        <select name="gender_id" id="gender_id2" class="form-select">
                          <option value="เพศ">เพศ</option>
                        <?php
                          while($row = mysqli_fetch_assoc($result)){
                        ?>
                              <option value="<?php echo $row["gender_id"]?>"><?php echo $row["gender_name"]?></option>              
                            <?php
                          }
                        ?>
                        </select>
                      </div>
                    </div>
                  
                  <div class="col-md-6">
                      <div class="mb-3">
                      <?php
                          $sql = "SELECT * from position";

                          $result = mysqli_query($conn,$sql);
                        ?>
                        <select name="Position_id" id="Position_id2" class="form-select">
                          <option value="ตำแหน่ง">ตำแหน่งงาน</option>
                        <?php
                          while($row = mysqli_fetch_assoc($result)){
                        ?>
                              <option value="<?php echo $row["Position_id"]?>"><?php echo $row["Position_name"]?></option>              
                            <?php
                          }
                        ?>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="mb-3">
                      <?php
                          $sql = "SELECT * from divistion";

                          $result = mysqli_query($conn,$sql);
                        ?>
                        <select name="divistion_id" id="divistion_id2" class="form-select">
                          <option value="กอง">กอง</option>
                        <?php
                          while($row = mysqli_fetch_assoc($result)){
                        ?>
                              <option value="<?php echo $row["divistion_id"]?>"><?php echo $row["divistion_name"]?></option>              
                            <?php
                          }
                        ?>
                        </select>
                      </div>
                    </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="mb-3">
                        <input type="email" class="form-control" name="emp_email" id="emp_email2"
                          placeholder="ที่อยู่อีเมล">
                      </div>
                    </div>
                    <div class="col-md-5">
                      <div class="mb-3">
                      <input type="text" class="form-control" name="emp_tel" id="emp_tel2" placeholder="เบอร์โทรศัพท์" onKeyUp="if(isNaN(this.value)){ Swal.fire({ icon: 'error', title: 'กรุณากรอกตัวเลข', }); this.value='';}"  required />
                      </div>
                    </div>
                  </div>
                  
                  
                  
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="clear_modal2">ปิด</button>
                  <button type="button" class="btn btn-success" id="butsave">ยืนยัน</button>
                </div>
              </div>
            </div>
          
          </div>     
        </div>
      </div>
    </div>
  </div>
    <input type="hidden" id="emp_id" value="<?php echo $emp_id ?>">
  <script>

    function validateEmail(m_email) {
      const re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
      return re.test(m_email);
    }

    show_index();
    function show_index() {

      $("#show_index").show();
      $("#show_history").hide();
      $("#show_topup").hide();
      $("#show_divistion").hide();
      $("#show_member").hide();

      $("#myInput5").on('change', function () {

  
      });
    }

    function show_history() {

      $("#show_history").show();
      $("#show_topup").hide();
      $("#show_index").hide();
      $("#show_divistion").hide();
      $("#show_member").hide();

      $("#myInput4").on('change', function () {

      var search_date = $("#myInput4").val();

        $.ajax({
          url: "view_history.php",
          type: "POST",
          cache: false,
          data: {
            search_date: search_date
          },
          success: function (data) {
            $('#myTable4').html(data);
          }
        });
      });
    }

    

    function show_divistion() {

      $("#show_divistion").show();
      $("#show_index").hide();
      $("#show_member").hide();
      $("#show_topup").hide();
      $("#show_history").hide();

      $.ajax({
        url: "view_divistion.php",
        type: "POST",
        cache: false,
        success: function (data) {
          // alert(data);
          $('#myTable2').html(data);
        }
      });
    }

    function show_member() {

      $("#show_member").show();
      $("#show_index").hide();
      $("#show_divistion").hide();
      $("#show_topup").hide();
      $("#show_history").hide();

      $.ajax({
        url: "view_member.php",
        type: "POST",
        cache: false,
        success: function (data) {
          // alert(data);
          $('#myTable').html(data);
        }
      });
    }

    function OnDelete(id) {
      //  alert(id);
      const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
          confirmButton: 'btn btn-success mx-2',
          cancelButton: 'btn btn-danger mx-2'
        },
        buttonsStyling: false
      })

      swalWithBootstrapButtons.fire({
        title: 'คุณต้องการลบข้อมูลสมาชิกนี้หรือไม่ ?',
        icon: 'question',
        // background: 'yellow',
        showCancelButton: true,
        confirmButtonText: 'ยืนยัน',
        cancelButtonText: 'ยกเลิก',
        reverseButtons: true
      }).then((result) => {
        if (result.isConfirmed) {
          $.ajax({
            url: "delete_member.php",
            type: 'post',
            data: {
              m_id: id
            },
            success: function (dataResult) {
              var dataResult = JSON.parse(dataResult);
              if (dataResult.statusCode == 200) {
                swalWithBootstrapButtons.fire(
                  'ลบข้อมูลสำเร็จ',
                  '',
                  'success'
                )
                show_member();
              }
              else{
                Swal.fire({
                  icon: 'error',
                  title: 'ไม่สามารถลบสมาชิกที่มีการจองได้'
                })
              }
            }
          });
        }
      });
    }

    function OnEdit(id) {
      $.ajax({
        url: "select_member.php",
        type: 'post',
        data: {
          m_id: id
        },
        success: function (dataResult) {
          var dataResult = JSON.parse(dataResult);
          if (dataResult.statusCode == 200) {

            $("#m_id").val(dataResult.m_id);
            $("#m_firstname").val(dataResult.m_firstname);
            $("#m_lastname").val(dataResult.m_lastname);
            $("#m_email").val(dataResult.m_email);
            $("#m_tel").val(dataResult.m_tel);
            $("#m_address").val(dataResult.m_address);
          }
        }
      });
    }

    function OnDelete2(id) {
      //  alert(id);
      const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
          confirmButton: 'btn btn-success mx-2',
          cancelButton: 'btn btn-danger mx-2'
        },
        buttonsStyling: false
      })

      swalWithBootstrapButtons.fire({
        title: 'คุณต้องการลบข้อมูลกองนี้หรือไม่ ?',
        icon: 'question',
        // background: 'yellow',
        showCancelButton: true,
        cancelButtonText: 'ยกเลิก',
        confirmButtonText: 'ยืนยัน',
        reverseButtons: true
      }).then((result) => {
        if (result.isConfirmed) {
          $.ajax({

            url: "delete_divistion.php",
            type: 'post',
            data: {
              divistion_id: id
            },
            success: function (dataResult) {
              var dataResult = JSON.parse(dataResult);
              if (dataResult.statusCode == 200) {
                swalWithBootstrapButtons.fire(
                  'ลบข้อมูลสำเร็จ',
                  '',
                  'success'
                )
                show_divistion();
              }
              else{
                Swal.fire({
                  icon: 'error',
                  title: 'ไม่สามารถลบกองได้'
                })
              }
            }
          });
        }
      });
    }

    

    function OnEdit2(id) {
      $.ajax({
        url: "select_divistion.php",
        type: 'post',
        data: {
          divistion_id: id
        },
        success: function (dataResult) {
          var dataResult = JSON.parse(dataResult);
          if (dataResult.statusCode == 200) {

            $("#divistion_id").val(dataResult.divistion_id);
            $("#divistion_name").val(dataResult.divistion_name);
            $("#type_id").val(dataResult.type_id);
          }
        }
      });
    }

    $(document).ready(function () {
      $("#save_edit").on('click', function () {

        var m_id = $("#m_id").val();
        var m_firstname = $("#m_firstname").val();
        var m_lastname = $("#m_lastname").val();
        var m_email = $("#m_email").val();
        var m_tel = $("#m_tel").val();
        var m_address = $("#m_address").val();
        var show_username = $("#show_username").val();

        $.ajax({
          url: 'update_member.php',
          method: 'post',
          datatype: 'JSON',
          data: {
            m_id: m_id,
            m_firstname: m_firstname,
            m_lastname: m_lastname,
            m_email: m_email,
            m_tel: m_tel,
            m_address: m_address,
          },
          success: function (dataResult) {
            var dataResult = JSON.parse(dataResult);
            if (dataResult.statusCode == 200) {
              show_member();
              Swal.fire({
                icon: 'success',
                title: 'แก้ไขข้อมูลสำเร็จ'
              })
              $('#exampleModal').modal('hide');
            } 
            else if (dataResult.statusCode == 202) {
                  Swal.fire({
                      icon: 'error',
                      title: 'มีอีเมลนี้แล้ว',
                  })
              }
            else if (dataResult.statusCode == 203) {
                Swal.fire({
                    icon: 'error',
                    title: 'มีเบอร์โทรนี้แล้ว',
                })
            }
          }
        });
      });
    });

    $(document).ready(function () {
      $("#save_edit_divistion").on('click', function () {

        var divistion_id = $("#divistion_id").val();
        var divistion_name = $("#divistion_name").val();
        var divistion_number = $("#divistion_number").val();

        $.ajax({
          url: 'update_divistion.php',
          method: 'post',
          datatype: 'JSON',
          data: {
            divistion_id: divistion_id,
            divistion_name: divistion_name,
            divistion_number: divistion_number
          },
          success: function (dataResult) {
            var dataResult = JSON.parse(dataResult);
            if (dataResult.statusCode == 200) {
              show_divistion();
              Swal.fire({
                icon: 'success',
                title: 'แก้ไขข้อมูลสำเร็จ'
              })
              $('#exampleModal4').modal('hide');
            } else if (dataResult.statusCode == 201) {
              Swal.fire({
                icon: 'error',
                title: 'แก้ไขข้อมูลไม่สำเร็จ'
              })
            }
          }
        });

      });
    });

    $(document).ready(function () {
      $('#butsave').on('click', function () {
        var emp_firstname = $('#emp_firstname2').val();
        var emp_lastname = $('#emp_lastname2').val();
        var emp_password = $('#emp_password2').val();
        var emp_cardid = $('#emp_cardid2').val();
        var gender_id = $('#gender_id2').val();
        var Position_id = $('#Position_id2').val();
        var divistion_id = $('#divistion_id2').val();
        var emp_email = $('#emp_email2').val();
        var emp_tel = $('#emp_tel2').val();

        if ( emp_firstname != "" && emp_lastname != "" && emp_password != "" && emp_cardid != "" && gender_id != "" && Position_id != ""&& divistion_id != "" && emp_email != "" && emp_tel != "") {
          
          if (!validateEmail(emp_email)) {
            Swal.fire({
              icon: 'error',
              title: 'กรุณากรอกอีเมลให้ถูกต้อง',
            })
          }
          else{
            $.ajax({
              url: "save_register.php",
              type: "POST",
              data: {
                emp_firstname: emp_firstname,
                emp_lastname: emp_lastname,
                emp_password: emp_password,
                emp_cardid:emp_cardid,
                gender_id,gender_id,
                Position_id:Position_id,
                divistion_id:divistion_id,
                emp_email: emp_email,
                emp_tel: emp_tel
              },
              cache: false,
              success: function (dataResult) {
                var dataResult = JSON.parse(dataResult);
                if (dataResult.statusCode == 200) {
                  show_member();
                  Swal.fire({
                    icon: 'success',
                    title: 'สมัครสมาชิกสำเร็จ',
                  })
                  $('#exampleModal2').modal('hide');
                  $('#exampleModal2').find('input[type=text], input[type=password], input[type=number], input[type=tel], input[type=email], textarea').val('');
                }
                else if (dataResult.statusCode == 201) {
                    Swal.fire({
                        icon: 'error',
                        title: 'มีชื่อผู้ใช้นี้แล้ว',
                    })
                }
                else if (dataResult.statusCode == 202) {
                    Swal.fire({
                        icon: 'error',
                        title: 'มีอีเมลนี้แล้ว',
                    })
                }
                else if (dataResult.statusCode == 203) {
                    Swal.fire({
                        icon: 'error',
                        title: 'มีเบอร์โทรนี้แล้ว',
                    })
                }else if (dataResult.statusCode == 204) {
                    Swal.fire({
                        icon: 'error',
                        title: 'มีเลขบัตรประชาชนนี้อยู่แล้ว',
                    })
                }
              }
            });
          }
        }
        else {
          Swal.fire('กรุณากรอกข้อมูลให้ครบ');
        }
      });
    });

    $(document).ready(function () {
      $('#butsave_divistion').on('click', function () {

        var divistion_name = $('#divistion_name2').val();
        var divistion_number = $('#divistion_number2').val();

        if (divistion_name != "" && divistion_number != "") {
          $.ajax({
            url: "save_divistion.php",
            type: "POST",
            data: {
              divistion_name: divistion_name,
              divistion_number: divistion_number
            },
            cache: false,
            success: function (dataResult) {
              var dataResult = JSON.parse(dataResult);
              if (dataResult.statusCode == 200) {
                show_divistion();
                Swal.fire({
                  icon: 'success',
                  title: 'เพิ่มกองสำเร็จ',
                })
                $('#exampleModal5').modal('hide');
              }
              else if (dataResult.statusCode == 201) {
                Swal.fire({
                  icon: 'error',
                  title: 'มีชื่อกองนี้แล้ว',
                })
              }
              $('#exampleModal5').find('input[type=text], input[type=password], input[type=number], input[type=tel], input[type=email], textarea').val('');
            }
          });
        }
        else {
          Swal.fire('กรุณากรอกข้อมูลให้ครบ');
        }
      });
    });

    
    $(document).ready(function (){
      $('#clear_modal3').on('click', function () {
        $('#exampleModal3').find('input[type=text], input[type=password], input[type=number], input[type=tel], input[type=email], textarea').val('');
      });
      $('#clear_modal2').on('click', function () {
        $('#exampleModal2').find('input[type=text], input[type=password], input[type=number], input[type=tel], input[type=email], textarea').val('');
      });
      $('#clear_modal1').on('click', function () {
        $('#exampleModal1').find('input[type=text], input[type=password], input[type=number], input[type=tel], input[type=email], textarea').val('');
      });
      $('#clear_modal4').on('click', function () {
        $('#exampleModal4').find('input[type=text], input[type=password], input[type=number], input[type=tel], input[type=email], textarea').val('');
      });
      $('#clear_modal5').on('click', function () {
        $('#exampleModal5').find('input[type=text], input[type=password], input[type=number], input[type=tel], input[type=email], textarea').val('');
      });
    });

    $(document).ready(function(){
      $("#myInput").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#myTable tr").filter(function() {
          $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
      });
    });

    $(document).ready(function(){
      $("#myInput2").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#myTable2 tr").filter(function() {
          $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
      });
    });

    $(document).ready(function(){
      $("#myInput3").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#myTable3 tr").filter(function() {
          $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
      });
    });

  </script>
</body>

</html>