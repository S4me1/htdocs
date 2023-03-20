<?php

include_once '../includes/baglan.php';

session_start();

if (isset($_SESSION['GET_USER_SSID'])) {
    echo '<script>window.location.href="../anasayfa.php";</script>';
}

?>



<!DOCTYPE html>
<html class="loading dark-layout" lang="en" data-layout="dark-layout" data-textdirection="ltr">
<!-- BEGIN: Head-->

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/130527/h5ab-snow-flurry.js"></script>

<head>
<script>
jQuery(document).ready(function($){
$(document).snowFlurry({
    maxSize: 35,
    numberOfFlakes: 50,
    minSpeed: 8,
    maxSpeed: 10,
    color: '#fff',
    timeout: 0
});
});
</script>

     <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="author" content="VİVATEAM">
    <title>VİVA Check - Giriş Yap</title>
    <link rel="apple-touch-icon" href="../app-assets/images/ico/apple-icon-120.png">
    <link rel="shortcut icon" type="image/x-icon" href="../app-assets/images/ico/favicon.ico">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500;1,600" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href=".../app-assets/vendors/css/vendors.min.css">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="../app-assets/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../app-assets/css/bootstrap-extended.css">
    <link rel="stylesheet" type="text/css" href="../app-assets/css/colors.css">
    <link rel="stylesheet" type="text/css" href="../app-assets/css/components.css">
    <link rel="stylesheet" type="text/css" href="../app-assets/css/themes/dark-layout.css">
    <link rel="stylesheet" type="text/css" href="../app-assets/css/themes/bordered-layout.css">
    <link rel="stylesheet" type="text/css" href="../app-assets/css/themes/semi-dark-layout.css">

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="../app-assets/css/core/menu/menu-types/vertical-menu.css">
    <link rel="stylesheet" type="text/css" href="../app-assets/css/plugins/forms/form-validation.css">
    <link rel="stylesheet" type="text/css" href="../app-assets/css/pages/authentication.css">
    <!-- END: Page CSS-->

