 
	
<ul data-role="listview" data-inset='true' data-filter='true' id='questionlistopen'>
			<?php 
 
			$op['table']='qBank';
			$op['where']['status']='open';
			$op['start']=$start;
			$op['order']['qBankid']='desc';
			$op =getrecords($op); 
			if(!empty($op['result']))
			foreach($op['result'] as $o){  
				print "
				
				
				
				<li  id='ques_".$o['qBankid']."'>
					<a href='#'  style='padding-top: 0px;padding-bottom: 0px;padding-right: 42px;padding-left: 0px;'  >
									<label style='border-top-width: 0px;margin-top: 0px;border-bottom-width: 0px;margin-bottom: 0px;border-left-width: 0px;border-right-width: 0px;' data-corners='false'>
											<fieldset data-role='controlgroup' >                                                        
													<input type='checkbox' name='checkbox-2b' id='checkbox-2b' />                   
													<label for='checkbox-2b' style='border-top-width: 0px;margin-top: 0px;border-bottom-width: 0px;margin-bottom: 0px;border-left-width: 0px;border-right-width: 0px;'>
															<img src='".base_url('images/question.jpg')."' style='float:left;width:80px;height:80px'/>
															<label  style='float:left;padding:10px 0px 0px 10px;'> 
																	<h3>".format($o['question'])."</h3>
																	<p>".$o['questiontype']."</p>
															</label> 
													</label>
											</fieldset> 
									</label>
									</a>
							<a href='".site_url('question/form/'.$o['qBankid'])."'  data-icon='info'  href='".site_url('question/form/'.$o['qBankid'])."' data-rel='dialog' >Delete</a>
			 </li>";
				 
				// <li id='ques_".$o['qBankid']."'>
				// <a href='".site_url('question/form/'.$o['qBankid'])."' data-rel='dialog'   >
				// <h3>".format($o['question'])."</h3>
				// <p>".$o['questiontype']."</p>
				// <input type='checkbox' data-role='none' /> 
				// </a>
				// <a href='#deleteQuestion'  data-icon='delete'  data-theme='d' id='".$o['qBankid']."' class='open_confirm'>Delete</a>
				// </li>
				// ";
			}
			
			?>			
</ul>
<a href="#popupAssign" data-rel="popup" data-role="button" data-inline="true">Options</a>
<?php 

print "<input type='button' value='Load More' data-theme='b' name='loadmoreopen' id='loadmoreopen'/>";
?>

<div id="deleteQuestion" data-role='popup' style='width:250px; padding:50px; border:5px solid #B9B9B9;' data-theme='d'>
Are you sure to delete Question ?
<div class='clear'><br/><br/></div>
<?php 
print button('Delete','','delete_question');
print close();
?>
</div>
<?php 


$script=" 
$('.open_confirm').click(function (){ 
	 clickId=this.id; 
	$( '#deleteQuestion' ).popup( 'open' ); 
	}); 
$('.delete_question').click(function(){ 
$.post('".site_url('question/delete/')."',{clkid:clickId});	 
$('#deleteQuestion').popup( 'close' );
$('#ques_'+clickId+'').hide(2000);
setTimeout('refreshPage()',2050); 
	}); 
";
  
print ready($script);

?>
<div data-role="popup" id="popupMenu" data-theme="a" data-mini='true'>
				<ul data-role="listview" data-inset="true" style="min-width:210px;" data-theme="b" data-mini='true'>
					<li><a href="<?php print site_url('question/form/0');?>" data-rel='dialog' data-mini='true'>Add questions</a></li>
					<li><a href="<?php print site_url('question/upload');?>" data-rel='dialog' data-mini='true'>File Upload</a></li> 
					<li><a href="<?php print site_url('question/bank');?>"  data-mini='true'>Question Bank</a></li> 
				</ul>
		</div>
 

		<div data-role="popup" id="popupAssign" data-theme="a">
				<ul data-role="listview" data-inset="true" style="min-width:210px;" data-theme="b">
					<li data-role="divider" data-theme="a">Options</li>
					<li><a href="options.html">Assign to subjects</a></li>
					<li><a href="methods.html">Delete Questions</a></li>
				</ul>
		</div>
		
		
<?php 


$script=" $('#loadmoreopen').click(function (){	$.post('".site_url('question/loadmore/open')."',function(data){ 
	
	  

$('#questionlistopen').append(data);
$('#questionlistopen').listview('refresh');
});});";



print ready($script);

?>
		
