<?php
if (!$Read):
    $Read = new Read;
endif;

$Read->ExeRead(DB_CATEGORIES, "WHERE category_name = :nm", "nm={$URL[$url_atual]}");
if (!$Read->getResult()):
    require REQUIRE_PATH . '/404.php';
    return;
else:
    extract($Read->getResult()[0]);
endif;

unset($_SESSION['servico']);
?>

<h1 class="fontzero"><?= SITE_ADDR_NAME; ?></h1>


<section class="container pg_interna">
    <?php include 'breadcrumb-categoria.inc.php'; ?>
    <div class="content-notop">
        <p class="tagline text-uppercase text-bold"><?= $category_content; ?></p>
        <p class="text-justify padding-bottom-15"></p>

        <div class="box box-content">
            <?php
            $Page = (!empty($URL[2]) ? $URL[2] : 1);
            $Pager = new Pager(BASE . "/artigos/{$category_name}/", "<<", ">>", 5);
            $Pager->ExePager($Page, 10);
            $Read->ExeRead(DB_POSTS, "WHERE post_status = 1 AND post_date <= NOW() AND (post_category = :ct OR FIND_IN_SET(:ct, post_category_parent)) ORDER BY post_date DESC LIMIT :limit OFFSET :offset", "limit={$Pager->getLimit()}&offset={$Pager->getOffset()}&ct={$category_id}");
            if (!$Read->getResult()):
                $Pager->ReturnPage();
                echo Erro("Ainda Não existe posts cadastrados. Favor volte mais tarde :)", E_USER_NOTICE);
            else:
                foreach ($Read->getResult() as $Post):
                    extract($Post);
                    $box = "box-2";
                    require 'posts.inc.php';
                endforeach;
            endif;
            echo "<div class='clear'></div>";

            $Pager->ExePaginator(DB_POSTS, "WHERE post_status = 1 AND post_date <= NOW() AND (post_category = :ct OR FIND_IN_SET(:ct, post_category_parent))", "ct={$category_id}");
            echo $Pager->getPaginator();
            ?>
        </div>

        <div class="box box-sidebar last">
            <?php require 'sidebar-artigos.inc.php'; ?>
        </div>  
    </div>
    <div class="clear"></div>
</section>