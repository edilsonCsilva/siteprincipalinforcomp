<?php
if (!$Read):
    $Read = new Read;
endif;

$Read->ExeRead(DB_POSTS, "WHERE post_name = :nm AND post_date <= NOW()", "nm={$URL[1]}");
if (!$Read->getResult()):
    require REQUIRE_PATH . '/404.php';
    return;
else:
    extract($Read->getResult()[0]);
    $Update = new Update;
    $UpdateView = ['post_views' => $post_views + 1, 'post_lastview' => date('Y-m-d H:i:s')];
    $Update->ExeUpdate(DB_POSTS, $UpdateView, "WHERE post_id = :id", "id={$post_id}");

    $Read->ExeRead(DB_CATEGORIES, "WHERE category_id = :cat", "cat={$post_category}");
    if ($Read->getResult()):
        $Category = $Read->getResult()[0];
    endif;
endif;
?>
<section class="page_single">
    <div class="container breadcrumb">
        <div class="content">
            <h2><?= $post_title; ?></h2>
            <ul class="ul-none display-inline-block">
                <li><a href="#" title="">Home</a></li>
                <li>•</li>
                <li><?= $post_title?></li>
            </ul>
        </div>
    </div>

    <div class="container section-midia">
        <div class="content">
            <p class="tagline margin-bottom-25"><?= $post_subtitle; ?></p>            
            <div class="box box-content">
                <?php
                if ($post_video):
                    echo "<div class='embed-container'>";
                    echo "<iframe id='mediaview' width='640' height='360' src='https://www.youtube.com/embed/{$post_video}?rel=0&amp;showinfo=0&autoplay=0&origin=" . BASE . "' frameborder='0' allowfullscreen></iframe>";
                    echo "</div>";
                else:
                    ?>
                    <img src="<?= BASE; ?>/tim.php?src=uploads/<?= $post_cover; ?>&w=1200&h=380" title="<?= $post_title ?>" alt="<?= $post_title ?>" class="margin-bottom-25">
                    <ul class="padding-0 display-inline-block post-breadcrumb margin-0">
                        <li><i class="fa fa-calendar"></i> Em: <?= date('d/m/Y', strtotime($post_date)); ?> /</li>
                        <li><i class="fa fa-user"></i> Por Equipe /</li>
                        <li><i class="fa fa-folder"></i> <?= $Category['category_title']; ?></li>
                    </ul>
                <?php endif;
                ?>
                <div class="htmlchars">
                    <?= $post_content; ?>
                </div>
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
