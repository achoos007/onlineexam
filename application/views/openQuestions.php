  
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
<li >
<a href='#'  style='padding-top: 0px;padding-bottom: 0px;padding-right: 42px;padding-left: 0px;'  >
	<label style='border-top-width: 0px;margin-top: 0px;border-bottom-width: 0px;margin-bottom: 0px;border-left-width: 0px;border-right-width: 0px;' data-corners='false'>
		<fieldset data-role='controlgroup' >                                                        
				<input type='checkbox' class='openquestions' name='checkbox-2b' id='checkbox_".$o['qBankid']."' value='".$o['qBankid']."'/>                   
						<label for='checkbox-2b' style='border-top-width: 0px;margin-top: 0px;border-bottom-width: 0px;margin-bottom: 0px;border-left-width: 0px;border-right-width: 0px;'>
						<img src='".base_url('images/question.jpg')."' style='float:left;width:80px;height:80px'/>
						<label  style='float:left;padding:10px 0px 0px 10px;'> 
								<h3>".truncate($o['question'],90)."</h3>
								<p>".$o['questiontype']."</p>
						</label> 
				</label>
		</fieldset> 
	</label>
</a>
<a href='".site_url('question/form/'.$o['qBankid'])."'  data-icon='info'  data-rel='dialog' >
	Delete
</a>
</li>";
						} 
			?>			
</ul>






<a href="#"  data-role="button" data-inline="true" id='setOption'>Options</a>
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
	<a href="#" data-rel="back" data-role="button" data-theme="a" data-icon="delete" data-iconpos="notext" class="ui-btn-right">Close</a>
				<ul data-role="listview" data-inset="true" style="min-width:210px;" data-theme="b" data-mini='true'>
					<li><a href="<?php print site_url('question/form/0');?>" data-rel='dialog' data-mini='true'>Add questions</a></li>
					<li><a href="<?php print site_url('question/upload');?>" data-rel='dialog' data-mini='true'>File Upload</a></li> 
					<li><a href="<?php print site_url('question/bank');?>"  data-mini='true'>Question Bank</a></li> 
				</ul>
		</div>
 

		<div data-role="popup" id="popupAssign" data-theme="a"  data-position-to="window" style='width:300px;'>
			<a href="#" data-rel="back" data-role="button" data-theme="a" data-icon="delete" data-iconpos="notext" class="ui-btn-right">Close</a>
				<ul data-role="listview" data-inset="true" style="min-width:210px;" data-theme="b">
					<li data-role="divider" data-theme="a">Options</li>
					<li><a href="#assignToSubjects" data-rel='popup'>Assign to subjects</a></li>
					<li><a href="methods.html">Delete Questions</a></li>
				</ul>
		</div>
		
		<div data-role="popup" id="assignToSubjects" data-theme="a" data-position-to="window"  style='width:300px;'>
			<a href="#" data-rel="back" data-role="button" data-theme="a" data-icon="delete" data-iconpos="notext" class="ui-btn-right">Close</a>
			<form action='<?php print site_url('question/assignsub');?>' method='post' id='assign_subjects_form'>
				<ul data-role="listview" data-inset="true" style="min-width:210px;" data-theme="c">
					<li data-role="divider" data-theme="b" id='assign_sub_result'>Assign To Subjects</li> 
					
					
					
					
					
					<?php 
					
					$sub['table']='tbl_subject';
					$sub=getrecords($sub);
					foreach($sub['result'] as $s){
					?> 
					<li>
						<div class="ui-grid-a">	<div class="ui-block-a">
								 <fieldset data-role="controlgroup" data-type="horizontal" data-mini="true"> 
										<input type="radio" name="radio-choice-b" id="radio-choice-c" value="on" checked="checked" />
										<label for="radio-choice-c">YES</label>
											<input type="radio" name="radio-choice-b" id="radio-choice-d" value="off" />
										<label for="radio-choice-d">NO</label> 
								</fieldset>
						
								</div>	<div class="ui-block-b" style='padding:10px;'> <?php print $s['c_subject'];?></div></div>
						</li>
						 <?php } ?>
						 
						 
					<li>
						
						<input type='hidden' value='' id='selected_questions' name='selected_questions' />
						<input type='submit' value='Assign' />
						
						
						
						</li>
				</ul>
				</form>
		</div>
		
		
<?php 
ajaxform('assign_subjects_form','assign_sub_result');

$script=" $('#loadmoreopen').click(function (){	$.post('".site_url('question/loadmore/open')."',function(data){ 
	
	  

$('#questionlistopen').html(data);
$('#questionlistopen').listview('refresh');
});});
	var quids=0;
	$('.openquestions').click(function(){
		quids=quids+','+this.value;
		$('#selected_questions').val(quids);
		});
$('#setOption').click(function(){
	$( '#popupAssign' ).popup( 'open' );
	}); 
	
	
	
	
	
	
	
";



print ready($script);

?>
		
