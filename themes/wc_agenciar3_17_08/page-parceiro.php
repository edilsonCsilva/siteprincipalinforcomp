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
             
            <h2><?php echo "Seja Nosso" ?>
			<?= $page_title; ?></h2>
            <ul class="ul-none display-inline-block">
                <li><a href="#" title="">Home</a></li>
              
                <li><?= $page_title; ?></li>
            </ul>
        </div>
    </div>

    <div class="container page_content">
        <div class="content">
            <p class="tagline margin-bottom-25"><?= $page_subtitle; ?></p>
            <?php if ($page_cover): ?>
                <img src="<?= BASE ?>/tim.php?src=uploads/<?= $page_cover ?>&w=1980&h=400" class="margin-bottom-75">
            <?php endif; ?>            
            <?= $page_content; ?>              
        </div>
    </div>
</section>

    <div class="container contato">
        <div class="content">
            <div class="box box-content" style="margin-bottom: 50px;">
              <p class="tagline text-uppercase text-bold"><?= $page_subtitle; ?></p>
                <p class="text-justify"><?= $page_content; ?></p>
                <form action="/representante" id="form" class="form-group"  method="POST" enctype="multipart/form-data">
                <p style="color: red; margin-top: -21px; margin-bottom: 46px;"><b>*</b> Campos Obrigatórios</p>
                    
                    <div class="input-group">
                        <span>Primeiro Nome: <b style="color: red">*</b></span>
                        <label>
                            <i class="fa fa-user"></i>
                            <input type="text" placeholder="Como gostaria de ser chamado ?" name="name" required/>
                      
                        
                        
                        </label>
                    </div>

                    <div class="input-group">
                        <span>Nome da Empresa: <b style="color: red">*</b></span>
                        <label>
                            <i class="fa fa-user"></i>
                            <input type="text" placeholder="Qual o nome de sua empresa ?" name="nameEmpresa" required/>
                        </label>
                    </div>
                    
                         <div class="form-group">
                        <span>Site da Empresa: <b style="color: red">*</b></span>
                        <label>
                          
                            <input class="form-control" type="text" placeholder="Qual o Site de sua empresa ?" name="site"  required/>
                        </label>
                    </div>

                    <div class="input-group">
                        <span>E-mail:<b style="color: red">*</b></span>
                        <label>
                            <i class="fa fa-envelope"></i>
                            <input type="email" placeholder="Qual e-mail podemos lhe dar o retorno ?" name="email" required/>
                        </label>
                    </div>

                    <div class="input-group">
                        <span>Telefone: <b style="color: red">*</b></span>
                        <label>
                            <i class="fa fa-phone"></i>
                            <input type="text" placeholder="Podemos conversar por qual telefone ?" name="phone" class="formPhone" required/>
                        </label>
                    </div>
                    
                    <div class="input-group">
                        <span>Estado: <b style="color: red">*</b></span>
                        <label>
                          
                            <input type="text" placeholder="Qual Estado você é ?" name="estado" class="estado" data-error="Digite o Estado" required/>
                        </label>
                    </div>

                    
                    
                    <div class="input-group">
                        <span>Cidade: <b style="color: red">*</b></span>
                        <label>
                            
                            <input type="text" placeholder="Qual Cidade você é ?" name="cidade" class="cidade" 
                            data-error="Digite a Cidade" required/>
                        </label>
                    </div>

                    <div class="form-check">
                        <span>Areá de Atuacão:</span>
                      
                      <b style="color: red">*</b></span>
                      <br>
<label>
   <input class="form-check-input" type="checkbox" name="radio" value="Catraca" >
 
    Catraca <br>
  
   <input class="form-check-input" type="checkbox" name="radio1" value="Torniquete" checked>Torniquete<br>
   <input class="form-check-input" type="checkbox" name="radio2" value="Tertminal Auto Atendimento" checked>Tertminal Auto Atendimento<br>
   <input class="form-check-input" type="checkbox" name="radio3" value="Software Acesso" checked>Software Acesso<br>
   <input class="form-check-input" type="checkbox" name="radio4" value="Software Ponto" checked>Software Ponto<br>
   <input class="form-check-input" type="checkbox" name="radio5" value="Software Folha" checked>Software Folha<br>
                  </label> 
                    </div>

                    <div class="input-group">
                        <span>Mensagem: <b style="color: red">*</b></span>
                        <label>
                            <i class="fa fa-list"></i>
                            <textarea rows="5" placeholder="Conte para nós um pouco sobre a sua necessidade..." name="message" required></textarea>
                        </label>
                    </div>

                    <button type="submit" class="btn btn_blue">Solicitar Contato</button>
                </form>           
            <a href="/cadastro-completo"> 
            <button type="submit" class="btn btn_blue">Cadastro Completo Revenda</button>
            </a>
            </div>

   
        </div>
    </div>
