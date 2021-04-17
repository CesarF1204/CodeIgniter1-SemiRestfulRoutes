<?php
class Product extends CI_Model {
	public function get_products(){
		$query = "SELECT id, name, description, price FROM products";
		return $this->db->query($query)->result_array();
	}
    public function add_product($product){
    	$query = "INSERT INTO Products (name, description, price, created_at, updated_at) VALUES (?, ?, ?, NOW(), NOW())";
    	$values = array($product['name'], $product['description'], $product['price']);
    	return $this->db->query($query, $values);
    }
    public function get_product_by_id($product_id){
         return $this->db->query("SELECT * FROM products WHERE id = ?", array($product_id))->row_array();
    }
    public function update_product($product_id, $product_updates){
        $where = "id = ". $product_id; 
        return $this->db->update('products', $product_updates, $where);
    }
    public function delete_product($id){
        $query = "DELETE FROM products WHERE products.id = $id";
        return $this->db->query($query);
    }
}
?>