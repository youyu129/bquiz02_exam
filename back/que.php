<fieldset style="width:50%;margin:10px auto">
    <legend>新增問卷</legend>
    <form action="./api/add_que.php" method="post">
        <table style="width: 100%;">
            <tr>
                <td class="clo">問卷名稱</td>
                <td>
                    <input type="text" name="subject" id="subject">
                </td>
            </tr>
            <tr>
                <td colspan="2" class="more clo">
                    <div>
                        選項
                        <input type="text" name="option[]" id="option">
                        <input type="button" onclick="more()" value="更多">
                    </div>
                </td>

            </tr>
        </table>
        <div>
            <input type="submit" value="新增">|
            <input type="reset" value="清空">
        </div>
    </form>
</fieldset>

<script>
function more() {
    let el = `
        <div>
                選項
                <input type="text" name="option[]" id="option">
                </div>
        `
    $(".more").prepend(el)
}
</script>