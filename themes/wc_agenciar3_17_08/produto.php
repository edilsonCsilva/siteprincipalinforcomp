<?php
$Read->ExeRead(DB_PDT, "WHERE pdt_name = :nm AND pdt_status = 1", "nm={$URL[1]}");
if (!$Read->getResult()):
    header('Location: ' . BASE . "/404.php");
    exit;
else:
    extract($Read->getResult()[0]);
    $CommentKey = $pdt_id;
    $CommentType = 'product';

    $PdtViewUpdate = ['pdt_views' => $pdt_views + 1, 'pdt_lastview' => date('Y-m-d H:i:s')];
    $Update = new Update;
    $Update->ExeUpdate(DB_PDT, $PdtViewUpdate, "WHERE pdt_id = :id", "id={$pdt_id}");

    $Read->FullRead("SELECT brand_name, brand_title FROM " . DB_PDT_BRANDS . " WHERE brand_id = :id", "id={$pdt_brand}");
    $Brand = ($Read->getResult() ? $Read->getResult()[0] : '');

    $Read->FullRead("SELECT cat_name, cat_title FROM " . DB_PDT_CATS . " WHERE cat_id = :id", "id={$pdt_subcategory}");
    $Category = ($Read->getResult() ? $Read->getResult()[0] : '');

    $CommentModerate = (COMMENT_MODERATE ? " AND (status = 1 OR status = 3)" : '');
    $Read->FullRead("SELECT id FROM " . DB_COMMENTS . " WHERE pdt_id = :pid{$CommentModerate}", "pid={$pdt_id}");
    $Aval = $Read->getRowCount();

    $Read->FullRead("SELECT SUM(rank) as total FROM " . DB_COMMENTS . " WHERE pdt_id = :pid{$CommentModerate}", "pid={$pdt_id}");
    $TotalAval = $Read->getResult()[0]['total'];
    $TotalRank = $Aval * 5;
    $getRank = ($TotalAval ? (($TotalAval / $TotalRank) * 50) / 10 : 0);
    $Rank = str_repeat("&starf;", intval($getRank)) . str_repeat("&star;", 5 - intval($getRank));

    if ($pdt_hotlink):
        header("Location: {$pdt_hotlink}");
        exit;
    endif;
