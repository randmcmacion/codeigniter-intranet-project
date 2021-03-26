<?php 

    class Comment extends CI_Model {

        public function __construct() {
            $this->load->database();
        }

        public function create_comment($post_id) {
            $data = array(
                'post_id'           =>  $post_id,
                'name'              =>  $this->input->post('name'),
                'email_address'     =>  $this->input->post('email_address'),
                'comments_body'     =>  $this->input->post('comments_body')
            );
            return $this->db->insert('comments', $data);  
        }

        public function get_comments($post_id) {
            $query = $this->db->get_where('comments', array('post_id' => $post_id));
            return $query->result_array();
        }
        
    }