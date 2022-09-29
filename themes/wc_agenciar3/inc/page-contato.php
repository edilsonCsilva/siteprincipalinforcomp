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
            <div class="box box-content">
                <p class="tagline text-uppercase text-bold"><?= $page_subtitle; ?></p>
                <p class="text-justify"><?= $page_content; ?></p>

                <form action="/obrigado" method="post" enctype="multipart/form-data">
                    <span>Primeiro Nome:</span>
                    <label>
                        <i class="fa fa-user"></i>
                        <input type="text" placeholder="Como gostaria de ser chamado?" name="name" required/>
                    </label>

                    <span>E-mail:</span>
                    <label>
                        <i class="fa fa-envelope"></i>
                        <input type="email" placeholder="Qual e-mail podemos lhe dar o retorno?" name="email" required/>
                    </label>

                    <span>Telefone:</span>
                    <label>
                        <i class="fa fa-phone"></i>
                        <input type="phone" placeholder="Podemos conversar por qual telefone?" name="telefone" class="formPhone" required/>
                    </label>

                    <span>Assunto:</span>
                    <label>
                        <i class="fa fa-tag"></i>
                        <?php
                        if (isset($_SESSION['servico'])):
                            ?>
                            <input type="text" placeholder="Qual assunto deseja tratar?" name="assunto" value="Orçamento para <?= $_SESSION['servico']; ?>" required/>
                            <?php
                        else:
                            ?>
                            <input type="text" placeholder="Qual assunto deseja tratar?" name="assunto" required/>
                        <?php
                        endif;
                        ?>
                    </label>

                    <span>Mensagem:</span>
                    <label>
                        <i class="fa fa-list"></i>
                        <textarea rows="5" placeholder="Conta para nós um pouco da sua necessidade..." name="message" required></textarea>
                    </label>

                    <button type="submit" class="btn btn_blue">Solicitar Contato</button>
                </form>           
            </div>

            <div class="box box-sidebar last">
                <header>
                    <h3 class="margin-bottom-15"><span class="marca-title">Inforcomp</span> <br> <span class="marca-subtitle">Tecnologia em Soluções Administrativas</span></h3>
                    <p>Entre em contato conosco através do formulário ao lado ou se preferir:</p>
                </header>

                <ul class="margin-top-25 ul-none">
                    <li><i class="lnr lnr-phone"></i> <?= SITE_ADDR_PHONE_A; ?></li>
                    <li><i class="lnr lnr-phone"></i> <?= SITE_ADDR_EMAIL; ?></li>
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
        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d116977.11523829035!2d-46.58249990908202!3d-23.621009368771503!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1spt-BR!2sbr!4v1499717129969" width="100%" height="300" frameborder="0" style="border:0; margin-bottom: -7px;" allowfullscreen></iframe>
    </div>
</section>