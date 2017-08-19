<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Content extends CI_Controller {


     public function index()
     {

         $data['middle'] = 'content/create_content';

		$this->load->view('templates/template',$data);

     }


}