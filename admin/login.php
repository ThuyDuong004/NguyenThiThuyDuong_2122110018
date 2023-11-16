<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dang Nhap Quan Tri</title>
    <link rel="stylesheet" href="../public/bootstrap/css/bootstrap.min.css">
    <style>
        .swapper{
            max-width:600px;
            margin:auto;
            box-shadow:0px 0px 3px black;
            border-radius: 10px;
        }
    </style>
</head>
<body>
    <?php
    require_once "../vendor/autoload.php";
    use App\Models\User;
    $error = "";
    if(isset($_POST['DangNhap']))
    {
        $username=$_POST['username'];
        $password=sha1($_POST['password']);
        $args=[

            ['password','=',$password],
            ['roles','=',1],
            ['status','=',1],

        ];
        if (filter_var($username, FILTER_VALIDATE_EMAIL)) {
            $args[]=['email','=',$username];
          }
          else{
            $args[]=['username','=',$username];
          }
        $user=User::where($args)->first();
        if($user!==null){
            $_SESSION['useradmin']=$username;
            $_SESSION['user_id']=$user->id;
            $_SESSION['name']=$user->name;
            $_SESSION['image']=$user->image;
            header('location:index.php');
        }
        else {
            $error = "Tài Khoản không hợp lệ";
        }
    }
    ?>
    <form action="login.php" method="post">
        <div class="swapper mt-5 p-4">
            <h1 class="text-danger fs-3 text-center">Đăng Nhập</h1>
            <div class="mb-3">
                <label for=""><strong>Tên tài khoản(*)</strong></label>
                <input class="form-control" type="text"name="username" placeholder="Ten Dang Nhap hoac email" required>
            </div>
            <div class="mb-3">
                <label for=""><strong>Mật khẩu(*)</strong></label>
        <input class="form-control" type="password"name="password" placeholder="Mat Khau" required>
    </div>
    <div class="mb-3 text-end">
        <input class="btn-btn-success" type="submit" value="Đăng Nhập"name="DangNhap">
    </div>
    <div class="mb-3">
        <p>Chú ý:(*)bắt buộc phải điền thông tin</p>
        <?php if($error!= ""):?>
            <p class="text-danger"><?=$error;?></p>
            <?php endif;?>
        </div>
    </form>
</body>
</html>