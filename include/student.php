<?php 
    class Student{
        protected static $table_name = "student_info";
        protected static $db_fields = array('s_id', 'first_name', 'last_name', 'roll', 'dept', 'dob', 'f_name', 'm_name', 'email', 'session', 'pre_add', 'par_add', 'img_name', 'sig_name', 'b_group', 'username', 'password');
       
        public $s_id;
        public $first_name;
        public $last_name;
        public $roll;
        public $dept;
        public $dob;
        public $f_name;
        public $m_name;
        public $email;
        public $session;
        public $pre_add;
        public $par_add;
        public $img_name;
        public $sig_name;
        public $b_group;
        public $username;
        public $password;

        private $temp_path;
        private $temp_path2;
        protected $upload_dir = "image";

        public $errors = array();

        
        protected $upload_errors = array(
            UPLOAD_ERR_OK         => "No errors",
            UPLOAD_ERR_INI_SIZE   => "Larger than upload_max_filesize",
            UPLOAD_ERR_FORM_SIZE   => "Larger than form MAX_FILE_SIZE",
            UPLOAD_ERR_PARTIAL    => "Portial upload",
            UPLOAD_ERR_NO_FILE    => "No File",
            UPLOAD_ERR_NO_TMP_DIR => "No tempory directory.",
            UPLOAD_ERR_CANT_WRITE => "Can't write to disk.",
            UPLOAD_ERR_EXTENSION  => "File upoload stopped by extension"
        );
        
        public function attach_file($file){
            //Perform error checking on the form parameters
            if(!$file || empty($file) || !is_array($file)){
                $this->errors[] = "No file was uploaded.";
                return false;
            }else if($file['error'] != 0){
                $this->errors[] = $this->upload_errors[$file['error']];
                return false;
            }else{
                //Set object attributes to the form parameters.
                $this->temp_path = $file['tmp_name'];
                $this->img_name  = $file['name'];
                return true;
            }
        }
        public function attach_file2($file2){
            //Perform error checking on the form parameters
            if(!$file2 || empty($file2) || !is_array($file2)){
                $this->errors[] = "No file was uploaded.";
                return false;
            }else if($file2['error'] != 0){
                $this->errors[] = $this->upload_errors[$file2['error']];
                return false;
            }else{
                //Set object attributes to the form parameters.
                $this->temp_path2 = $file2['tmp_name'];
                $this->sig_name  = basename($file2['name']);
                return true;
            }
        }

        
        public function image_path(){
            return $this->upload_dir.DS.$this->img_name;
        }

        public function save(){
            if(isset($this->id)){
                $this->update();
            }else{
                if(!empty($this->errors)){
                    return false;
                }
               
                $target_path = SITE_ROOT.DS.'public'.DS.$this->upload_dir.DS.$this->img_name;
                $target_path2 = SITE_ROOT.DS.'public'.DS.$this->upload_dir.DS.$this->sig_name;
               

                if(move_uploaded_file($this->temp_path, $target_path) && move_uploaded_file($this->temp_path2, $target_path2)){
                    if($this->create()){
                        unset($this->temp_path);
                        unset($this->temp_path2);
                        return true;
                    }else{
                        $this->errors[] = "The file upload failed, possibly due to incorrect permission";
                        return false;
                    }
                }

            }
        }

        public function destroy(){
            // First remove the database enty
            // then remove the file
            if($this->delete()){
                $target_path = SITE_ROOT.DS.'public'.DS.$this->image_path();
                return unlink($target_path) ? true : false;
            }else{
                return false;
            }
        }
        

        // common Database Method
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
    
    public static function find_all(){
        global $database;
        return self::find_by_sql("SELECT * FROM ".self::$table_name."");
    }

    public static function find_by_id($id = 0){
        global $database;
        $result_array = self::find_by_sql("SELECT * FROM ".self::$table_name." WHERE s_id= ". $database->escape_value($id)." LIMIT 1");
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

        $sql = "SELECT * FROM student_info WHERE username = '{$username}' AND password='{$password}' LIMIT 1";

        $result_array = self::find_by_sql($sql);
        return !empty($result_array) ? array_shift($result_array) : false;
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