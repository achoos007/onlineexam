<?php

$aa=$question;
$bb=$qid;
$qno=$id;

$p=$id-1;
$q=$id+1;

$qucount1=$qucount;
$hint1=0;
$hint2=0;
$hint3=0;

if($mocktype=='on')
{
	$que['table']='qBank';
	$que['where']['questionfor']='only for mock test';
	$que['where']['qBankid']=$qid;
}
else{
	$que['table']='qBank';
	$que['where']['qBankid']=$qid;
}
$que=getsingle($que);

$hint1=empty($que['hint1'])? '0' : $que['hint1'];
$hint2=empty($que['hint2'])? '0' : $que['hint2'];
$hint3=empty($que['hint3'])? '0' : $que['hint3'];

$questiontype=empty($que['questiontype'])? '0' : $que['questiontype'];
$qDesignerId=$examid;

print "<div id='display-time'></div>";
print "<div style='width:600px;'>";
//print "Today Date".$date;

$flag=0;
if($questiontype=='multiple choice multiple answer')
{
print "<div><h3>".$qno.") ".ucfirst($que['question'])."</h3></div>";
print "<div align='right' > <a href='#popupPadded' data-rel='popup' data-role='button' data-inline='true' data-mini='true'>Hint</a> 
</div>";

 

print '

<div style="width:500px;padding:15px;">

<label><input type="checkbox" name="checkbox-1" class="'.$qid.'" value="a"/> '.$que['option1'].' </label>

<label><input type="checkbox" name="checkbox-2" class="'.$qid.'" value="b"/> '.$que['option2'].' </label>

<label><input type="checkbox" name="checkbox-3" class="'.$qid.'" value="c"/> '.$que['option3'].' </label>

<label><input type="checkbox" name="checkbox-4" class="'.$qid.'" value="d"/> '.$que['option4'].' </label>

</div>


';
$flag='1';
}
else if($questiontype=='multiple choice single answer')
{
print "<div><h3>".$qno.") ".ucfirst($que['question'])."</h3></div>";
print "<div align='right' > <a href='#popupPadded' data-rel='popup' data-role='button' data-inline='true' data-mini='true'>Hint</a> 
</div>";

 

print '

<div style="width:500px;padding:15px;">
	<input type="radio" name="radio-choice" id="radio-choice-1" value="a" class="'.$qid.'" />
  <label for="radio-choice-1">'.$que['option1'].'</label>
     	
  <input type="radio" name="radio-choice" id="radio-choice-2" value="b" class="'.$qid.'" />
  <label for="radio-choice-2">'.$que['option2'].'</label>
  
  <input type="radio" name="radio-choice" id="radio-choice-3" value="c" class="'.$qid.'" />
  <label for="radio-choice-3">'.$que['option3'].'</label>
  
  <input type="radio" name="radio-choice" id="radio-choice-4" value="d" class="'.$qid.'"	 />
  <label for="radio-choice-4">'.$que['option4'].'</label>
  
  


</div>


';
$flag='2';
}

else
{
	//	print"Sorry Question not found!!!";
}
print "</div>";

?>

<div data-role="footer" data-theme='b'>		
	<div data-role="navbar">
		<ul>
			<?php
			if($qno > $qucount1){
print "<li style='min-height:120px;margin-left:350px; font-size:16px;'><p>&nbsp;</p>You have successfully completed the exam</li>";
}
			else{
			?>
			
			<li>

				
				<a href="<?php print site_url('manage/exam/'.$examid.'/'.$mocktype).'#'.('question-'.$p);?>" data-ajax="false" id="aboutPage">Previous</a>
				

				
				
				</li>
			<li>
				<?php if($q > $qucount1){?>

				<a href="<?php print site_url('manage/message_dialog/') ?>"  data-rel='dialog'  data-transition='pop'>
	Finish
</a>
				
				<?php 
			}
			else{
			
				?>
				<a class="timer" href="<?php print site_url('manage/exam/'.$examid.'/'.$mocktype).'#'.('question-'.$q);?>" data-ajax="false">Next</a>
				<?php }?>
				</li> 
			<?php
		}
			?>
		</ul>
	</div><!-- /navbar -->
</div><!-- /footer -->

<div data-role="popup" id="popupPadded" data-theme="a" data-mini='true'>
				<ul data-role="listview" data-inset="true" style="min-width:210px;" data-theme="b" data-mini='true'>
					<?php if($hint1 != '') {?>
					<li><a href='#'><?php echo $hint1 ?></a></li>
					<?php }if($hint2 != '') {?>
					<li><a href='#'><?php echo $hint2 ?></a></li>
					 <?php }if($hint3 != '') {?>
					<li><a href='#'><?php echo $hint3 ?></a></li> 
					<?php }?>
				</ul>
		</div>

<!--<div data-role="popup" id="popupPadded" class="ui-content">
	<p><?php echo $hint ?></p>
</div>-->
<?php 
print'
<div id="'.$qid.'"></div>
';
?>
<script type='text/javascript'>
	


</script>
<?php
$script="

$('.".$qid."').click(function(){
	
	if ($(this).is(':checked')) {
    	clickid=this.value;
		$.post('".site_url('manage/answerexam/')."',{clkid:clickid,qid:$qid,flag:$flag,examid:$qDesignerId},function(data){
			//alert(data);
			//$('#".$qid."').html(data);
									 });
} else {
	clickid=this.value;
	checkvalue='false';
   		$.post('".site_url('manage/answer_delete/')."',{clkid:clickid,qid:$qid,flag:$flag,status:checkvalue,examid:$qDesignerId},function(data){
			//alert(data);
			//$('#".$qid."').html(data);
									 });
} 
	
	
});

$( '#aboutPage' ).on( 'pageinit',function(event){
  alert( 'This page was just enhanced by jQuery Mobile!' );
});

//$('.timer').click(function(){
	//alert('hello');
	//$.post('".site_url('manage/timer/')."',function(data){
		//$('#display-time').html(data);
	//	});
	
	//});

";
print ready($script);
?>





<script type='text/javascript'>
$( document ).delegate("#question-<?php print $id;?>", "pageinit", function() {
function testtime(){ 
 alert(' hai'); 
	
}
});
</script>



















