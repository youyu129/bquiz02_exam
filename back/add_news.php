<fieldset>
    <legend>
    新增文章
    </legend>
<table>
    <form action="./api/add_news.php" method="post">

    <tr>
        <td>文章標題</td>
        <td>
            <input type="text" name="title" id="title">
        </td>
    </tr>
    <tr>
        <td>文章分類</td>
        <td><select name="type" id="type">
            <option value="1">健康新知</option>
            <option value="2">菸害防治</option>
            <option value="3">癌症防治</option>
            <option value="4">慢性病防治</option>
        </select></td>
    </tr>
    <tr>
        <td>文章內容</td>
        <td><textarea name="text" id="text"></textarea></td>
    </tr>
</table>
<div>
    <input type="submit" value="新增">
    <input type="reset" value="重置">
</div>
</form>
</fieldset>