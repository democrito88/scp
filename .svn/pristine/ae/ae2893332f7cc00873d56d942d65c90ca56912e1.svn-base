<?php

include_once '../util/corpo.php';

cabecalho();
?>

<script src="http://code.jquery.com/ui/1.9.0/jquery-ui.js"></script>
<!--<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>-->
<script type="text/javascript" src="../js/bootstrap-datepicker.js"></script>
<script>
    $(document).ready(function(){
      var date_input=$('input[id="date"]'); //our date input has the name "date"
      var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
      var options={
//        format: 'mm/dd/yyyy',
        container: container,
        todayHighlight: true,
        autoclose: true,
        format: 'dd/mm/yy'
       
     
      };
      date_input.datepicker(options);
    }); 
</script>

<link rel="stylesheet" href="https://formden.com/static/cdn/bootstrap-iso.css" />    

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/> 
    <script src="../js/ajax/formularioRelatorio.js"></script>

   <form action="gerarRelatorio.php" method="POST" class="form-check-inline form-check form-group alinh">
   <div class="container ">
       <h2>Buscar Pessoas</h2>
       <hr>
     
       <div class="row">
        
           <div class="col-sm-4">
            <div class="form-group form-check">
               <label class=" control-label" for="">Nome&nbsp;</label>
              <input autofocus="" class="form-control form-control-lg" type="text" id="nome" name="nome" placeholder="Nome da pessoa">
               
            </div>
         </div>
              
         <div class="col-sm-4">
             <label class="form-group form-check">Faz Aniversário&nbsp;</label> 
            DE:  <input class="form-control" id="date" name="dataNascimentoInicial" placeholder="DD/MM/YY" type="text"/>
             ATÉ :<input class="form-control" id="date" name="dataNascimentoFinal" placeholder="DD/MM/YY" type="text"/>
            
            
         </div>
           
         <div class="col-sm-4">
            <div class="form-group form-check">
                <label class="form-group form-check">Estado&nbsp;</label> 
              <select id="UF" class="form-control-static" name="UF">
                  <option value="">Selecione Um Estado</option>
                  <option value="AL">AL</option><option value="AP">AP</option><option value="AM">AM</option><option value="BA">BA</option><option value="CE">CE</option><option value="DF">DF</option><option value="ES">ES</option><option value="GO">GO</option><option value="MA">MA</option><option value="MS">MS</option><option value="MT">MT</option><option value="MG">MG</option><option value="PA">PA</option><option value="PB">PB</option><option value="PR">PR</option><option value="PE">PE</option><option value="PI">PI</option><option value="RJ">RJ</option><option value="RN">RN</option><option value="RS">RS</option><option value="RO">RO</option><option value="RR">RR</option><option value="SC">SC</option><option value="SP">SP</option><option value="SE">SE</option><option value="TO">TO</option></select>
            </div>
         </div>
      </div>
       
       
       
      <div class="row">
          
         <div class="col-sm-4">
            <div class="form-group form-check">
               <label class=" control-label" for="">Cidade&nbsp;</label>   
               <input autofocus="" class="form-control form-control-lg" type="text" id="municipio" name="municipio" placeholder="Digite a Cidade">
         </div>
         </div>
          
         <div class="col-sm-4">
            <div class="form-group form-check">
               <label class="col-md control-label" for="">CPF&nbsp;&nbsp;&nbsp;</label>
               <input  autofocus="" onblur="TestaCPF(this)" onkeypress="mascara(this)" class="form-control form-control-lg" type="text" id="CPF" name="cpf" placeholder="Digite o CPF">
            </div>
         </div>
         <div class="col-sm-4">
            <div class="form-group form-check">
               <label class="col-md control-label" for="">RG&nbsp;&nbsp;&nbsp;</label>
               <input autofocus="" class="form-control form-control-lg" type="text" id="rg" name="rg" placeholder="Digite o RG">
               
            </div>
         </div>
      </div>
      <div class="row">
          <div class="col-sm-4">
            <div class="form-group form-check">
               <label class=" control-label" for="">Bairro&nbsp;</label>   
               <input autofocus="" class="form-control form-control-lg" type="text" id="Bairro" name="Bairro" placeholder="Digite o Bairro">
            </div></div>
         <div class="col-sm-4">
            <div class="form-group form-check">
               <label class="col-md control-label" for="">CEP&nbsp;&nbsp;&nbsp;</label>  
              <input id="CEP" value="" name="cep" onkeypress="mascara(this);" onkeyup="pesquisacep(this);" placeholder="Apenas números" class="form-control input-md"  value="" type="text" maxlength="9" pattern="[0-9\-]+$">
            </div>
         </div>
      </div>
  <br>
   <br>
   <button class="btn btn-success" type="submit">Gerar Relatório</button>
   </div>
 
</form>
     

<?php

rodape();
