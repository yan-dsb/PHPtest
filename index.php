<?php 
include_once './app/Config.php'; 
$read = new Read();
$read->exeRead('SELECT cep FROM endereco ORDER BY id');
$ceps = $read->getResult();
?>
<!doctype html>
<html lang="en">
  <head>
    <title>Buscar CEP - ViaCEP </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">  
    <style>
      h1 {
        color: #333;
      }
      p {
        color: #6f6f6f;
      }
      th {
        color: #6f6f6f;

      }
      .error {
        color: red;
      }
      .lds-dual-ring {
        display: none;
        width: 70px;
        height: 30px;
      }
      .lds-dual-ring:after {
        content: " ";
        align-self: center;
        display: block;
        width: 34px;
        height: 34px;
        /* margin: 8px; */
        margin: auto;
        border-radius: 50%;
        border: 6px solid #fff;
        border-color: #fff transparent #fff transparent;
        animation: lds-dual-ring 1.2s linear infinite;
      }
      @keyframes lds-dual-ring {
        0% {
          transform: rotate(0deg);
        }
        100% {
          transform: rotate(360deg);
        }
      }

    </style>
  </head>
  <body style="background-color: #FFFFFF;">
    <nav class="navbar navbar-expand-lg navbar-dark bg-light">
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav" style="margin: auto;">
          <li class="nav-item">
            <a class="nav-link"  href="https://github.com/yan-dsb"  target="_blank">
            <svg height="32" aria-hidden="true" viewBox="0 0 16 16" version="1.1" width="32" data-view-component="true">
              <path fill-rule="evenodd" d="M8 0C3.58 0 0 3.58 0 8c0 3.54 2.29 6.53 5.47 7.59.4.07.55-.17.55-.38 0-.19-.01-.82-.01-1.49-2.01.37-2.53-.49-2.69-.94-.09-.23-.48-.94-.82-1.13-.28-.15-.68-.52-.01-.53.63-.01 1.08.58 1.23.82.72 1.21 1.87.87 2.33.66.07-.52.28-.87.51-1.07-1.78-.2-3.64-.89-3.64-3.95 0-.87.31-1.59.82-2.15-.08-.2-.36-1.02.08-2.12 0 0 .67-.21 2.2.82.64-.18 1.32-.27 2-.27.68 0 1.36.09 2 .27 1.53-1.04 2.2-.82 2.2-.82.44 1.1.16 1.92.08 2.12.51.56.82 1.27.82 2.15 0 3.07-1.87 3.75-3.65 3.95.29.25.54.73.54 1.48 0 1.07-.01 1.93-.01 2.2 0 .21.15.46.55.38A8.013 8.013 0 0016 8c0-4.42-3.58-8-8-8z"></path>
            </svg>
          </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="https://www.linkedin.com/in/yansouza42/" target="_blank">
            <svg xmlns="http://www.w3.org/2000/svg" width="34" height="34" viewBox="0 0 34 34" style="color: #0a66c2">
            <g>
              <path d="M34,2.5v29A2.5,2.5,0,0,1,31.5,34H2.5A2.5,2.5,0,0,1,0,31.5V2.5A2.5,2.5,0,0,1,2.5,0h29A2.5,2.5,0,0,1,34,2.5ZM10,13H5V29h5Zm.45-5.5A2.88,2.88,0,0,0,7.59,4.6H7.5a2.9,2.9,0,0,0,0,5.8h0a2.88,2.88,0,0,0,2.95-2.81ZM29,19.28c0-4.81-3.06-6.68-6.1-6.68a5.7,5.7,0,0,0-5.06,2.58H17.7V13H13V29h5V20.49a3.32,3.32,0,0,1,3-3.58h.19c1.59,0,2.77,1,2.77,3.52V29h5Z" fill="currentColor"></path>
            </g>
          </svg>
            </a>
          </li>
        </ul>
      </div>
    </nav>

    
    <div class="container mt-5" >
      <h1 class="display-3">Consulte os CEPs do Brasil inteiro aqui!</h1>
      <p>Só digitar o CEP desejado, apertar no botão de buscar e o resto deixa com a gente</p>
      <form class="row align-items-center" id="formulario" method="POST"> 
        <div class="col-3">
          <input type="text" pattern= "\d{5}-?\d{3}"  name="cep" id="cep" class="form-control form-control-lg" placeholder="Informe o CEP" maxlength="8" onkeyup="mascara(this.value)" required>
        
        </div>
        <div class="col-3">
          <button type="submit" id="enviar" class="btn btn-light btn-lg" style="background-image: linear-gradient(358deg,#1f2952,#485380);"><div id="ring" class="lds-dual-ring"></div><span id="searchText" class="text-white">Buscar</span></button>
        </div>
        <div class="col-12">
          <span id="error"></span>
        </div>
        
        
      </form>
    <div class="row justify-content-end" >
      <div class="col-6  mt-5" id="card" style="display: none;" > 
      <div class="card text-center" style="max-width: 25.5rem;">
        <div class="card-header text-white bg-success">
          CEP encontrado!
        </div>
        <div class="card-body">
          <h5 class="card-title"><span id="street"></span></h5>
          <p class="card-text"><span id="cepText"></span></p>
        </div>
        <div class="card-footer text-muted">
            <span id="city"></span>
        </div>
      </div>
      </div>
      <div class="col-6  mt-5">
      <table class="table caption-top" id="tabelaCep" style="max-width: 25.5rem;">
        <caption>Lista de CEPs consultados</caption>
        <thead>
          <tr>
            <th>CEP</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($ceps as $cep) {?>
            <tr>
              <th><?= substr($cep['cep'], 0, 5) . '-'. substr($cep['cep'], 5) ?></th>
            </tr>
          <?php }?>
        </tbody>
      </table>
      </div>
    </div>
    </div>
    <script>
      function mascara(cep){
        var validarCep = /^[0-9]{8}$/;
        if(validarCep.test(cep)) {
            document.getElementById('cep').value = cep.substring(0,5) +"-"+cep.substring(5);
        }
      }
      document.querySelector("#formulario").addEventListener("submit", async function(e){
        e.preventDefault();
        const cep = document.getElementById('cep').value.replace('-', '');
        if(cep.length < 8){
          document.getElementById('error').innerHTML = "<span class='error'>Digite um CEP válido</span>";
          return;
        }
        document.getElementById('error').innerHTML = "";

        document.getElementById('searchText').style.display = 'none';
        document.getElementById('ring').style.display = 'block';

        var data = new FormData();
        data.append('cep', cep);

        const request = new Request('http://localhost/app/Controllers/EnderecoController.php', {method: 'POST', body: data});
        const response = await fetch(request).then(response => {
          document.getElementById('searchText').style.display = 'block';
          document.getElementById('ring').style.display = 'none';
          return response.json();
        });
        if(response.status === 200){
          const cep = response.dados.cep.substring(0,5)+ '-'+ response.dados.cep.substring(5);
          document.getElementById('street').innerHTML = `
          <span>${response.dados.logradouro}, ${response.dados.bairro}</span>
          `;
          document.getElementById('cepText').innerHTML = `
          <span>${cep}</span>
          `;
          document.getElementById('city').innerHTML = `
          <span>${response.dados.localidade}/${response.dados.uf}</span>
          `;

          document.getElementById('card').style.display = 'block';
        }else{
          document.getElementById('error').innerHTML = "<span class='error'>CEP não encontrado, tente novamente!</span>";

        }
      });
    
    </script>
  </body>