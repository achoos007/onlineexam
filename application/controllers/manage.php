<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Manage extends CI_Controller {
	
	  // public function __construct()
       // {
				 	// $this->menu="question";
// 
// $this->title="question";
// 
	// }
	
 
	public function index()
	{
	
	
		$this->exam();
	
	
	
	}
	
		
		
		function exam(){
// ---------------------------------------------------------------------
$this->menu="question";
$this->title="question";
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			

// ---------------------------------------------------------------------
$data['main']['open_question_list']['title']=	"Exam";  

$data['main']['open_question_list']['page']=		$this->load->view("examdashboard",$data,TRUE); 

// ---------------------------------------------------------------------














$this->load->view("theme/header",$data);

$this->load->view("theme/index",$data);

$this->load->view("theme/footer",$data);

		}
}

/* End of file exam.php */
/* Location: ./application/controllers/exam.php */
