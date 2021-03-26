<?php

    class User extends CI_Model {

        public function __construct() {
            $this->load->database();
        }

        public function register_user($encrypted_password) {
            $data = array(
                'name'              =>  $this->input->post('name'),
                'username'          =>  $this->input->post('username'),
                'email_address'     =>  $this->input->post('email_address'),
                'zip_code'          =>  $this->input->post('zip_code'),
                'password'          =>  $encrypted_password
            ); 
            $this->db->insert('users', $data);
        }

        public function check_username_exists($username) {

            $query = $this->db->get_where('users', array('username' => $username ));
            
            if(empty($query->row_array())) {
                return true;
            }
            else {
                return false;
            }

        }

        public function check_email_address_exists($email_address) {
            
           $query = $this->db->get_where('users', array('email_address' => $email_address ));
            
            if(empty($query->row_array())) {
                return true;
            }
            else {
                return false;
            }

        }

        public function login($username, $password) {
            $this->db->where('username', $username);
            $this->db->where('password', $password);

            $result = $this->db->get('users');

            if($result->num_rows() == 1) {
                return $result->row(0)->id;
            }
            else {
                return false;
            }
        }

    }