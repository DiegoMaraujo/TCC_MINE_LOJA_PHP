<?php require_once("home/head.php") ?>
        <div class="modal-dialog" >
            <!-- Modal content-->
            <div class="modal-content" >
              <h3 style="margin-left: 30px;">Forma de pagamento  </h3>
                <div id="menu" href="#i" style="margin-left: 120;" >
                    <button class="btn btn-info " id="cartao">Cartão</button>
                    <button class="btn btn-info " id="boleto">Boleto</button>
                    <button class="btn btn-info " id="pagOline"  >Pagamento oline</button>
                </div>
                    <div id="geral" href="#i" class="container clearfix">
                        <div  class="form-group col-md-4" id="cartao" >
                                <h2 class="creditCard">Dados do Cartão</h2>            
                                
                                <select  >
                                    <option>Credito</option>
                                    <option>Dbito</option>
                                </select><br><br>
                                
                                <label class="creditCard">Número do cartão</label>
                                <input type="text" name="numCartao" id="numCartao" class="form-control"> 
                                <span class="bandeira-cartao creditCard"></span>

                                <label class="creditCard">CVV do cartão</label>
                                <input type="text" name="cvvCartao" id="cvvCartao" maxlength="3" value="123"  class="form-control">

                                <input type="hidden" name="bandeiraCartao"class="form-control" id="bandeiraCartao">

                                <label class="creditCard">Mês de Validade</label>
                                <input type="text" name="mesValidade" id="mesValidade" maxlength="2" value="12"  class="form-control">

                                <label class="creditCard">Ano de Validade</label>
                                <input type="text" name="anoValidade" id="anoValidade" maxlength="4" class="form-control"><br><br>

                                <label class="creditCard">Quantidades de Parcelas</label>
                                <select name="qntParcelas" id="qntParcelas" class="select-qnt-parcelas creditCard">
                                    <option>1</option>
                                    <option>6</option>
                                    <option>12</option>
                                </select><br><br>

                                <input type="hidden" name="valorParcelas" class="form-control" id="valorParcelas">

                                <label  class="creditCard">CPF do dono do Cartão</label>
                                <input type="text" name="creditCardHolderCPF" id="creditCardHolderCPF" placeholder="CPF sem traço" value="22111944785" class="form-control">

                                 <label class="creditCard">Nome do Caãtao</label>
                                <input type="text" name="creditCardHolderName" id="creditCardHolderName"  class="form-control"> 

                                <label class="creditCard">Banteira do Cartão</label>
                                <input type="text" name="creditCardHolderName" id="creditCardHolderName"  class="form-control">
                        </div>

                        <div class="f" id="boleto"  >
                            <h1>boleto</h1>
                            <div style="width: 480px;height: 300px">
                                <img src="img/Boleto.png">
                            </div>
                        </div>

                        <div class="f" id="pagOline"  > 
                             <div style="width: 480px;height: 300px; margin-left: 120px;margin-top: 3%">
                                <h2>Pagamentos oline</h2><br>
                                <img src="img/pagOline.jpg"><br>
                                <button class="btn btn-info">PagueSeguro</button>
                                <button class="btn btn-info">Mercado pago</button>
                                <button class="btn btn-info">paypal</button>
                            </div> 

                        </div>

                          <script src="js/ocutaDive.js"></script>
                        <!----------------------------------------------------------------------->
                    </div>
                        <div class="modal-footer">
                           <?php echo '<a class="btn btn-info" href="finalizarPedido.php" >Pagar<a/>'?>
                        </div> 
                    </div>
                </div>
            </div>
        </div>

