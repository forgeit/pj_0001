<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Upload extends CI_Controller {

	public function processar() {
		$json = array();
		$config['upload_path']   = '../arquivos/tmp';
		$config['allowed_types'] = 'jpg|png|pdf';//Só vai aceitar jpg ou png
		$config['encrypt_name']  = TRUE;

	    $this->load->library('upload', $config);
	    $this->upload->initialize($config);

	    if ( ! $this->upload->do_upload('file') )
	    {
	    	$json = array('exec' => false, 'message' => $this->upload->display_errors());
	    }
	    else
	    {
	    	$upload_details = $this->upload->data();

	    	$json = array('exec' => true, 'message' => 'Sucesso ao efetuar o upload','nome' => $upload_details['file_name']);
	    }

	    print_r(json_encode($json));
	}
	
}