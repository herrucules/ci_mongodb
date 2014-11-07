<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MongoCI
{
	public $db;
	
	function __construct($params=array())
	{
		$CI =& get_instance();
		$CI->load->config('mongoci');
		
		if(sizeof($params) == 0)
		{
			$host		= $CI->config->item('mongo_host');
			$port		= $CI->config->item('mongo_port');
			$database	= $CI->config->item('mongo_database');
		}
		else
		{
			$host		= $params['mongo_host'];
			$port		= $params['mongo_port'];
			$database	= $params['mongo_database'];
		}
		
		$dsn = sprintf('mongodb://%s:%d', $host, $port);
		$m = new MongoClient($dsn);
		
		$this->db = $m->{$database};
	}
}