<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->output->enable_profiler();
	}

	public function index()
	{
		// if()
		$view_array = array(
						'counter' => $this->session->userdata('counter'),
						'word' => $this->session->userdata('word')
					  );
		$this->load->view('index',$view_array);
	}

	public function random()
	{
		$alphanumeric = array('a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z','1','2','3','4','5','6','7','8','9');
		$this->session->set_userdata('word','');
		for($i=0;$i<14;$i++)
		{
			$random = rand(0,34);
			$letter = $alphanumeric[$random];
			$keyword = $this->session->userdata('word');
			$this->session->set_userdata('word', $letter.''.$keyword);
		}

		if($this->session->userdata('counter'))
		{
			$count = $this->session->userdata('counter');
			$this->session->set_userdata('counter', $count + 1);
		}
		else
		{
			$this->session->set_userdata('counter', 1);
		}

		$this->session->set_userdata('word',$keyword);
		redirect('/');
	}

	public function destroy()
	{
		$this->session->set_userdata('counter', 1);
		redirect('/');
	}
}

//end of main controller