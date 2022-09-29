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
                <li><a href=#" title="">Home</a></li>
                <li>•</li>
                <li><?= $page_title; ?></li>
            </ul>
        </div>
    </div>

    <div class="container section-midia">
        <div class="content">         
            <div class="box box-content">
                <div class="text-center">
                    <?php if ($page_cover): ?>
                        <img src="<?= BASE ?>/uploads/<?= $page_cover ?>" alt="[<?= $page_title ?>]" title="<?= $page_title ?>" style="margin-bottom: 35px; width: 215px;">
                    <?php endif; ?>
                    <p class="tagline margin-bottom-25" style=" font-size: 1.5em; font-weight: 600;"><?= $page_subtitle; ?></p>
                </div>

                <iframe width="100%" height="515" class="margin-bottom-50" src="https://www.youtube.com/embed/<?= $page_link ?>?rel=0&amp;controls=0&amp;showinfo=0?ecver=1" frameborder="0" allowfullscreen></iframe> 

                <?= $page_content; ?>                         

                <?php
                $Read->ExeRead(DB_POSTS, " WHERE post_status = 1 AND post_category = :cat ORDER BY post_date DESC LIMIT :limit", "limit=6&cat=1");
                if ($Read->getResult()):
                    ?>  
                    <h3>Últimos artigos em: <b>Internet</b> </h3>
                    <?php
                    foreach ($Read->getResult() as $Post):
                        extract($Post);
                        ?>

                        <article class="box box-3" style="margin-bottom: 35px;"> 
                            <div class="text">
                                <div>
                                    <h3><?= $post_title; ?></h3>
                                    <p><?= $post_subtitle; ?></p>
                                    <?php if ($post_lightbox == 0): ?>
                                        <a href="<?= BASE ?>/artigo/<?= $post_name; ?>" class="orange">Veja +</a>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <?php if ($post_lightbox == 1): ?>
                                <?php if ($post_cover): ?>
                                    <a title="<?= $post_title; ?>" href="https://www.youtube.com/embed/<?= $post_video; ?>" rel="shadowbox"><img src="<?= BASE ?>/tim.php?src=uploads/<?= $post_cover ?>&w=524&h=348"  alt="[<?= $post_title ?>]" title="<?= $post_title ?>"></a>
                                <?php else: ?>
                                    <a title="<?= $post_title; ?>" href="https://www.youtube.com/embed/<?= $post_video; ?>" rel="shadowbox"><img src="<?= INCLUDE_PATH ?>/images/video-default.jpg"  alt="[<?= $post_title ?>]" title="<?= $post_title ?>"></a>
                                <?php endif; ?>
                            <?php elseif ($post_lightbox == 2): ?>
                                <a title="<?= $post_title; ?>" href="<?= BASE ?>/uploads/<?= $post_cover; ?>" rel="shadowbox[gb]"><img src="<?= BASE ?>/tim.php?src=uploads/<?= $post_cover ?>&w=524&h=348" alt="[<?= $post_title ?>]" title="<?= $post_title ?>"></a>
                            <?php else: ?>
                                <img src="<?= BASE ?>/tim.php?src=uploads/<?= $post_cover ?>&w=524&h=348" class="filter" alt="[<?= $post_title ?>]" title="<?= $post_title ?>">
                            <?php endif; ?>
                        </article>
                        <?php
                    endforeach;
                endif;
                ?>   
                <div class="box box-1 text-center" style="margin-top: 30px;">
                    <a href="<?= BASE ?>/artigos/internet" title="Veja outros artigos" style="background: #fe6d24; padding: 15px 62px; color: #fff;">Veja outros artigos</a>
                </div>
            </div>
            <?php include 'inc/sidebar.php'; ?>          
        </div>
    </div>
</section>
