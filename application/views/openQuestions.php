 
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
				<li id='ques_".$o['qBankid']."'>
				<a href='".site_url('question/form/'.$o['qBankid'])."' data-rel='dialog'   >

				<h3>".format($o['question'])."</h3>
				<p>".$o['questiontype']."</p>
				</a>
				<a href='#deleteQuestion'  data-icon='delete'  data-theme='d' id='".$o['qBankid']."' class='open_confirm'>Delete</a>
				</li>
				";
			}
			
			?>			
</ul>
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
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
<?php 


$script=" $('#loadmoreopen').click(function (){	$.post('".site_url('question/loadmore/open')."',function(data){ 
	
	  

$('#questionlistopen').append(data);
$('#questionlistopen').listview('refresh');
});});";



print ready($script);

?>

		
		
		
		
