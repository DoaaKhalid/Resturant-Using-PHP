<?php
require('config.php');
Class Database
{
    private $host= DB_HOST;
    private $username=DB_USER;
    private $password= DB_PWD;
    private $dbname = DB_NAME;

    private $connection;
    private $error;
    private $statement;
    private $dbconnected=false;

    public function __construct(){

       //Set PDO Connection
        $dsn = 'mysql:host='.$this->host.';dbname='. $this->dbname ;
        $options=array(
            PDO:: ATTR_PERSISTENT =>true,
            PDO:: ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        );
        try {

            $this->connection=new PDO($dsn,$this->username,$this->password,$options);
            $this-> dbconnected=true;
        }

        catch (PDOException $e){
            $this->error=$e->getMessage();
            $this->dbconnected=false;
        }

     }



    public function GetError(){
        return $this->error;}

    //Check Connection
    public function IsConnected(){
        return $this->dbconnected;}

    //Prepare Statement with Query
    public function Query($query){
        $this->statement=$this->connection->prepare($query);}

    //Execute Query
    public function Execute(){
       return $this->statement->execute();
    }
    //Get results as array of Objects
    public function resultset(){
        $this->execute();
        return $this->statement->fetchAll(PDO::FETCH_OBJ);}

        //Get Record Row Count
    public function rowCount(){
        return $this->statement->rowCount();
    }

    //get Single record as an object
    public function singleRecord(){
        $this->execute();
         return$this->statement->fetch(PDO::FETCH_OBJ);}


         //Set bind Value
    public function bind($param,$value,$type=null)
    {
        if(is_null($type))
        {
            switch (true){
                case is_int($value):
                    $type=PDO::PARAM_INT;
                break;

                case is_bool($value):
                    $type=PDO::PARAM_BOOL;
                    break;
                default:
                    $type=PDO::PARAM_STR;

            }
        }
        $this->statement->bindValue($param,$value,$type);

    }
    public function Disconnect(){
        $this->close();
    }
   public function alert($msg)
    {
        echo "<h1> Try It </h1>";
        echo "<script type='text/javascript'>alert('$msg');</script>";
    }



}