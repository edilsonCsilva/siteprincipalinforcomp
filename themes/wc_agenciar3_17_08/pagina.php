<?php
if (!$Read):
    $Read = new Read;
endif;

$Email = new Email;

$Read->ExeRead(DB_PAGES, "WHERE page_name = :nm", "nm={$URL[0]}");
if (!$Read->getResult()):
    require REQUIRE_PATH . '/404.php';
    return;
else:
    extract($Read->getResult()[0]);
endif;
?>
<section class="page_single">
    <div class="container breadcrumb">
        <div class="content">
            <h2><?= $page_title; ?></h2>
            <ul class="ul-none display-inline-block">
                <li><a href="#" title="">Home</a></li>
                <li>•</li>
                <li><?= $page_title; ?></li>
            </ul>
        </div>
    </div>

    <div class="container page_content">
        <div class="content">
            <p class="tagline margin-bottom-25"><?= $page_subtitle; ?></p>
            <?php if ($page_cover): ?>
                <img src="<?= BASE ?>/tim.php?src=uploads/<?= $page_cover ?>&w=1980&h=400" class="margin-bottom-75">
            <?php endif; ?>            
            <?= $page_content; ?>              
        </div>
    </div>
</section>
