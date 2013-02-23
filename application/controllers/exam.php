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
        /*$this->form_validation->set_rules('title', 'Title', 'required|alpha');
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
        }*/
       $this->load->helper(array('form', 'url'));

		$this->load->library('form_validation');

		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		

		if ($this->form_validation->run() == FALSE)
		{
			$this->load->view('paper_designer');
		}
		else
		{
			$this->load->view('formsuccess');
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
    
    
    function user_selection(){
        
        $userid=intval($this->input->post('clkid'));
        $qid=intval($this->input->post('qid'));
        
         // for getting Question Designer name and User Name
        
        $details['table']='qdesigner';
        $details['where']['qDesignerId']=$qid;
        $details=  getsingle($details);
        $title=$details['title'];
              
        $user_det['table']='tbl_staffs';
        $user_det['where']['staff_id']=$userid;
        $user_det=  getsingle($user_det);
        $firstname=ucfirst(strtolower($user_det['first_name']));
        $lastname=  ucfirst(strtolower($user_det['last_name']));
        $username=$firstname."&nbsp".$lastname;
        
        $assign['table']='assigned_users';
        $assign['where']['user_id']=$userid;
        $assign['where']['qid']=$qid;
        $count=  total_rows($assign);
        
       
        
        $update['table']='assigned_users';
        if($count>0)
        {
        $assign=  getsingle($assign);
        $status=$assign['status'];
        
        
            if($status=='Active'){
                $update['where']['user_id']=$userid;
                $update['where']['qid']=$qid;
                $update['data']['status']='Inactive';
                update($update);
                print "<b>".$username ."</b>&nbsp; has been removed from <b>".$title."</b> exam";
            }
            else{
                $update['where']['user_id']=$userid;
                $update['where']['qid']=$qid;
                $update['data']['status']='Active';
                update($update);
                print "<b>".$username."</b>&nbsp; has been sucessfully added to <b>".$title."</b> exam";
            }
        }
        
        else {
            $update['data']['user_id']=$userid;
            $update['data']['qid']=$qid;
            $update['data']['status']='Active';
            insert($update);
            print "<b>".$username."</b>&nbsp; has been sucessfully added to <b>".$title."</b> exam";
        }
    }
    

}

/* End of file exam.php */
/* Location: ./application/controllers/exam.php */
