<?php 
    class User{
        private $db;

        public function __construct(){
            $this->db = new Database();
        }


        //Get All Products
        public function loginUser($userId, $pwd)
        {

            $uidExist = UserIdExist($userId);


            if ($uidExist === false){
                //header("location: ../login.php?error=wrongId");
                //exit();
                $results = $uidExist;
            }

            $pwdHashed = $uidExist["password"];
            $checkPwd = password_verify($pwd, $pwdHashed);

            if($checkPwd === false){
                //header("location: ../login.php?error=wrongPassword");
                //exit();
            }
            else if($checkPwd === true){
                //session!!
                session_start();
                
                $_SESSION["userId"] = $uidExist["userId"];
                header("location: ../index.php");
                exit();

            }

            $results = $checkPwd;

            return $results;
        }

        function UserIdExist($UserId)
        {
            $this->db->query("SELECT * FROM tbuser WHERE userId = $UserId");

            $results = $this->db->resultSet(); 

            return $results;
        }
        

        function EmptyInputLogin($userId, $pwd)
        {
            $result;

            if(empty($userId) ||empty($pwd))
            {
                $result = true;
            }
            else
            {
                $result = false;
            }
            return $result;
        }

    }