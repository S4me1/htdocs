<?php

include_once 'includes/baglan.php';

session_start();

?>
<!DOCTYPE html>
<html class="loading dark-layout" lang="tr" data-layout="dark-layout" data-textdirection="ltr">

<head>
    <title>Üyelik Paketleri</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="apple-touch-icon" href="app-assets/images/ico/apple-icon-120.png">
    <link rel="shortcut icon" type="image/x-icon" href="app-assets/images/ico/favicon.ico">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500;1,600" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="app-assets/vendors/css/vendors.min.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/plugins/extensions/ext-component-sweet-alerts.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/bootstrap-extended.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/colors.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/components.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/themes/dark-layout.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/themes/bordered-layout.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/themes/semi-dark-layout.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/core/menu/menu-types/vertical-menu.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/pages/page-pricing.css">
    <link rel="stylesheet" type="text/css" href=".assets/css/style.css">
</head>

<?php
include_once("includes/header.php");
?>

<?php
include_once("includes/menu.php");
?>

<div class="app-content content ">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper container-xxl p-0">
        <div class="content-header row">
        </div>
        <div class="content-body">
            <section id="pricing-plan">
                <div class="text-center">
                    <h1 class="mt-2">SavageChecker Üyelik Paketleri</h1>
                    <p class="mb-2 pb-75">
                        İhtiyaçlarınıza uygun en iyi planı seçin.
                    </p>
                </div>

                <div class="row pricing-card">
                    <div class="col-12 col-sm-offset-2 col-sm-10 col-md-12 col-lg-offset-2 col-lg-10 mx-auto">
                        <div class="row">
                            <div class="col-12 col-md-4">
                                <div class="card basic-pricing text-center">
                                    <div class="card-body">
                                        <img src="app-assets/images/illustration/Pot1.svg" class="mb-2 mt-5" alt="svg img" />
                                        <h3>SavagePass</h3>
                                        <p class="card-text">Basit bir başlangıç için</p>
                                        <div class="annual-plan">
                                            <div class="plan-price mt-2">
                                                <span class="pricing-basic-value fw-bolder text-primary">150</span>
                                                <sup class="font-medium-1 fw-bold text-primary">₺</sup>
                                                <sub class="pricing-duration text-body font-medium-1 fw-bold">1 haftalık</sub>
                                            </div>
                                            <small class="annual-pricing d-none text-muted"></small>
                                        </div>
                                        <button class="btn w-100 btn-outline-primary mt-2" onclick="DiscordServer();" id="type-error4">Satın Al</button>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 col-md-4">
                                <div class="card standard-pricing popular text-center">
                                    <div class="card-body">
                                        <div class="pricing-badge text-end">
                                            <span class="badge rounded-pill badge-light-primary">Popüler</span>
                                        </div>
                                        <img src="app-assets/images/illustration/Pot2.svg" class="mb-1" alt="svg img" />
                                        <h3>SavagePremium</h3>
                                        <p class="card-text">Orta bazlı ihtiyaçlar için</p>
                                        <div class="annual-plan">
                                            <div class="plan-price mt-2">
                                                <span class="pricing-standard-value fw-bolder text-primary">300</span>
                                                <sup class="font-medium-1 fw-bold text-primary">₺</sup>
                                                <sub class="pricing-duration text-body font-medium-1 fw-bold">1 aylık</sub>
                                            </div>
                                            <small class="annual-pricing d-none text-muted"></small>
                                        </div>
                                        <button class="btn w-100 btn-primary mt-2" onclick="DiscordServer();" id="type-error5">Satın Al</button>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 col-md-4">
                                <div class="card enterprise-pricing text-center">
                                    <div class="card-body">
                                        <img src="app-assets/images/illustration/Pot3.svg" class="mb-2" alt="svg img" />
                                        <h3>SavagePremium+</h3>
                                        <p class="card-text">Yüksek bazlı ihtiyaçlar için</p>
                                        <div class="annual-plan">
                                            <div class="plan-price mt-2">
                                                <span class="pricing-enterprise-value fw-bolder text-primary">800</span>
                                                <sup class="font-medium-1 fw-bold text-primary">₺</sup>
                                                <sub class="pricing-duration text-body font-medium-1 fw-bold">3 aylık</sub>
                                            </div>
                                            <small class="annual-pricing d-none text-muted"></small>
                                        </div>
                                        <button type="button" class="btn w-100 btn-outline-primary mt-2" onclick="DiscordServer();" id="type-error6">Satın Al</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="pricing-faq">
                    <h3 class="text-center">Sıkça Sorulan Sorular</h3>
                    <p class="text-center">En sık sorulan soruları yanıtlamaya yardımcı olalım.</p>
                    <div class="row my-2">
                        <div class="col-12 col-lg-10 col-lg-offset-2 mx-auto">
                            <div class="accordion accordion-margin" id="accordionExample">
                                <div class="card accordion-item">
                                    <h2 class="accordion-header" id="headingTwo">
                                        <button class="accordion-button collapsed" data-bs-toggle="collapse" role="button" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                            Kredi Kartı İle Ödeme Yapabilir Miyim ?
                                        </button>
                                    </h2>
                                    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            Sistemimiz otomatik bir şekilde ödemeye el verişli değildir.
                                            Fakat <a href="https://discord.com/savroblox" target="_blank">Discord</a> sunucumuza gelip bizlere ulaşarak, böyle bir ödeme yöntemini
                                            başarılı bir şekilde gerçekleştirebilirsiniz.
                                        </div>
                                    </div>
                                </div>
                                <div class="card accordion-item">
                                    <h2 class="accordion-header" id="headingThree">
                                        <button class="accordion-button collapsed" data-bs-toggle="collapse" role="button" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                            Deneme Üyelik Alabilir Miyim?
                                        </button>
                                    </h2>
                                    <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            Böyle bir şey ne yazık ki söz konusu değildir. SavageChecker yetkilisi olduğunu iddia eden kişilerle iletişim kurmayınız, sadece web sitemiz üzerinden destek alınız.
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>

<script>
    function DiscordServer()
    {
        window.location = 'https://discord.gg/savroblox';
        return false;
    }
</script>


<?php
include_once("includes/ayar.php");
?>


<div class="sidenav-overlay"></div>
<div class="drag-target"></div>

<button class="btn btn-primary btn-icon scroll-top" type="button"><i data-feather="arrow-up"></i></button>

<script src="app-assets/vendors/js/vendors.min.js"></script>
<script src="app-assets/js/core/app-menu.js"></script>
<script src="app-assets/js/core/app.js"></script>
<script src="app-assets/js/scripts/customizer.min.js"></script>
<script src="app-assets/vendors/js/extensions/sweetalert2.all.min.js"></script>
<script src="app-assets/js/scripts/extensions/ext-component-sweet-alerts.js"></script>


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
</body>

</html>