<?php
/**
 * Created by JetBrains PhpStorm.
 * User: purazumakoi
 * Date: 2013/09/15
 * Time: 14:38
 * To change this template use File | Settings | File Templates.
 */

namespace Mysqldb;


Class Mysqldb {

    protected $pdo;
    protected $qry;

    function __construct() {
        $dsn = array(
            'phptype'  => 'mysql',
            'hostspec' => DB_HOST,
            'database' => DB_NAME,
            'username' => DB_USER,
            'password' => DB_PASS,
        );
        $options = array(
            'default_table_type'=>'MyISAM',
            'result_buffering' => true,
            'persistent' => true
        );
        $this->mdb2 =& MDB2::connect($dsn, $options);
        if(PEAR::isError($this->mdb2)) {
            throw new Exception($this->mdb2->getMessage());
        }
    }

    function __destruct() {
        $this->fCloseDB();
    }

    function fCloseDB() {
        $this->mdb2->disconnect();
        if(PEAR::isError($this->mdb2)) {
            throw new Exception($this->mdb2->getMessage());
        }
    }

    function fQueryDB($sql) {
        unset($this->qry);
        if(strlen($sql) == 0){
            throw new Exception("empty sql");
            return;
        }
        $this->qry =& $this->mdb2->query($sql);
        if(PEAR::isError($this->qry)) {
            throw new Exception($this->qry->getMessage() . " SQL:" . $sql);
        }
        if(PEAR::isError($this->mdb2)) {
            throw new Exception($this->mdb2->getMessage() . " SQL:" . $sql);
        }
    }

    function fNumRowsDB() {
        $this->mdb2->getOption('result_buffering');
        if(PEAR::isError($this->mdb2)) {
            throw new Exception($this->mdb2->getMessage());
            return;
        }
        $num =& $this->qry->numRows();
        if(PEAR::isError($this->qry)) {
            throw new Exception($this->qry->getMessage());
        }
        return $num;
    }

    function fFetchRowDB() {
        $row =& $this->qry->fetchRow(MDB2_FETCHMODE_ASSOC);
        if(PEAR::isError($this->qry)) {
            throw new Exception($this->qry->getMessage());
        }
        return $row;
    }

    function fClearQueryDB() {
        $this->qry->free();
        if(PEAR::isError($this->qry)) {
            throw new Exception($this->qry->getMessage());
        }
        unset($this->qry);
    }

    function fGetInsertId($table,$field) {
        $id = $this->mdb2->lastInsertId($table,$field);
        if(PEAR::isError($id)) {
            throw new Exception($id->getMessage());
        }
        return $id;
    }
}

