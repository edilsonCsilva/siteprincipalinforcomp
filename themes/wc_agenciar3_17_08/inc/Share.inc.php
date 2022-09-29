<style>
    .social_share i{width: 50px;height: 50px;border-radius: 50%;text-align: center;line-height: 45px;font-size: 1.2em;border: #5FC11B 2px solid;}
    .social_share i:hover{background-color: #5FC11B;color: #fff;transition-duration: 0.5s;}
</style>

<div class="back-light social_buttons">
    <ul class="social_share ul-none display-inline-block padding-15">
        <li><h3 style="border-left: 0;border-bottom: 0;margin: 0;padding-left: 0;margin-right: 15px;">Compartilhe nas Redes Sociais:</h3></li>
        <li><a href="https://www.facebook.com/share.php?u=<?= BASE . '/' . $URL[0] . '/' . $URL[1]; ?>&t=<?= $post_title ?>" title="Compartilhe no Facebook" target="_blank"><i class="fa fa-facebook"></i></a></li>
        <li><a href="https://plus.google.com/share?url=<?= BASE . '/' . $URL[0] . '/' . $URL[1]; ?>" title="Compartilhe no Google Plus" target="_blank"><i class="fa fa-google"></i></a></li>
        <li><a href="https://www.linkedin.com/shareArticle?mini=true&url=<?= BASE . '/' . $URL[0] . '/' . $URL[1]; ?>&title=<?= $post_title ?>&source=R3|Fiude Agência de Inbound Marketing" title="Compartilhe no LinkedIn" target="_blank"><i class="fa fa-linkedin"></i></a></li>
        <li><a href="https://twitter.com/share?text=<?= $post_title ?>&url=<?= BASE . '/' . $URL[0] . '/' . $URL[1]; ?>&counturl=URL&via=agenciar3" title="Compartilhe no Twitter" target="_blank"><i class="fa fa-twitter"></i></a></li>
        <li class="social_share_whatsapp"><a href="whatsapp://send?text=Estava vendo esse artigo no site <?= SITE_ADDR_NAME; ?> sobre <?= $post_title ?> e achei interessante, segue o link: <?= BASE . '/' . $URL[0] . '/' . $URL[1]; ?> . Tenho certeza que será útil para você!" title="Envie por WhatsApp" target="_blank"><i class="fa fa-whatsapp"></i></a></li>
    </ul>
</div>