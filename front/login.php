<fieldset style="width:50%;margin:10px auto;">
    <legend>會員登入</legend>
    <table>
        <tr>
            <td class="clo">帳號</td>
            <td>
                <input type="text" name="acc" id="acc">
            </td class="clo">
        </tr>
        <tr>
            <td>密碼</td>
            <td>
                <input type="password" name="pw" id="pw">
            </td>
        </tr>
    </table>
    <div>
        <button onclick="login()">登入</button>
        <button onclick="resetForm()">清除</button>
        <a href="index.php?do=forgot">忘記密碼</a> |
        <a href="index.php?do=reg">尚未註冊</a>
    </div>
</fieldset>

<script>
    function login(){
        let user={
            acc:$("#acc").val(),
            pw:$("#pw").val()
        }
        $.get("./api/chk_acc.php",{acc:user.acc},(res)=>{
            if(parseInt(res) ==0 ){
                alert("查無帳號")
            }
            $.post("./api/chk_pw.php",user,(res)=>{
                if(parseInt(res)==0){
                    alert("密碼錯誤")
                }else if(user.acc=='admin'){
                    location.href="admin.php"
                }else{
                    location.href="index.php"
                }
            })
        })
    }
    function resetForm(){
        $("input[name='acc']").val("")
        $("input[name='pw']").val("")
    }
</script>