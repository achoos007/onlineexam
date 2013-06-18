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
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	function validate(){
		

// ---------------------------------------------------------------------
$this->menu="result";
$this->title="question";
			
// ---------------------------------------------------------------------
$data['main']['validate']['title']=	"Validate Exam";
$data['main']['validate']['page']  =	$this->load->view("exam_validate",$data,TRUE); 

// ---------------------------------------------------------------------


$this->load->view("theme/header",$data);

$this->load->view("theme/index",$data);

$this->load->view("theme/footer",$data);

	}
	
function exam($examid=0,$mocktype="off") {
$data['examid']=intval($examid);
$data['mocktype']=$mocktype;
// ---------------------------------------------------------------------
$this->menu="result";
$this->title="question";
// ---------------------------------------------------------------------
$exist['table']='qexam';
$exist['where']['qDesignerId']=$examid;
$exist=getsingle($exist);
if(!empty($exist['equestions'])){
$qu=unserialize($exist['equestions']);
$questcount=count($qu);
$data['qucount']=$questcount;
$i=0;
foreach( $qu as $d){
$i++;


$data['question']=$d;
$data['qid']=$d;
$data['id']=$i;
$data['date']=date("H:i:s");










$data['main']['question-'.$i]['title']=	"Exam";
$data['main']['question-'.$i]['page']  =	$this->load->view("question_dashboard",$data,TRUE);
 
}
}
else{
$data['main']['error']['title']=	"Exam";
$data['main']['error']['page']  =	$this->load->view("error",$data,TRUE); 
}
// ---------------------------------------------------------------------
$this->load->view("theme/header",$data);
$this->load->view("theme/index",$data);
$this->load->view("theme/footer",$data);
}
function answerexam(){

	$qid=intval($this->input->post('qid'));
	//$data['qid'] = intval($this->input->post('qid',TRUE));
	$clickid=$this->input->post('clkid');
	$status=$this->input->post('status');
	$flag=intval($this->input->post('flag'));
	$examid=intval($this->input->post('examid'));
	
	$ansexam['table']='test';
	$ansexam['where']['qBankid']=$qid;
	$ansexam['where']['qDesignerId']=$examid;
	$count=total_rows($ansexam);


	$update['table'] = 'test';
	$update['data']['qBankid'] = $qid;
	$update['data']['qDesignerId'] = $examid;
	if($flag=='1'){
		if($clickid=='a')
			$update['data']['option1'] = $this->input->post('clkid');
		elseif($clickid=='b')
			$update['data']['option2'] = $this->input->post('clkid');
		elseif($clickid=='c')	
			$update['data']['option3'] = $this->input->post('clkid');
		elseif($clickid=='d')
			$update['data']['option4'] = $this->input->post('clkid');
		
}
	elseif($flag=='2'){
	$update['data']['option1'] = $this->input->post('clkid');
	
}

	if ($count > 0) {
		$update['where']['qBankid'] = $qid;
		$update['where']['qDesignerId']= $examid;
		$test= update($update);
		//print "test".$test;
		if (update($update)) {
			print"Data Updated Sucessfully";
		}
		else
			print"Error Occured";
	}
	else {
		insert($update);
			print "Data Inserted Successfully";
	}
	
}

function answer_delete(){
	
	$qid=intval($this->input->post('qid'));
	$clickid=$this->input->post('clkid');
	$status=$this->input->post('status');
	
	$ansexam['table']='test';
	$ansexam['where']['qBankid']=$qid;
	$count=total_rows($ansexam);

	
	//echo"Hellooooooooooo".$count;

	$update['table'] = 'test';
	$update['data']['qBankid'] = $qid;
	
	if($clickid=='a' && $status=='false')
		$update['data']['option1'] ='';
	elseif($clickid=='b' && $status=='false')
		$update['data']['option2'] ='';
	elseif($clickid=='c' && $status=='false')
		$update['data']['option3'] ='';
	elseif($clickid=='d' && $status=='false')
		$update['data']['option4'] ='';
		
	if ($count > 0) {
		$update['where']['qBankid'] = $qid;
		if (update($update)) {
			print"Data Updated Sucessfully";
		}
		else
			print"Error Occured";
	}
}

function timer(){
	$today=date("H:i:s");
	//print "Today date".$today;
}

function message_dialog(){

$data['title']='Confirm Page';
	
$this->load->view("theme/header",$data);

$this->load->view("successpage",$data);

$this->load->view("theme/footer",$data);
	
}

}

/* End of file exam.php */
/* Location: ./application/controllers/exam.php */
