<?php

class MysqlFun{

    public function dbConnect(){
        global $db;
        $db = DB_PCONNECT? mysql_pconnect(DB_HOST,DB_USERNAME,DB_PASSWORD): mysql_connect(DB_HOST,DB_USERNAME,DB_PASSWORD);
        mysql_query("SET NAMES 'UTF8'");
        mysql_select_db(DB_NAME,$db);
    }

    public function dbClose(){
        global $db;
        mysql_close($db);
    }

    public function dbExecute($sql){
        global $db;
        mysql_query($sql,$db);
        return mysql_affected_rows($db);
    }

    public function dbQuery($sql){
        global $db;
        $result = mysql_query($sql,$db);
        while($row = mysql_fetch_assoc($result)){
            $data[] = $row;
        }
        return $data;
    }

    public function dbGetRow($sql){
        global $db;
        $result = mysql_query($sql,$db);
        return mysql_num_rows($result)>0? mysql_fetch_assoc($result): null;
    }

    public function dbGetField($sql, $field){
        $result = dbGetRow($sql);
        return count($result)==null? null: (isset($result[$field])? $result[$field]: null);
    }

    public function dbPageQuery($sql,$pageno=1,$pagesize=10){
        $countSql = preg_replace('/SELECT.*FROM/i','SELECT COUNT(*) AS count FROM',$sql);
        $totalCount = dbGetField($countSql,'count');
        $data['pagesize'] = (int)$pagesize<1? 10: (int)$pagesize;
        $data['totalCount'] = $totalCount;
        $data['totalPage'] = ceil($data['totalCount']/$data['pagesize']);
        //$data['currentPage'] = $data['totalPage']==0? 0: ((int)$pageno<1? 1: (int)$pageno);
        $data['currentPage'] = (int)$pageno;
        //$data['currentPage'] = $data['currentPage']>$data['totalPage']? $data['totalPage']: $data['currentPage'];
        $data['isFirst'] = $data['currentPage']>1? false: true;
        $data['isLast'] = $data['currentPage']<$data['totalPage']? false: true;
        $data['start'] = $data['currentPage']==0? 0: ($data['currentPage']-1)*$data['pagesize'];
        $data['sql'] = $sql.' LIMIT '.$data['start'].','.$data['pagesize'];
        $data['data'] = dbQuery($data['sql']);
        return $data;
    }

    public function dbPage($sql,$pageno=1,$pagesize=10){
        $res =  mysql_query($sql);
        $totalCount = mysql_num_rows($res);
        $data['pagesize'] = (int)$pagesize<1? 10: (int)$pagesize;
        $data['totalCount'] = $totalCount;
        $data['totalPage'] = ceil($data['totalCount']/$data['pagesize']);
        //$data['currentPage'] = $data['totalPage']==0? 0: ((int)$pageno<1? 1: (int)$pageno);
        $data['currentPage'] = (int)$pageno;
        //$data['currentPage'] = $data['currentPage']>$data['totalPage']? $data['totalPage']: $data['currentPage'];
        $data['isFirst'] = $data['currentPage']>1? false: true;
        $data['isLast'] = $data['currentPage']<$data['totalPage']? false: true;
        $data['start'] = $data['currentPage']==0? 0: ($data['currentPage']-1)*$data['pagesize'];
        $data['sql'] = $sql.' LIMIT '.$data['start'].','.$data['pagesize'];
        $data['data'] = dbQuery($data['sql']);
        return $data;

    }

    public function makeInsertSql($table,$data){
        $t1 = $t2 = array();
        foreach($data as $key=>$value){
            $t1[] = '`'.$key.'`';
            $t2[] = "'".$value."'";
        }
        //echo "insert into $table(".implode(',',$t1).") values(".implode(',',$t2).")";
        return "insert into $table (".implode(',',$t1).") values(".implode(',',$t2).")";
    }

    public function makeUpdateSql($table,$data,$condition){
        $t1 = array();
        foreach($data as $key=>$value){
            $t1[] = "$key='".$value."'";
        }
        //echo "update $table set ".implode(',',$t1)." where $condition";
        return "update $table set ".implode(',',$t1)." where $condition";
    }

    public function startTrans(){
        mysql_query("SET AUTOCOMMIT=0");
        mysql_query("BEGIN");

    }

    public function commit(){
        mysql_query("COMMIT");
        endTrans();
    }

    public function rollback(){
        mysql_query("ROLLBACK");
        endTrans();
    }

    public function endTrans(){
        mysql_query("END");
        mysql_query("SET AUTOCOMMIT=1");
    }

    public function makeInsertAllSql($datas,$table){
        if(!is_array($datas[0])) return false;
        $fields = array_keys($datas[0]);
        $values  =  array();
        foreach ($datas as $data){
            $value   =  array();
            foreach ($data as $key=>$val){
                $val   =  htmlspecialchars(addslashes($val));
                if(is_scalar($val)) { // 过滤非标量数据
                    $value[]   =  is_string($val) ? "'{$val}'" : $val;
                }
            }
            $values[]    = '('.implode(',', $value).')';
        }
        $sql =  ('INSERT').' INTO '.$table.' ('.implode(',', $fields).') VALUES '.implode(',',$values);

        return $sql;
    }
}

?>