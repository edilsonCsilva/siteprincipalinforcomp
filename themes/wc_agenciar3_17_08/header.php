<header class="container sticky">
    <h1 class="fontzero"><?= SITE_NAME; ?></h1>
    <div class="content">


        <div class="box box-content last">
            <div class="nav-trigger">
                <span class="text-bold"><i class="icon-menu"></i></span>
            </div>

            <div class="nav-main text-right">
                <ul class="display-inline-block ul-none header_nav text-left">
                    <li><a href="<?= BASE; ?>" title="Home" class="<?php
                        if ($URL[0] == 'Link'): echo 'active';
                        endif;
                        ?>">Home</a></li>
                    <li><a href="<?= BASE; ?>/empresa" title="Empresa" class="<?php
                        if ($URL[0] == 'Link'): echo 'active';
                        endif;
                        ?>">Empresa</a></li>
                    <li><a href="<?= BASE; ?>/produtos" title="Produtos" class="<?php
                        if ($URL[0] == 'Link'): echo 'active';
                        endif;
                        ?>">Produtos</a></li>
                    <li><a href="<?= BASE; ?>/na-midia" title="Na Mídia" class="<?php
                        if ($URL[0] == 'Link'): echo 'active';
                        endif;
                        ?>">Na Mídia</a></li>
                    <li><a href="<?= BASE; ?>/contato" title="Contato" class="<?php
                        if ($URL[0] == 'Link'): echo 'active';
                        endif;
                        ?>">Contato</a></li>
                         <li><a href="<?= BASE; ?>/representantes" title="Representantes" class="<?php
                        if ($URL[0] == 'Link'): echo 'active';
                        endif;
                        ?>">Representantes</a></li>    
                        
                        
                              
                    <li><li><a href="<?= BASE ?>/acesso-restrito" title="Acesso Restrito" style="color: #333!important; font-size: 1.1em;"><i class="icon-lock"></i></a></li>
                  <!--  <form class="searchbox" name="search" action="" method="post" enctype="multipart/form-data">
                        <input type="search" placeholder="Buscar......" name="s" required>
                        <button type="submit"><i class="icon-magnifier"></i></button>                   
                    </form>                  -->
                </ul>      

            </div>

            <div class="nav-mobile"></div>
        </div>
        <div class="box box-sidebar text-right">
            <a href="<?= BASE ?>" title="<?= SITE_NAME; ?>">
                <img src="<?= INCLUDE_PATH ?>/images/logo.png" alt="[<?= SITE_NAME; ?>]" title="<?= SITE_NAME; ?>" style="margin-right: 10px; margin-top: 4px;" class="logo">
                <img src="<?= INCLUDE_PATH ?>/images/selo.png" alt="[<?= SITE_NAME; ?>]" title="<?= SITE_NAME; ?>" style="margin-top: 0px;" class="logo">
            </a>
        </div>
    </div>
    <div class="clear"></div>
</header>