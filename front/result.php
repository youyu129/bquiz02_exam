<?php
$id=($_GET['id']);
$subject=$Que->find($id);
$subject_id=$subject['id'];
$options=$Que->all(['main_id'=>$subject_id]);
// dd($options);
?>
<fieldset style="margin-top: 20px;">
    <legend>目前位置：首頁 > 問卷調查 > <span><?=$subject['text'];?></span></legend>
<h3><?=$subject['text'];?></h3>
    <table style="width: 100%;" class="ct">
    <?php
    foreach($options as $key => $option):

    ?>
        <tr>
            <td width="5%"><?=$key+1;?>.</td>
            <td style="text-align: left;width=50%"><?=$option['text'];?></td>
            <?php
            $rate=round($option['vote']/$subject['vote']*100,2)
            ?>
            <td width="30%">
                <div style="background-color: #ccc;height:20px;width:<?=$rate;?>%"></div>
            </td>

            <td width="15%" style="text-align: left;"><?=$option['vote'];?>票(<?=$rate;?>%)</td>
        </tr>
        <?php
        endforeach;
        ?>

    </table>

<div class="ct">
    <button onclick="location.href='index.php?do=que'">返回</button>
</div>

</fieldset>
