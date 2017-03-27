<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller {

	public function __construct()
	{
		parent:: __construct();
		$this->load->model('product_model', 'mdl');
	}

	public function index()
	{
		$data['sub_title']		= 'Product';
		$data['js_app'] 		= array('product');
				
		$this->load->view('header', $data);
		$this->load->view('sidebar');
		$this->load->view('product_view');
		$this->load->view('footer');
	}

	public function get()
	{
		$page 	= isset($_POST['page']) ? intval($_POST['page']) : 1;
        $rows 	= isset($_POST['rows']) ? intval($_POST['rows']) : 1;
        $sort 	= isset($_POST['sort']) ? strval($_POST['sort']) : 'id';
        $order	= isset($_POST['order']) ? strval($_POST['order']) : 'asc';
        
		$keyword = $this->input->post('search_keyword', true);
		
        $offset = ($page-1) * $rows;
        
		$result 			= array();		
        $result['total'] 	= $this->mdl->get_product_count($keyword);
        
		$row = array();     
        $results = $this->mdl->get_product($rows, $offset, $sort, $order, $keyword);
        
		if (count($results) > 0)
		{
			foreach ($results as $a)
			{
				$row[] = array
				(
					'id' 			=> $a['id']
					, 'name'		=> $a['name']
					, 'size'		=> $a['size']
					, 'keterangan'				=> $a['keterangan']
				);
			}
		}
		$result = array_merge($result,array('rows'=>$row));
        echo json_encode($result);
	}

	public function on_save()
	{
		$id	= $this->input->post('id');
		$product = array
		(		
			
			
			'id' 			=> $this->input->post('id', true)
			, 'name'		=> $this->input->post('name', true)
			, 'size'		=> $this->input->post('size', true)
			, 'keterangan'				=> $this->input->post('keterangan', true)
		);
		
		if ($this->input->post('mode') == 'insert')
		{
			$this->mdl->insert($product);
		}
		else
		{
			$this->mdl->update($product, $id);
		}
		echo '1';
	}
	
	public function on_delete()
	{
		$kode_product_ids = $this->input->post('ids', true);
		$kode_product_ids_x = explode(':', $kode_product_ids);
		
		foreach ($kode_product_ids_x as $id) 
		{
            $this->mdl->delete($id);            
        }
		
		echo '1';
	}		
}
