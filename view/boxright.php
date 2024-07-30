<?php
if (isset($_SESSION['user'])) {
    extract($_SESSION['user']);
?>
    <div class="row mb">
        <div class="boxtitle">TAI KHOAN</div>
        <div class="boxcontent fomttaikhoan">

            <div class="mb10 row">
                Xin chào <br>
                <?php echo $user ?>
            </div>
            <div class="row mb10">
                <li><a href="index.php?act=mybill">Đơn hàng của tôi</a></li>
                <li><a href="index.php?act=edit_user">Cập nhật thông tin</a></li>
                <li><a href="index.php?act=quenmk">Quên mật khẩu</a></li>
                <li><a href="index.php?act=doimkc">Đổi mật khẩu</a></li>
                <?php
                if ($vai_tro == 1) {
                    echo '<li><a href="./admin/">Quản trị admin</a></li>';
                }
                ?>

                <li><a href="index.php?act=thoat">Thoát</a></li>
            </div>
        <?php
    } else {
        ?>
            <form action="index.php?act=dangnhap" method="post">
                <div class="row mb10">
                    Ten Dang Nhap <br>
                    <input type="text" name="user" id=""><br>
                </div>
                <div class="row mb10">
                    Mat Khau
                    <input type="password" name="mat_khau" id=""> <br>
                </div>
                <div class="row mb10">
                    <input type="checkbox" name="note" id=""> Ghi nho tai khoan?
                </div>
                <div class="row mb10">
                    <input type="submit" value="dang nhap" name="submit" id=""><br>
                    <?php if (isset($tb)) {
                        echo  $tb;
                    } ?>
                </div>
            </form>
            <li><a href="index.php?act=quenmk">Quên mật khẩu</a></li>
            <li><a href="index.php?act=dangki">Đăng kí thành viên</a></li>
        <?php
    }
        ?>
        </div>

    </div>
    <div class="row mb">
        <div class="boxtitle">DANH MUC</div>
        <div class="boxcontent2 menudoc">
            <ul>
                <?php
                foreach ($listdanhmuc as $danhmuc) {
                    extract($danhmuc);
                    $linkdm = "index.php?act=sanpham&ma_loai=" . $ma_loai;
                ?>
                    <li><a href="<?php echo $linkdm ?>"><?php echo $ten_loai ?></a></li>
                <?php } ?>
            </ul>
        </div>
        <div class="boxfooter searbox">
            <?php $linksearch = "index.php?act=sanpham" ?>
            <form action="<?php echo $linksearch ?>" method="post">
                <input type="text" name="value_search" id="">
                <input type="submit" name="submit" value="Tìm kiếm" style="margin-top: 5px;">
            </form>
        </div>
    </div>
    <div class="row mb">
        <div class="boxtitle">TOP 10 YEU THICH</div>
        <div class=" row boxcontent ">
            <?php
            foreach ($listsanphamtop10 as $sptop10) {
                extract($sptop10);
                $linksp = "index.php?act=chitietsp&ma_hh=" . $ma_hh . "&ma_loai=" . $ma_loai;
                $image_top10 = $img_path . $hinh;
            ?>
                <div class="row mb10 top10">
                    <img src="<?php echo $image_top10 ?>" alt="">
                    <a href="<?php echo $linksp ?>"><?php echo $ten_hh ?></a>
                </div>
            <?php } ?>
        </div>

    </div>
    </div>