endif;
?>
<section class="page_pdt">
    <div class="container breadcrumb">
        <div class="content">
            <h2><?= $pdt_title; ?></h2>
            <ul class="ul-none display-inline-block">
                <li><a href="<?= BASE ?>" title="Home">Home</a></li>
                <li>•</li>
                <li><a href="<?= BASE ?>/produtos" title="Produtos">Produtos</a></li>
                <li>•</li>
                <li><?= $pdt_title; ?></li>
            </ul>
        </div>
    </div>

    <div class="container">
        <div class="content">
            <div class="pdt-info">
                <div class="box box-sidebar box-produto">
                    <div class="destaque-item"></div>      

                    <img src="<?= BASE ?>/tim.php?src=uploads/<?= $pdt_cover ?>&w=376&h=480" alt="[<?= $pdt_title ?>]" title="<?= $pdt_title ?>" style="width: 100%;">

                    <?php
                    if ($pdt_video):
                        ?>
                        <div class="padding-15">
                            <?php if (isset($pdt_cover_title) && !empty($pdt_cover_title)): ?>
                                <p><b><?= $pdt_cover_title ?></b></p>
                                <p><small><?= $pdt_cover_subtitle ?></small></p>
                            <?php endif; ?>

                            <a href="https://www.youtube.com/embed/<?= $pdt_video ?>" rel="shadowbox" title="<?= $pdt_cover_title ?>">
                                <div class="btn_video">
                                    Ver Vídeo
                                </div>
                            </a>                    
                        </div>
                    <?php endif; ?>


                </div>

                <div class="box box-content foto-subtitle last margin-bottom-25">              
                    <p><?= $pdt_subtitle ?></p>
                    <div>
                        <?= $pdt_content ?>
                    </div>               
                </div>
            </div>
            <div class="clear"></div>
            <div class="page_content margin-top-50">    


                <?php
                //IMAGEM DE CATÁLOGO (wrap_catalogo>catalogo)
                if ($pdt_catalogo == 1):
                    ?>    
                    <div>
                        <div>
                            <?= $pdt_description ?>
                        </div>
                    </div>
                    <?php
                else:
                    //TEXTO DO PRODUTO    
                    ?>

                    <!-- SIDEBAR DE TÍTULOS -->
                    <?php
                    $Read->ExeRead(DB_ADICIONAL, " WHERE pdt_id = :pdt", "pdt={$pdt_id}");
                    if ($Read->getResult()):
                        extract($Read->getResult()[0]);
                        if ($adicional_desc):
                            ?>                           
                            <div class="box box-sidebar sidebar-pdt mob last">
                                <h4><?= $pdt_cover_title ?></h4>
                                <ul class="nav ul-none">
                                    <?php
                                    foreach ($Read->getResult() as $Pdt):
                                        extract($Pdt);
                                        $ID = explode(' ', $adicional_nome);
                                        ?>                                                               
                                        <li><i class="icon-arrow-right"></i> <a href="#<?= $ID[0]; ?>" title="<?= $adicional_nome ?>"><?= $adicional_nome ?></a></li>                                          
                                    <?php endforeach; ?>
                                    <?php if ($pdt_title_gallery): ?>
                                        <li><a href="#gallery" title="<?= $pdt_title_gallery; ?>"><i class="icon-arrow-right"></i> <?= $pdt_title_gallery; ?></a></li>
                                    <?php endif; ?>
                                </ul>
                            </div>
                            <?php
                        endif;
                    endif;
                    ?> 
                    <!-- BOX PRINCIPAL -->
                    <div class="box box-content wrap_content">
                        <!-- IMAGEM COMPLEMENTAR -->
                        <div class="clear"></div>
                        <div class="container">
                            <?= $pdt_complementar; ?>
                        </div>                     

                        <!-- TEXTO POR SEÇÃO -->
                        <?php
                        $Read->ExeRead(DB_ADICIONAL, " WHERE pdt_id = :pdt", "pdt={$pdt_id}");
                        if ($Read->getResult()):
                            foreach ($Read->getResult() as $Pdt):
                                extract($Pdt);
                                $ID = explode(' ', $adicional_nome);
                                ?>                        
                                <div class="clear"></div>
                                <h3 class="margin-bottom-25 margin-top-50 title-section" id="<?= $ID[0] ?>"><?= $adicional_nome ?></h3>
                                <?php if (isset($adicional_foto)): ?>
                                    <div class="box box-sidebar">
                                        <img src="<?= BASE ?>/upload/<?= $adicional_nome; ?>" alt="[<?= $adicional_nome ?>]" title="<?= $adicional_nome ?>">
                                    </div>
                                    <div class="box box-content desc-section last">
                                        <?= $adicional_desc; ?>
                                    </div>
                                <?php else: ?>
                                    <div class="margin-bottom-25 desc-section">
                                        <?= $adicional_desc; ?>
                                    </div>
                                <?php endif; ?>
                                <?php
                            endforeach;
                        endif;
                        ?>                        

                        <!-- GALERIA -->
                        <?php
                        $Read->ExeRead(DB_PDT_GALLERY, "WHERE product_id = :id", "id={$pdt_id}");
                        if ($Read->getResult()):
                            $i = 0;
                            echo "<h3 class='margin-bottom-25 margin-top-50 title-section' id='gallery'>{$pdt_title_gallery}</h3>";
                            echo "<ul class='display-inline margin-0'>";
                            foreach ($Read->getResult() as $PDTIMG):
                                $i++;
                                echo "<li class='box box-4 margin-bottom-25'><a rel='shadowbox[img{$pdt_id}]' title='{$pdt_title} - Foto {$i}' href='" . BASE . "/uploads/{$PDTIMG['image']}'><img title='{$pdt_title} - Foto {$i}' alt='{$pdt_title} - Foto {$i}' src='" . BASE . "/tim.php?src=uploads/{$PDTIMG['image']}&w=282&h=200'/></a></li>";
                            endforeach;
                            echo "</ul>";
                        endif;
                        ?>
                    </div>

                    <!-- SIDEBAR DE TÍTULOS -->
                    <?php
                    $Read->ExeRead(DB_ADICIONAL, " WHERE pdt_id = :pdt", "pdt={$pdt_id}");
                    if ($Read->getResult()):
                        if ($adicional_desc):
                            ?>                           
                            <div class="box box-sidebar sidebar-pdt desk last">
                                <h4><?= $pdt_cover_title ?></h4>
                                <ul class="nav ul-none">
                                    <?php
                                    foreach ($Read->getResult() as $Pdt):
                                        extract($Pdt);
                                        $ID = explode(' ', $adicional_nome);
                                        ?>                                                               
                                        <li><i class="icon-arrow-right"></i> <a href="#<?= $ID[0]; ?>" title="<?= $adicional_nome ?>"><?= $adicional_nome ?></a></li>                                          
                                    <?php endforeach; ?>
                                    <?php if ($pdt_title_gallery): ?>
                                        <li><a href="#gallery" title="<?= $pdt_title_gallery; ?>"><i class="icon-arrow-right"></i> <?= $pdt_title_gallery; ?></a></li>
                                        <?php endif; ?>
                                </ul>
                            </div>
                            <?php
                        endif;
                    endif;
                    ?> 
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
 