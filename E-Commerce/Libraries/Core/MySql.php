<?php
class MySql extends Conection
{
    private $_connection;
    private $_strQuery;
    private $_arrValues;
    function __construct(){
        $this->_connection = new Conection();
        $this->_connection = $this->_connection->Connect();
    }
    /** 
     * @param $query is the sql sentence to execute
     * @param $arrvalues are the values in an array to insert in the DB
     * @return TRUE if succeed, 0 if not  
    */
    public function Insert(string $query,array $arrValues){
        $this->_strQuery = $query;
        $this->_arrValues = $arrValues;
        $insert = $this->_connection->prepare($this->_strQuery);
        $resInsert = $insert->execute($this->_arrValues);
        if($resInsert){
            $lastInsert = $this->_connection->lastInsertId();
        }else{
            $lastInsert = 0;
        }
        return $lastInsert;
    }
    /**
     * @param $query is the query to execute
     * @return $data with the one register requested if succeed
     */
    public function Select(string $query){
        $this->_strQuery = $query; 
        $result = $this->_connection->prepare($this->_strQuery);
        $result->execute();
        $data = $result->fetch(PDO::FETCH_ASSOC);
        return $data;
    }
     /**
     * @param $query is the query to execute 
     * @return $data with all the registers requested if succeed
     */
    public function SelectAll(string $query){
        $this->_strQuery = $query; 
        $result = $this->_connection->prepare($this->_strQuery);
        $result->execute();
        $data = $result->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }
    /** 
     * @param $query is the sql sentence to execute
     * @param $arrvalues are the values in an array to update in the DB
     * @return TRUE if succeed
    */
    public function Update(string $query,array $arrValues){
        $this->_strQuery = $query;
        $this->_arrValues = $arrValues;
        $update = $this->_connection->prepare($this->_strQuery);
        $resExecute = $update->execute($this->_arrValues);
        return $resExecute;
    }
    /** 
     * @param $query is the sql sentence to execute
     * @return TRUE if succeed
    */
    public function Delete(string $query){
        $this->_strQuery = $query;
        $delete = $this->_connection->prepare($this->_strQuery);
        $result = $delete->execute();
        return $resExecute;
    }
}


?>