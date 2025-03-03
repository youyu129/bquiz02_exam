<style>
.detail {
    display: none;
}
</style>
<fieldset>
    <legend>目前位置：首頁 > 最新文章區</legend>
<button onclick="addnews()">新增文章</button>
    <table style="width: 90%;margin:auto;" class="ct">
        <tr>
            <th width="10%">編號</th>
            <th width="60%">標題</th>
            <th width="15%">顯示</th>
            <th width="15%">刪除</th>
        </tr>
        <?php
        $div=3;
        $all=$News->count();
        $pages=ceil($all/$div);
        $now=$_GET['p']??1;
        $start=($now-1)*$div;

        $rows=$News->all(" LIMIT $start,$div");
        foreach($rows as $key =>$row):
        ?>
        <tr>
            <td class="clo"><?=$key+1;?>.</td>
            <td>
                <span class="less"><?=$row['title'];?></span>
            </td>
            <td>
                <input type="checkbox" name="sh[]" id="sh" value="<?=$row['id'];?>" <?=($row['sh']==1)?'checked':'';?>>
            </td>
            <td>
                <input type="checkbox" name="del[]" id="del" value="<?=$row['id'];?>">
                <input type="hidden" name="id[]" value="<?=$row['id'];?>">
            </td>
        </tr>
        <?php
        endforeach;
        ?>
    </table>
    <div class="ct">

        <?php
        if(($now-1)>0){
            echo "<a href='admin.php?do=news&p=".($now-1)."'> < </a>";
        }
        for ($i=1; $i<=$pages ; $i++) { 
            $size=($i==$now)?'24px':'16px';
            echo "<a href='admin.php?do=news&p=".$i."' style='font-size:$size'>$i</a>";
        }
        if(($now+1)<=$pages){
            echo "<a href='admin.php?do=news&p=".($now+1)."'> > </a>";
        }
        ?>
    </div>
    <div class="ct">
        <button onclick="edit()">確定修改</button>
    </div>

</fieldset>

<script>
function edit() {
    let ids = $("input[name='id[]']").map(($idx,item)=>$(item).val()).get()
    let dels = $("input[name='del[]']:checked").map(($idx,item)=>$(item).val()).get()
    let sh = $("input[name='sh[]']:checked").map(($idx,item)=>$(item).val()).get()
    $.post("./api/edit_news.php",{ids,dels,sh},(res)=>{
        // location.reload()
    })
}
function addnews(){
    location.href='?do=add_news'
}
</script>