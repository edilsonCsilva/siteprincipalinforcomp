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
<section>
    <div class="container breadcrumb">
        <div class="content">
            <h2><?= $page_title; ?></h2>
            <ul class="ul-none display-inline-block">
                <li><a href="<?= BASE?>" title="Home">Home</a></li>
                <li>•</li>
                <li><?= $page_title; ?></li>
            </ul>
        </div>
    </div>

    <div class="container">
        <div class="content">
            <form class="searchbox" name="search" action="" method="post" enctype="multipart/form-data" style="float: right; width: 27%;">
                <input type="search" placeholder="Buscar Produtos" name="s" required>
                <button type="submit" style=" width: auto; margin-top: -40px; float: right; position: relative; padding: 10px;"><i class="icon-magnifier"></i></button>                   
            </form>   
            <p class="tagline margin-bottom-25"><?= $page_subtitle; ?></p>
            <?= $page_content; ?>              

            <div class="container section-destaques text-center margin-top-25">  

                <?php
                $Page = (!empty($URL[2]) && filter_var($URL[2], FILTER_VALIDATE_INT) ? $URL[2] : 1);
                $Pager = new Pager(BASE . "/produtos/{$URL[1]}/", "<<", ">>", 3);
                $Pager->ExePager($Page, 400);
                $Read->ExeRead(DB_PDT, "WHERE pdt_status = 1 ORDER BY pdt_title ASC LIMIT :limit OFFSET :offset", "limit={$Pager->getLimit()}&offset={$Pager->getOffset()}");
                if ($Read->getResult()):
                    foreach ($Read->getResult() as $LastPDT):
                        extract($LastPDT);
                        include 'inc/produto.inc.php';
                    endforeach;

                    $Pager->ExePaginator(DB_PDT, "WHERE pdt_status = 1");
                    echo $Pager->getPaginator();

                else:
                    $Pager->ReturnPage();
                    Erro("Não existem produtos cadastrados no momento. Mas temos outras opções! :)", E_USER_NOTICE);
                endif;
                ?>

            </div>
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
