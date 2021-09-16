<?php 
class Endereco {
    
    //Metodo responsavel por verificar se já existe o registro do CEP na base de dados
    public function verificarCepExiste($cep){
        $query = "SELECT * FROM endereco WHERE cep = '$cep'";
        $read = new Read();
        $read->exeRead($query);
        $endereco = $read->getResult();
        if($endereco){
            return $endereco[0];
        }
        return false; 
    }

    //Metodo responsavel para buscar o CEP no ViaCEP
    public function buscarCepNoViaCep($cep){
        $viaCep = new ViaCep($cep);
        $endereco = $viaCep->buscarCep();
        if($endereco){
            return $endereco;
        }
        return false;
    }

    //Metodo responsavel de inserir os dados na base de dados e retornar os dados inseridos
    public function inserirNovoCepComEndereco($dados){
        $create = new Create();
        $dadosInsert['cep'] = $dados['cep'];
        $dadosInsert['logradouro'] = $dados['logradouro'];
        $dadosInsert['bairro'] = $dados['bairro'];
        $dadosInsert['localidade'] = $dados['localidade'];
        $dadosInsert['uf'] = $dados['uf'];
        $create->exeCreate('endereco', $dadosInsert);
        return $dadosInsert;
    }
}