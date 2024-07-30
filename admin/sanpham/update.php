<?php
    if(is_array($sp)){
        extract($sp);
    }
    $imgpath="../img/".$hinh;
    if(is_file($imgpath)){
        $img="<img src='".$imgpath."' height='80px' width='100px' style='margin: -50px 30%' alt='không có hình'>";
    }else{
        $img="không có hình";
    }
?>
<div class="frmtitle">
                <h1>Thay đổi hàng hoá</h1>
            </div>
            <div class="frmcontent">
                <form action="index.php?act=updatesp&ma_hh='<?php echo $ma_hh; ?>'" enctype="multipart/form-data" method="post">
                    <h4>Danh mục</h4>    
                    <select name="ma_loai" id="">
                        <?php
                            foreach($dm as $muc){
                                extract($muc);
                                echo '<option value="'.$ma_loai.'">'.$ten_loai.'</option>';
                            }
                        ?>
                    </select>
                    <div class="mb10">
                        Mã hàng<br>
                        <input type="text" value="<?php if(isset($ma_hh)){ echo $ma_hh; } ?>" disabled id="">
                    </div>
                    <div class="mb10">
                        Tên hàng: <br>
                        <input type="text" value="<?php if(isset($ten_hh)){ echo $ten_hh;}else{echo "Lỗi";}?>" name="ten_hh" id="">
                    </div>
                    <div class="mb10">
                        Đơn giá: <br>
                        <input type="number" name="don_gia" value="<?php if(isset($don_gia)){echo $don_gia; } ?>" id="">
                    </div>
                    <div class="mb10">
                        Giảm giá: <br>
                        <input type="number" value="<?php if(isset($giam_gia)){echo $giam_gia;} ?>" name="giam_gia" id="">
                    </div>
                    <div class="mb10">
                        Hình: <br>
                        <input type="file" name="hinh" id="">
                        <?=$img?>
                    </div>
                    <div class="mb10">
                        Mô tả: <br>
                        <textarea name="mo_ta" id="" ><?php if(isset($mo_ta)){echo $mo_ta;} ?></textarea>
                    </div>                    
                    <div class="mb10">
                        <input type="hidden" name="ma_hh" value="<?php echo $ma_hh ?>">
                        <input type="submit" name="thaydoi" value="Thay đổi">
                        <input type="reset" value="Nhập lại">
                        <input type="submit" value="Danh sách">
                    </div>
                </form>
            </div>
