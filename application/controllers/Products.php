<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index(){
		$this->load->model("Product");
		$get_each_product = $this->Product->get_products();
		$this->load->view('products/index.php', array('get_each_product' => $get_each_product));
	}
	public function new() {
		$this->load->view('products/create.php');
	}
	public function add() {
		$this->load->model("Product");
        $this->load->library('form_validation');
        $this->form_validation->set_rules('name', 'Product Name', 'required');
        $this->form_validation->set_rules('price', 'Product Price', 'required|numeric');
        if($this->form_validation->run() == FALSE) {
        	if(empty($this->input->post('name'))) {
        		$this->session->set_flashdata('error', '<p class="error">Product name should not be empty. Please try again.</p>');
        	} else if(empty($this->input->post('price'))) {
        		$this->session->set_flashdata('error', '<p class="error">Product price should not be empty. Please try again.</p>');
        	} else if(!is_numeric($this->input->post('price'))) {
        		$this->session->set_flashdata('error', '<p class="error">Product price should only contain numbers. Please try again.</p>');
        	}
        	redirect(base_url().'products/new');
        } else {
        	$product_details = array("name" => $this->input->post('name'), "description" => $this->input->post('description'), "price" => $this->input->post('price'));
        	$add_product = $this->Product->add_product($product_details);
        	if($add_product === TRUE) {
        		$this->session->set_flashdata('added', '<p class="added">Product "'.$this->input->post('name').'" was successfully added!</p>');
        	}
        }
        redirect(base_url());
	}
	public function show($id) {
	    $this->load->model("Product");
	    $show_this_product = $this->Product->get_product_by_id($id);
	    $this->load->view('/products/show.php', array('product' => $show_this_product));
	}
	public function edit($id) {
	    $this->load->model("Product");
	    $show_this_product = $this->Product->get_product_by_id($id);
	    $this->load->view('/products/edit.php', array('product' => $show_this_product));
	}
	public function update($id) {
		$this->load->model('product');
		$this->load->library('form_validation');
        $this->form_validation->set_rules('name', 'Product Name', 'required');
        $this->form_validation->set_rules('price', 'Product Price', 'required|numeric');
        if($this->form_validation->run() == FALSE) {
        	if(empty($this->input->post('name'))) {
        		$this->session->set_flashdata('error', '<p class="error">Product name should not be empty. Please try again.</p>');
        	} else if(empty($this->input->post('price'))) {
        		$this->session->set_flashdata('error', '<p class="error">Product price should not be empty. Please try again.</p>');
        	} else if(!is_numeric($this->input->post('price'))) {
        		$this->session->set_flashdata('error', '<p class="error">Product price should only contain numbers. Please try again.</p>');
        	}
        	redirect(base_url().'products/edit/'.$id);
        } else {
        	$this->load->helper('date');
			$datestring = '%Y-%m-%d %H:%i:%s';
			$time = now('Asia/Manila');
			$values = array('name' => $this->input->post('name'), 'description' => $this->input->post('description'), 'price' => $this->input->post('price'), 'updated_at' => mdate($datestring, $time));
			$result = $this->product->update_product($id, $values);
			$this->session->set_flashdata('updated', '<p class="updated">Product has been updated.</p>');
	    }
        redirect(base_url());
	}
	public function delete(){
        $this->load->model('Product');
        $this->Product->delete_product($this->input->post('product_id'));
	    $this->session->set_flashdata('deleted', '<p class="deleted">Product has been deleted.</p>');
        redirect(base_url());
    }
}
