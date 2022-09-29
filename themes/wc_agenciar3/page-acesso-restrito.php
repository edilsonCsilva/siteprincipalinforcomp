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
<section class="page_single">
    <div class="container breadcrumb">
        <div class="content">
            <h2><?= $page_title; ?></h2>
            <ul class="ul-none display-inline-block">
                <li><a href="#" title="">Home</a></li>
                <li>•</li>
                <li><?= $page_title; ?></li>
            </ul>
        </div>
    </div>

    <div class="container page_content cliente margin-bottom-75">
        <div class="content">
            <p class="tagline margin-bottom-25"><?= $page_subtitle; ?></p>
            <?php if ($page_cover): ?>
                <img src="<?= BASE ?>/tim.php?src=uploads/<?= $page_cover ?>&w=1980&h=400" class="margin-bottom-75">
            <?php endif; ?>            
            <?= $page_content; ?>  

                <div class="box box-2" style="padding: 15px; border: 1px solid #333;">
                    <h3 class="margin-bottom-25"><i class="icon-user"></i> Acesso ao Cliente</h3>
                <form method="POST" action="https://www.inforcomp.com.br/banco/autentica2.php">
                    <label>
                        <span>Usuário</span>
                        <input type="text" name="txtUser" id="txtUser">
                    </label>
                    <label>
                        <span>Senha</span>
                        <input type="password" name="txtSenha" txtSenha>
                    </label>
                    <button type="submit" class="btn">Entrar</button>
                </form>
            </div>
            <div class="box box-2 last" style="padding: 15px; border: 1px solid #333;">
                <h3 class="margin-bottom-25"><i class="icon-earphones-alt"></i> Acesso ao Revendedor</h3>
                <form method="Post" action="http://www.inforcomp.com.br/representantes/revendanet/loginrev.php">
                    <label>
                        <span>Usuário</span>
                        <input type="text" name="log">
                    </label>
                    <label>
                        <span>Senha</span>
                        <input type="password" name="sen">
                    </label>
                    <button type="submit" class="btn">Entrar</button>
                </form>
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
