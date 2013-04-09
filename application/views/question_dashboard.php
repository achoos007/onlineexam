<?php


$que['table']='qBank';
$que['where']['qBankid']=$qid;
$que=getsingle($que); 
$hint=$que['hint1'];
//print "QID".$qid;
$questiontype=$que['questiontype'];



print "<div style='width:600px;'>";
if($questiontype=='multiple choice multiple answer')
{
print "<div><h3>".$que['question']."</h3></div>";
print "<div align='right' > <a href='#popupPadded' data-rel='popup' data-role='button' data-inline='true' data-mini='true'>Hint</a> 
</div>";

 

print '

<div style="width:500px;padding:15px;">

<label><input type="checkbox" name="checkbox-0" class="'.$qid.'" value="a"/> '.$que['option1'].' </label>

<label><input type="checkbox" name="checkbox-0" class="'.$qid.'" value="b"/> '.$que['option2'].' </label>

<label><input type="checkbox" name="checkbox-0" class="'.$qid.'" value="c"/> '.$que['option3'].' </label>

<label><input type="checkbox" name="checkbox-0" class="'.$qid.'" value="d"/> '.$que['option4'].' </label>

</div>


';
}
if($questiontype=='multiple choice single answer')
{
print "<div><h3>".$que['question']."</h3></div>";
print "<div align='right' > <a href='#popupPadded' data-rel='popup' data-role='button' data-inline='true' data-mini='true'>Hint</a> 
</div>";

 

print '

<div style="width:500px;padding:15px;">
	<input type="radio" name="radio-choice" id="radio-choice-1" value="choice-1" class="'.$qid.'" />
  <label for="radio-choice-1">'.$que['option1'].'</label>
     	
  <input type="radio" name="radio-choice" id="radio-choice-2" value="choice-2" class="'.$qid.'" />
  <label for="radio-choice-2">'.$que['option2'].'</label>
  
  <input type="radio" name="radio-choice" id="radio-choice-3" value="choice-3" class="'.$qid.'" />
  <label for="radio-choice-3">'.$que['option3'].'</label>
  
  <input type="radio" name="radio-choice" id="radio-choice-4" value="choice-4" class="'.$qid.'"	 />
  <label for="radio-choice-4">'.$que['option4'].'</label>
  
  


</div>


';
}
print "</div>";
$p=$id-1;
$q=$id+1;
?>

<div data-role="footer" data-theme='b'>		
	<div data-role="navbar">
		<ul>
			<li><a href="<?php print site_url('manage/exam/13').'#'.('question-'.$p);?>" >Previous</a></li>
			<li><a href="<?php print site_url('manage/exam/13').'#'.('question-'.$q);?>">Next</a></li> 
		</ul>
	</div><!-- /navbar -->
</div><!-- /footer -->
<div data-role="popup" id="popupPadded" class="ui-content">
	<p><?php echo $hint ?></p>
</div>
<?php 
print'
<div id="'.$qid.'"></div>
';
?>
<?php
$script="

$('.".$qid."').click(function(){
	//alert('Hello');
	//if($('.".$qid."').attr('checked')){
		clickid=this.value;
		$.post('".site_url('manage/answerexam/')."',{clkid:clickid,qid:$qid},function(data){
			alert(data);
     $('#".$qid."').html(data);
									 });
	
//}
});

";
print ready($script);
?>
