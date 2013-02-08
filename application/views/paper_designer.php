<?php
ajaxform("examformedit", 'addexam');

$q['table'] = 'qBank';
$q['where']['questiontype'] = 'multiple choice multiple answer';
$q = total_rows($q);

$qs['table'] = 'qBank';
$qs['where']['questiontype'] = 'multiple choice single answer';
$qs = total_rows($qs);

$qt['table'] = 'qBank';
$qt['where']['questiontype'] = 'yes / no';
$qt = total_rows($qt);

$qd['table'] = 'qBank';
$qd['where']['questiontype'] = 'short text';
$qd = total_rows($qd);

$qf['table'] = 'qBank';
$qf['where']['questiontype'] = 'file upload';
$qf = total_rows($qf);


//print"Hello".$modulename;

if(!empty($subjectid) && ($subjectid > 0)){
    $questid['table']='qdesigner';
    $questid['where']['qDesignerid']=$subjectid;
    $questid=  getsingle($questid);
    $qdid=$questid['qDesignerId'];
    $title=$questid['title'];
    $mark=$questid['minMark'];
    $duration=$questid['duration'];
    $alerttime=$questid['alertTime'];
    $negative=$questid['negative'];
    $grading=$questid['grading'];
    $shuffling=$questid['shuffling'];
    $timer=$questid['timer'];
    $marktype=$questid['markType'];
}


?>

