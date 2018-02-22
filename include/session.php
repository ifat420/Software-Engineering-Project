<?php 
    class Session{
        private $logged_in = false;
        public $student_id;
        public $message;

        function __construct(){
            session_start();
            $this->check_message();
            $this->check_login();
            if($this->logged_in){
               
            }else{
                
            }
            
        }

        private function check_login(){
            if(isset($_SESSION['student_id'])){
                $this->student_id = $_SESSION['student_id'];
                $this->logged_in = true;
            }else{
                unset($this->student_id);
                $this->logged_in = false;
            }
        }

        private function check_message(){
            if(isset($_SESSION['message'])){
                $this->message = $_SESSION['message'];
                unset($_SESSION['message']);
            }else{
                $this->message = "";
            }
        }

        public function message($msg = ""){
            if(!empty($msg)){
                $_SESSION['message'] = $msg;
            }else{
                return $this->message;
            }
        }

        public function is_logged_in(){
            return $this->logged_in;
        }

        public function login($student){
            if($student){
                $this->student_id = $_SESSION['student_id'] = $student->s_id;
                $this->logged_in = true;
            }

        }

        public function logout(){
            unset($_SESSION['student_id']);
            unset($this->student_id);
            $this->logged_in = false;
        }
    }

    $session = new Session();
    $message = $session->message();

?>