<?php
//Configurações do banco de dados
define('HOST', '192.168.1.107'); //com o docker, precisa ser informado o ip pra conectar
define('USER', 'test');
define('PASS', 'test');
define('DBSA', 'php-test'); 
define('PORT', '3306'); 

//Metodo responsavel para fazer o autoload das classes necessárias
function autoloadClass($Class) {

    $cDir = ['Database', 'Model', 'WebService'];
    $iDir = null;

    foreach ($cDir as $dirName){

        if (!$iDir && file_exists(__DIR__ . "/{$dirName}/{$Class}.class.php") && !is_dir(__DIR__ . "/{$dirName}/{$Class}.class.php")){
            include_once (__DIR__ . "/{$dirName}/{$Class}.class.php");
            $iDir = true;
        }
    }

    if (!$iDir):
        trigger_error("Não é possivel incluir {$Class}.class.php", E_USER_ERROR);
        die;
    endif;
}


spl_autoload_register('autoloadClass');

define('ACCEPT', 'success');
define('INFOR', 'info');
define('ALERT', 'warning');
define('ERROR', 'danger');



function PHPErro($ErrNo, $ErrMsg, $ErrFile, $ErrLine) {
    $CssClass = ($ErrNo == E_USER_NOTICE ? INFOR : ($ErrNo == E_USER_WARNING ? ALERT : ($ErrNo == E_USER_ERROR ? ERROR : $ErrNo)));
    echo "<div class=\"alert alert-{$CssClass} alert-dismissible erro\" role=\"alert\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"><span aria-hidden=\"true\">×</span></button><b>Erro na linha: {$ErrLine} :: </b> {$ErrMsg} <br><strong>{$ErrMsg}</strong><small>{$ErrFile}</small></div>";
    if ($ErrNo == E_USER_ERROR){
        die;

    }
}
set_error_handler('PHPErro');

