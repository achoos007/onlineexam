<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	
	
	
 
	public function index()
	{
$this->menu="home";
$this->title="home";
 
		
	if(! $this->session->userdata('userid'))		
			{
				
				redirect('login', 'refresh');

			}			
	
	
		$prefs = array (
               'show_next_prev'  => TRUE,
               'next_prev_url'   => site_url()
             );
		$prefs['template'] = '

   {table_open}<table border="0" width="100%" height="200px" cellpadding="0" cellspacing="0">{/table_open}

   {heading_row_start}<tr>{/heading_row_start}

   {heading_previous_cell}<th><a href="{previous_url}">&lt;&lt;</a></th>{/heading_previous_cell}
   {heading_title_cell}<th colspan="{colspan}">{heading}</th>{/heading_title_cell}
   {heading_next_cell}<th><a href="{next_url}">&gt;&gt;</a></th>{/heading_next_cell}

   {heading_row_end}</tr>{/heading_row_end}

   {week_row_start}<tr>{/week_row_start}
   {week_day_cell}<td>{week_day}</td>{/week_day_cell}
   {week_row_end}</tr>{/week_row_end}

   {cal_row_start}<tr>{/cal_row_start}
   {cal_cell_start}<td>{/cal_cell_start}

   {cal_cell_content}
   <a href="{content}" data-rel="dialog">
   {day}
   </a>
   {/cal_cell_content}
   {cal_cell_content_today}
   <div class="highlight">
   <a href="{content}" data-rel="dialog">{day}</a>
   </div>
   {/cal_cell_content_today}

   {cal_cell_no_content}{day}{/cal_cell_no_content}
   {cal_cell_no_content_today}<div class="highlight">{day}</div>{/cal_cell_no_content_today}

   {cal_cell_blank}&nbsp;{/cal_cell_blank}

   {cal_cell_end}</td>{/cal_cell_end}
   {cal_row_end}</tr>{/cal_row_end}

   {table_close}</table>{/table_close}
';





$data['menu']='home';



$this->menu="home";
$this->title="home";



$this->load->library('calendar', $prefs);
$data['main']['dashboard']['title']=	"Dashboard"; 
$data['main']['dashboard']['page']=		$this->load->view("dashboard",$data,TRUE); 





$this->load->view("theme/header",$data);
$this->load->view("theme/index",$data);
$this->load->view("theme/footer",$data);










/*

$this->load->library('calendar', $prefs);
		$this->load->view('header');
		$this->load->view('dashboard');
		$this->load->view('footer');
*/
	}
}

/* End of file dashboard.php */
/* Location: ./application/controllers/dashboard.php */
