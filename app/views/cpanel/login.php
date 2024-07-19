<form autocomplete="off" action="<?php echo BASE_URL ?>/login/xacthuc_login" method="POST">
    <?php
    if(isset($msg))
    echo '<span style="color:blue; font-weight:bold;">' ,$msg,'</span>';
    ?>
    <table>
        <tr>
            <td>username</td>
            <td><input type="text" name="username"></td>
        </tr>
        <tr>
            <td>password</td>
            <td><input type="password" name="password"></td>
        </tr>
        <tr>
            
            <td><input type="submit" name="login" value="login"></td>
        </tr>
    </table>
</form>