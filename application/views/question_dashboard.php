<?php



$que['table']='qBank';
$que['where']['qBankid']=$qid;
$que=getsingle($que);





print "<div style='width:600px;'>";
print "<div><h3>".$que['question']."</h3></div>";
print "<div align='right' > <input type='button' value='Hint >>'  data-inline='true' data-mini='true'/> </div>";
print '

<div style="width:500px;padding:15px;">

<label><input type="checkbox" name="checkbox-0" /> '.$que['option1'].' </label>

<label><input type="checkbox" name="checkbox-0" /> '.$que['option2'].' </label>

<label><input type="checkbox" name="checkbox-0" /> '.$que['option3'].' </label>

<label><input type="checkbox" name="checkbox-0" /> '.$que['option4'].' </label>

</div>

';
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
