<?php include INCLUDES . '_partner.php'; ?>

<section class="text-white py-5">
    <div class="container bg-black pb-5 rounded-lg">

        <!-- Content -->
        <article>
            <header class="header-line position-relative d-flex mb-4">
                <h3 class="bg-black px-3 mx-auto text-center">
                    <span class="text-warning"><?= $article['title']?></span>
                    <div class="text-center" style="color: rgb(255 191 0 / 0.5); font-size: 16px;">SAGAME168TH</div>
                </h3>
            </header>
            <div>
            <img src="//casino-blog/uploads/<?= $article['image'] ?>" alt="" width="600"  class="d-block float-md-left mb-4 mb-lg-3 mr-md-4 mw-100 mx-auto" style="border: 1px solid rgba(255,255,255,0.125);">
                <?= $article['detail'] ?>
            </div>
        </article>

    </div>
</section>