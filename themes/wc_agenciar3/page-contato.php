<?php





if (!$Read):
    $Read = new Read;
endif;

$Email = new Email;

$Read->ExeRead(DB_PAGES, "WHERE page_name = :nm AND page_status = 1", "nm={$URL[0]}");
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

    <div class="container contato">
        <div class="content">
            <div class="box box-content" style="margin-bottom: 50px;">
                <p class="tagline text-uppercase text-bold"><?= $page_subtitle; ?></p>
                <p class="text-justify"><?= $page_content; ?></p>

                <form action="/obrigado" id="form" class="form-group"  method="post" enctype="multipart/form-data">
                    <p style="color: red; margin-top: -21px; margin-bottom: 46px;"><b>*</b> Campos Obrigatórios</p>
                    
                    <div class="input-group">
                        <span>Primeiro Nome: <b style="color: red">*</b></span>
                        <label>
                            <i class="fa fa-user"></i>
                            <input type="text" placeholder="Como gostaria de ser chamado?" name="name" required/>
                        </label>
                    </div>

                    <div class="input-group">
                        <span>Nome da empresa: <b style="color: red">*</b></span>
                        <label>
                            <i class="fa fa-user"></i>
                            <input type="text" placeholder="Qual o nome de sua empresa?" name="nameEmpresa" required/>
                        </label>
                    </div>

                    <div class="input-group">
                        <span>E-mail:<b style="color: red">*</b></span>
                        <label>
                            <i class="fa fa-envelope"></i>
                            <input type="email" placeholder="Qual e-mail podemos lhe dar o retorno?" name="email" required/>
                        </label>
                    </div>

                    <div class="input-group">
                        <span>Telefone: <b style="color: red">*</b></span>
                        <label>
                            <i class="fa fa-phone"></i>
                            <input type="text" placeholder="Podemos conversar por qual telefone?" name="phone" class="formPhone" required/>
                        </label>
                    </div>

                    <div class="input-group">
                        <span>Assunto: <b style="color: red">*</b></span>
                        <label>
                            <i class="fa fa-tag"></i>
                            <?php
                            if (isset($_SESSION['servico'])):
                                ?>
                                <input type="text" placeholder="Qual assunto deseja tratar?" name="subject" value="Orçamento para <?= $_SESSION['servico']; ?>" required/>
                                <?php
                            else:
                                ?>
                                <input type="text" placeholder="Qual assunto deseja tratar?" name="subject" required/>
                            <?php
                            endif;
                            ?>
                        </label>
                    </div>

                    <div class="input-group">
                        <span>Mensagem: <b style="color: red">*</b></span>
                        <label>
                            <i class="fa fa-list"></i>
                            <textarea rows="5" placeholder="Conta para nós um pouco da sua necessidade..." name="message" required></textarea>
                        </label>
                    </div>

                    <button type="submit" onClick="ga('send', 'event', 'contato', 'clique');" class="btn btn_blue">Solicitar Contato</button>
                </form>           
            </div>

            <div class="box box-sidebar last">
                <header>
                    <h3 class="margin-bottom-15"><span class="marca-title">Inforcomp</span> <br> <span class="marca-subtitle">Tecnologia em Soluções Administrativas</span></h3>
                    <p>Entre em contato conosco através do formulário ao lado ou se preferir:</p>
                </header>

                <ul class="margin-top-25 ul-none">
                    <li><i class="lnr lnr-phone"></i> <?= SITE_ADDR_PHONE_A; ?></li>
                    <li><i class="fa fa-whatsapp"></i> <?= SITE_ADDR_WHATSAPP; ?></li>
                    <li><i class="lnr lnr-envelope"></i> <?= SITE_ADDR_EMAIL; ?></li>
                </ul>

                <header>
                    <h3 class="margin-0 margin-top-25">Horário de Funcionamento:</h3>
                </header>

                <ul class="margin-top-25 ul-none">
                    <li><i class="lnr lnr-clock"></i> <b>Seg. à Qui.</b> 8h às 18h</li>
                    <li><i class="lnr lnr-clock"></i> <b>Sexta</b> 8h às 17h</li>
                </ul>           
            </div>
        </div>
    </div>

    <div class="clear"></div>
    <div class="margin-top-25">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3658.6288768070353!2d-46.62798488445019!3d-23.5098733655793!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94ce5883b7b5b567%3A0xb503d2fa3c02c0fb!2sInforcomp!5e0!3m2!1spt-BR!2sbr!4v1512568341600" width="100%" height="300" frameborder="0" style="border:0; margin-bottom: -7px;" allowfullscreen></iframe>
    </div>
</section>
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-124043200-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-124043200-1');
</script>
