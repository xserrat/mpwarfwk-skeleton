<?php

namespace Entities\Repositories;

use Entities\User;
use Mpwarfwk\Component\Db\PDODatabase;

class UserRepository implements RepositoryInterface{

    /**
     * @var $dbConnection \PDO
     */
    private $dbConnection;
    private $user;
    private $table = 'users';

    /**
     * @param $pdoDatabase PDODatabase
     */
    public function setDatabaseConnection($pdoDatabase){
        $this->dbConnection= $pdoDatabase->getConnection();
    }

    /**
     * @param User $user
     */
    public function setUserEntity(User $user){
        $this->user = $user;
    }

    public function findAll(){
        $stmt = $this->dbConnection->prepare( "SELECT * FROM {$this->table}");
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function find(array $conditions){
        if(is_null($conditions)){
            return false;
        }
        $cond = array();
        foreach($conditions as $key => $value){
            $cond[] = $key."='".$value."'";
        }
        $condString = implode(' AND ', $cond);
        $query = "SELECT * FROM {$this->table} WHERE $condString";
        /**
         * @var $dbConnection \PDO
         */
        $stmt = $this->dbConnection->query($query);
        return  $stmt->fetchObject('Entities\User');
    }

    /**
     * @param $user User
     * @return boolean
     */
    public function insert($user){
        $email = $user->getEmail();
        $password = $user->getPassword();
        $query = $this->dbConnection->prepare("INSERT INTO {$this->table} (email,password) VALUES(:email,:password)");
        $query->bindParam(":email", $email, \PDO::PARAM_STR);
        $query->bindParam(":password", $password, \PDO::PARAM_STR);
        return $query->execute();
    }
}