<?php 
include_once '../Config.php';

//Mensagem padrão se não encontrar o CEP
$response = ["status"=> 400, "message" => 'CEP não encontrado']; 

$arrPost = $_POST;
$cep = $arrPost['cep'];

//Verifica o tamanho de carecteres do CEP enviado
if(strlen($cep) < 8){
    print json_encode($response);
    return;
}

//Instãncia do model de Endereco
$endereco = new Endereco();

//Verifica se já existe o CEP na base de dados
$boCepExiste = $endereco->verificarCepExiste($cep);

//Se existir, retorna o endereço
if($boCepExiste){
    $response = ["status"=> 200, "dados" => $boCepExiste]; 
    print json_encode($response);
    return;
}

//Busca no ViaCep caso não tenha o CEP cadastrado
$dadosCep = $endereco->buscarCepNoViaCep($cep);

//Se encontrar o CEP, salva os dados e retorna o endereço
if($dadosCep){
    $dadosCep['cep'] = str_replace('-', '', $dadosCep['cep']);
    $dadosCadastrados = $endereco->inserirNovoCepComEndereco($dadosCep);
    $response = ["status"=> 200, "dados" => $dadosCadastrados]; 
    print json_encode($response);
    return;
}

//Retorna a resposta para o frontend
print json_encode($response);