<div id="addexam"></div>
<form method="post" action="<?php print site_url("exam/edit") ?>" id="examformedit">
    <div style="width:36%; float:left;">
        <table width='100%'>
            <tr align="left">
                <th >Title</th>
                <th style='width:5px;'>:</th>
                <td>  <input type="text" name="title"  data-mini="true" id="title" value="<?php 
    print empty($title)? '':$title;
    
    ?>"  placeholder="Subject Name" ></td>
            </tr>         
            <tr align="left">
                <th >Minimum Mark</th>
                <th style='width:5px;'>:</th>
                <td>  <input type="text" value="<?php print empty($mark)?'':$mark?>" name="mark" id="mark" data-mini="true" placeholder='%'  ></td>
            </tr>
            <tr align="left">
                <th >Duration</th>
                <th style='width:5px;'>:</th>
                <td>   <input type="text" value="<?php print empty($duration)?'':$duration?>" name="duration" id="duration" data-mini="true" placeholder='Minutes' ></td>
            </tr>
            <tr align="left">
                <th >Alert Time</th>
                <th style='width:5px;'>:</th>
                <td> <input type="text" value="<?php print empty($alerttime)?'':$alerttime?>" name="alerttime" id="alerttime"  data-mini="true" placeholder='Minutes before'> </td>
            </tr>
        </table>
    </div>
    <div style="float:left;width:63%;"  align='center'>

        <table width='60%' >
            <tr data-role="listview">
                <td data-role="fieldcontain">
                    <fieldset data-role="controlgroup">
                        <input type="checkbox" name="negativemark" id="checkbox-1a" class="custom" data-mini="true" <?php if($subjectid > 0 && $negative=='on'){ ?>checked="checked" <?php } ?>/>
                        <label for="checkbox-1a">Negative mark</label>
                    </fieldset>
                    <fieldset data-role="controlgroup">
                        <input type="checkbox" name="grading" id="grading" class="custom" data-mini="true" <?php if($subjectid > 0 && $grading=='on'){ ?> checked="checked" <?php }?>/>
                        <label for="grading">Grading</label>
                    </fieldset>
                    <fieldset data-role="controlgroup">
                        <input type="checkbox" name="shuffling" id="shuffling" class="custom" data-mini="true" <?php if($subjectid > 0 && $shuffling=='on'){ ?> checked="checked"<?php } ?>/>
                        <label for="shuffling">Shuffling</label>
                    </fieldset>
                    <fieldset data-role="controlgroup">
                        <input type="checkbox" name="timer" id="timer" class="custom" data-mini="true" <?php if($subjectid > 0 && $timer=='on'){ ?> checked="checked" <?php }?> />
                        <label for="timer">Timer</label>
                    </fieldset>
                </td>
            </tr>
        </table>
    </div>
    <div class='clear'></div>
    <table width="100%" style="margin-top:20px;float:left; ">
        <tr data-role="listview">
            <td>
                <label>Product</label> 
                <select name="productid" id="productid" data-mini="true" class="productid">
                    <option value="select">Select</option>
                    <?php
                        $query = $this->db->query("SELECT productid,name FROM product where name!=''");
                        if ($query->num_rows() > 0) {
                            foreach ($query->result() as $row) {
                            $name = $row->name;
                            $productid = $row->productid;
                            print "<option value='" . $productid . "' ";
                            print ">" . $name . "</option>";
                            }
                        }
                    ?>

                </select>
            </td>
            <td>
               
                <label>Module</label>
               
                <select name="moduleid" id="moduleid" data-mini="true">
                    <option value="select">Select</option>
                </select>
             
            </td>
            <td>
                <label>Subject</label>
                <select name="subjectid" id="subjectid" data-mini="true">
                    <option value="select">Select</option>
                </select>
            </td>
        </tr>
        <tr>
            <td>
            </td>
            <td>
                <input type="radio" name="radio-choice-2" id="radio-choice-1" value="0"  data-mini="true" <?php if($subjectid > 0 && $marktype==0){ ?> checked="checked" <?php } ?>/>
                <label for="radio-choice-1">Equal Marks</label>
            </td>
            <td>
                <input type="radio" name="radio-choice-2" id="radio-choice-2" value="1"  data-mini="true" <?php if($subjectid > 0 && $marktype==1){ ?> checked="checked" <?php } ?> />
                <label for="radio-choice-2">Database Marks</label>
            </td> 
        </tr>
    </table>
    <br/>

    <table width="100%" style="margin-top:20px;float:left; border: 1px solid #4e89c5;">
        <th width="20%"></th>
        <th>Available</th>
        <th>Easy</th>
        <th>Moderate</th>
        <th>Tough</th>
        <th>Mandatory</th>
        <tr data-role="listview">
            <td width="20%" align="center">Multiple - S
            </td>
            <td align="center">
                <div data-role="fieldcontain" style="width:80px;">
                    <fieldset data-role="controlgroup">
                        <label><?php print_r($qs); ?></label>
                    </fieldset>
                </div>
            </td>
            <td align="center">
                <div data-role="fieldcontain" style="width:80px;">
                    <label for="radio-choice-1a">0</label>
                    <input type="text" name="multiple-easy" id="multiple-s"  data-mini="true" >  	
                </div>
            </td>
            <td align="center">
                <div data-role="fieldcontain" style="width:100px;" data-mini="true">
                    <label for="radio-choice-1a">0</label>
                    <input type="text" name="multiple-moderate" id="multiple-s"  data-mini="true" > 
                </div>
            </td>
            <td align="center">
                <div data-role="fieldcontain" style="width:80px;">
                    <label for="radio-choice-1a">0</label>
                    <input type="text" name="multiple-tough" id="multiple-s"  data-mini="true" > 
                </div>
            </td>
            <td align="center">
                <div data-role="fieldcontain" style="width:80px;">
                    <label for="radio-choice-1a">0</label>
                    <input type="text" name="multiple-mandatory" id="multiple-s"  data-mini="true" > 
                </div>
            </td>
        </tr>

        <tr data-role="listview">
            <td width="20%" align="center">Multiple - M
            </td>
            <td align="center">
                <div data-role="fieldcontain" style="width:80px;">
                    <fieldset data-role="controlgroup">
                        <label><?php print_r($q); ?></label>
                    </fieldset>
                </div>
            </td>
            <td align="center">
                <div data-role="fieldcontain" style="width:80px;">
                    <label for="radio-choice-1a">0</label>
                    <input type="text" name="multiple-easy-m" id="multiple-s"  data-mini="true" >  	
                </div>
            </td>
            <td align="center">
                <div data-role="fieldcontain" style="width:80px;" data-mini="true">
                    <label for="radio-choice-1a">0</label>
                    <input type="text" name="multiple-moderate-m" id="multiple-s"  data-mini="true" > 
                </div>
            </td>
            <td align="center">
                <div data-role="fieldcontain" style="width:80px;">
                    <label for="radio-choice-1a">0</label>
                    <input type="text" name="multiple-tough-m" id="multiple-s"  data-mini="true" > 
                </div>
            </td>
            <td align="center">
                <div data-role="fieldcontain" style="width:80px;">
                    <label for="radio-choice-1a">0</label>
                    <input type="text" name="multiple-mandatory-m" id="multiple-s"  data-mini="true" > 
                </div>
            </td>
        </tr>

        <tr data-role="listview">
            <td width="20%" align="center">True/False
            </td>
            <td align="center">
                <div data-role="fieldcontain" style="width:80px;">
                    <fieldset data-role="controlgroup">
                        <label><?php print_r($qt); ?></label>
                    </fieldset>
                </div>
            </td>
            <td align="center">
                <div data-role="fieldcontain" style="width:80px;">
                    <label for="radio-choice-1a">0</label>
                    <input type="text" name="multiple-easy-t" id="multiple-s"  data-mini="true" >  	
                </div>
            </td>
            <td align="center">
                <div data-role="fieldcontain" style="width:80px;" data-mini="true">
                    <label for="radio-choice-1a">0</label>
                    <input type="text" name="multiple-moderate-t" id="multiple-s"  data-mini="true" > 
                </div>
            </td>
            <td align="center">
                <div data-role="fieldcontain" style="width:80px;">
                    <label for="radio-choice-1a">0</label>
                    <input type="text" name="multiple-tough-t" id="multiple-s"  data-mini="true" > 
                </div>
            </td>
            <td align="center">
                <div data-role="fieldcontain" style="width:80px;">
                    <label for="radio-choice-1a">0</label>
                    <input type="text" name="multiple-mandatory-t" id="multiple-s"  data-mini="true" > 
                </div>
            </td>
        </tr>

        <tr data-role="listview">
            <td width="20%" align="center">Description 
            </td>
            <td align="center">
                <div data-role="fieldcontain" style="width:80px;">
                    <fieldset data-role="controlgroup">
                        <label><?php print_r($qd); ?></label>
                    </fieldset>
                </div>
            </td>
            <td align="center">
                <div data-role="fieldcontain" style="width:80px;">
                    <label for="radio-choice-1a">0</label>
                    <input type="text" name="multiple-easy-d" id="multiple-s"  data-mini="true" >  	
                </div>
            </td>
            <td align="center">
                <div data-role="fieldcontain" style="width:80px;" data-mini="true">
                    <label for="radio-choice-1a">0</label>
                    <input type="text" name="multiple-moderate-d" id="multiple-s"  data-mini="true" > 
                </div>
            </td>
            <td align="center">
                <div data-role="fieldcontain" style="width:80px;">
                    <label for="radio-choice-1a">0</label>
                    <input type="text" name="multiple-tough-d" id="multiple-s"  data-mini="true" > 
                </div>
            </td>
            <td align="center">
                <div data-role="fieldcontain" style="width:80px;">
                    <label for="radio-choice-1a">0</label>
                    <input type="text" name="multiple-mandatory-d" id="multiple-s"  data-mini="true" > 
                </div>
            </td>
        </tr>

        <tr data-role="listview">
            <td width="20%" align="center">File Upload
            </td>
            <td align="center">
                <div data-role="fieldcontain" style="width:80px;">
                    <fieldset data-role="controlgroup">
                        <label><?php print_r($qf); ?></label>
                    </fieldset>
                </div>
            </td>
            <td align="center">
                <div data-role="fieldcontain" style="width:80px;">
                    <label for="radio-choice-1a">0</label>
                    <input type="text" name="multiple-easy-f" id="multiple-s"  data-mini="true" >  	
                </div>
            </td>
            <td align="center">
                <div data-role="fieldcontain" style="width:80px;" data-mini="true">
                    <label for="radio-choice-1a">0</label>
                    <input type="text" name="multiple-moderate-f" id="multiple-s"  data-mini="true" > 
                </div>
            </td>
            <td align="center">
                <div data-role="fieldcontain" style="width:80px;">
                    <label for="radio-choice-1a">0</label>
                    <input type="text" name="multiple-tough-f" id="multiple-s"  data-mini="true" > 
                </div>
            </td>
            <td align="center">
                <div data-role="fieldcontain" style="width:80px;">
                    <label for="radio-choice-1a">0</label>
                    <input type="text" name="multiple-mandatory-f" id="multiple-s"  data-mini="true" > 
                </div>
            </td>
        </tr>
        <tr><td align="center" colspan="6">
                <?php
//print submit('Save');
?>
                <input type="hidden" value='<?php print $qdid; ?>' name="qdesignerid"/>
                <input value='<?php print $bttnText;?>' type="submit"  data-inline='true' data-mini='true'  data-theme='b'/>
                
            </td></tr>
    </table>

    <div id="module"></div>
 
</form>

<?php
$script="
 
$('#productid').change(function(){

value=this.value;

$.post('".site_url('exam/module/')."',{clkid:value},function(data){

$('#moduleid').html(data);

});	
    
});
    
$('#moduleid').change(function(){

value=this.value;

//alert(value);

$.post('".site_url('exam/subject/')."',{clkid:value},function(data){
//alert(data);  
$('#subjectid').html(data);
});

});

";
print ready($script);
?>