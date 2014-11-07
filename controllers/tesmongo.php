<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tesmongo extends CI_Controller {

	
	function index()
	{	
		$this->mongoci->db->blog->drop();
		
		$data = array(
			'idnya'=>'123',
			'content'=>'this is a blog post',
			'comments'=>array(
				array(
					'author'=>'mika',
					'comment'=>'oh yess'
				),
				array(
					'author'=>'moly',
					'comment'=>'oh noo'
				),
			),
		);
		
		$this->mongoci->db->blog->insert($data);
		
		$rs = $this->mongoci->db->blog->findOne();
		
		print_r($rs);
		
		$this->mongoci->db->blog->update(
			array('idnya'=>'123'), 
			array('$set' => 
				array("comments.1.author" => "Jim")
			)
		);
		
		$rs = $this->mongoci->db->blog->findOne();
		
		print_r($rs);
		
		$c = new stdclass;
		$c->idnya = '123';
		$rs = $this->mongoci->db->blog->findOne($c);
		print_r($rs);
	}
	
}

/* End of file Tesmongo.php */
/* Location: ./application/controllers/Tesmongo.php */