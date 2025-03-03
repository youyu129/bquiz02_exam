<fieldset style="width:50%;margin:10px auto;">
    <legend>忘記密碼</legend>
    <table>
        <tr>
            <td>請輸入信箱以查詢密碼</td>
        </tr>
        <tr>
            <td>
                <input type="text" name="email" id="email">
            </td>
        </tr>
        <tr>
            <td id="result">
                
            </td>
        </tr>
    </table>
    <div>
        <button onclick="find()">尋找</button>
    </div>
</fieldset>

<script>
    function find(){
        let email=$("#email").val()
        $.get("./api/chk_email.php",{email},(res)=>{
            $("#result").html(res)
        })
    }
</script>