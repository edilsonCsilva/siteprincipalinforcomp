<?php
if (!$Read):
    $Read = new Read;
endif;
?>
<div class="container page_interna">
    <div class="content">
        <section>
            <header>
            	<h1>Desculpe, Rotina temporariamente fora do ar !</h1>
                <h1>Em breve retornamos</h1>
                <!--<h1>Desculpe, mas não encontramos o que você procura!</h1>-->
                <p>A página ou conteúdo acessado não foi encotado em nosso site. Sentimos muito por isso! Por favor. Faça uma pesquisa, ou ainda veja abaixo uma lista de alguns conteúdos!</p>
            </header>

            <form class="search_form form" name="search" action="" method="post" enctype="multipart/form-data">
                <div class="box box-content">
                    <input type="text" name="s" placeholder="Pesquisar Artigos:" required/>
                </div>
                <div class="box box-sidebar  last">
                    <button class="btn btn-full">Pesquisar</button>
                </div>
            </form>
            <div class="clear"></div>

            <header>
                <h2 class="margin-top-50">Veja alguns Artigos!</h2>
            </header>

            <?php
            $Read->ExeRead(DB_POSTS, "WHERE post_status = 1 AND post_date <= NOW() ORDER BY post_views DESC LIMIT 4");
            if ($Read->getResult()):
                foreach ($Read->getResult() as $Post):
                    extract($Post);
                    $box = "box-3";
                    require 'inc/posts.inc.php';
                endforeach;
            endif;
            ?>

        </section>
        <div class="clear"></div>
    </div>
</div>