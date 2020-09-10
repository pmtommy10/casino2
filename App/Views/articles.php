<?php

use App\Core\Util;

include INCLUDES . '_partner.php'; ?>

<section class="text-white py-5">
    <div class="container">

        <!-- Content -->
        <article>
            <header class="header-line position-relative d-flex mb-5">
                <h3 class="bg-black px-3 mx-auto text-center">
                    <span class="text-warning">บทความ</span>
                    <div class="text-center" style="color: rgb(255 191 0 / 0.5); font-size: 16px;">SAGAME168TH</div>
                </h3>
            </header>
            <div>
                <?php if (!$articles) : ?>
                    <h4 class="py-5 text-center text-muted">ไม่มีบทความ</h4>
                <?php else : ?>
                    <div class="row g-4 row-cols-1 row-cols-md-2 justify-content-center">
                        <?php foreach ($articles as $article) : ?>
                            <div class="col">
                                <div class="card border-warning bg-gradient bg-transparent text-white">
                                    <div class="row g-0">
                                        <div class="col-sm-4 rounded-left"
                                            style="background-image: url('//28.easyweb-thailand.com/uploads/<?= $article['image'] ?>'); 
                                                   background-position: center;
                                                   background-size: cover;"></div>
                                        <div class="col-sm">
                                            <div class="card-body">
                                                <h6 class="card-title text-warning"><?=$article['title']?></h6>
                                                <p class="text-muted small mb-1">
                                                    <i class="far fa-clock mr-2"></i><?= Util::THdatetime($article['timestamp']) ?></p>
                                                <p class="text-truncate"><?= Util::short($article['detail'], 150) ?></p>
                                                <div class="text-right">
                                                    <a href="/บทความ/<?= $article['slug']?>" class="btn stretched-link btn-outline-warning">อ่านต่อ</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </div>
            <nav class="d-flex justify-content-center mt-5" role="navigation">
                <?= $pagination ?>
            </nav>
        </article>

    </div>
</section>