<div class="box box-sidebar box-aside last">
    <h3>Categorias</h3>               
    <ul class="ul-none">
        <?php
        $Read->ExeRead(DB_CATEGORIES);
        if ($Read->getResult()):
            foreach ($Read->getResult() as $Cat):
                ?>
                <li><a href="<?= BASE ?>/artigos/<?= $Cat['category_name']; ?>" title="<?= $Cat['category_title']; ?>"><?= $Cat['category_title']; ?></a></li>
                <?php
            endforeach;
        endif;
        ?>     
    </ul>
</div>  