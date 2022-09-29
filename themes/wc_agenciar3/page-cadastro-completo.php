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
endif; ?>
<section class="page_single">
    <div class="container breadcrumb">
        <div class="content">
             
            <h2><?php ?>
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
                <img src="<?= BASE ?>/tim.php ?src=uploads/<?= $page_cover ?>&w=1980&h=400" class="margin-bottom-75">
            <?php endif; ?>            
            <?= $page_content; ?>              
        </div>
    </div>
</section>

    <div class="">
        <div class="content">
            <div class="box box-content" style="margin-bottom: 50px;">
                <div class="tagline text-uppercase text-bold"><?= $page_subtitle; ?></div>
                <div class="text-justify"><?= $page_content; ?></div>

                <form action="/envio" name="form1" id="form" class="form-group"  method="post" enctype="multipart/form-data">
                  <div style="color: red; margin-top: -120px; margin-bottom: 36px;"><b>*</b> Campos Obrigatórios</div>
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
                        <span>Ramo de Atividade:<b style="color: red">*</b></span>
                        <label>
                            <i class="fa fa-envelope"></i>
                            <input type="text" placeholder="Qual Ramo de Atividade da empresa ?" name="ramo" required/>
                        </label>
                    </div>
                    
                       <div class="input-group">
                        <span>Data de Fundação:<b style="color: red">*</b></span>
                        <label>
                            <i class="fa fa-envelope"></i>
                            <input type="text" placeholder="Digite a data de fundação da empresa 00/00/0000 ?" class"formDate" 
                            name="dtfuncadao" required/>
                        </label>
                    </div>
                       <div class="input-group">
                         <div style="color: red; margin-top: -10px; margin-bottom: 20px;">Endereço da Empresa</div>
                         <span>Endereço<b style="color: red">*</b></span>
                         <label> <i class="fa fa-phone"></i>
                           <input type="text" placeholder="Qual seu Endereço ?" name="endereco"  required="required"/>
                         </label>
                       </div>
                       <div class="input-group"> <span>Bairro: <b style="color: red">*</b></span>
                         <label>
                           <input type="text" placeholder="Informe seu Bairro ?" name="bairro"  required="required"/>
                         </label>
                       </div>
                       <div class="input-group"></div>
                       <div class="input-group"> <span>Cidade: <b style="color: red">*</b></span>
                         <label>
                           <input type="text" placeholder="Informe sua Cidade ?" name="cidade" class="cidade" required="required"/>
                         </label>
                       </div>
                       <div> <span> Estado: <b style="color: red">*</b></span>
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
                       <div class="input-group"> <span>CEP<b style="color: red">*</b></span>
                         <label> <i class="fa fa-phone"></i>
                           <input type="text" placeholder="Digite seu Cep 0000-000 ?" name="cep"  required="required"/>
                         </label>
                       </div>
                       <div class="input-group">
                         <div style="color: red; margin-top: -10px; margin-bottom: 20px;">Informações para Contato</div>
                         <span>Email<b style="color: red">*</b></span>
                         <label> <i class="fa fa-phone"></i>
                           <input type="email" placeholder="Qual seu e-mail ?" name="email"  required="required"/>
                         </label>
                       </div>
                       <div class="input-group"> <span>Telefone Comercial<b style="color: red">*</b></span>
                         <label> <i class="fa fa-phone"></i>
                           <input type="text" placeholder="Digite o telefone comercial ?" name="phonecomercial" class="formPhone" required="required"/>
                         </label>
                       </div>
                       <div class="input-group"> <span>Telefone Celular<b style="color: red">*</b></span>
                         <label> <i class="fa fa-phone"></i>
                           <input type="text" placeholder="Digite o telefone celular ?" name="phonecelular" class="formPhone" required="required"/>
                         </label>
                       </div>
                       <div class="input-group"></div>
