<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="icon" href="img/logo.png" type="image/png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/jquery-3.5.1.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>เข้าสู่ระบบเจ้าหน้าที่</title>
    <style>
        *{
            font-family: 'supermarket';
        }
        .btn-login{
            width: 25%;
            font-size: 100%;
        }
        .btn-register{
            width: 25%;
            font-size: 100%;
        }
        .card{
            box-shadow: 0 4px 8px 0 rgba(0,0,0,0.4);
            border-radius: 25px;
            background-color: rgba(255,255,255,0.5);
        }
        h2.tshadow{
            color:white;
            text-shadow: 2px 2px 4px #000000;
        }
        body{      
            background-image: url('img/blackgroup.jpg');
            background-repeat: no-repeat;
            background-position: center center;
            background-attachment: fixed;
            background-size: 100% 100%, auto;
        }
    </style>
</head>
<body>
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-12">
            <center><h2 class="tshadow animate__animated animate__backInDown">สำนักงานเทศบาลเมืองปัตตานี <img src="img/logo.png" width="3%" alt=""></h2></center><br>
                <div class="card mx-auto animate__animated animate__fadeIn animate__delay-1s"  style="width:70%">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 ">
                            <center><img src="img/login.png" width="70%" alt=""></center>
                            </div>
                            <div class="col-md-6"><br>
                               <center><h4>เจ้าหน้าที่</h4></center><br>
                                <div class="mb-3 mx-auto" style="width:70%" >
                                    <center><input type="text" class="form-control" id="emp_firstname" name="emp_firstname" placeholder="ชื่อผู้ใช้" required></center>
                                </div>
                                <div class="mb-3 mx-auto" style="width:70%">
                                    <center><input type="password" class="form-control" id="emp_password" name="emp_password" placeholder="รหัสผ่าน" required></center>
                                </div>
                                <div class="mb-3">
                                    <center><button id="but_submit" class="btn-success btn btn-login">เข้าสู่ระบบ</button></center>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function(){
            $("#but_submit").on('click',function(){
                var emp_firstname = $("#emp_firstname").val();
                var emp_password = $("#emp_password").val();

                if( emp_firstname != "" && emp_password != "" ){
                    $.ajax({
                        url:'checkAdmin.php',
                        type:'post',
                        data:{
                            emp_firstname: emp_firstname,
                            emp_password: emp_password
                        },
                        success: function(dataResult) {
                            var dataResult = JSON.parse(dataResult);
                            if (dataResult.statusCode == 200) {
                                location.href = "index_admin.php";
                                
                            }else if(dataResult.statusCode == 201){
                                Swal.fire({
                                    icon: 'error',
                                    title: 'ชื่อผู้ใช้หรือรหัสผ่านไม่ถูกต้อง',
                                })
                            }
                        }
                    });
                }
                else{
                    Swal.fire('กรุณากรอกข้อมูลให้ครบ');
                }
            });
        });
    </script>
    
</body>
</html>