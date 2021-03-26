<?php   

    class Posts extends CI_Controller{

        public function index($offset = 0){
            

            $config['base_url'] = base_url() . 'posts/index/';
            $config['total_rows'] = $this->db->count_all('posts');
            $config['per_page'] = 2;    
            $config['uri_segment'] = 3;
            $config['attributes'] = array('class' => 'page-link pagination_links');

            $this->pagination->initialize($config);

            $data['title'] = "Latest Posts";
            $data['posts'] = $this->post->get_posts(FALSE, $config['per_page'], $offset);  

            $this->load->view('templates/header');
            $this->load->view('posts/index', $data);
            $this->load->view('templates/footer');
        }

        public function view($slug = NULL) {
            $data['post'] = $this->post->get_posts($slug);
            $post_id = $data['post']['id']; 
            $data['comments'] = $this->comment->get_comments($post_id);

            if(empty($data['post'])){
                show_404();
            }

            $data['title'] = $data['post']['title'];

            $this->load->view('templates/header');
            $this->load->view('posts/view', $data);
            $this->load->view('templates/footer');
        }

        public function create() {

            if(!$this->session->userdata('logged_in')) {
                redirect('users/login');
            }

            $data['title'] = "Create Post";
            
            $data['categories'] = $this->post->get_categories();
            
            //Make Fields Required
            $this->form_validation->set_rules('title', 'Title', 'required');
            $this->form_validation->set_rules('description', 'Description', 'required');
            $this->form_validation->set_rules('category_id', 'Category', 'required');
            
            if($this->form_validation->run() === FALSE) {
                $this->load->view('templates/header');
                $this->load->view('posts/create', $data);
                $this->load->view('templates/footer');
            }
            else {
		    	// Upload Image
		    	$config['upload_path'] = './assets/images/posts';
		    	$config['allowed_types'] = 'gif|jpg|png';
                //Other Configs
		    	//$config['max_size'] = '2048';
		    	//$config['max_width'] = '2000';
		    	//$config['max_height'] = '2000';
            
                $this->load->library('upload', $config);
            
                if(!$this->upload->do_upload()){
                    $errors = array('error' => $this->upload->display_errors());
                    $post_image = 'f.jpg';
                } else {
                    $data = array('upload_data' => $this->upload->data());
                    $post_image = $_FILES['userfile']['name'];
                } 
            
                $this->post->create_post($post_image);  
                $this->session->set_flashdata('post_created', 'Your Post was created ssuccessfully!'); 
                redirect('posts');
            }
        }

        public function edit($slug) { 

            if(!$this->session->userdata('logged_in')) {
                redirect('users/login');
            }
            
            $data['post'] = $this->post->get_posts($slug);     
            
            if($this->session->userdata('user_id') != $this->post->get_posts($slug) ['user_id']) {
                redirect('posts');
            }

            //Get post based on post slug
            $data['categories'] = $this->post->get_categories();
            
            $data['category_name'] = $this->post->get_category_name($slug);

            //Validate and check fields if not required
            $this->form_validation->set_rules('title', 'title', 'required');
            $this->form_validation->set_rules('description', 'description', 'required');
            $this->form_validation->set_rules('category_id', 'category_id', 'required');

            //Check if post slug is empty
            if(empty($data['post'])){
                show_404();
            }

            //If post slug is not empty
            $data['title'] = "Edit Post";

            $this->load->view('templates/header');      //Load header template
            $this->load->view('posts/edit', $data);     //Load edit post page
            $this->load->view('templates/footer');      //Load footer template
        }

        public function update() { 

            if(!$this->session->userdata('logged_in')) {
                redirect('users/login');
            }

            $this->post->update_post();
            $this->session->set_flashdata('post_updated', 'Your post was updated successfully!');
            redirect('posts'); 
        }

        public function delete($id) { 
            $this->post->delete_post($id);
            $this->session->set_flashdata('post_deleted', 'Your post was deleted successfully!');
            redirect('posts'); 
        }
    
    } 