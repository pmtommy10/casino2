<?php
    $url = $_SERVER['REQUEST_URI'];
?>
<!-- <header class="bg-gradient" style="background-color: black;">
    <div class="container pb-3">
        <div class="row gy-4 gy-sm-5 gx-lg-5 justify-content-between justify-content-lg-around justify-content-xl-center align-items-center">

            <div class="col-md-5 col-lg-4 col-xl-3">
                <a href="/">
                    <img src="https://www.ufacorner.com/wp-content/uploads/2020/03/logo-ufacorner.png.webp" alt="" class="img-fluid">
                </a>
            </div>
            
            <div class="col-lg-4 py-4 lh-sm d-none d-xl-block text-white">
                <h4>ID LINE : <a href="#" class="link-success text-decoration-none">@UFACN</a></h4>
                <p class="mb-2">ส่งตรงจาก SAGAME168TH ไม่ผ่านเอเยนต์ มั่นใจ 100% สมัครเลย</p>
                <ul class="m-0">
                    <li>SAGAME168TH เว็บแทงบอลออนไลน์ อันดับ 1</li>
                    <li>ให้บริการตลอด 24 ชั่วโมง</li>
                    <li>ฝาก-ถอน ไม่เกิน 3 นาที</li>
                </ul>
            </div>

            <div class="col-md-5 col-lg-4 col-xl-3">
                <form action="" method="post">
                    <h5 id="login-header" class="text-center position-relative font-weight-normal d-flex align-items-center justify-content-center py-2">
                        <span class="line w-100" style="height: 3px; background-color: rgba(255,255,255,0.2);"></span>
                        <span class="text-nowrap text-white px-3">เข้าสู่ระบบ</span>
                        <span class="line w-100" style="height: 3px; background-color: rgba(255,255,255,0.2);"></span>
                    </h5>
                    <div class="mb-1"><input type="text" class="form-control rounded-0" placeholder="Username"></div>
                    <div class="mb-1"><input type="password" class="form-control rounded-0" placeholder="Password"></div>
                    <button type="submit" class="btn btn-danger btn-block rounded-0 bg-gradient">LOGIN</button>
                </form>
            </div>

        </div>
    </div>
</header> -->
<nav class="navbar navbar-expand-lg navbar-dark bg-gradient shadow sticky-top overflow-auto" style="background-color: rgba(0,0,0,0.95);">
    <div class="container-xl">
        <a class="navbar-brand" href="/">
            <img src="https://www.sagame168th.com/images/sagame168th-small.png" alt="" height="50" style="filter: drop-shadow(1px 1px 0px black) drop-shadow(-1px -1px 0px black);">
            <span class="d-none"><strong>UFA</strong><small>BET</small></span>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#webNav" aria-controls="webNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            เมนู
        </button>
        <div class="collapse navbar-collapse" id="webNav">
            <div class="flex-row flex-wrap ml-auto navbar-nav py-3 py-lg-0 text-nowrap">
                <a class="bg-gradient border-0 btn btn-lg btn-outline-light mb-2 mb-sm-3 mb-lg-0 mx-0 mx-lg-1 rounded-lg shadow col-lg-auto col-12 col-sm-5 mx-auto <?= $pageHeader['url'] === '/โปรโมชั่น' ? 'active' : ''?>" href="/โปรโมชั่น" style="font-weight: 500;">โปรโมชั่น</a>
                <a class="bg-gradient border-0 btn btn-lg btn-outline-light mb-2 mb-sm-3 mb-lg-0 mx-0 mx-lg-1 rounded-lg shadow col-lg-auto col-12 col-sm-5 mx-auto <?= $pageHeader['url'] === '/สมัครสมาชิก' ? 'active' : ''?>" href="javascript:void(0)" onclick="scrollToTarget('#register');" style="font-weight: 500;">สมัครสมาชิก</a>
                <a class="bg-gradient border-0 btn btn-lg btn-outline-light mb-2 mb-sm-3 mb-lg-0 mx-0 mx-lg-1 rounded-lg shadow col-lg-auto col-12 col-sm-5 mx-auto <?= $pageHeader['url'] === '/คาสิโน' ? 'active' : ''?>" href="/คาสิโน" style="font-weight: 500;">คาสิโน</a>
                <a class="bg-gradient border-0 btn btn-lg btn-outline-light mb-2 mb-sm-3 mb-lg-0 mx-0 mx-lg-1 rounded-lg shadow col-lg-auto col-12 col-sm-5 mx-auto <?= $pageHeader['url'] === '/บาคาร่า' ? 'active' : ''?>" href="/บาคาร่า" style="font-weight: 500;">บาคาร่า</a>
                <a class="bg-gradient border-0 btn btn-lg btn-outline-light mb-2 mb-sm-3 mb-lg-0 mx-0 mx-lg-1 rounded-lg shadow col-lg-auto col-12 col-sm-5 mx-auto <?= $pageHeader['url'] === '/สล็อต' ? 'active' : ''?>" href="/สล็อต" style="font-weight: 500;">สล็อต</a>
                <a class="bg-gradient border-0 btn btn-lg btn-outline-light mb-2 mb-sm-3 mb-lg-0 mx-0 mx-lg-1 rounded-lg shadow col-lg-auto col-12 col-sm-5 mx-auto <?= $pageHeader['url'] === '/แทงบอล' ? 'active' : ''?>" href="/แทงบอล" style="font-weight: 500;">แทงบอล</a>
                <a class="bg-gradient border-0 btn btn-lg btn-outline-light mb-2 mb-sm-3 mb-lg-0 mx-0 mx-lg-1 rounded-lg shadow col-lg-auto col-12 col-sm-5 mx-auto <?= $pageHeader['url'] === '/ติดต่อเรา' ? 'active' : ''?>" href="/ติดต่อเรา" style="font-weight: 500;">ติดต่อเรา</a>
                <a class="bg-gradient border-0 btn btn-lg btn-outline-light mb-2 mb-sm-3 mb-lg-0 mx-0 mx-lg-1 rounded-lg shadow col-lg-auto col-12 col-sm-5 mx-auto <?= $pageHeader['url'] === '/ทางเข้าเล่น' ? 'active' : ''?>" href="javascript:void(0)" onclick="scrollToTarget('#entry');" style="font-weight: 500;">ทางเข้าเล่น</a>
            </div>
        </div>

    </div>
</nav>