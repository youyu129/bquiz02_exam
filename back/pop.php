<style>
.detail {
    display: none;
}
</style>
<fieldset>
    <legend>目前位置：首頁 > 人氣文章區</legend>

    <table style="width: 100%;" class="ct">
        <tr>
            <th width="30%">標題</th>
            <th width="40%">內容</th>
            <th width="20%">人氣</th>
            <th></th>
        </tr>
        <?php
        $div=5;
        $all=$News->count(['sh'=>1]);
        $pages=ceil($all/$div);
        $now=$_GET['p']??1;
        $start=($now-1)*$div;

        $rows=$News->all(" LIMIT $start,$div");
        foreach($rows as $row):
        ?>
        <tr>
            <td><?=$row['title'];?></td>
            <td>
                <span class="less"><?=mb_substr($row['text'],0,20);?></span>
                <span class="detail"><?=$row['text'];?></span>
            </td>
            <td><?=$row['likes'];?>個人說<img src="./icon/02B03.jpg" alt="" style="width:20px"></td>
            <td>
                <a href="#">讚</a>
            </td>
        </tr>
        <?php
        endforeach;
        ?>
    </table>
    <div>
        
        <?php
        if(($now-1)>0){
            echo "<a href='index.php?do=pop&p=".($now-1)."'> < </a>";
        }
        for ($i=1; $i<=$pages ; $i++) { 
            $size=($i==$now)?'24px':'16px';
            echo "<a href='index.php?do=pop&p=".$i."' style='font-size:$size'>$i</a>";
        }
        if(($now+1)<=$pages){
            echo "<a href='index.php?do=pop&p=".($now+1)."'> > </a>";
        }
        ?>
    </div>
    
</fieldset>