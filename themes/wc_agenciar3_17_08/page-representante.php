<section class="page_single">
    <div class="container breadcrumb">
        <div class="content">
            <h2>Obrigado</h2>
            <ul class="ul-none display-inline-block">
                <li><a href="https://www.inforcomp.com.br/" title="">Home</a></li>
                <li>•</li>
                <li>Obrigado Entraremos em Contato</li>
            </ul>
        </div>
    </div>

    <div class="container contato">
        <div class="content">
            <div class="box box-content">           
                <?php
				error_reporting(0);
				ini_set('display_errors�]', 0 );
                if ($_POST['name'] != " "):
                    $name = $_POST['name'];
                    $nameEmpresa = $_POST['nameEmpresa'];
                    $site = $_POST['site'];
					$email = $_POST['email'];
                    $phone = $_POST['phone'];
					$estado = $_POST['estado'];
					$cidade = $_POST['cidade'];
                    //$radio = $_POST['radio'];
					$radio = isset($_POST['radio']) ? $_POST['radio'] : '';	
					$radio1 = isset($_POST['radio1']) ? $_POST['radio1'] : '';	
					$radio2 = isset($_POST['radio2']) ? $_POST['radio2'] : '';	
					$radio3 = isset($_POST['radio3']) ? $_POST['radio3'] : '';	
					$radio4 = isset($_POST['radio4']) ? $_POST['radio4'] : '';	
					$radio5 = isset($_POST['radio5']) ? $_POST['radio5'] : '';	
                    $message = $_POST['message'];			
				
	
					
					$Dados = [
                        'Name' => $name,
                        'NameEmpresa' => $nameEmpresa,
                        'Site' => $site,
						'Email' => $email,
                        'Phone' => $phone,
						'Estado' => $estado,
						'Cidade' => $cidade,
                        'radio' => $radio,
						'radio1' => $radio1,
						'radio2' => $radio2,
						'radio3' => $radio3,
						'radio4' => $radio4,
						'radio5' => $radio5,
                        'Message' => $message
                    ];
                    $Dados = array_map('strip_tags', $Dados);
                    $Dados = array_map('trim', $Dados);

                    $headers = "From: " . $Dados['Email'] . "\r\n";
                    $headers .= "Reply-To: " . $Dados['Email'] . "\r\n";
                    $headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";

                    $corpo = '
                    <font face="Tahoma" size="3">
                    <p>Novo Contato de <b>' . $Dados['Name'] . '</b></p>
                    <p><b>Nome da Empresa: </b>' . $Dados['NameEmpresa'] . '</p>
					 <p><b>Site da Empresa: </b>' . $Dados['Site'] . '</p>
                    <p><b>Telefone:</b> ' . $Dados['Phone'] . '</p> '
                    . '<p><b>Email:</b> ' . $Dados['Email'] . '</p>
                     <p><b>Estado:</b> ' . $Dados['Estado'] . ' </p>
					  <p><b>Cidade:</b> ' . $Dados['Cidade'] . ' </p>
					<p><b>Area de Interesse:</b> ' . $Dados['radio'] . '
					 ' . $Dados['radio1'] . '
					 ' . $Dados['radio2'] . '
					 ' . $Dados['radio3'] . '
					 ' . $Dados['radio4'] . '
					 ' . $Dados['radio5'] . '
					 
					 
					 </p>
                    <p><b>MENSAGEM</b><br> ' . $Dados['Message'] . ' </p>
                    </font>
                    <style>body{height: auto !important;font-family: "Tahoma", sans-serif;} p{margin-botton: 15px 0 !important;font-family: "Tahoma", sans-serif;}</style>';

                    //$email_to = 'webmaster@inforcomp.com.br';
                   // $email_to = 'chamadogoogle@inforcomp.com.br';
				  	$email_to = 'joseroberto@inforcomp.com.br';
                    $status = mail($email_to,'📩 [Mensagem Site] ' . $Dados['NameEmpresa'], $corpo, $headers);

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