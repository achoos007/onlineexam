 
	<?php 



$exist['table']='qexam';
$exist['where']['qDesignerId']=$examid;
$exist=getsingle($exist);
//pa($exist);
if(!empty($exist['equestions'])){
$qu=unserialize($exist['equestions']);

print "<div >Question Set: ".count($qu)."</div>";
}
?>
	
		 
