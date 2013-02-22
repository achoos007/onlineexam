<?php
if ($assigneeid == '1') {
    $query = $this->db->query("select staff_id,first_name,last_name from tbl_staffs where status='Active' and country='231' group by first_name asc");
    $ind = $this->db->query("select first_name,last_name from tbl_staffs where status='Active' and country='101' group by first_name asc");

// For getting title name
    $qdes['table'] = 'qdesigner';
    $qdes['where']['qDesignerId'] = $qid;
    $qdes = getsingle($qdes);
    $title = $qdes['title'];
    ?>


    <div data-role="content" >
        <div class="content-primary">
            <ul data-role="listview" data-inset='true' data-filter='true'>
                <li data-role="list-divider">Bhaharin</li>




                <?php
                if ($query->num_rows() > 0) {

                    foreach ($query->result() as $row) {
                        print"<li id='ques_" . $row->staff_id . "' ><a href=''> $row->first_name $row->last_name";
                        print"</a><a href='#deleteQuestion'  data-icon='add'  data-theme='d'  class='assign_user'>Delete</a></li>";
                    }
                }
                ?>		

                <li data-role="list-divider">India</li>
                <?php
                if ($ind->num_rows() > 0) {

                    foreach ($ind->result() as $row) {
                        print"<li><a href=''> $row->first_name $row->last_name";
                        print"</a><a href='#deleteQuestion'  data-icon='add'  data-theme='d' class='assign_user'>Delete</a></li>";
                    }
                }
                ?>	

                <li data-role="list-divider">Kuwait</li>
                
                <li><a href="index.html">Caleb Booth</a></li>
                
                <li><a href="index.html">Christopher Adams</a></li>
                
                <li><a href="index.html">Culver James</a></li>
                
                <li data-role="list-divider">Oman</li>        
                
                <li data-role="list-divider">United Arab Emirates</li>
                
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
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
$('.assign_user').click(function(){
clickId=this.id;
$( '#deleteQuestion' ).popup( 'open' );

//alert('Hai');
$('#ques_'+clickId+'').hide(2000);
});
    ";
        print ready($script);
        ?>
