<?php


class Read extends Connection {

    private $Select;
    private $Result;
    private static $instance = null;

    private $Read;

    private $Conn;


    public function getResult() {
        return $this->Result;
    }

    public function getRowCount() {
        return $this->Read->rowCount();
    }

    public function exeRead($Query) {
        $this->Select = (string) $Query;
        
        $this->Execute();
    }
    

    private function Connect() {

        $this->Conn = parent::getConn();
        $this->Read = $this->Conn->prepare($this->Select);
        $this->Read->setFetchMode(PDO::FETCH_ASSOC);
    }



    private function Execute() {
        $this->Connect();

        try {
            $this->Read->execute();
            $this->Result = $this->Read->fetchAll();
        } catch (PDOException $e) {

            $this->Result = null;
        }
    }

    
    public static function getInstance() {
        
        if(self::$instance == null):
            self::$instance = new Read();
        endif;
        
        return self::$instance;
    }
}
