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
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
		
		
function exam($examid=0) {


$data['examid']=intval($examid);
// ---------------------------------------------------------------------
$this->menu="result";
$this->title="question";
			
// ---------------------------------------------------------------------



$exist['table']='qexam';
$exist['where']['qDesignerId']=$examid;
$exist=getsingle($exist);
//pa($exist);
if(!empty($exist['equestions'])){
$qu=unserialize($exist['equestions']);



$i=0;


foreach( $qu as $d){
$i++;

$data['question']='-------------------------'.$d.'----------------------------------------------------';
$data['qid']=$d;

$data['main'][$i]['title']=	"Exam";
$data['main'][$i]['page']  =	$this->load->view("question_dashboard",$data,TRUE); 

}



}else{
	
	
$data['main']['error']['title']=	"Exam";
$data['main']['error']['page']  =	$this->load->view("error",$data,TRUE); 
}




// ---------------------------------------------------------------------


$this->load->view("theme/header",$data);

$this->load->view("theme/index",$data);

$this->load->view("theme/footer",$data);

}


}

/* End of file exam.php */
/* Location: ./application/controllers/exam.php */
