<?php
if (!$Read):
    $Read = new Read;
endif;

$Read->ExeRead(DB_POSTS, "WHERE post_name = :nm AND post_status = 1 AND post_date <= NOW()", "nm={$URL[$url_atual]}");
if (!$Read->getResult()):
    require REQUIRE_PATH . '/404.php';
    return;
else:
    extract($Read->getResult()[0]);
    $Update = new Update;
    $UpdateView = ['post_views' => $post_views + 1, 'post_lastview' => date('Y-m-d H:i:s')];
    $Update->ExeUpdate(DB_POSTS, $UpdateView, "WHERE post_id = :id", "id={$post_id}");
endif;

unset($_SESSION['servico']);
?>

<h1 class="fontzero"><?= SITE_ADDR_NAME; ?></h1>

<section class="container">
    <div class="content">
        <?php
        $Page = (!empty($URL[2]) ? $URL[2] : 1);
        $Pager = new Pager(BASE . "/artigos/{$category_name}/", "<<", ">>", 5);
        $Pager->ExePager($Page, 5);
        $Read->ExeRead(DB_POSTS, "WHERE post_status = 1 AND post_date <= NOW() AND (post_category = :ct OR FIND_IN_SET(:ct, post_category_parent)) ORDER BY post_date DESC LIMIT :limit OFFSET :offset", "limit={$Pager->getLimit()}&offset={$Pager->getOffset()}&ct={$category_id}");
        if (!$Read->getResult()):
            $Pager->ReturnPage();
            echo Erro("Ainda Não existe posts cadastrados. Favor volte mais tarde :)", E_USER_NOTICE);
        else:
            foreach ($Read->getResult() as $Post):
                extract($Post);
                ?>
                <article class="main_blog_post">
                    <a title="Ler mais sobre <?= $post_title; ?>" href="<?= BASE; ?>/artigo/<?= $post_name; ?>">
                        <img title="<?= $post_title; ?>" alt="<?= $post_title; ?>" src="<?= BASE; ?>/uploads/<?= $post_cover; ?>"/>
                    </a>
                    <header>
                        <h1><a title="Ler mais sobre <?= $post_title; ?>" href="<?= BASE; ?>/artigo/<?= $post_name; ?>"><?= $post_title; ?></a></h1>
                        <p class="tagline"><?= $post_subtitle; ?></p>
                    </header>
                </article>
                <?php
            endforeach;
        endif;

        $Pager->ExePaginator(DB_POSTS, "WHERE post_status = 1 AND post_date <= NOW() AND (post_category = :ct OR FIND_IN_SET(:ct, post_category_parent))", "ct={$category_id}");
        echo $Pager->getPaginator();
        ?>

        <?php require REQUIRE_PATH . '/inc/sidebar_cat.php'; ?>
        <div class="clear"></div>
    </div>
</section>