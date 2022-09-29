<?php
if (!$Read):
    $Read = new Read;
endif;

$Read->ExeRead(DB_CATEGORIES, "WHERE category_name = :nm", "nm={$URL[1]}");
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
            <h2><?= $category_title; ?></h2>
            <ul class="ul-none display-inline-block">
                <li><a href="#" title="">Home</a></li>
                <li>•</li>
                <li><?= $category_title; ?></li>
            </ul>
        </div>
    </div>

    <div class="container section-midia">
        <div class="content">
            <div class="box box-content">
                <?php
                $Page = (!empty($URL[2]) ? $URL[2] : 1);
                $Pager = new Pager(BASE . "/artigos/{$category_name}/", "<<", ">>", 5);
                $Pager->ExePager($Page, 9);
                $Read->ExeRead(DB_POSTS, "WHERE post_status = 1 AND (post_category = :ct OR FIND_IN_SET(:ct, post_category_parent)) ORDER BY post_date DESC LIMIT :limit OFFSET :offset", "limit={$Pager->getLimit()}&offset={$Pager->getOffset()}&ct={$category_id}");
                if (!$Read->getResult()):
                    $Pager->ReturnPage();
                    echo Erro("Ainda não existe posts cadastrados. Por favor, volte mais tarde :)", E_USER_NOTICE);
                else:
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
                <div class="clear"></div>
                <?php
                $Pager->ExePaginator(DB_POSTS, "WHERE post_status = 1 AND (post_category = :ct OR FIND_IN_SET(:ct, post_category_parent))", "ct={$category_id}");
                echo $Pager->getPaginator();
                ?>          
            </div>            
            <?php include 'inc/sidebar.php'; ?>  
        </div>
    </div>
</section>
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-124043200-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-124043200-1');
</script>
