<?php
$Search = urldecode($URL[1]);
$SearchPage = urlencode($Search);

if (empty($_SESSION['search']) || !in_array($Search, $_SESSION['search'])):
    $Read->FullRead("SELECT search_id, search_count FROM " . DB_SEARCH . " WHERE search_key = :key", "key={$Search}");
    if ($Read->getResult()):
        $Update = new Update;
        $DataSearch = ['search_count' => $Read->getResult()[0]['search_count'] + 1];
        $Update->ExeUpdate(DB_SEARCH, $DataSearch, "WHERE search_id = :id", "id={$Read->getResult()[0]['search_id']}");
    else:
        $Create = new Create;
        $DataSearch = ['search_key' => $Search, 'search_count' => 1, 'search_date' => date('Y-m-d H:i:s'), 'search_commit' => date('Y-m-d H:i:s')];
        $Create->ExeCreate(DB_SEARCH, $DataSearch);
    endif;
    $_SESSION['search'][] = $Search;
endif;
?>
<div class="container breadcrumb">
    <div class="content">
        <h2>Resultado da Pesquisa para <?= $SearchPage?></h2>
        <ul class="ul-none display-inline-block">
            <li><a href="#" title="">Home</a></li>
            <li>•</li>
            <li>Resultado da Pesquisa</li>
        </ul>
    </div>
</div>
<div class="container main_content">
    <div class="content">
        <div class="main_blog">
            <div class="container section-destaques text-center margin-top-25">  
                <?php
                $Page = (!empty($URL[2]) ? $URL[2] : 1);
                $Pager = new Pager(BASE . "/pesquisa/{$SearchPage}/", "<<", ">>", 5);
                $Pager->ExePager($Page, 5);
                $Read->ExeRead(DB_PDT, "WHERE pdt_status = 1 AND (pdt_title LIKE '%' :s '%' OR pdt_subtitle LIKE '%' :s '%') ORDER BY pdt_title DESC LIMIT :limit OFFSET :offset", "limit={$Pager->getLimit()}&offset={$Pager->getOffset()}&s={$Search}");
                if (!$Read->getResult()):
                    $Pager->ReturnPage();
                    echo Erro("Desculpe, mas sua pesquisa para <b>{$Search}</b> não retornou resultados. Talvez você queira utilizar outros termos! Você ainda pode usar nosso menu de navegação para encontrar o que procura!", E_USER_NOTICE);
                else:
                    foreach ($Read->getResult() as $Post):
                        extract($Post);
                        ?>
                        <section class="box box-3"> 
                            <a href="<?= BASE ?>/produto/<?= $pdt_name ?>" title="">
                                <div class="destaque-item"></div>
                                <img src="<?= BASE ?>/tim.php?src=uploads/<?= $pdt_cover ?>&w=376&h=480" alt="[]" title="" style="width: 100%;">
                                <h3 class="margin-top-15"><?= $pdt_title ?></h3> 
                            </a>
                        </section>
                        <?php
                    endforeach;
                endif;

                $Pager->ExePaginator(DB_POSTS, "WHERE post_status = 1 AND post_date <= NOW() AND (post_title LIKE '%' :s '%' OR post_subtitle LIKE '%' :s '%')", "s={$Search}");
                echo $Pager->getPaginator();
                ?>
            </div>
        </div>

        <div class="clear"></div>
    </div>
</div>
