<?php


print_r("fdsfsdf");
exit();


?>



<section class="page_single">
    <div class="container breadcrumb">
        <div class="content">
            <h2>Obrigado</h2>
            <ul class="ul-none display-inline-block">
                <li><a href="#" title="">Home</a></li>
                <li>•</li>
                <li>Obrigado</li>
            </ul>
        </div>
    </div>

    <div class="container contato">
        <div class="content">
            <div class="box box-content">           
                <?php
                if ($_POST['name'] != " "):
                    $name = $_POST['name'];
                    $nameEmpresa = $_POST['nameEmpresa'];
                    $email = $_POST['email'];
                    $phone = $_POST['phone'];
                    $subject = $_POST['subject'];
                    $message = $_POST['message'];
                    $Dados = [
                        'Name' => $name,
                        'NameEmpresa' => $nameEmpresa,
                        'Email' => $email,
                        'Phone' => $phone,
                        'Subject' => $subject,
                        'Message' => $message
                    ];
                    $Dados = array_map('strip_tags', $Dados);
                    $Dados = array_map('trim', $Dados);

                    $headers = "From: " . $Dados['Email'] . "\r\n";
                    $headers .= "Reply-To: " . $Dados['Email'] . "\r\n";
                    $headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";

                    $corpo = '
                    <font face="Tahoma" size="3">
                    <p>Novo contato de <b>' . $Dados['Name'] . '</b></p>
                    <p><b>Nome da empresa </b>' . $Dados['NameEmpresa'] . '</p>
                    <p><b>Telefone:</b> ' . $Dados['Phone'] . '</p> '
                    . '<p><b>Email:</b> ' . $Dados['Email'] . '</p>
                    <p><b>Assunto:</b> ' . $Dados['Subject'] . ' </p>
                    <p><b>MENSAGEM</b><br> ' . $Dados['Message'] . ' </p>
                    </font>
                    <style>body{height: auto !important;font-family: "Tahoma", sans-serif;} p{margin-botton: 15px 0 !important;font-family: "Tahoma", sans-serif;}</style>';

                    //$email_to = 'inforcomp@inforcomp.com.br';
                    $email_to = 'chamadogoogle@inforcomp.com.br';
                    $status = mail($email_to, '📩 [Mensagem Site] ' . $Dados['Subject'], $corpo, $headers);

                    if ($status):
                        echo "<p class='padding-15 text-center' style='border: 1px solid #1a3661;'>Olá " . $Dados['Name'] . ", o seu formulário foi enviado com sucesso, em breve entraremos em contato.</p>";
                    //header('Location: ' . BASE . '/contato');
                    else:
                        echo "Desculpe, houve um erro ao enviar, por favor, tente novamente ou entre em contato pelo telefone" . SITE_ADDR_PHONE_A . " ou pelo e-mail " . SITE_ADDR_EMAIL;
                    endif;
                else:
                    echo "<p class='padding-15 text-center' style='border: 1px solid #1a3661;'>Por favor preencha o formulário</p>";
                endif;
                ?>
            </div>

            <div class="box box-sidebar last">
                <header><meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
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
