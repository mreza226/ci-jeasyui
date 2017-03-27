<?php

class Product_model extends CI_Model 
{
	public function __construct()
	{
		parent:: __construct();
	}
	
	public function get_product($rows, $offset, $sort, $order, $keyword)
	{
		$this->db->select('*');
		$this->db->from('product');
		$this->db->where("(id like '%$keyword%' or name like '%$keyword%')");
		$this->db->limit($rows, $offset);
        $this->db->order_by($sort, $order);
		return $this->db->get()->result_array();
	}
	
	public function get_product_count($keyword)
	{
        $this->db->select('COUNT(id) as cnt');
        $this->db->from('product');
		$this->db->where("(id like '%$keyword%' or name like '%$keyword%')");
		return $this->db->get()->row()->cnt;
	}
	
	public function insert($product)
	{
		$this->db->insert('product', $product);
	}
	
	public function update($product, $id)
	{
		$this->db->where('id', $id);
		$this->db->update('product', $product);
	}	
		
	public function delete($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('product');
	}
}