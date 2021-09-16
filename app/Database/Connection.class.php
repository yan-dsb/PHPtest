<?php

class Connection {

    private static $Host = HOST;
    private static $User = USER;
    private static $Pass = PASS;
    private static $Dbsa = DBSA;
    private static $Port = PORT;

    private static $Connect = null;
    
    private static function Conectar() {
        
        try {
            
            if(self::$Connect == null){
                
                $dsn = 'mysql:host=' . self::$Host . ';port='. self::$Port . ';dbname='.self::$Dbsa;
                $options = [ PDO::MYSQL_ATTR_INIT_COMMAND =>'SET NAMES UTF8'];
                self::$Connect = new PDO($dsn, self::$User, self::$Pass, $options);
                
            }
            
        } catch (PDOException $e) {
            print_r($e);
            die;
        }
        
        self::$Connect->setAttribute(PDO::ATTR_ERRMODE,  PDO::ERRMODE_EXCEPTION);
        return self::$Connect;
    }

    public static function getConn() {
        return self::Conectar();
    }

}
