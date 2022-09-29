<footer class="container back-gradiente-black">
    <div class="content">
        <section class="box box-3 footer-info">
            <h2 class="fontzero">Inforcomp</h2>
            <img src="<?= INCLUDE_PATH ?>/images/logo-footer.png" alt="<?= SITE_NAME?>" title="<?= SITE_NAME?>" class="logo-footer margin-bottom-15">
            <p><i class="transparent-white">Desde 1982</i></p>
            <ul class="ul-none">
                <li><i class="icon-location-pin"></i> Rua força pública nº 72 - Bairro Santana</li>
                <li><i class="icon-envelope"></i> inforcomp@inforcomp.com.br</li>
                <li><i class="icon-earphones-alt"></i> (11) 2226-3600</li>
            </ul>
        </section>
        <section class="box box-3 footer-midia">
            <h2>Produtos</h2>
            <ul class="ul-none">
                <?php
                $Read->ExeRead(DB_PDT, " WHERE pdt_status = 1 ORDER BY pdt_title ASC LIMIT :limit", "limit=5");
                if ($Read->getResult()):
                    foreach ($Read->getResult() as $Post):
                        extract($Post);
                        ?>
                        <li>
                            <a href="<?= BASE ?>/produto/<?= $pdt_name ?>" title="<?= $pdt_title?>"><i class="icon-arrow-right"></i> <?= Check::Words($pdt_title, 10); ?></a>
                            <div class="divider-footer"></div>                            
                        </li>                           
                        <?php
                    endforeach;
                endif;
                ?>      
                <li><a href="<?= BASE ?>/produtos" title="Veja mais produtos"><i class="icon-arrow-right"></i> Veja mais produtos</a></li>
            </ul>
        </section>
        <section class="box box-3 last footer-mapa">
            <h2>Localize a Inforcomp</h2>
            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d58518.80415132345!2d-46.643759350390624!3d-23.55316552308586!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1spt-BR!2sbr!4v1496682746038" height="250"  style="border:0;width:100%" allowfullscreen></iframe>
        </section>
    </div>
    <div class="clear"></div>

    <div class="content copyright">
        <p class="small float-left">© 2017 - <?= date('Y'); ?> | Todos os direitos reservados a <?= SITE_NAME; ?>. | <a href="<?= BASE?>/acesso-restrito" title="Acesso Restrito"><i class="icon-lock"></i> Acesso Restrito</a></p>
        <p class="small float-right">Desenvolvido por <a href="https://www.agenciar3.com.br" title="R3|Fiude Agência de Inbound Marketing e Marketing Digital" target="_blank">R3|Fiude Inbound Marketing</a>.</p>
    </div>
<!-- Chat do Movidesk -->
<script type="text/javascript">var mdChatClient="C3B33E00FA0E4F2F837358900CA1414F";</script>
<script src="https://chat.movidesk.com/Scripts/chat-widget.min.js"></script>
<!-- Chat do Movidesk fim -->
</footer>