<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="icon" href="img/logo.png" type="image/png">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/jquery-3.5.1.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>สมัครสมาชิก</title>
    <style>
        *{
            font-family: 'supermarket';
        }
        .btn-save{
            width: 35%;
        }
        .btn-login{
            width: 20%;
        }
        .card{
            box-shadow: 0 4px 8px 0 rgba(0,0,0,0.4);
            border-radius: 25px;
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
        } */
    </style>
</head>

<body>
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-12">
            <center><h2 class="tshadow">สมัครสมาชิก</h2></center><br>
                <div class="card mx-auto" style="width:80%">
                    <div class="card-body">
                        <!-- <div class="alert alert-success alert-dismissible" id="success" style="display:none;">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                        </div> -->
                        <div class="row">
                            <div class="col-md-6">
                                <img src="img/rg.gif" width="100%" alt="">
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-4">
                                        <br>
                                        <div>
                                            <input type="text" class="form-control" name="m_username" id="m_username"
                                                placeholder="ชื่อผู้ใช้" required>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <br>
                                        <div>
                                            <input type="password" class="form-control" name="m_password" id="m_password"
                                                placeholder="รหัสผ่าน" required>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <input type="text" class="form-control" name="m_firstname" id="m_firstname"
                                                placeholder="ชื่อจริง" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <input type="text" class="form-control" name="m_lastname" id="m_lastname"
                                                placeholder="นามสกุล" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-7">
                                        <div class="mb-3">
                                            <input type="email" class="form-control" name="m_email" id="m_email"
                                                placeholder="ที่อยู่อีเมล" required>
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
                                            <textarea class="form-control" name="m_address" id="m_address" cols="30"
                                                rows="3" style="" placeholder="ที่อยู่" required></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <center><button id="butsave" class="btn-danger btn btn-save">ยืนยันการสมัครสมาชิก</button>
                                    </center>
                                </div>
                                <hr>
                                <div class="mb-3">
                                    <center><a href="login_user.php" class="btn-success btn btn-login">เข้าสู่ระบบ</a></center>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>

    function validateEmail(m_email) {
        const re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        return re.test(m_email);
    }

    $(document).ready(function () {
        $('#butsave').on('click', function () {

            var m_username = $('#m_username').val();
            var m_password = $('#m_password').val();
            var m_firstname = $('#m_firstname').val();
            var m_lastname = $('#m_lastname').val();
            var m_email = $('#m_email').val();
            var m_address = $('#m_address').val();
            var m_tel = $('#m_tel').val();

            if (m_username != "" && m_password != "" && m_firstname != "" && m_lastname != "" && m_email != "" && m_address != "" && m_tel != "") {

                if (!validateEmail(m_email)) {
                    Swal.fire({
                        icon: 'error',
                        title: 'กรุณากรอกอีเมลให้ถูกต้อง',
                    })
                }
                else{
                    $.ajax({
                        url: "save.php",
                        type: "POST",
                        data: {
                            m_username: m_username,
                            m_password: m_password,
                            m_firstname: m_firstname,
                            m_lastname: m_lastname,
                            m_email: m_email,
                            m_address: m_address,
                            m_tel: m_tel
                        },
                        cache: false,
                        success: function (dataResult) {
                            var dataResult = JSON.parse(dataResult);
                            if (dataResult.statusCode == 200) {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'สมัครสมาชิกสำเร็จ',
                                })
                                .then(()=>{ // .then เหมือนว่า พอเสร็จคำสั่งแรก ให้ทำอะไรต่อ
                                    location.href = "login_user.php";
                                })               
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
    </script>
</body>

</html>