<section class="page_single">
    <div class="container breadcrumb">
        <div class="content">
            <h2>Obrigado</h2>
            <ul class="ul-none display-inline-block">
                <li><a href="#" title="">Home</a></li>
                <li>•</li>
                <li>Obrigado Entraremos em Contato</li>
            </ul>
        </div>
    </div>

    <div class="container contato">
        <div class="content">
            <div class="box box-content">           
                <?php

				require_once("phpmailer/class.phpmailer.php");
				require_once("phpmailer/class.smtp.php");
				$serverSMTP=array(
					"host"=>"mail.inforcomp.com.br",
					"port"=>"587",
					"smtsecure"=>"tsl",
					"user"=>"no_reply@inforcomp.com.br",
					"password"=>"kkkiu%$,68",
					"whoissending"=>array(
						"sending"=>array("email"=>"no_reply@inforcomp.com.br","title"=>"InforComp"),
						"sendinginforcomp"=>array("email"=>"joseroberto@inforcomp.com.br","title"=>"InforComp")


					)
				);

				
                if ($_POST['name'] != " "):
                    //dados cadastrais
					$name = $_POST['name'];
                    $nameEmpresa = $_POST['nameEmpresa'];
                    $namefantasia = $_POST['namefantasia'];
					$cpfcnpj = $_POST['cpfcnpj'];
                    $inscricao = $_POST['inscricao'];
					$ramo = $_POST['ramo'];
					$dtfuncadao = $_POST['dtfuncadao'];
					//dados logradouro
					$endereco = $_POST['endereco'];
					$bairro = $_POST['bairro'];
					$cidade = $_POST['cidade'];
					$estado = $_POST['estado'];
					$cep = $_POST['cep'];
					//dados contato
					$email = $_POST['email'];
					$phonecomercial = $_POST['phonecomercial'];
					$phonecelular = $_POST['phonecelular'];
					//dados socios
					$socionome  = $_POST['socionome'];
					$dt_nasc = $_POST['dt_nasc'];
					$rg = $_POST['rg'];
					$cpf = $_POST['cpf'];
					$socionome1 = isset($_POST['socionome1']) ? $_POST['socionome1'] : '';	
					$dt_nasc1 = isset($_POST['dt_nasc1']) ? $_POST['dt_nasc1'] : '';	
					$rg1 = isset($_POST['rg1']) ? $_POST['rg1'] : '';	
					$cpf1 = isset($_POST['cpf1']) ? $_POST['cpf1'] : '';	
					$socionome2 = isset($_POST['socionome2']) ? $_POST['socionome2'] : '';	
					$dt_nasc2 = isset($_POST['dt_nasc2']) ? $_POST['dt_nasc2'] : '';	
					$rg2 = isset($_POST['rg2']) ? $_POST['rg2'] : '';	
					$cpf2 = isset($_POST['radio']) ? $_POST['cpf2'] : '';	
					// dados bancarios
					$banco = $_POST['banco'];
					$agencia = $_POST['agencia'];
					$conta = $_POST['conta'];
					// dados referencias comerciais
					$empresa = $_POST['empresa'];
					$contato = $_POST['contato'];
					$fone = $_POST['fone'];
					$empresa1 = $_POST['empresa1'];
					$contato1 = $_POST['contato1'];
					$fone1 = $_POST['fone1'];
					$empresa2 = $_POST['empresa2'];
					$contato2 = $_POST['contato2'];
					$fone2 = $_POST['fone2'];				
					$Dados = [
                        'Name' => $name,
                        'NameEmpresa' => $nameEmpresa,
                        'Namefantasia' => $namefantasia,
						'Cpfcnpj' => $cpfcnpj,
                        'Inscricao' => $inscricao,
						'Ramo' => $ramo,
						'Dtfuncao' => $dtfuncadao,
						'Endereco' => $endereco,
						'Bairro' => $bairro,
						'Cidade' => $cidade,
						'Estado' => $estado,
						'Cep' => $cep,
						'Email' => $email,
						'Phonecomercial' => $phonecomercial,
						'Phonecelular' => $phonecelular,
						'Socionome' => $socionome,
						'Dt_nasc' => $dt_nasc,
						'Rg' => $rg,
						'Cpf' => $cpf,
						'Socionome1' => $socionome1,
						'Dt_nasc1' => $dt_nasc1,
						'Rg1' => $rg1,
						'Cpf1' => $cpf1,
						'Socionome2' => $socionome2,
						'Dt_nasc2' => $dt_nasc2,
						'Rg2' => $rg2,
						'Cpf2' => $cpf2,						
						'Banco' => $banco,
						'Agencia' => $agencia,
						'Conta' => $conta,
						'Empresa' => $empresa,
						'Contato' => $contato,
						'Fone' => $fone,
						'Empresa1' => $empresa1,
						'Contato1' => $contato1,
						'Fone1' => $fone1,
						'Empresa2' => $empresa2,
						'Contato2' => $contato2,
						'Fone2' => $fone2
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
					<p><b>Nome Fantasia: </b>' . $Dados['Namefantasia'] . '</p>
					<p><b>CPF / CNPJ: </b>' . $Dados['Cpfcnpj'] . '</p>
                    <p><b>Inscri&ccedil;&atilde;o Estadual:</b> ' . $Dados['Inscricao'] . '</p>
					<p><b>Ramo de Atividade:</b> ' . $Dados['Ramo'] . '</p>
					<p><b>Data de Funda&ccedil;&atilde;o:</b> ' . $Dados['Dtfuncao'] . '</p>
					<h3>Endere&ccedil;o da Empresa</h3><hr>
					<p><b>Endere&ccedil;o:</b> ' . $Dados['Endereco'] . '</p>
				    <p><b>Bairro:</b> ' . $Dados['Bairro'] . '</p>
					<p><b>Cidade:</b> ' . $Dados['Cidade'] . ' </p>
					<p><b>Estado:</b> ' . $Dados['Estado'] . ' </p>
					<p><b>Cep:</b> ' . $Dados['Cep'] . ' </p>
					<h3>Informa&ccedil;&otilde;es para Contato</h3><hr>
					<p><b>Email:</b> ' . $Dados['Email'] . '</p>
					<p><b>Telefone Comercial:</b> ' . $Dados['Phonecomercial'] . '</p> '.'
					<p><b>Telefone Celular:</b> ' . $Dados['Phonecelular'] . '</p> '.'
               		<h3>Dados dos Socios</h3><hr>
					<p><b>Nome do Socio:</b> ' . $Dados['Socionome'] . '</p>
					<p><b>Data de Nascimento:</b> ' . $Dados['Dt_nasc'] . '</p>
					<p><b>Numero Rg:</b> ' . $Dados['Rg'] . '</p>
					<p><b>Numero Cpf:</b> ' . $Dados['Cpf'] . '</p>
					<p><b>Nome do Socio:</b> ' . $Dados['Socionome1'] . '</p>
					<p><b>Data de Nascimento:</b> ' . $Dados['Dt_nasc1'] . '</p>
					<p><b>Numero Rg:</b> ' . $Dados['Rg1'] . '</p>
					<p><b>Numero Cpf:</b> ' . $Dados['Cpf1'] . '</p>
					<p><b>Nome do Socio:</b> ' . $Dados['Socionome2'] . '</p>
					<p><b>Data de Nascimento:</b> ' . $Dados['Dt_nasc2'] . '</p>
					<p><b>Numero Rg:</b> ' . $Dados['Rg2'] . '</p>
					<p><b>Numero Cpf:</b> ' . $Dados['Cpf2'] . '</p>
					<h3>Refer&ecirc;ncias Bancarias</h3><hr>
					<p><b>Nome do Banco:</b> ' . $Dados['Banco'] . '</p>
					<p><b>Numero da Agencia:</b> ' . $Dados['Agencia'] . '</p>
					<p><b>Numero da Conta:</b> ' . $Dados['Conta'] . '</p>
					<h3>Refer&ecirc;ncias Comerciais</h3><hr>
					<p><b>Nome da Empresa:</b> ' . $Dados['Empresa'] . '</p>
					<p><b>Nome do Contato:</b> ' . $Dados['Contato'] . '</p>
					<p><b>Numero de Telefone:</b> ' . $Dados['Fone'] . '</p>
					<p><b>Nome da Empresa:</b> ' . $Dados['Empresa1'] . '</p>
					<p><b>Nome do Contato:</b> ' . $Dados['Contato1'] . '</p>
					<p><b>Numero de Telefone:</b> ' . $Dados['Fone1'] . '</p>
					<p><b>Nome da Empresa:</b> ' . $Dados['Empresa2'] . '</p>
					<p><b>Nome do Contato:</b> ' . $Dados['Contato2'] . '</p>
					<p><b>Numero de Telefone:</b> ' . $Dados['Fone2'] . '</p>
					</font>
                    <style>body{height: auto !important;font-family: "Tahoma", sans-serif;} p{margin-botton: 15px 0 !important;font-family: "Tahoma", sans-serif;}</style>';

                    //$email_to = 'webmaster@inforcomp.com.br';
                   // $email_to = 'chamadogoogle@inforcomp.com.br';
				  //	$email_to = 'joseroberto@inforcomp.com.br';
                  //  $status = mail($email_to,'📩 [Mensagem Site] ' . $Dados['NameEmpresa'], $corpo, $headers);


				  try{
					$mail = new PHPMailer(true);
					$mail->CharSet = "UTF-8";
					//Server settings
					$mail->SMTPDebug =1;// SMTP::DEBUG_SERVER;                      //Enable verbose debug output
					$mail->isSMTP();                                            //Send using SMTP
					$mail->Host       =$serverSMTP["host"]; // 'mail.inforcomp.com.br';                     //Set the SMTP server to send through
					$mail->SMTPAuth   = true;                                   //Enable SMTP authentication
					$mail->Username   = $serverSMTP["user"];                     //SMTP username
					$mail->Password   = $serverSMTP["password"];                        //SMTP password
					$mail->SMTPSecure = $serverSMTP["smtsecure"]; // PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
					$mail->Port       = $serverSMTP["port"];                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
					//Recipients
					$mail->setFrom($serverSMTP["whoissending"]["sending"]["email"], $serverSMTP["whoissending"]["sending"]["title"]);
					//Content
					$mail->addCC($serverSMTP["whoissending"]["sendinginforcomp"]["email"]);
					$mail->addAddress("drmatematic@yahoo.com.br");     //Add a recipient
					$mail->isHTML(true);                                  //Set email format to HTML
					$mail->Subject = "Cadastro Recebido da Plataforma Parceiro'inforcomp.com'";
					$mail->Body    = $corpo;
					$mail->AltBody = '';
					$status=$mail->send();
				
                    if ($status):
                        echo "<p class='padding-15 text-center' style='border: 1px solid #1a3661;'>Olá " . $Dados['Name'] . ", o seu formulário foi enviado com sucesso, em breve entraremos em contato.</p>";
                    //header('Location: ' . BASE . '/contato');
                    else:
                        echo "Desculpe, houve um erro ao enviar, por favor, tente novamente ou entre em contato pelo telefone" . SITE_ADDR_PHONE_A . " ou pelo e-mail " . SITE_ADDR_EMAIL;
                    endif;
			  }catch(Exception $e){}








                else:
                    echo "<p class='padding-15 text-center' style='border: 1px solid #1a3661;'>Por favor preencha o formulário</p>";
                endif;
                ?>
            </div>

            <div class="box box-sidebar last">
                <header><meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
                    <h3 class="margin-bottom-15"><span class="marca-title">Inforcomp</span> <br> <span class="marca-subtitle">Tecnologia em Soluções Administrativas</span></h3><hr>
                    <p>Entre em contato conosco através do formulário ao lado ou se preferir:</p>
                </header>

                <ul class="margin-top-25 ul-none">
                    <li><i class="lnr lnr-phone"></i> <?= SITE_ADDR_PHONE_A; ?></li>
                    <li><i class="fa fa-whatsapp"></i> <?= SITE_ADDR_WHATSAPP; ?></li>
                    <li><i class="lnr lnr-envelope"></i> <?= SITE_ADDR_EMAIL; ?></li>
                </ul>

                <header>
                    <h3 class="margin-0 margin-top-25">Horário de Funcionamento:</h3><hr>
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

