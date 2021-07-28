<?php 
    class Product{
        private $db;

        public function __construct(){
            $this->db = new Database();
        }


        //Get All Products
        public function getAllProducts()
        {
            $this->db->query("SELECT * FROM tbProduct ORDER BY productNo");

            //Assign Result Set
            $results = $this->db->resultSet();

            return $results;
        }
    }