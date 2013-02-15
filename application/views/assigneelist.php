<?php
if ($assigneeid == '1') {
    // for getting country code
    $co['table'] = 'country';
    $co = getrecords($co);


    $bhr['table'] = 'tbl_staffs';
    $bhr['where']['status'] = 'Active';
    $bhr['where']['country'] = 'BHR';
    $bhr['order']['first_name'] = 'asc';
    $bhr = getrecords($bhr);

    $ind['table'] = 'tbl_staffs';
    $ind['where']['status'] = 'Active';
    $ind['where']['country'] = 'IND';
    $ind['order']['first_name'] = 'asc';
    $ind = getrecords($ind);

    $kwt['table'] = 'tbl_staffs';
    $kwt['where']['status'] = 'Active';
    $kwt['where']['country'] = 'KWT';
    $kwt['order']['first_name'] = 'asc';
    $kwt = getrecords($kwt);

    $omn['table'] = 'tbl_staffs';
    $omn['where']['status'] = 'Active';
    $omn['where']['country'] = 'OMN';
    $omn['order']['first_name'] = 'asc';
    $omn = getrecords($omn);

    $are['table'] = 'tbl_staffs';
    $are['where']['status'] = 'Active';
    $are['where']['country'] = 'ARE';
    $are['order']['first_name'] = 'asc';
    $are = getrecords($are);



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
                            $str = ucfirst(strtolower($row['first_name'])) . "&nbsp;" . ucfirst(strtolower($row['last_name']));
                            print"<li class='bhr' id='".$row['staff_id']."' ><a  href=''>" . $str ."</a></li>";
                            
                        }
                    }
                    if ($code == 'IND') {
                        foreach ($ind['result'] as $row) {
                            $str = ucfirst(strtolower($row['first_name'])) . "&nbsp;" . ucfirst(strtolower($row['last_name']));
                            print"<li class='bhr' id='" . $row['staff_id'] . "'><a href=''>" . $str."</a></li>";
                            
                        }
                    }
                    if ($code == 'KWT') {
                        foreach ($kwt['result'] as $row) {
                            $str = ucfirst(strtolower($row['first_name'])) . "&nbsp;" . ucfirst(strtolower($row['last_name']));
                            print"<li><a href=''>" . $str."</a></li>";
                            
                        }
                    }
                    if ($code == 'OMN') {
                        foreach ($omn['result'] as $row) {
                            $str = ucfirst(strtolower($row['first_name'])) . "&nbsp;" . ucfirst(strtolower($row['last_name']));
                            print"<li class='bhr' id='" . $row['staff_id'] . "'><a href=''>" . $str."</a></li>";
                            
                        }
                    }
                    if ($code == 'ARE') {
                        foreach ($are['result'] as $row) {
                            $str = ucfirst(strtolower($row['first_name'])) . "&nbsp;" . ucfirst(strtolower($row['last_name']));
                            print"<li class='bhr' id='" . $row['staff_id'] . "'><a href=''>" . $str ."</a></li>";
                            
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
                     $('#sucess-msg').html(data);
                });
                   
                });
        ";
        print ready($script);
        ?>