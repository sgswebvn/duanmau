   <div class="frmtitle">
                <h1>Thêm mới loại hàng hoá</h1>
            </div>
            <div class="frmcontent">
                <form action="index.php?act=adddm" method="post">
                    <div class="mb10">
                        Mã loại<br>
                        <input type="text" name="ma_loai" disabled id="">
                    </div>
                    <div class="mb10">
                        Tên loại: <br>
                        <input type="text" name="ten_loai" id="">
                    </div>
                    <div class="mb10">
                        <input type="submit" name="themmoi" value="Thêm mới">
                        <input type="reset" value="Nhập lại">
                        <a href="index.php?act=addlist"><input type="button" value="Danh sách"></a>
                    </div>
                </form>
            </div>  
    <?php
        if(isset($thongbao)){
            echo $thongbao;
        }
    ?>