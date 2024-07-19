<form autocomplete="off" action="<?php echo BASE_URL ?>theloaiController/inserttheloai" method="POST">
    <?php
    if(isset($msg))
    echo '<span style="color:blue; font-weight:bold;">' ,$msg,'</span>';
    ?>
    <table>
        <tr>
            <td>ten loai</td>
            <td><input type="text" required="1" name="ten_loai"></td>
        </tr>
        <tr>
            
            <td><input type="submit" name="themtheloai" value="thêm"></td>
        </tr>
    </table>
</form>