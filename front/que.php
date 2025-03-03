<fieldset>
    <legend>目前位置：首頁 > 問卷調查</legend>

    <table style="width: 100%;" class="ct">
        <tr>
            <th width="15%">編號</th>
            <th width="40%">問卷題目</th>
            <th width="15%">投票總數</th>
            <th width="15%">結果</th>
            <th width="15%">狀態</th>
        </tr>
        <?php
        $rows=$Que->all(['main_id'=>0]);
        foreach($rows as $key =>$row):
        ?>
        <tr>
            <td><?=$key+1;?></td>
            <td style="text-align:left;"><?=$row['text'];?></td>
            <td><?=$row['vote'];?></td>
            <td>
                <a href="index.php?do=result&id=<?=$row['id'];?>">結果</a>
            </td>
            <td>
                <?php
                if(isset($_SESSION['login'])){
                    echo "<a href='index.php?do=vote&id=" .$row['id']."'>參與投票</a>";
                }else{
                    echo "請先登入";
                }
                ?>
            </td>
        </tr>
        <?php
        endforeach;
        ?>
    </table>

        
    
</fieldset>