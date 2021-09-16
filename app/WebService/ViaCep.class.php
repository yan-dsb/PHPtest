<?php 
class ViaCep {

    private $cep;

    public function __construct($cep)
    {
        $this->cep = $cep;
    }

    //Metodo responsavel por se comunicar com o WebService ViaCep
    public function buscarCep(){
        //Link viacep
        $link = "https://viacep.com.br/ws/{$this->cep}/xml";
        
        //Seta as configurações de conexão viacep
        $url = curl_init($link);
        curl_setopt_array($url, [
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_CUSTOMREQUEST => 'GET'
        ]);

        //Executa a conexão
        $response = curl_exec($url);

        //Encerra a conexão                         
        curl_close($url);
        
        //Converte o valor de retorno para XML
        $data = simplexml_load_string($response);
        //Retorna o conteúdo
        return isset($data->erro) ? false : (array) $data ;
    }
}