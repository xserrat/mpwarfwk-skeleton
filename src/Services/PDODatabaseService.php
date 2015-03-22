<?php
/**
 * Created by PhpStorm.
 * User: xserrat
 * Date: 22/03/15
 * Time: 16:29
 */

namespace Services;


use Mpwarfwk\Component\Bootstrap;
use Mpwarfwk\Component\Db\PDODatabase;
use Mpwarfwk\FileParser\YamlFileParser;

class PDODatabaseService implements ServiceInterface{

    const DB_CONFIG = 'dbconfig.yaml';

    private $pdo;

    public function __construct(PDODatabase $pdo){
        $fileParser = new YamlFileParser(Bootstrap::getRootApplicationPath() . '/config/' . self::DB_CONFIG);
        $dbConfig = $fileParser->getFileData()['database'];
        $pdo->setConfig($dbConfig['host'], $dbConfig['dbname'], $dbConfig['username'], $dbConfig['password']);
        $this->pdo = $pdo;
    }

    public function run(){
        return $this->pdo;
    }
}