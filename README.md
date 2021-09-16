# PHPtest

Teste de seleção para vaga PHP
## Autor
 ● Yan Borges

## Passos pra rodar esse projeto
  - Se tiver docker e docker-compose instalados, execute docker-compose up -d, caso contrário precisa de uma versão do PHP >= 5.6 e um banco de dados mysql chamado php-test (se desejar, pode criar com outro nome e alterar no código fonte)
  - No arquivo app/Config.php, precisam ser definidos os seguintes campos de acordo com suas configurações: 
    define('HOST', 'db-host'); //com o docker, precisa ser informado o ip pra conectar
    define('USER', 'db-user');
    define('PASS', 'db-pass');
    define('DBSA', 'db-dbsa'); 
    define('PORT', 'db-port');
  - Executar o arquivo endereco.sql para criar a tabela endereco, que é utilizada na aplicação.

# Requisitos:
## Faça um fork desse projeto e siga as intruções a seguir utilizando esse projeto.

Construir uma aplicação web para buscar endereço. Aplicação deve fazer uma chamada na API via cep : https://viacep.com.br/.
Premissas:

  ● Usar PHP 5.6 ou superior.
  
  ● Usar Bootstrap.
  
  ● JavaScript (Não usar framework).
  
  ● Retorno deve ser em xml.
  
  ● Salvar os dados em uma base e antes de uma nova consulta verificar se o cep já foi consultado, caso tenha sido, trazer    informação da base e não deve efetuar uma nova consulta.
  
  ● Tratar o erro. Dar um retorno amigável para usuário leigo.
  
  
## PS: Valorizamos a criatividade no layout.

# Entrega: 
 * Disponibilizar um link do repositório no GitHub e encaminhar para developer@cd2.com.br
