<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>APLIKASI LAPTOPKU</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo base_url('assets/css/font-awesome.min.css'); ?>">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url('assets/css/AdminLTE.min.css'); ?>">
</head>

<body class="login-page">

<style>
body.login-page{
    margin:0;
    padding:0;
    height:100vh;
    display:flex;
    justify-content:center;
    align-items:center;
    font-family:'Poppins', sans-serif;

    background: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)),
url('<?php echo base_url('assets/images/laptopku.jpg'); ?>');
background-size: cover;
background-position: center;
background-repeat: no-repeat;
}

.login-box{
    width:400px;
}

.login-box-body{
    background: rgba(255,255,255,0.15);
    padding:40px;
    border-radius:20px;

    backdrop-filter: blur(10px);

    box-shadow: 0 8px 32px rgba(0,0,0,0.3);

    color:white;
}

.login-title{
    text-align:center;
    font-size:24px;
    font-weight:600;
    margin-bottom:30px;
    line-height:35px;
}

.form-control{
    height:45px;
    border-radius:10px;
    border:none;
    padding-left:15px;
    margin-bottom:15px;
}

.form-control:focus{
    box-shadow:0 0 10px rgba(255,255,255,0.5);
}

.btn-login{
    background:#00c6ff;
    background: linear-gradient(to right, #0072ff, #00c6ff);

    border:none;
    height:45px;
    border-radius:10px;

    font-size:16px;
    font-weight:bold;

    transition:0.3s;
}

.btn-login:hover{
    transform:translateY(-2px);
    box-shadow:0 5px 15px rgba(0,0,0,0.3);
}

.input-icon{
    position:absolute;
    right:15px;
    top:12px;
    color:#666;
}

.form-group{
    position:relative;
}
</style>

<div class="login-box">
    <div class="login-box-body">

        <div class="login-title">
            APLIKASI LAPTOPKU
        </div>

        <form action="<?php echo site_url('login/cek'); ?>" method="post">

            <div class="form-group">
                <input type="text"
                       name="username"
                       class="form-control"
                       placeholder="Username"
                       required>

                <span class="fa fa-user input-icon"></span>
            </div>

            <div class="form-group">
                <input type="password"
                       name="password"
                       class="form-control"
                       placeholder="Password"
                       required>

                <span class="fa fa-lock input-icon"></span>
            </div>

            <button type="submit"
                    name="login"
                    class="btn btn-login btn-block">

                Login
            </button>

        </form>

    </div>

    <?php echo $this->session->flashdata('pesan'); ?>

</div>

<script src="<?php echo base_url('assets/js/jQuery-2.1.4.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>"></script>

</body>
</html>