
  <h2 style="margin-left: 50px" >Cadastro Cliente</h2>
    <div class="jumbotron jumbotron-fluid row form-group col-md-8 container " style="margin-left: 350px; border: 1px solid #888;border-radius: 5px; box-shadow: 3px 3px 6px #9e9c9c">
       
        <form  action="cadastro.php" method="POST" id="cadastro" name="form1" >
       
        <legend>Dados do Cliente</legend>
            <label >
                <span>Login :</span> <input name="login" class="form-control" type="text" />
            </label>
            <label>
                <span>Senha :</span> <input name="senha" class="form-control" type="password" />
            </label>
            <label >
                <span>Nome Completo :</span> <input name="nome" class="form-control" type="text" onkeyup="validar(this,'text')"/>
            </label>
             <label >
                <span>CPF :</span> <input name="cpf" id="cpf" maxlength="14"class="form-control" type="text" required placeholder="000.000.000-00" onkeyup="validar(this,'num')"onkeypress="return mask(event, this, '###.###.###-##')"/>
            </label>
            <label >
                <span>E-mail :</span> <input name="email" class="form-control" type="text" />
            </label>
            <label >
                <span>Celular :</span> <input name="telefone" id="celular"class="form-control" type="text" maxlength="15" required placeholder="(00)0-0000-0000" onkeyup="validar(this,'num')" 
                onkeypress="return mask(event, this, '(##) #####-####')"/>
            </label>
        
        <legend>Endereço</legend>
              <label >
                <span>Rua :</span> <input name="rua" id="rua"class="form-control" type="text" onkeyup="validar(this,'text')"/> 
              </label>
              <label >
                <span>Número :</span> <input name="numero" id="numero" class="form-control" type="text" onkeyup="validar(this,'num')"/>
              </label>
              <label >
                <span>Complemento :</span> <input name="complemento" id="complemento" class="form-control" type="text" onkeyup="validar(this,'text')"/>
              </label>
              <label >
                <span>Bairro :</span> <input name="bairro" id="bairro" class="form-control" type="text" onkeyup="validar(this,'text')"/>
              </label>
              <label >
                <span>Cidade :</span> <input name="cidade" id="cidade"class="form-control" type="text" onkeyup="validar(this,'text')"/>
              </label>
              <label >
                <span>UF :</span> <input maxlength="2" name="uf" id="uf"class="form-control" size="2" type="text" onkeyup="validar(this,'text')" />
              </label>
              <label >
                <span>CEP :</span> <input name="cep" id="cep" class="form-control" type="text" required placeholder="00000-000" maxlength="9" onkeyup="validar(this,'num')" onkeypress="return mask(event, this, '#####-###')"/>
              </label>
          </br>
              <input type="submit"  name="cadastrar" class="btn btn-primary" value="cadastrar" />

        </form>
      </div>


<script type="text/javascript">
//função para validar numero ou testo
function validar(dom,tipo){
  switch(tipo){
    case'num':var regex=/[A-Za-z]/g;break;
    case'text':var regex=/\d/g;break;
  }
  dom.value=dom.value.replace(regex,'');
}
//função mascara nos campos
function mask(e, id, mask){
    var tecla=(window.event)?event.keyCode:e.which;   
    if((tecla>47 && tecla<58)){
        mascara(id, mask);
        return true;
    } 
    else{
        if (tecla==8 || tecla==0){
            mascara(id, mask);
            return true;
        } 
        else  return false;
    }
}
function mascara(id, mask){
    var i = id.value.length;
    var carac = mask.substring(i, i+1);
    var prox_char = mask.substring(i+1, i+2);
    if(i == 0 && carac != '#'){
        insereCaracter(id, carac);
        if(prox_char != '#')insereCaracter(id, prox_char);
    }
    else if(carac != '#'){
        insereCaracter(id, carac);
        if(prox_char != '#')insereCaracter(id, prox_char);
    }
    function insereCaracter(id, char){
        id.value += char;
    }
}
</script>
