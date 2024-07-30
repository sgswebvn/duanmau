<?php
    if(is_array($dn)){
        extract($dn);
    }
?>
<div class="frmtitle">
                <h1>Thay đổi loại hàng hoá</h1>
            </div>
            <div class="frmcontent">
                <form action="index.php?act=update" method="post">
                    <div class="mb10">
                        Mã loại<br>
                        <input type="text" value="<?php if(isset($ma_loai)){ echo $ma_loai; } ?>" disabled id="">
                    </div>
                    <div class="mb10">
                        Tên loại: <br>
                        <input type="text" value="<?php if(isset($ten_loai)){ echo $ten_loai;}?>" name="ten_loai" id="">
                    </div>
                    <div class="mb10">
                        <input type="hidden" name="ma_loai" value="<?php echo $ma_loai?>">
                        <input type="submit" name="thaydoi" value="Thay đổi">
                        <input type="reset" value="Nhập lại">
                        <input type="submit" value="Danh sách">
                    </div>
                </form>
            </div>
