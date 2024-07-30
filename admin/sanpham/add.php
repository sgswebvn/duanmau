<div class="frmtitle">
    <h1>Thêm mới hàng hoá</h1>
</div>
<div class="frmcontent2">

    <form action="index.php?act=addsp" enctype="multipart/form-data" method="post">

        <div class="mb10">
            Danh mục<br>
            <select name="ma_loai" id="">
                <?php
                            foreach($listdanhmuc as $danhmuc){
                                extract($danhmuc);
                                echo '<option value="'.$ma_loai.'">'.$ten_loai.'</option>';
                            }
                        ?>

            </select>
        </div>
        <div class="mb10">
            Mã hàng hoá<br>
            <input type="text" name="ma_hh" disabled id="">
        </div>
        <div class="mb10">
            Tên hàng: <br>
            <input type="text" name="ten_hh" id="">
        </div>
        <div class="mb10">
            Đơn giá: <br>
            <input type="number" name="don_gia" id="">
        </div>
        <div class="mb10">
            Giảm giá: <br>
            <input type="number" value="0" name="giam_gia" id="">
        </div>
        <div class="mb10">
            Hình: <br>
            <input type="file" name="hinh" id="">
        </div>

        <div class="mb10">
            Mô tả: <br>
            <textarea name="mo_ta" id=""></textarea>
        </div>

        <div class="mb10">
            <input type="submit" name="themmoi" value="Thêm mới">
            <input type="reset" value="Nhập lại">
            <a href="index.php?act=listsp"><input type="button" value="Danh sách"></a>
        </div>
    </form>
</div>
<?php
        if(isset($_POST['themmoi'])){
            $ten_hh=$_POST['ten_hh'];
            $hinh=$_FILES['hinh']['name'];
            $mo_ta=$_POST['mo_ta'];
            $giam_gia=$_POST['giam_gia'];
            $don_gia=$_POST['don_gia'];
            $ngay_nhap=date("Y:m:d");
            $so_luot_xem=0;
            $ma_loai=$_POST['ma_loai'];
            insert_sanpham($ten_hh,$don_gia,$giam_gia,$hinh,$ngay_nhap,$mo_ta,$so_luot_xem,$ma_loai);
            if(is_dir(__DIR__."/../../img")){
                move_uploaded_file($_FILES['hinh']['tmp_name'],__DIR__.'/../../img/'.$_FILES['hinh']['name']);
            }else{
                mkdir(__DIR__."/../../img");
                move_uploaded_file($_FILES['hinh']['tmp_name'],__DIR__."/../../img/".$hinh);
            }
        }
    ?>