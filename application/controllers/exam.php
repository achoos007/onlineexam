<?php
if (!defined('BASEPATH'))
exit('No direct script access allowed');

class Exam extends CI_Controller {

function __construct() {
parent::__construct();

$this->menu = "exam";
}

public function index() {

$this->load->view("theme/header", $data);
$this->load->view("theme/index", $data);
$this->load->view("theme/footer", $data);
}

function designer() {

$this->title = "Designer";

$data['main']['open_question_list']['right']['text'] = "Create Question Papers";
$data['main']['open_question_list']['right']['url'] = site_url("exam/form");
$data['main']['open_question_list']['title'] = "Question Designer";
$data['main']['open_question_list']['page'] = $this->load->view("paper_designer_list", $data, TRUE);


$this->load->view("theme/header", $data);
$this->load->view("theme/index", $data);
$this->load->view("theme/footer", $data);
}

function listall() {

$this->menu = "exam";
$this->title = "Designer";
$data['main']['open_question_list']['right']['text'] = "Create Question Papers";
$data['main']['open_question_list']['right']['url'] = site_url("exam/form");
$data['main']['open_question_list']['title'] = "Previous Question Papers";
$data['main']['open_question_list']['page'] = $this->load->view("questionPaperList", $data, TRUE);

$this->load->view("theme/header", $data);
$this->load->view("theme/index", $data);
$this->load->view("theme/footer", $data);
}

function form($qid = 0) {

$data['subjectid'] = intval($qid);
if (intval($data['subjectid']) > 0)
$data['bttnText'] = 'Edit';
else
$data['bttnText'] = 'Add';
$this->menu = "exam";
$this->title = "Designer";
$data['main']['open_question_list']['right']['text'] = "Previous Question Papers";
$data['main']['open_question_list']['right']['url'] = site_url("exam/designer");
$data['main']['open_question_list']['title'] = "Previous Question Papers";
$data['main']['open_question_list']['page'] = $this->load->view("paper_designer", $data, TRUE);

$this->load->view("theme/header", $data);
$this->load->view("theme/index", $data);
$this->load->view("theme/footer", $data);
}

function edit() {
$data['menu'] = 'exam';
//print_r($_POST);
$this->form_validation->set_rules('title', 'Title', 'required|alpha');
$this->form_validation->set_rules('mark', 'Minimum Mark', 'required|integer|max_length[3]');
$this->form_validation->set_rules('duration', 'Duration', 'required|integer');
$this->form_validation->set_rules('alerttime', 'Alert time', 'required|integer');

if ($this->form_validation->run() == FALSE) {
echo validation_errors();
} else {
$data['qid'] = intval($this->input->post('qdesignerid'));
$update['table'] = 'qdesigner';
$update['data']['title'] = $this->input->post('title');
$update['data']['minMark'] = $this->input->post('mark');
$update['data']['duration'] = $this->input->post('duration');
$update['data']['alertTime'] = $this->input->post('alerttime');
$update['data']['negative'] = $this->input->post('negativemark');
$update['data']['grading'] = $this->input->post('grading');
$update['data']['shuffling'] = $this->input->post('shuffling');
$update['data']['timer'] = $this->input->post('timer');
$update['data']['productid'] = $this->input->post('productid');
$update['data']['moduleid'] = $this->input->post('moduleid');
$update['data']['subjectid'] = $this->input->post('subjectid');
$update['data']['markType'] = $this->input->post('radio-choice-2');
$update['data']['msEasy'] = $this->input->post('multiple-easy');
$update['data']['msModerate'] = $this->input->post('multiple-moderate');
$update['data']['msTough'] = $this->input->post('multiple-tough');
$update['data']['msMandatory'] = $this->input->post('multiple-mandatory');
$update['data']['mmEasy'] = $this->input->post('multiple-easy-m');
$update['data']['mmModerate'] = $this->input->post('multiple-moderate-m');
$update['data']['mmTough'] = $this->input->post('multiple-tough-m');
$update['data']['mmMandatory'] = $this->input->post('multiple-mandatory-m');
$update['data']['tfEasy'] = $this->input->post('multiple-easy-t');
$update['data']['tfModerate'] = $this->input->post('multiple-moderate-t');
$update['data']['tfTough'] = $this->input->post('multiple-tough-t');
$update['data']['tfMandatory'] = $this->input->post('multiple-mandatory-t');
$update['data']['desEasy'] = $this->input->post('multiple-easy-d');
$update['data']['desModerate'] = $this->input->post('multiple-moderate-d');
$update['data']['desTough'] = $this->input->post('multiple-tough-d');
$update['data']['desMandatory'] = $this->input->post('multiple-mandatory-d');
$update['data']['fileEasy'] = $this->input->post('multiple-easy-f');
$update['data']['fileModerate'] = $this->input->post('multiple-moderate-f');
$update['data']['fileTough'] = $this->input->post('multiple-tough-f');
$update['data']['fileMandatory'] = $this->input->post('multiple-mandatory-f');

if ($data['qid'] > 0) {
$update['where']['qDesignerId'] = $this->input->post('qdesignerid');
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
}

function delete() {

$qdid = intval($this->input->post('clkid'));
$del['table'] = 'qdesigner';
$del['where']['qDesignerId'] = $qdid;
delete($del);
}

function module() {
$pid = intval($this->input->post('clkid'));
$query = $this->db->query("select moduleid,name from module where productid='$pid'");
if ($query->num_rows() > 0) {
print "<option value='select'>Select</option>";
foreach ($query->result() as $row) {

$moduleid = $row->moduleid;
$modulename = $row->name;
print "<option value='" . $moduleid . "'>" . $modulename . " </option>";
}
}
}

function subject(){
$mid = intval($this->input->post('clkid'));
$query=  $this->db->query("select n_subjectid,c_subject from tbl_subject where n_specid='$mid'");
if($query->num_rows() > 0){
print "<option value='select'>Select</option>";
foreach ($query->result() as $row){
$subjectid=$row->n_subjectid;
$subjectname=$row->c_subject;
print"<option value='".$subjectid."'>".$subjectname."</option>";
}
}
}

function assign($qid=0){

$this->menu = "exam";
$this->title = "Designer";

$data['title']=" Assign ";  
$data['qid'] = intval($qid);
$this->load->view("theme/header",$data);
$this->load->view("examAssign",$data);
$this->load->view("theme/footer",$data);
}

function assigneelist(){

//print_r($_POST);
$this->menu = "exam";
$this->title = "Designer";

$data['title']=" List View ";  
$data['qid'] = intval($this->input->post('qdesignerid'));
$data['assigneeid']=intval($this->input->post('assigneeid'));
$data['main']['open_question_list']['right']['text'] = "Previous Question Papers";
$data['main']['open_question_list']['right']['url'] = site_url("exam/designer");
$data['main']['open_question_list']['title'] = "Employee List";
$data['main']['open_question_list']['page'] = $this->load->view("assigneelist", $data, TRUE);

$this->load->view("theme/header", $data);
$this->load->view("theme/index", $data);
$this->load->view("theme/footer", $data);


}
























function execute($examid=0) {

$this->title = "Exam Preview";


$data['examid']=intval($examid);

//-----------------Exam Executer starts --------------------

$ques['table']='qdesigner';
$ques['where']['qdesignerid']=$data['examid'];



$ques=getsingle($ques); 
if(!empty($ques)){
// pa($ques);
// [qDesignerId] => 4
// [title] => QuestDesigner
// [minMark] => 0
// [duration] => 0
// [alertTime] => 0
// [negative] => 0
// [grading] => 0
// [shuffling] => 0
// [timer] => 0
// [productid] => 4
// [moduleid] => 1
// [subjectid] => 1
// [markType] => 0
// [msEasy] => 0
// [msModerate] => 0
// [msTough] => 0
// [msMandatory] => 0
// [mmEasy] => 0
// [mmModerate] => 0
// [mmTough] => 0
// [mmMandatory] => 0

// [tfEasy] => 0
// [tfModerate] => 0
// [tfTough] => 0
// [tfMandatory] => 0

// [desEasy] => 0
// [desModerate] => 0
// [desTough] => 0
// [desMandatory] => 0

// [fileEasy] => 0
// [fileModerate] => 0
// [fileTough] => 0
// [fileMandatory] => 0
// [status] => 1

// 'multiple choice multiple answer',
// 'multiple choice single answer',
// 'short text',
// 'file upload',
// 'yes / no'





$qarray['multiple choice multiple answer']['moderate']=$ques['mmModerate'];
$qarray['multiple choice multiple answer']['easy']=$ques['mmEasy'];
$qarray['multiple choice multiple answer']['tough']=$ques['mmTough'];

$qarray['multiple choice single answer']['moderate']=$ques['msModerate'];
$qarray['multiple choice single answer']['easy']=$ques['msEasy'];
$qarray['multiple choice single answer']['tough']=$ques['msTough'];

$qarray['short text']['moderate']=$ques['desModerate'];
$qarray['short text']['easy']=$ques['desEasy'];
$qarray['short text']['tough']=$ques['fileTough'];

$qarray['file upload']['moderate']=$ques['fileEasy'];
$qarray['file upload']['easy']=$ques['fileModerate'];
$qarray['file upload']['tough']=$ques['fileTough'];

$qarray['yes / no']['moderate']=$ques['tfEasy'];
$qarray['yes / no']['easy']=$ques['tfModerate'];
$qarray['yes / no']['tough']=$ques['tfTough'];



$exist['table']='qexam';
$exist['where']['qDesignerId']=$data['examid'];
$exist=getsingle($exist);
if(empty($exist)){
foreach($qarray as $type=>$mode){
foreach($mode as $m=>$count){
$query=" select 	* from qBank	where 
questiontype='".$type."' and
level='".$m."'
ORDER BY RAND()
limit ".$count." "; 
$query=qry($query);
if(!empty($query['result']))
foreach($query['result'] as $res){
$data['questions'][$res['qBankid']]=$res['question']; 
$questions[]=$res['qBankid'];
}
}
}

if(! empty($questions)){

$insert['table']='qexam';
$insert['data']['equestions']=serialize($questions);
$insert['data']['entrydate']=entrydate();  
$insert['data']['qDesignerId']=$data['examid'];
insert($insert);
}
	  






}



//-----------------Exam Executer ends --------------------

$data['main']['open_question_list']['back'] = 1;
$data['main']['open_question_list']['right']['text'] ='Manage Exam';
$data['main']['open_question_list']['right']['url'] =site_url('manage/exam/'.$data['examid']);
$data['main']['open_question_list']['title'] = "Examination Preview";
$data['main']['open_question_list']['page'] = $this->load->view("exam_execute", $data, TRUE);


}else{ 
$data['main']['error']['back'] = 1;
$data['main']['error']['title'] = "error";
$data['main']['error']['page'] = $this->load->view("error", $data, TRUE);
}
$this->load->view("theme/header", $data);
$this->load->view("theme/index", $data);
$this->load->view("theme/footer", $data);
}




function attend(){




$this->menu = "exam";
$this->title = "Designer";

$data['title']=" List View ";   





$query=" select * from qBank order by RAND() limit 50 ";
$data['questions']=qry($query);




$q=0;
if(!empty($data['questions']['result'])){
foreach($data['questions']['result'] as $ques){
$q++;

// $data['main']['open_question_list']['right']['text'] = "Previous Question Papers";
// $data['main']['open_question_list']['right']['url'] = site_url("exam/designer");

$data['question'] = $ques; 
$data['main'][$q]['title'] = "Question ".$q;
$data['main'][$q]['footermenu'] = '


<div data-role="navbar">
<ul>
<li><a href="'.site_url("exam/attend/#2").'">Previous</a></li>
<li><a href="#2">Next</a></li>
</ul>
</div>

';
$data['main'][$q]['page'] = $this->load->view("questions", $data, TRUE);


}
}

















$this->load->view("theme/header", $data);
$this->load->view("theme/index", $data);
$this->load->view("theme/footer", $data);


}
}

/* End of file exam.php */
/* Location: ./application/controllers/exam.php */
