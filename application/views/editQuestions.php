<?php 
$sbj[]=0;
if(!empty($qid)){
$q['table']='qBank';
$q['where']['qBankid']=intval($qid);
$q=getsingle($q);  



/*
get subject ids
*/
$sub['table']='q_subject';
$sub['where']['qBankid']=intval($qid);
$sub=getrecords($sub);
if(!empty($sub['result']))
foreach($sub['result'] as $s)
{
	$sbj[]=$s['subjectid'];
	
}
}
$qid=empty($qid)? 0 : intval($qid);
$ques=empty($q['question'])?'':$q['question'];

$questiontype=empty($q['questiontype'])?'':$q['questiontype'];
$option1=empty($q['option1'])?'':$q['option1'];
$option2=empty($q['option2'])?'':$q['option2'];
$option3=empty($q['option3'])?'':$q['option3'];
$option4=empty($q['option4'])?'':$q['option4'];
$answer=empty($q['answer'])?'':$q['answer'];
$compulsory=empty($q['compulsory'])?'':$q['compulsory'];
$hint1=empty($q['hint1'])?'':$q['hint1'];
$hint2=empty($q['hint2'])?'':$q['hint2'];
$hint3=empty($q['hint3'])?'':$q['hint3'];
$level=empty($q['level'])?'':$q['level'];
$score=empty($q['score'])?'':$q['score'];


?>
<?php 
print title('Question Form');
?>
<div data-role='content'> 
<?php 
print ajaxform('editQ','editQResult');
print form('editQ','question/admin');
print hidden('qBankid',intval($qid));
?>
<ul data-role="listview">

							<li data-role="fieldcontain">  
							<legend>Question type</legend>
							<select id='questType' name='questType'>
							<?php
							$b=enum('qBank','questiontype');
							if(!empty($b))
							foreach($b as $e){
							print "<option value='".$e."' ";
							if($questiontype==$e)
							print " selected='selected' ";
							print ">".strtoupper($e)."</option>";
							}
							?>
							</select>
							</li>
							
							
							
														
							<li data-role="fieldcontain"> 
							<legend>Question</legend>
							<textarea id="questionEdit" name="questionEdit"><?php 
							print $ques;

							?></textarea>
							</li>


							<li data-role="fieldcontain">
							<fieldset data-role="controlgroup" data-mini="true"> 
							<legend>Option A</legend> 
							<input type='text' id='opt1' name='opt1' value='<?php print $option1;?>' />
							</fieldset> 
							</li>

							<li data-role="fieldcontain">
							<fieldset data-role="controlgroup" data-mini="true"> 
							<legend>Option B</legend> 
							<input type='text' id='opt2' name='opt2'  value='<?php print $option2;?>' />
							</fieldset> 
							</li>

							<li data-role="fieldcontain">
							<fieldset data-role="controlgroup" data-mini="true"> 
							<legend>Option C</legend> 
							<input type='text' id='opt3' name='opt3'  value='<?php print $option3;?>' />
							</fieldset> 
							</li>

							<li data-role="fieldcontain">
							<fieldset data-role="controlgroup" data-mini="true"> 
							<legend>Option D</legend> 
							<input type='text' id='opt4' name='opt4'  value='<?php print $option4;?>' />
							</fieldset> 
							</li>
 






							<li data-role="fieldcontain">
							<fieldset data-role="controlgroup" data-mini="true"> 
							<legend>Answer</legend> 
							<?php
							$op=array(1=>'A','B','C','D');  
							foreach($op as $i=>$an){ 
								
							print "	<input type='checkbox' name='answer' id='answer_".$an."' value='".$i."' ";
							 
							 if($i == $answer)
							 print " checked='checked' ";
							 
							 
							print "				/> 			<label for='answer_".$an."'>".$an."</label>"; 
							} 
							?>  
							</fieldset> 
							</li>




							<li data-role="fieldcontain">
							<fieldset data-role="controlgroup" data-mini="true"> 
							<legend>Compulsory</legend> 
							<?php
							$com=array('No','Yes'); 
							foreach($com as $c=>$cp){ 
							print "	<input type='radio' name='comp' id='comp_".$cp."' value='".$c."' "; 
							if($c == $compulsory)
							print " checked='checked' ";
							print "/><label for='comp_".$cp."'>".$cp."</label>"; 
							} 
							?>  
							</fieldset> 
							</li>









							<li data-role="fieldcontain">
							<fieldset data-role="controlgroup" data-mini="true"> 
							<legend>Hint 1</legend> 
							<input type='text' id='hint1' name='hint1' value='<?php print $hint1;?>'/>
							</fieldset> 
							</li>

							<li data-role="fieldcontain">
							<fieldset data-role="controlgroup" data-mini="true"> 
							<legend>Hint 2</legend> 
							<input type='text' id='hint2' name='hint2' value='<?php print $hint2;?>'/>
							</fieldset> 
							</li>

							<li data-role="fieldcontain">
							<fieldset data-role="controlgroup" data-mini="true"> 
							<legend>Hint 3 </legend> 
							<input type='text' id='hint3' name='hint3'  value='<?php print $hint3;?>'/>
							</fieldset> 
							</li>



 
							<li data-role="fieldcontain">
							<fieldset data-role="controlgroup" data-mini="true">
							<legend>Subject</legend>
							<?php  
							$s['table']='tbl_subject';
							$s=getrecords($s); 
							foreach($s['result'] as $sub){ 
							print " <input type='checkbox' name='sub_".$sub['n_subjectid']."' id='sub_".$sub['n_subjectid']."' value='".$sub['n_subjectid']."' ";
							if(array_search($sub['n_subjectid'],$sbj))
							print ' checked="checked" ';
							print " class='custom' /><label for='sub_".$sub['n_subjectid']."'>".strtoupper($sub['c_subject'])."</label> "; 
							}
							?> 
							</fieldset>
							</li>


							<li data-role="fieldcontain">
							<fieldset data-role="controlgroup" data-mini="true"> 
							<legend>Level</legend> 
							<?php
							$b=enum('qBank','level');
							if(!empty($b))
							foreach($b as $e){ 
							print "	<input type='radio' name='level' id='lev_".$e."' value='".$e."' ";
							if($level==$e)
							print " checked='checked' ";
							print " /><label for='lev_".$e."'>".$e."</label>"; 
							}
							?>  
							</fieldset> 
							</li>


							<li data-role="fieldcontain">
							<fieldset data-role="controlgroup" data-mini="true"> 
							<legend>Score</legend> 
							<input type='text' id='score' name='score' value="<?php print $score;?>" />
							</fieldset> 
							</li>

							<li><div id='editQResult' class='error'></div></li>

</ul>
<br/>
<br/>
<div align='center' class='clear'>
<?php 

print  submit('Save');
print  close();
?>
</div>


</div>
