<?php
$id=($_GET['id']);
$subject=$Que->find($id);
$subject_id=$subject['id'];
$options=$Que->all(['main_id'=>$subject_id]);
// dd($options);
?>
<fieldset style="margin-top:20px;">
    <form action="./api/vote.php" method="post">
    <legend>目前位置：首頁 > 問卷調查 > <span><?=$subject['text'];?></span></legend>
    <h3><?=$subject['text'];?></h3>
    <table style="width: 100%;" class="ct">
        <?php
    foreach($options as $key => $option):

    ?>
        <tr>
            <td width="5%">
                <input type="radio" name="vote" id="vote" value="<?=$option['id'];?>">
            </td>
            <td style="text-align: left;width=50%"><?=$option['text'];?></td>
            <input type="hidden" name="subject_id" value="<?=$subject['id'];?>">
        </tr>
        <?php
        endforeach;
        ?>

    </table>
    <div class="ct">
        <input type="submit" value="我要投票">
    </div>
</form>
</fieldset>