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
             
            <h2><?php  ?>
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

                <form action="/envio" id="form" class="form-group"  method="post" enctype="multipart/form-data">
                  <div style="color: red; margin-top: -21px; margin-bottom: 46px;"><b>*</b> Campos Obrigatórios</div>
                  <div class="input-group">
                        <span>Nome Completo: <b style="color: red">*</b></span>
                        <label>
                            <i class="fa fa-user"></i>
                            <input type="text" placeholder="Como gostaria de ser chamado ?"  name="name" required/>
                        </label>
                    </div>

                    <div class="input-group">
                        <span>Razão Social: <b style="color: red">*</b></span>
                        <label>
                            <i class="fa fa-user"></i>
                            <input type="text" placeholder="Qual o nome de sua empresa ?" name="nameEmpresa" required/>
                        </label>
                    </div>
                    
                         <div class="input-group">
                        <span>Nome Fantasia: <b style="color: red">*</b></span>
                        <label>
                            <i class="fa fa-user"></i>
                            <input type="text" placeholder="Qual o nome fatasia da sua empresa ?" name="namefantasia" required/>
                        </label>
                    </div>

                    <div class="input-group">
                        <span>CPF/CNPJ:<b style="color: red">*</b></span>
                        <label>
                            <i class="fa fa-envelope"></i>
                            <input type="cpfcnpj" placeholder="Qual CPF/CNPJ da empresa ?" name="cpfcnpj" required/>
                        </label>
                    </div>
                    <div class="input-group">
                        <span>Inscrição Estadual:<b style="color: red">*</b></span>
                        <label>
                            <i class="fa fa-envelope"></i>
                            <input type="inscricao" placeholder="Qual Inscrição Estadual da empresa ?" name="inscricao" required/>
                        </label>
                    </div>

                    <div class="input-group">
                        <span>Endereço<b style="color: red">*</b></span>
                        <label>
                            <i class="fa fa-phone"></i>
                            <input type="text" placeholder="Qual seu endereço ?" name="endereco"  required/>
                        </label>
                    </div>
                    
                    
                     <div class="input-group">
                        <span>Bairro: <b style="color: red">*</b></span>
                        <label>
                          
                          <input type="text" placeholder="Informe seu bairro ?" name="bairro"  required/>
                       </label>
                  </div>
                    
                    <div class="input-group"></div>

                    
                    
                    <div class="input-group">
                        <span>Cidade: <b style="color: red">*</b></span>
                        <label>
                            
                          <input type="text" placeholder="Informe sua cidade ?" name="cidade" class="cidade" required/>
                        </label>
              
              </div>
               <div>
                 <span>   Estado: <b style="color: red">*</b></span>
                  <label>
                    <select name="estado" id="estado">
                    	<option value="AC">Acre</option>
	<option value="AL">Alagoas</option>
	<option value="AP">Amapá</option>
	<option value="AM">Amazonas</option>
	<option value="BA">Bahia</option>
	<option value="CE">Ceará</option>
	<option value="DF">Distrito Federal</option>
	<option value="ES">Espírito Santo</option>
	<option value="GO">Goiás</option>
	<option value="MA">Maranhão</option>
	<option value="MT">Mato Grosso</option>
	<option value="MS">Mato Grosso do Sul</option>
	<option value="MG">Minas Gerais</option>
	<option value="PA">Pará</option>
	<option value="PB">Paraíba</option>
	<option value="PR">Paraná</option>
	<option value="PE">Pernambuco</option>
	<option value="PI">Piauí</option>
	<option value="RJ">Rio de Janeiro</option>
	<option value="RN">Rio Grande do Norte</option>
	<option value="RS">Rio Grande do Sul</option>
	<option value="RO">Rondônia</option>
	<option value="RR">Roraima</option>
	<option value="SC">Santa Catarina</option>
	<option value="SP">São Paulo</option>
	<option value="SE">Sergipe</option>
	<option value="TO">Tocantins</option>
                  
                    </select>
                 </label>
                  </div>
                    
                    <div class="input-group">
                        <span>CEP<b style="color: red">*</b></span>
                        <label>
                            <i class="fa fa-phone"></i>
                          <input type="text" placeholder="Digite seu Cep 0000-000 ?" name="cep"  required/>
                      </label>
                  </div>
                   <div class="input-group">
                        <span>Email<b style="color: red">*</b></span>
                        <label>
                            <i class="fa fa-phone"></i>
                          <input type="email" placeholder="Qual seu e-mail  ?" name="email"  required/>
                      </label>
                  </div>
   <div class="input-group">
                        <span>Telefone Comercial<b style="color: red">*</b></span>
                        <label>
                            <i class="fa fa-phone"></i>
                          <input type="text" placeholder="Digite o telefone comercial ?" name="phonecomercial" class="formPhone" required/>
                      </label>
                  </div>
                   <div class="input-group">
                        <span>Telefone Celular<b style="color: red">*</b></span>
                        <label>
                            <i class="fa fa-phone"></i>
                          <input type="text" placeholder="Digite o telefone celular?" name="phonecelular" class="formPhone" required/>
                      </label>
                  </div>

                    <div class="input-group"></div>


                    <button type="submit" class="btn btn_blue">Solicitar Contato</button>
                    <button type="reset" class="btn btn_blue">Cancelar</button>
                </form>
            </div>

   
        </div>
    </div>
                <div><!-- Chat do Movidesk -->
<script type="text/javascript">var mdChatClient="C3B33E00FA0E4F2F837358900CA1414F";</script>
<script src="https://chat.movidesk.com/Scripts/chat-widget.min.js"></script>

<!-- Chat do Movidesk fim --></div>