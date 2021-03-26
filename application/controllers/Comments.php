<?php 

    class Comments extends CI_Controller {

        public function create($post_id) {
            $slug = $this->input->post('post_slug');
            $data['post'] = $this->post->get_posts($slug);
          

            //Make Fields Required
            $this->form_validation->set_rules('name', 'Name', 'required');
            $this->form_validation->set_rules('email_address', 'Email', 'required');
            $this->form_validation->set_rules('comments_body', 'Comments', 'required');
            
            if($this->form_validation->run() === FALSE) {
                $this->load->view('templates/header');
                $this->load->view('posts/view', $data);
                $this->load->view('templates/footer');
            }
            else { 
                $this->comment->create_comment($post_id);
                redirect('posts/' . $slug); 
            }
        }
        
    }