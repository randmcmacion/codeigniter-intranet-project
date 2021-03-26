<?php 

    class Users extends CI_Controller {

        public function register() {
            $data['title'] = "Create an Account";

             //Make Fields Required
            $this->form_validation->set_rules('name', 'Full Name', 'required');
            $this->form_validation->set_rules('email_address', 'Email Address', 'required|callback_check_email_address_exists');
            $this->form_validation->set_rules('username', 'Username', 'required|callback_check_username_exists');
            $this->form_validation->set_rules('password', 'Password', 'required');
            $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'matches[password]');

            if($this->form_validation->run() === FALSE) { 
                $this->load->view('templates/header');
                $this->load->view('users/register', $data);
                $this->load->view('templates/footer');
            }
            else {
                $encrypted_password = md5($this->input->post('password'));
                $this->user->register_user($encrypted_password);
                $this->session->set_flashdata('user_registered', 'Your account was created successfully!');
                redirect('users/login');
            } 
        }

        //Check if Username already exists
        public function check_username_exists($username) { 
            $this->form_validation->set_message('check_username_exists', 'This username is already taken.');
            
            if($this->user->check_username_exists($username)) {
                return true;
            }
            else {
                return false;
            }
        }

        //Check if Email Address already exists
        public function check_email_address_exists($email_address) {

           $this->form_validation->set_message('check_email_address_exists', 'This Email Address is already taken.');
            
            if($this->user->check_email_address_exists($email_address)) {
                return true;
            }
            else {
                return false;
            }
        }

        public function login() {
            $data['title'] = "Login to your Account";

             //Make Fields Required
            $this->form_validation->set_rules('username', 'Username', 'required');
            $this->form_validation->set_rules('password', 'Password', 'required');

            if($this->form_validation->run() === FALSE) { 
                $this->load->view('templates/header');
                $this->load->view('users/login', $data);
                $this->load->view('templates/footer');
            }
            else {
                $username = $this->input->post('username');
                $encrypted_password = md5($this->input->post('password'));

                $user_id = $this->user->login($username, $encrypted_password);

                if($user_id) { 

                    $user_data = array(
                        'user_id'      =>   $user_id,
                        'username'     =>   $username,
                        'logged_in'    =>   true
                    );
                    
                    $this->session->set_userdata($user_data);

                    $this->session->set_flashdata('user_loggedin', 'Your are successfully logged in!');
                    redirect('posts');
                }
                else {
                    $this->session->set_flashdata('login_failed', 'Username or Password is incorrect.');
                    redirect('users/login');
                }

            } 
        }

        public function logout() {
            $this->session->unset_userdata('logged_in');
            $this->session->unset_userdata('user_id');
            $this->session->unset_userdata('username');
            $this->session->set_flashdata('user_loggedout', 'Your are now logged Out!');
            redirect('users/login');
        }
        
    }