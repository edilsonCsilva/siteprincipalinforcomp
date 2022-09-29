<main class="home">   
    <!--<div class="btnRec">Site em Reconstrução.</div>-->

    <!-- BANNER -->
    <div class="container section-banner">
        <?php
        $SlideSeconts = 10;
        require '_cdn/widgets/slide_v2/slide.wc.php';
        ?>          
    </div>
    <div class="clear"></div>
    <?php
    $Read->ExeRead(DB_ALERT, " WHERE page_status =1 AND page_end >= NOW() OR page_end IS NULL");
    if ($Read->getResult()):
        extract($Read->getResult()[0]);
        ?>
        <div class="container text-center padding-25" style="margin-bottom: 25px;  margin-bottom: -195px;
             margin-top: 251px;">
            <div class='content' style="border-radius: 5px; border: 2px solid #144689;">
                <?= $page_content; ?>
            </div>
        </div>
        <?php
    endif;
    ?>


    <!-- CHAMADA -->
    <section class="container section-chamada">                        
        <div class="content text-center">

            <?php
            $Read->ExeRead(DB_HOMEPAGE, "WHERE page_id = 1");
            if ($Read->getResult()):
                extract($Read->getResult()[0]);
                ?>
                <h2><?= $page_title; ?></h2>
                <div><?= $page_content; ?></div>
                <?php
            endif;
            ?>
        </div>    
        <div class="section-separator"></div>    
    </section>

    <!-- DESTAQUES -->
    <section class="container section-destaques back-light text-center margin-top-25">
        <div class="content margin-top-50">
            <?php
            $Read->ExeRead(DB_HOMEPAGE, "WHERE page_id = 2");
            if ($Read->getResult()):
                extract($Read->getResult()[0]);
                ?>
                <h2><?= $page_title; ?></h2>
                <div class="divider"></div>
                <div class="margin-bottom-50"><?= $page_content; ?></div>
                <?php
            endif;
            ?>

            <?php
            $Read->ExeRead(DB_PDT, "LIMIT :limit", "limit=5");

            if ($Read->getResult()):
                //var_dump($Read->getResult());
                foreach ($Read->getResult() as $Pdt):
                    extract($Pdt);
                    include 'inc/produto.inc.php';
                endforeach;
            endif;
            ?>          

            <section class="box box-3 back-dark-blue pdt-more">
                <a href="<?= BASE ?>/produto" title="Veja Mais Produtos">
                    <div class="destaque-more"></div>
                    <div class="more" style="margin-top: 90px;">
                        <i class="icon-plus"></i>             
                        <h3>Produtos</h3>    
                    </div>
                </a>
            </section>                                   
        </div>
    </section>

    <!-- CALL-TO-ACTION -->
    <section class="container section-parallax text-center">
        <div class="transparent"></div>
        <?php
        $Read->ExeRead(DB_HOMEPAGE, "WHERE page_id = 3");
        if ($Read->getResult()):
            extract($Read->getResult()[0]);
            ?>
            <div class="content">
                <h2><?= $page_title ?></h2>
                <div><?= $page_content ?></div>
                <a href="<?= BASE ?>/contato" class="btn btn_white" title="Saiba Mais">Saiba Mais</a>
            </div> 
            <?php
        endif;
        ?>
        <div class="section-separator"></div>        
    </section>

    <!-- BLOG -->
    <section class="container section-midia text-center margin-bottom-50">
        <div class="content margin-top-25">
            <?php
            $Read->ExeRead(DB_HOMEPAGE, "WHERE page_id = 4");
            if ($Read->getResult()):
                extract($Read->getResult()[0]);
                ?>
                <h2 style="position: relative; z-index: 1;"><?= $page_title; ?></h2>
                <div class="divider"></div>
                <div class="margin-bottom-50"><?= $page_content; ?></div>
                <?php
            endif;
            ?>

            <?php
            $Read->ExeRead(DB_PAGES, " WHERE page_name = :nm", "nm=na-midia");
            if ($Read->getResult()):
                extract($Read->getResult()[0]);
                ?>
                <?php if ($page_cover): ?>
                    <img src="<?= BASE ?>/uploads/<?= $page_cover ?>" alt="[<?= $page_title ?>]" title="<?= $page_title ?>" style="margin-bottom: 35px; width: 215px;">
                <?php endif; ?>
                <p class="tagline margin-bottom-25" style=" font-size: 1.5em; font-weight: 600;"><?= $page_subtitle; ?></p>
                <iframe width="100%" height="515" class="margin-bottom-50" src="https://www.youtube.com/embed/<?= $page_link ?>?rel=0&amp;controls=0&amp;showinfo=0?ecver=1" frameborder="0" allowfullscreen></iframe> 
                <?php
            endif;
            ?>

            <?php
            $Read->ExeRead(DB_POSTS, " WHERE post_status = 1 AND post_category = :cat ORDER BY post_date DESC LIMIT :limit", "limit=6&cat=1");
            if ($Read->getResult()):
                ?>            
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
    </section>
</main>