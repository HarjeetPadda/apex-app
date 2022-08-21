<?php
class database{
    private $host;
    private $dbusername;
    private $dbpassword;
    private $dbname;

    protected function connect(){
        $this->host='localhost';
        $this->dbusername='root';
        $this->dbpassword='';
        $this->dbname='apex';
        return new mysqli($this->host,$this->dbusername,$this->dbpassword,$this->dbname);

    }
}

class query extends database{
    public function getData($field='',$table='',$condition_Arr='',
                            $order_by_field='', $order_by_type='',
                            $limit='')
    {
        $sql = "select $field from $table";
        if($condition_Arr!=''){
            $sql.=' Where ';
            $array_Count=count($condition_Arr);
            $index=1;
            foreach ($condition_Arr as $key=>$val) {
                if($index==$array_Count){
                    $sql .= "$key='$val' ";
                }else {
                    $sql .= "$key='$val' and ";
                }
                $index++;
            }
        }
        if($order_by_field!=''){
            $sql.=" order by $order_by_field $order_by_type ";
        }
        if($limit!=''){
            $sql.=" limit $limit";
        }

        $result = $this->connect()->query($sql);
        if($result->num_rows>0) {
            $arr = array();
            while ($row = $result->fetch_assoc()) {
                $arr[] = $row;
            }
            return $arr;
        }else{
            return 0;
        }

    }
    public function insertData($table,$condition_Arr)
    {
        if ($condition_Arr != '') {
            foreach ($condition_Arr as $key => $val) {
                $fieldArr[] = $key;
                $valueArr[] = $val;
            }
            $field=implode(",",$fieldArr);
            $value=implode("','",$valueArr);
            $value="'".$value."'";
            $sql = "INSERT INTO $table($field) VALUES($value) ";
            $result = $this->connect()->query($sql);
        }
    }
    public function deleteData($table,$condition_Arr)
    {
        if ($condition_Arr != '') {
            $sql="DELETE FROM $table WHERE ";
            $array_Count=count($condition_Arr);
            $index=1;
            foreach ($condition_Arr as $key=>$val) {
                if($index==$array_Count){
                    $sql .= "$key='$val' ";
                }else {
                    $sql .= "$key='$val' and ";
                }
                $index++;
            }
            $result = $this->connect()->query($sql);
        }
    }
    public function updateData($table,$condition_Arr,$where_field, $where_value)
    {
        if ($condition_Arr != '') {
            $sql="UPDATE $table SET ";
            $array_Count=count($condition_Arr);
            $index=1;
            foreach ($condition_Arr as $key=>$val) {
                if($index==$array_Count){
                    $sql .= "$key='$val' ";
                }else {
                    $sql .= "$key='$val' , ";
                }
                $index++;
            }
            $sql.=" WHERE $where_field='$where_value' ";
            echo($sql);
            $result = $this->connect()->query($sql);
        }
    }
}