</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu-modern blank-page navbar-floating footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="blank-page">

    <!-- BEGIN: Content-->
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <div class="auth-wrapper auth-basic px-2">
                    <div class="auth-inner my-2">
                        <!-- Login basic -->
                        <div class="card mb-0">
                            <div class="card-body">
                                <a href="../index" class="brand-logo">
                                    <svg viewbox="0 0 139 95" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" height="28">
                                        <defs>
                                            <lineargradient id="linearGradient-1" x1="100%" y1="10.5120544%" x2="50%" y2="89.4879456%">
                                                <stop stop-color="#000000" offset="0%"></stop>
                                                <stop stop-color="#FFFFFF" offset="100%"></stop>
                                            </lineargradient>
                                            <lineargradient id="linearGradient-2" x1="64.0437835%" y1="46.3276743%" x2="37.373316%" y2="100%">
                                                <stop stop-color="#EEEEEE" stop-opacity="0" offset="0%"></stop>
                                                <stop stop-color="#FFFFFF" offset="100%"></stop>
                                            </lineargradient>
                                        </defs>
                                        <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <g id="Artboard" transform="translate(-400.000000, -178.000000)">
                                                <g id="Group" transform="translate(400.000000, 178.000000)">
                                                    <path class="text-primary" id="Path" d="M-5.68434189e-14,2.84217094e-14 L39.1816085,2.84217094e-14 L69.3453773,32.2519224 L101.428699,2.84217094e-14 L138.784583,2.84217094e-14 L138.784199,29.8015838 C137.958931,37.3510206 135.784352,42.5567762 132.260463,45.4188507 C128.736573,48.2809251 112.33867,64.5239941 83.0667527,94.1480575 L56.2750821,94.1480575 L6.71554594,44.4188507 C2.46876683,39.9813776 0.345377275,35.1089553 0.345377275,29.8015838 C0.345377275,24.4942122 0.230251516,14.560351 -5.68434189e-14,2.84217094e-14 Z" style="fill: currentColor"></path>
                                                    <path id="Path1" d="M69.3453773,32.2519224 L101.428699,1.42108547e-14 L138.784583,1.42108547e-14 L138.784199,29.8015838 C137.958931,37.3510206 135.784352,42.5567762 132.260463,45.4188507 C128.736573,48.2809251 112.33867,64.5239941 83.0667527,94.1480575 L56.2750821,94.1480575 L32.8435758,70.5039241 L69.3453773,32.2519224 Z" fill="url(#linearGradient-1)" opacity="0.2"></path>
                                                    <polygon id="Path-2" fill="#000000" opacity="0.049999997" points="69.3922914 32.4202615 32.8435758 70.5039241 54.0490008 16.1851325"></polygon>
                                                    <polygon id="Path-21" fill="#000000" opacity="0.099999994" points="69.3922914 32.4202615 32.8435758 70.5039241 58.3683556 20.7402338"></polygon>
                                                    <polygon id="Path-3" fill="url(#linearGradient-2)" opacity="0.099999994" points="101.428699 0 83.0667527 94.1480575 130.378721 47.0740288"></polygon>
                                                </g>
                                            </g>
                                        </g>
                                    </svg>
                                    <h2 class="brand-text text-primary ms-1">VİVA Check</h2>
                                </a>
								
                       <h4 class="card-title mb-1">VİVA Check'e Hoş Geldiniz! 👋</h4>
                                <p class="card-text mb-2">Lütfen hesabınıza giriş yapın</p>
                                <form id="loginForm" method="POST">
                                    <div class="mb-1">
                                        <div class="d-flex justify-content-between">
                                            <label class="form-label" for="login-password">Token</a>
                                        </div>
                                        <div class="input-group input-group-merge form-password-toggle">
                                            <input class="form-control form-control-merge" id="token" type="password" name="token" placeholder="············" aria-describedby="login-password" tabindex="2" /><span class="input-group-text cursor-pointer"><i data-feather="eye"></i></span>
                                        </div>
                                    </div>
                                    <div class="mb-1">
                                        <div class="form-check">
                                            <input class="form-check-input" id="remember-me" type="checkbox" tabindex="3" />
                                            <label class="form-check-label" for="remember-me"> Beni hatırla</label><br><br>
                                        </div>
                                    </div>
                                    <button name="login" type="submit"class="btn btn-primary w-100" tabindex="4">Giriş Yap</button><br><br>
                                </form>
                                
                        <!-- /Login-->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END: Content-->


    <!-- BEGIN: Vendor JS-->
    <script src="../app-assets/vendors/js/vendors.min.js"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <script src="../app-assets/vendors/js/forms/validation/jquery.validate.min.js"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="../app-assets/js/core/app-menu.js"></script>
    <script src="../app-assets/js/core/app.js"></script>
		 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.1.9/sweetalert2.all.min.js"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <script src="../app-assets/js/scripts/pages/auth-login.js"></script>
    <!-- END: Page JS-->

    <script>
        $(window).on('load', function() {
            if (feather) {
                feather.replace({
                    width: 14,
                    height: 14
                });
            }
        })
    </script>
    <script>
        $(document).ready(function() {
            $("#loginForm").submit(function(e) {
                e.preventDefault();
                var username = $("#username").val();
                var password = $("#password").val();
                if (username == '' || password == '') {
                    Swal.fire({
                        title: "Hata",
                        text: "Kullanıcı Adı ve Şifre Gereklidir",
                        icon: "error",
                        width: '400px',
                        confirmButtonColor: '#6610f2',
                        allowOutsideClick: false,
                        background: '#283046',
                    })
                } else {
                    $.ajax({
                        url: 'loginForm.php',
                        type: 'POST',
                        data: $(this).serialize(),
                        success: function(data) {
                            if (data == 'nullToken') {
                                Swal.fire({
                                    title: "Hata!",
                                    text: "Boş alan olamaz!",
                                    icon: "error",
                                    width: '400px',
                                    confirmButtonColor: '#6610f2',
                                    allowOutsideClick: false,
                                    background: '#283046',
                                })
                            } else if (data == 'failedToken') {
                                Swal.fire({
                                    title: "Hata!",
                                    text: "Token bulunamadı!",
                                    icon: "error",
                                    width: '400px',
                                    confirmButtonColor: '#6610f2',
                                    allowOutsideClick: false,
                                    background: '#283046',
                                })
                            
                            } else if (data == 'oneTimeLogin') {
                                Swal.fire({
                                    title: "Hata!",
                                    text: "Hesabınızı başka bir şahıs ile paylaşamazsınız!",
                                    icon: "error",
                                    width: '400px',
                                    confirmButtonColor: '#6610f2',
                                    allowOutsideClick: false,
                                    background: '#283046',
                                })
                            } else if (data == 'expireToken') {
                                Swal.fire({
                                    title: "Hata!",
                                    text: "Bu tokenin süresi bitmiştir, discord sunucumuz üzerinden iletişime geçebilirsiniz.",
                                    icon: "error",
                                    width: '400px',
                                    confirmButtonColor: '#6610f2',
                                    allowOutsideClick: false,
                                    background: '#283046',
                                })
                            } else if (data == 'success') {
                                Swal.fire({
                                    title: "Başarılı!",
                                    text: "Başarılı bir şekilde giriş yapıldı!",
                                    icon: "success",
                                    width: '400px',
                                    showConfirmButton: false,
                                    allowOutsideClick: false,
                                    background: '#283046',
                                    timer: 2000,
                                }).then(() => {
                                    window.location.href = "../anasayfa";
                                })
                            }
                        }
                    })
                }
            })
        })
    </script>

    <script>
        const inputs = document.querySelectorAll(".input");


        function addcl() {
            let parent = this.parentNode.parentNode;
            parent.classList.add("focus");
        }

        function remcl() {
            let parent = this.parentNode.parentNode;
            if (this.value == "") {
                parent.classList.remove("focus");
            }
        }
        inputs.forEach(input => {
            input.addEventListener("focus", addcl);
            input.addEventListener("blur", remcl);
        });
    </script>
<style>
.sf-snow-flake {
    position: fixed;
    top: -20px;
    z-index: 99999;
}
.sf-snow-anim {
    top: 110%;
}
</style>

</body>

</html>