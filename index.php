<?php
session_start();
include "./model/pdo.php";
include './model/danhmuc.php';
include "./model/sanpham.php";
include "./view/header.php";
include './global.php';
include "./model/taikhoan.php";
include "./model/cart.php";
if (!isset($_SESSION['mycart'])) {
    $_SESSION['mycart'] = [];
}

$listsp = loadall_sanpham_home();

$listdanhmuc = loadall_danhmuc_home();

$listsanphamtop10 = loadall_sanpham_top10();
if (isset($_GET['act'])) {
    $act = $_GET['act'];
    switch ($act) {
        case "gioithieu":
            include "./view/gioithieu.php";
            break;
        case "chitietsp":
            if (isset($_GET['ma_hh']) && ($_GET['ma_hh']) > 0) {
                $ma_hh = $_GET['ma_hh'];
                $ma_loai = $_GET['ma_loai'];
                $spct = loadone_sanpham($ma_hh);
                $spcungloai = loadall_sanpham_cungloai($ma_loai, $ma_hh);
            }
            include "./view/chitietsp.php";
            break;
        case "sanpham":
            if (isset($_POST['submit']) && ($_POST['value_search']) != "") {
                $kyw = $_POST['value_search'];
            } else {
                $kyw = "";
            }
            if (isset($_GET['ma_loai'])) {
                $ma_loai = $_GET['ma_loai'];
                $dm = loadone($ma_loai);
            } else {
                $ma_loai = 0;
            }
            $dssp = loadall_sanpham($kyw, $ma_loai);
            include "./view/sanpham.php";
            break;
        case "dangki":
            if (isset($_POST['submit']) && ($_POST['email']) != "" && ($_POST['user']) != "" && ($_POST['mat_khau']) != "") {
                $mat_khau = $_POST['mat_khau'];
                $user = $_POST['user'];
                $email = $_POST['email'];
                $confirm = $_POST['confirm-pass'];
                $tb = insert_user($user, $email, $mat_khau, $confirm);
            }
            include "./user/dangki.php";
            break;  
        case "dangnhap":
            if (isset($_POST['submit']) && ($_POST['user']) != "" && ($_POST['mat_khau']) != "") {
                $mat_khau = $_POST['mat_khau'];
                $user = $_POST['user'];
                $arrcheckuser = check_user($user, $mat_khau);


                if (is_array($arrcheckuser)) {
                    $kich_hoat = $arrcheckuser['kich_hoat'];
                    if ($kich_hoat != 0) {
                        $tb = "Tài khoản đang bị vô hiệu. <br> Vui lòng liên hệ với admin để được hỗ trợ";
                        include "./view/home.php";
                    } else {    
                        $_SESSION['user'] = $arrcheckuser;
                        header("Location: index.php");
                    }
                } else {
                    $tb = "Đăng nhập thất bại";
                    include "./view/home.php";
                }
            }

            break;
        case "quenmk":
            if (isset($_POST['submit']) && ($_POST['email']) != "") {
                $email = htmlspecialchars($_POST['email']);
                $_SESSION['email'] = $email;
                $sl = check_email_guive($email);
                if ($sl != 0) {
                    $to_mail = "$email";
                    $tennguoigui = "Khoa";
                    $nguoigui = "trandangkhoa19022004@gmail.com";
                    goimail($nguoigui, $tennguoigui, $to_mail);
                } else {
                    echo "Mail này chưa được đăng kí";
                }
            }

            include "./user/quenmk.php";
            break;
        case "edit_user":
            $id = $_SESSION['user']['id'];
            $hinhphaixoa = loadtt_user($id);
            $xoahinh = $hinhphaixoa['hinh'];
            if (isset($_POST['submit']) && (($_POST['email']) != "" && ($_POST['ho_ten']) != "")) {
                $id = $_POST['id'];
                $email = $_POST['email'];
                $ho_ten = $_POST['ho_ten'];
                $hinh = $_FILES['hinh']['name'];
                $dia_chi = $_POST['dia_chi'];
                $sdt = $_POST['sdt'];
                if ($hinh != "") {
                    unlink('./img/' . $xoahinh);
                }
                update_user($id, $ho_ten, $email, $hinh, $dia_chi, $sdt);
                if (is_dir("./img")) {
                    move_uploaded_file($_FILES['hinh']['tmp_name'], "./img/" . $_FILES['hinh']['name']);
                } else {
                    mkdir("./img");
                    move_uploaded_file($_FILES['hinh']['tmp_name'], "./img/" . $_FILES['hinh']['name']);
                }
                $_SESSION['user'] = loadtt_user($id);
                header("Location: index.php?act=edit_user");
            }
            include "./user/capnhat.php";
            break;
            // case "edit_pass": 
            //     if(isset($_POST['submit'])&&(($_POST['mat_khau'])!=""&&($_POST['pass-new'])!="")){
            //         $id=$_POST['id'];
            //         $email=$_POST['mat_khau'];
            //         $ho_ten=$_POST['ho_ten'];
            //         $hinh=$_FILES['hinh']['name'];
            //         $dia_chi=$_POST['dia_chi'];
            //         update_user($id,$ho_ten,$email,$hinh,$dia_chi);
            //         $_SESSION['user']=loadtt_user($id);
            //         header("Location: index.php?act=edit_user");
            //     }
            //     include "./user/capnhat.php";
            //     break;
        case "thoat":
            session_unset();
            header("Location: index.php");
            break;
        case "doimkc":
            if (isset($_POST['submit'])) {
                $id = $_POST['id'];
                $mat_khau = $_POST['mat_khau'];
                $mat_khau_moi = $_POST['new-pass'];
                $xacnhan_mk = $_POST['new-pass-again'];
                if (($mat_khau == "")) {
                    $tb = "Không để trống mật khẩu cũ";
                } else if ($mat_khau_moi == "") {
                    $tb = "Không để trống mật khẩu mới";
                } else if ($xacnhan_mk == "") {
                    $tb = "Không để trống xác nhận mật khẩu mới";
                } else if ($mat_khau_moi == $xacnhan_mk) {
                    $sl = check_doimk($id, $mat_khau);
                    if ($sl == 1) {
                        update_mk($id, $mat_khau_moi);
                        $tb = "Cập nhật thành công";
                    } else {
                        $tb = "Mật khẩu cũ không chính xác";
                    }
                } else {

                    $tb = "Mật khẩu mới và xác nhận ko khớp";
                }
            } else {
            }
            include "./user/doimk.php";
            break;
        case "addcart":
            if (isset($_REQUEST['submit'])) {
                $hinh = $_POST['image'];
                $ten_hh = $_POST['tensp'];
                $don_gia = $_POST['giasp'];
                $ma_hh = $_POST['ma_hh'];
                $sl = 1;
                $thanhtien = $sl * $don_gia;
                $arrsp = array($hinh, $ten_hh, $don_gia, $sl, $thanhtien, $ma_hh);
                array_push($_SESSION['mycart'], $arrsp);
            }
            include "view/cart/viewcart.php";
            break;
        case "xoacart":
            if (isset($_GET['ma_cart'])) {

                array_splice($_SESSION['mycart'], $_GET['ma_cart'], 1);
            } else {
                $_SESSION['mycart'] = [];
            }
            include "view/cart/viewcart.php";
            break;
        case "bill":

            include "./view/cart/bill.php";
            break;
        case "billconfirm":
            if (isset($_POST['submit'])) {
                if ($_SESSION['user']) {
                    $id = $_SESSION['user']['id'];
                } else {
                    $id = 0;
                }
                $ho_ten = $_POST['ho_ten'];
                $email = $_POST['email'];
                $dia_chi = $_POST['dia_chi'];
                $pttt = $_POST['pttt'];
                $sdt = $_POST['sdt'];
                date_default_timezone_set('Asia/Ho_Chi_Minh');
                $ngay_dat_hang = date("Y-m-d H:i:s ");
                $total = tongdonhang();

                $id_bill = insert_bill($ho_ten, $email, $dia_chi, $sdt, $pttt, $total, $ngay_dat_hang, $id);
                foreach ($_SESSION['mycart'] as $cart) {
                    insert_cart($_SESSION['user']['id'], $cart[5], $cart[0], $cart[1], $cart[2], $cart[3], $cart[4], $id_bill);
                }
                $_SESSION['mycart'] = [];
            }
            $bill = loadone_bill($id_bill);
            $listcart = loadall_cart($id_bill);
            include "./view/cart/billconfirm.php";
            break;
        case "mybill":
            $listbill = loadall_bill($_SESSION['user']['id']);
            include "./view/cart/mybill.php";
            break;
        default:
            include "view/home.php";
            break;
    }
} else {
    include "view/home.php";
}
include "view/footer.php";
