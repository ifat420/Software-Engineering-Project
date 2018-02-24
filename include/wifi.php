<?php 
	class Wifi{
		protected static $table_name = "wifi";
		protected static $db_fields = array('id','pc_mac_add', 'mob_mac_add', 's_id');

		public $id;
		public $pc_mac_add;
		public $mob_mac_add;
		public $s_id;

				 // common Database Method
    public static function find_all(){
        global $database;
        return self::find_by_sql("SELECT * FROM ".self::$table_name."");
    }

    public static function find_by_id($id = 0){
        global $database;
        $result_array = self::find_by_sql("SELECT * FROM ".self::$table_name." WHERE id = {$id} LIMIT 1");
        return !empty($result_array) ? array_shift($result_array) : false;
    }

    public static function find_by_sid($sid = 0){
        global $database;
        $result_array = self::find_by_sql("SELECT * FROM ".self::$table_name." WHERE s_id = {$sid} LIMIT 1");
        return !empty($result_array) ? array_shift($result_array) : false;
    }

    public static function find_by_sql($sql = ""){
        global $database;
        $result_set = $database->query($sql);
        $object_array = array();
        while($row = $database->fetch_array($result_set)){
            $object_array[] = self::instantiate($row);
        }
        return $object_array;
        
    }

    public static function count_all(){
        global $database;
        $sql = "SELECT COUNT(*) FROM ".self::$table_name;
        $result_set = $database->query($sql);
        $row = $database->fetch_array($result_set);
        return array_shift($row);
    }

    private static function instantiate($record){
        $object = new self;
        foreach($record as $attribute=>$value){ 
            if($object->has_attribute($attribute)){
                $object->$attribute = $value;
            }
        }
        return $object;
    }
    private function has_attribute($attribute){
        // get_object_var reuturn an associative array with all attributes
        $object_vars = $this->attributes();
        return array_key_exists($attribute, $object_vars);
    }
    protected function attributes(){
        // return an array of attribute keys and their values
        $attributes = array();
        foreach(self::$db_fields as $field){
            if(property_exists($this, $field)){
                $attributes[$field] = $this->$field;
            }
        }
        return $attributes;
    }
    
    protected function sanitized_attributes(){
        global $database;
        $clean_attributes = array();
        // sanitize the value before submitting
        //Note: does not alter the actual value of each attribute
        foreach($this->attributes() as $key => $value){
            $clean_attributes[$key] = $database->escape_value($value);
        }

        return $clean_attributes;
    }

    public static function authenticate($username="", $password=""){
        global $database;
        $username = $database->escape_value($username);
        $password = $database->escape_value($password);

        $sql = "SELECT * FROM user WHERE username = '{$username}' AND password='{$password}' LIMIT 1";

        $result_array = self::find_by_sql($sql);
        return !empty($result_array) ? array_shift($result_array) : false;
    }

    public function save(){
        return isset($this->id) ? $this->update() : $this->create();
    }

    public function create(){
        global $database;

        $attributes = $this->sanitized_attributes();

        $sql = "INSERT INTO ".self::$table_name."(";
        $sql .= join(", ",array_keys($attributes));
        $sql .= ") VALUE ('";
        $sql .= join("', '", array_values($attributes));
        $sql .= "')";

        if($database->query($sql)){
            $this->id = $database->insert_id();
            return true;
        }else{
            return false;
        }

    }
    public function update(){
        global $database;
        
        $attributes = $this->sanitized_attributes();

        $attributes_pairs = array();
        foreach($attributes as $key => $value){
            $attributes_pairs[] = "{$key}= '{$value}'";
        }

        $sql = "UPDATE ".self::$table_name." SET ";
        $sql .= join(", ", $attributes_pairs);
        $sql .="WHERE id=".$database->escape_value($this->id);
        $database->query($sql);
        return ($database->affected_rows() == 1) ? true : false;
    }
    public function delete(){
        global $database;

        $sql = "DELETE FROM ".self::$table_name." ";
        $sql .= "WHERE id=".$database->escape_value($this->id);
        $sql .= " LIMIT 1";

        $database->query($sql);
        return ($database->affected_rows() == 1) ? true : false;
    }
	}
?>