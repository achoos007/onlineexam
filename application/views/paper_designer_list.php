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
                            <td>  

                                <?php
                                 if ($o['status'] == 1)
                                print dialog("exam/assign/" . $o['qDesignerId'], 'Assign');
                                ?>

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