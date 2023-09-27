<?php
/**
 * form_deuk_spine_Thoracic report.php.
 *
 * Forms generated from formsWiz
 *
 * @package   OpenEMR
 * @link      http://www.open-emr.org
 * @author    Brady Miller <brady.g.miller@gmail.com>
 * @copyright Copyright (c) 2018 Brady Miller <brady.g.miller@gmail.com>
 * @license   https://github.com/openemr/openemr/blob/master/LICENSE GNU General Public License 3
 */


require_once("../../globals.php");
require_once($GLOBALS["srcdir"]."/api.inc");
function form_deuk_spine_Cervical_report($pid, $encounter, $cols, $id)
{
    $count=0;
    $sql = "SELECT * FROM `form_deuk_spine_Cervical` WHERE id=$id AND pid =$pid AND enc =$encounter";
    $res = sqlStatement($sql);
    $data = sqlFetchArray($res); 
    
    
    if ($data) {
        ?>
        <table style='width: 100%;border: 1px solid;border-collapse:collapse;' >
            <tr style="border: 1px solid;background-color:#eee;">
                <th><?php echo xlt(' DOS '); ?></th>
                <th><?php echo xlt(' Room # '); ?></th>
                <th><?php echo xlt('Last Visit '); ?></th>
                <th><?php echo xlt(' CC '); ?></th>
                <th><?php echo xlt(' HX '); ?></th>
                <th><?php echo xlt(' Spine Surgery Hx '); ?></th>


                
            </tr>
            <tr>
                <td><?php echo xlt(text($data['dos'])); ?></td>
                <td><?php echo xlt(text($data['room_no'])); ?></td>
                <td><?php echo xlt(text($data['last_visit'])); ?></td>
                <td><?php echo xlt(text($data['cc'])); ?></td>
                <td><?php echo xlt(text($data['hx'])); ?></td>
                <td><?php echo xlt(text($data['shx'])); ?></td>
            </tr>
            
        </table>
        <?php
    }
}
?>