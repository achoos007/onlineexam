<?php
$list['table'] = 'qdesigner';
$list['order']['title'] = 'desc';
$list = getrecords($list);
?>
<div align='center'>




    <div data-role='collapsible-set'>


        <?php
        if (!empty($list['result'])) {
            foreach ($list['result'] as $o) {
                if ($o['status'] == 1)
                    $st = "Active";
                else
                    $st = "Inactive";
                ?>        
                <div data-role="collapsible" <?php print (strtolower($o['status']) == 1) ? " data-collapsed-icon='check' " : " data-collapsed-icon='delete' "; ?>  data-content-theme="c"  >
                    <h3><?php echo $o['title'] ?></h3> 

                    <table width="100%">
                        <tr>
                            <td > 

                                <div ><h4>Status :<?php echo $st ?></h4></div>

                            </td>
                            <td width="100px">  

                                   <?php
                                 if ($o['status'] == 1)
                                ?>
                                <a href="#popupMenu1" data-rel="popup" data-role="button" data-theme="b" data-mini="true" data-inline="true">Assign</a>            

                            </td>
                            <td width="100px">
                                <a href="<?php echo site_url('exam/execute/' . $o['qDesignerId']); ?>" data-role="button" data-theme="b" data-mini="true" data-inline="true">Execute</a>                   
                            </td>
                            <td width="100px">
                                <a href="<?php echo site_url('manage/exam/' . $o['qDesignerId']); ?>" data-role="button" data-theme="b" data-mini="true" data-inline="true">Manage</a>                   
                            </td>
                            <td width="100px">
                                <a href="<?php echo site_url('exam/form/' . $o['qDesignerId']); ?>" data-role="button" data-theme="b" data-mini="true" data-inline="true">Edit</a>                   
                            </td>
                        </tr>
                    </table>

                </div>   
                <?php
            }
        }
        ?>
    </div>
</div> 
<div data-role="popup" id="popupMenu1" data-theme="a" data-mini='true'>
				<ul data-role="listview" data-inset="true" style="min-width:210px;" data-theme="b" data-mini='true'>
					<li><a href="<?php print site_url('exam/assigneelist/1/' . $o['qDesignerId']);?>" data-mini='true'>Employees</a></li>
					<li><a href="<?php print site_url('exam/assigneelist/2/');?>" data-mini='true'>Candidates</a></li> 
				</ul>
		</div>
