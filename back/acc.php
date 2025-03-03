<fieldset>
    <legend>帳號管理</legend>
    <table width="90%" class="ct">
        <tr class="clo">
            <td>帳號</td>
            <td>密碼</td>
            <td>刪除</td>
        </tr>
        <?php
        $rows=$User->all();
        foreach($rows as $row):
        ?>
        <tr>
            <td><?=$row['acc'];?></td>
            <td><?=str_repeat("*",strlen($row['pw']));?></td>
            <td>
                <input type="checkbox" name="del[]" id="del" value="<?=$row['id'];?>">
            </td>
        </tr>
        <?php
        endforeach;
        ?>
    </table>
    <div class="ct">
        <button onclick="del()">確定刪除</button>
        <button onclick="resetChk()">清空選取</button>
    </div>
    <h2>新增會員</h2>
    <p style="color:red;">*請設定您要註冊的帳號及密碼(最長12個字元)</p>
    <table>
        <tr>
            <td  class="clo">Step1:登入帳號</td>
            <td>
                <input type="text" name="acc" id="acc">
            </td>
        </tr>
        <tr>
            <td class="clo">Step2:登入密碼</td>
            <td>
                <input type="password" name="pw" id="pw">
            </td>
        </tr>
        <tr>
            <td class="clo">Step3:再次確認密碼</td>
            <td>
                <input type="password" name="pw2" id="pw2">
            </td>
        </tr>
        <tr>
            <td class="clo">Step4:信箱(忘記密碼時使用)</td>
            <td>
                <input type="text" name="email" id="email">
            </td>
        </tr>
    </table>
    <div>
        <button onclick="reg()">新增</button>
        <button onclick="resetForm()">清除</button>
    </div>

</fieldset>

<script>
function del() {
    let dels = $("input[type='checkbox']:checked")
    let ids = []
    dels.each((idx, item) => {
        ids.push($(item).val())
    })
    console.log('dels', dels);
    console.log('ids', ids);

    $.post("./api/del_acc.php", {
        ids
    }, (res) => {
        location.reload()
    })
}

function resetChk() {
    $("input[type='checkbox']").prop('checked', false)
}

function reg() {
    console.log('reg ok');
    let user = {
        acc: $("#acc").val(),
        pw: $("#pw").val(),
        pw2: $("#pw2").val(),
        email: $("#email").val()
    }
    if (user.acc == "" || user.pw == "" || user.pw2 == "" || user.email == "") {
        alert("不可空白")
    } else if (user.pw != user.pw2) {
        alert("密碼錯誤")
    } else {
        $.get("./api/chk_acc.php", {
            acc: user.acc
        }, (res) => {
            if (parseInt(res) > 0) {
                alert("帳號重複")
            } else {
                $.post("./api/reg.php", user, (res) => {
                    alert("新增完成")
                    location.reload()
                })
            }

        })

    }

}

function resetForm() {
    console.log('reset ok');

    $("#acc").val("")
    $("#pw").val("")
    $("#pw2").val("")
    $("#email").val("")
}
</script>