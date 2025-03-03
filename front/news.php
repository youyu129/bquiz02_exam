<style>
.detail {
    display: none;
}
</style>
<fieldset>
    <legend>目前位置：首頁 > 最新文章區</legend>

    <table style="width: 100%;" class="ct">
        <tr>
            <th width="30%">標題</th>
            <th width="50%">內容</th>
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
            <td class="title"><?=$row['title'];?></td>
            <td>
                <span class="less"><?=mb_substr($row['text'],0,20);?></span>
                <span class="detail"><?=$row['text'];?></span>
            </td>
            <td>
                <a href="#" class="like">讚</a>
            </td>
        </tr>
        <?php
        endforeach;
        ?>
    </table>
    <div>

        <?php
        if(($now-1)>0){
            echo "<a href='index.php?do=news&p=".($now-1)."'> < </a>";
        }
        for ($i=1; $i<=$pages ; $i++) { 
            $size=($i==$now)?'24px':'16px';
            echo "<a href='index.php?do=news&p=".$i."' style='font-size:$size'>$i</a>";
        }
        if(($now+1)<=$pages){
            echo "<a href='index.php?do=news&p=".($now+1)."'> > </a>";
        }
        ?>
    </div>

</fieldset>

<script>
$(".like").on('click', function() {
    let like=$(this).text()
    $.post("./api/like.php",like,(res)={

    })
    switch (like) {
        case "讚":
            $(this).text("收回讚")
            break;
        case "收回讚":
            $(this).text("讚")
            break;
        }
})
$(".title").on('click',function(){
    $(this).next().children(".detail,.less").toggle()
})
</script>