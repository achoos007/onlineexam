<?php



if ($uid == '1') {
// for getting country code

    $co['table'] = 'country';
    $co = getrecords($co);

// For Baharin

    $bhr['table'] = 'tbl_staffs';
    $bhr['order']['first_name'] = 'asc';
    $bhr['join']['assigned_users']='tbl_staffs.staff_id=assigned_users.user_id and qid="'.$qid.'"';
    $bhr['where']['status'] = 'Active';
    $bhr['where']['country'] = 'BHR';	
    $bhr['limit']=1000000;
    $bhr = getrecords($bhr);
    $countbhr=count($bhr['result']);

//For India	

    $ind['table'] = 'tbl_staffs';
		$ind['order']['first_name'] = 'asc';
    $ind['join']['assigned_users']='tbl_staffs.staff_id=assigned_users.user_id and qid="'.$qid.'"';
    $ind['where']['country'] = 'IND';
    $ind['where']['status'] = 'Active';
    $ind['limit']=1000000;
    $ind = getrecords($ind);
    $countind=count($ind['result']);


    
// For Kuwait    

    $kwt['table'] = 'tbl_staffs';
    $kwt['order']['first_name'] = 'asc';
    $kwt['join']['assigned_users']='tbl_staffs.staff_id=assigned_users.user_id and qid="'.$qid.'"';
    $kwt['where']['status'] = 'Active';
    $kwt['where']['country'] = 'KWT';
    $kwt['limit']=1000000;
    $kwt = getrecords($kwt);
    $countkwt=count($kwt['result']);

//For Oman

    $omn['table'] = 'tbl_staffs';
    $omn['order']['first_name'] = 'asc';
    $omn['join']['assigned_users']='tbl_staffs.staff_id=assigned_users.user_id and qid="'.$qid.'"';
    $omn['where']['status'] = 'Active';
    $omn['where']['country'] = 'OMN';
    $omn['limit']=1000000;
    $omn = getrecords($omn);
    $countomn=count($omn['result']);


//For UAE

    $are['table'] = 'tbl_staffs';
    $are['order']['first_name'] = 'asc';
    $are['join']['assigned_users']='tbl_staffs.staff_id=assigned_users.user_id and qid="'.$qid.'"';
    $are['where']['status'] = 'Active';
    $are['where']['country'] = 'ARE';
    $are['limit']=1000000; 
    $are = getrecords($are);
    $countare=count($are['result']);



// For getting title name
    $qdes['table'] = 'qdesigner';
    $qdes['where']['qDesignerId'] = $qid;
    $qdes = getsingle($qdes);
    $title = $qdes['title'];
    ?>

<div id="sucess-msg"></div>
    <div data-role="content" >
        <div class="content-primary">
            <ul data-role="listview" data-inset='true' data-filter='true'>
                <?php
                foreach ($co['result'] as $row) {
                    $code = $row['code'];
                    $cname = $row['name'];
                    ?>
                    <li data-role="list-divider"><?php print $cname; ?></li>
                    <?php
                   
                    if ($code == 'BHR') {
					

                    foreach ($bhr['result'] as $row) {
						$st = 'bhr' . $row['staff_id'];
						$assign_status=$row['assign_status'];
							
                            $str = ucfirst(strtolower($row['first_name'])) . "&nbsp;" . ucfirst(strtolower($row['last_name']));
                            
                            if ($assign_status == 'Active'){
                                print"<li style='background:#999666;'  class='$st bhr' id='".$row['staff_id']."' ><a  href=''>" . $str . "</a></li>";
							}
                            elseif($assign_status == 'Inactive'){
                                print"<li style='background:#f1c8cf;'  class='$st bhr' id='".$row['staff_id']."' ><a  href=''>" . $str . "</a></li>";
							}
							else{
								print"<li style='background:#f1c8cf;'  class='$st bhr' id='".$row['staff_id']."' ><a  href=''>" . $str . "</a></li>";
							}
                            
                        }
	
	
					
					
                    }
                    if ($code == 'IND') {
					
											foreach ($ind['result'] as $row) {
															
						$st = 'bhr' . $row['staff_id'];
						$assign_status=$row['assign_status'];		
                            $str = ucfirst(strtolower($row['first_name'])) . "&nbsp;" . ucfirst(strtolower($row['last_name']));
                            
                            if ($assign_status == 'Active'){
                                print"<li style='background:#d0d181	;'  class='$st bhr' id='".$row['staff_id']."' ><a  href=''>" . $str . "</a></li>";
							}
                            elseif($assign_status == 'Inactive'){
                                print"<li style='background:#f1c8cf;'  class='$st bhr' id='".$row['staff_id']."' ><a  href=''>" . $str . "</a></li>";
							}
							else{
								print"<li style='background:#f1c8cf;'  class='$st bhr' id='".$row['staff_id']."' ><a  href=''>" . $str . "</a></li>";
							}
                            
                        }
											
					
						
                       
                    }
                    if ($code == 'KWT') {

                    foreach ($kwt['result'] as $row) {
						$st = 'bhr' . $row['staff_id'];
						$assign_status=$row['assign_status'];
							
                            $str = ucfirst(strtolower($row['first_name'])) . "&nbsp;" . ucfirst(strtolower($row['last_name']));
                            
                            if ($assign_status == 'Active'){
                                print"<li style='background:#999666;'  class='$st bhr' id='".$row['staff_id']."' ><a  href=''>" . $str . "</a></li>";
							}
                            elseif($assign_status == 'Inactive'){
                                print"<li style='background:#f1c8cf;'  class='$st bhr' id='".$row['staff_id']."' ><a  href=''>" . $str . "</a></li>";
							}
							else{
								print"<li style='background:#f1c8cf;'  class='$st bhr' id='".$row['staff_id']."' ><a  href=''>" . $str . "</a></li>";
							}
                            
                        }

		
                    }
                    if ($code == 'OMN') {

                    foreach ($omn['result'] as $row) {
						$st = 'bhr' . $row['staff_id'];
						$assign_status=$row['assign_status'];
							
                            $str = ucfirst(strtolower($row['first_name'])) . "&nbsp;" . ucfirst(strtolower($row['last_name']));
                            
                            if ($assign_status == 'Active'){
                                print"<li style='background:#999666;'  class='$st bhr' id='".$row['staff_id']."' ><a  href=''>" . $str . "</a></li>";
							}
                            elseif($assign_status == 'Inactive'){
                                print"<li style='background:#f1c8cf;'  class='$st bhr' id='".$row['staff_id']."' ><a  href=''>" . $str . "</a></li>";
							}
							else{
								print"<li style='background:#f1c8cf;'  class='$st bhr' id='".$row['staff_id']."' ><a  href=''>" . $str . "</a></li>";
							}
                            
                        }

			
                    }
                    if ($code == 'ARE') {

                    foreach ($are['result'] as $row) {
						$st = 'bhr' . $row['staff_id'];
						$assign_status=$row['assign_status'];
							
                            $str = ucfirst(strtolower($row['first_name'])) . "&nbsp;" . ucfirst(strtolower($row['last_name']));
                            
                            if ($assign_status == 'Active'){
                                print"<li style='background:#999666;'  class='$st bhr' id='".$row['staff_id']."' ><a  href=''>" . $str . "</a></li>";
							}
                            elseif($assign_status == 'Inactive'){
                                print"<li style='background:#f1c8cf;'  class='$st bhr' id='".$row['staff_id']."' ><a  href=''>" . $str . "</a></li>";
							}
							else{
								print"<li style='background:#f1c8cf;'  class='$st bhr' id='".$row['staff_id']."' ><a  href=''>" . $str . "</a></li>";
							}
                            
                        }

                    }
                }
                ?>
            </ul>
        </div>
    </div>
    <div id="deleteQuestion" data-role='popup' style='width:250px; padding:50px; border:5px solid #B9B9B9;' data-theme='d'>
        You have added this user(s) to <?php echo $title; ?> exam
        <div class='clear'><br/><br/></div>
    <?php
    print button('Assign', '', 'delete_question');
    print close();
} else {
    print"No record found";
}
?>
</div>
        <?php
        $script = "
    
                $('.bhr').click(function(){
                clickId=this.id;
                $.post('".site_url('exam/user_selection/')."',{clkid:clickId,qid:$qid},function(data){
                    // $('#sucess-msg').html(data);
		//$('.bhr'+clickId).css('background','red'); 
		 if(data==0)
                {
                $('.bhr'+clickId).css('background','#f1c8cf'); 
                }
                else
                $('.bhr'+clickId).css('background','#d0d181');        		
                });
                   
                });
        ";
        print ready($script);
        ?>
