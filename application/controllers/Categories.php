<?php 

    class Categories extends CI_Controller {

        public function index() {

            if(!$this->session->userdata('logged_in')) {
                redirect('users/login');
            }

            $data['title'] = "All Categories";
            $data['categories'] = $this->category->get_categories();  

            $this->load->view('templates/header');
            $this->load->view('categories/index', $data);
            $this->load->view('templates/footer');
        }

        public function create() {

            if(!$this->session->userdata('logged_in')) {
                redirect('users/login');
            }

            $data['title'] = 'Create Category';

            //Make Fields Required
            $this->form_validation->set_rules('name', 'Name', 'required');

            if($this->form_validation->run() === FALSE) {
                $this->load->view('templates/header');
                $this->load->view('categories/create', $data);
                $this->load->view('templates/footer');
            }
            else {
                $this->category->create_category();  
                $this->session->set_flashdata('category_created', 'Category was created successfully!');
                redirect('categories');
            }
        }

        public function edit($id) {

            if(!$this->session->userdata('logged_in')) {
                redirect('users/login');
            }

            $data['category'] = $this->category->get_categories($id); 
            $category_name = $data['category']['name'];
           //    $data['category_name'] = $this->post->get_category_name($category_name)
           
            //Make Fields Required
            $this->form_validation->set_rules('name', 'Name', 'required'); 

            if(empty($data['category'])){
                show_404();
            }

            $data['title'] = "Edit Category";

            $this->load->view('templates/header');
            $this->load->view('categories/edit', $data);
            $this->load->view('templates/footer');
        }

        public function update() { 

            if(!$this->session->userdata('logged_in')) {
                redirect('users/login');
            }
            
            $this->category->update_category();
            $this->session->set_flashdata('category_updated','Category updated successfully!');
            redirect('categories');
        }

        public function delete($id) {
            $this->category->delete_category($id);
            $this->session->set_flashdata('category_deleted','Category deleted successfully!');
            redirect('categories');
        }

        public function posts($id) {
            $data['title'] = $this->category->get_category_name($id)->name;
            $data['posts'] = $this->post->get_posts_by_category($id);

            $this->load->view('templates/header');
            $this->load->view('posts/index', $data);
            $this->load->view('templates/footer');
        }
         
    }