<div class="input-group">
          <div style="color: red; margin-top: -10px; margin-bottom: 20px;"> Dados dos Socios</div>                     
          <span>Socio 1° Nome :<b style="color: red">*</b></span>
                        <label>
                            <i class="fa fa-envelope"></i>
                            <input type="text" placeholder="Digite o Nome do 1° Socio ?" name="socionome" required/>
                        </label>
                    </div>
                     
                  <div class="input-group">
                        <span>Data de Nacimento:<b style="color: red">*</b></span>
                        <label>
                            <i class="fa fa-envelope"></i>
                            <input type="text" placeholder="Digite a data de Nascimento do 1° Socio ?" name="dt_nasc" required/>
                        </label>
                    </div>
                       <div class="input-group">
                        <span>RG:<b style="color: red">*</b></span>
                        <label>
                            <i class="fa fa-envelope"></i>
                            <input type="text" placeholder="Digite o RG do 1° Socio ?" name="rg" required/>
                        </label>
                    </div>
                       <div class="input-group">
                        <span>CPF:<b style="color: red">*</b></span>
                        <label>
                            <i class="fa fa-envelope"></i>
                            <input type="text" placeholder="Digite o CPF do 1° Socio ?" name="cpf" required/>
                        </label>
                    </div>
                    <div class="input-group">
                        <span>Socio 2° Nome :<b style="color: red">*</b></span>
                        <label>
                            <i class="fa fa-envelope"></i>
                          <input type="text" placeholder="Digite o Nome do 2° Socio ?" name="socionome2" />
                        </label>
                    </div>
                     
                  <div class="input-group">
                        <span>Data de Nacimento:<b style="color: red">*</b></span>
                        <label>
                            <i class="fa fa-envelope"></i>
                          <input type="text" placeholder="Digite a data de nascimento do 2° Socio ?" name="dt_nasc2" />
                        </label>
                  </div>
                       <div class="input-group">
                        <span>RG:<b style="color: red">*</b></span>
                        <label>
                            <i class="fa fa-envelope"></i>
                          <input type="text" placeholder="Digite o RG do 2° Socio ?" name="rg2" />
                        </label>
                    </div>
                       <div class="input-group">
                        <span>CPF:<b style="color: red">*</b></span>
                        <label>
                            <i class="fa fa-envelope"></i>
                          <input type="text" placeholder="Digite o CPF do 2° Socio ?" name="cpf2" />
                        </label>
                    </div>
                    
                    
                    
                    
                     <div class="input-group">
                        <span>Socio 3° Nome :<b style="color: red">*</b></span>
                        <label>
                            <i class="fa fa-envelope"></i>
                          <input type="text" placeholder="Digite o Nome do 3° Socio ?" name="socionome2" />
                        </label>
                    </div>
                     
                  <div class="input-group">
                        <span>Data de Nacimento:<b style="color: red">*</b></span>
                        <label>
                            <i class="fa fa-envelope"></i>
                          <input type="text" placeholder="Digite a data de nascimento do 3° Socio ?" name="dt_nasc2" />
                        </label>
                  </div>
                       <div class="input-group">
                        <span>RG:<b style="color: red">*</b></span>
                        <label>
                            <i class="fa fa-envelope"></i>
                          <input type="text" placeholder="Digite o RG do 3° Socio ?" name="rg3" />
                        </label>
                    </div>
                       <div class="input-group">
                        <span>CPF:<b style="color: red">*</b></span>
                        <label>
                            <i class="fa fa-envelope"></i>
                          <input type="text" placeholder="Digite o CPF do 3° Socio ?" name="cpf3" />
                        </label>
                    </div>
                    
                    
                    
                    
                

                  <div class="input-group">
                          <div style="color: red; margin-top: -10px; margin-bottom: 20px;">Referências Bancarias</div>
                  
                    <div class="input-group"><span>Banco:<b style="color: red">*</b></span>
                            <label> <i class="fa fa-envelope"></i>
                              <input type="text" placeholder="Informe o nome do Banco ?" name="banco" required="required"/>
                            </label>
                    </div>
                          <div class="input-group"> <span>Agência:<b style="color: red">*</b></span>
                            <label> <i class="fa fa-envelope"></i>
                              <input type="text" placeholder="Informe á Agência ?" name="agencia" required="required"/>
                            </label>
                          </div>
                          <div class="input-group"> <span>Conta:<b style="color: red">*</b></span>
                            <label> <i class="fa fa-envelope"></i>
                              <input type="text" placeholder="Digite o N° da Conta ?" name="conta" required="required"/>
                            </label>
                          </div>
                  </div>


                  <div class="input-group">
                          <div style="color: red; margin-top: -10px; margin-bottom: 20px;">Referências Comerciais</div>
                  
                    <div class="input-group"><span>Empresa:<b style="color: red">*</b></span>
                            <label> <i class="fa fa-envelope"></i>
                              <input type="text" placeholder="Informe o nome da Empresa ?" name="empresa" required="required"/>
                            </label>
                    </div>
                          <div class="input-group"> <span>Contato:<b style="color: red">*</b></span>
                            <label> <i class="fa fa-envelope"></i>
                              <input type="text" placeholder="Informe o Contato ?" name="contato" required="required"/>
                            </label>
                    </div>
                          <div class="input-group"> <span>Fone:<b style="color: red">*</b></span>
                            <label> <i class="fa fa-envelope"></i>
                              <input type="text" placeholder="Digite o N° de Telefone ?" name="fone" class="formPhone" required="required"/>
                            </label>
                    </div>
                  </div>
                  
                     <div class="input-group">
                       <div class="input-group"><span>Empresa:<b style="color: red">*</b></span>
                            <label> <i class="fa fa-envelope"></i>
                              <input type="text" placeholder="Informe o nome da Empresa ?" name="empresa1" required="required"/>
                      </label>
                    </div>
                          <div class="input-group"> <span>Contato:<b style="color: red">*</b></span>
                            <label> <i class="fa fa-envelope"></i>
                              <input type="text" placeholder="Informe o Contato ?" name="contato1"  required="required"/>
                            </label>
                    </div>
                          <div class="input-group"> <span>Fone:<b style="color: red">*</b></span>
                            <label> <i class="fa fa-envelope"></i>
                              <input type="text" placeholder="Digite o N° de Telefone ?" name="fone1" class="formPhone" required="required"/>
                            </label>
                    </div>
                  </div>
                  
                        <div class="input-group">
                       <div class="input-group"><span>Empresa:<b style="color: red">*</b></span>
                            <label> <i class="fa fa-envelope"></i>
                              <input type="text" placeholder="Informe o nome da Empresa ?" name="empresa2" required="required"/>
                      </label>
                    </div>
                          <div class="input-group"> <span>Contato:<b style="color: red">*</b></span>
                            <label> <i class="fa fa-envelope"></i>
                              <input type="text" placeholder="Informe o Contato ?" name="contato2"  required="required"/>
                            </label>
                    </div>
                          <div class="input-group"> <span>Fone:<b style="color: red">*</b></span>
                            <label> <i class="fa fa-envelope"></i>
                              <input type="text" placeholder="Digite o N° de Telefone ?" name="fone2" class="formPhone" required="required"/>
                            </label>
                    </div>
                  </div>
                  
                  
                  
                  
                  
                  
                  
                  
                  
                  

  
                   
<button type="submit"   onClick="ga('send', 'event', 'contato', 'clique');" class="btn btn_blue">Solicitar Contato</button>
                    <button type="reset" class="btn btn_blue">Cancelar</button>
                </form>
            </div>

   
        </div>
    </div>

<script async src="https://www.googletagmanager.com/gtag/js?id=UA-124043200-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-124043200-1');
</script>
