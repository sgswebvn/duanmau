<?php
    include "../model/pdo.php";
    include "../model/danhmuc.php";
    include  "../model/sanpham.php";
    include "../model/taikhoan.php";
    include "../model/binhluan.php";
    include "../model/cart.php";
    require_once "header.php";
    
    //controller

    if(isset($_GET['act'])){
        $act=$_GET['act'];
        switch($act){
            case "adddm": 
                if(isset($_POST['themmoi'])&&empty($_POST['ten_loai'])==false){
                    $ten_loai=$_POST['ten_loai'];
                    insert_danhmuc($ten_loai);
                    $thongbao="Thêm thành công";
                }
                include "danhmuc/add.php";
                break;
            case "addlist":
                $listdanhmuc=loadall();
                include "danhmuc/list.php";
                break;
            case "xoadm":
                if(isset($_GET['ma_loai'])&&$_GET['ma_loai']>0){
                    $ma_loai=$_GET['ma_loai'];
                    delete_danhmuc($ma_loai);
                }
                $listdanhmuc=loadall();
                include "danhmuc/list.php";
                break;
            case "suadm": 
                if(isset($_GET['ma_loai'])&&$_GET['ma_loai']>0){
                      $ma_loai=$_GET['ma_loai'];
                      $dn=loadone($ma_loai);
                }
                include "danhmuc/update.php";
                break;
            case "update": 
                if(isset($_POST['thaydoi'])&&empty($_POST['ten_loai'])==false){
                    $ten_loai=$_POST['ten_loai'];
                    $ma_loai=$_POST['ma_loai'];
                    update_danhmuc($ten_loai,$ma_loai);
                }
                $listdanhmuc=loadall();
                include "danhmuc/list.php";
                break;

            case "addsp":
                $listdanhmuc=loadall();
                include "sanpham/add.php";
                break;
            case "listsp":
                if(isset($_POST['listok'])&&($_POST['listok'])){
                    $kyw=$_POST['kyw'];
                    $iddm=$_POST['iddm'];
                }else{
                    $kyw="";
                    $iddm=0;
                }
                $listdanhmuc=loadall();
                $listsanpham=loadall_sanpham($kyw,$iddm);
                include "sanpham/list.php";
                break;
            case "xoasp": 
                if(isset($_GET['ma_hh'])){
                    $ma_hh=$_GET['ma_hh'];
                    delete_sanpham($ma_hh);
                }
                $listsanpham=loadall_sanpham();
                include "sanpham/list.php";
                break;
            case "suasp": 
                if(isset($_GET['ma_hh'])&&($_GET['ma_hh'])>0){
                    $ma_hh=$_GET['ma_hh'];
                    $sp=loadone_sanpham($ma_hh);
                    $dm=loadall();
                }
                include "sanpham/update.php";
                break;
            case "updatesp":
                $ma_hh=$_GET['ma_hh'];
                $spcu=loadone_sanpham($ma_hh);
                $xoahinh=$spcu['hinh'];
                if(isset($_POST['thaydoi'])){
                    $ten_hh=$_POST['ten_hh'];
                    $don_gia=$_POST['don_gia'];
                    $giam_gia=$_POST['giam_gia'];
                    $hinh=$_FILES['hinh']['name'];
                    $mo_ta=$_POST['mo_ta'];
                    $ma_hh=$_POST['ma_hh'];
                    $ma_loai=$_POST['ma_loai'];
                    move_uploaded_file($_FILES['hinh']['tmp_name'],"../img/".$hinh);
                    update_sanpham($ten_hh,$ma_hh,$hinh,$mo_ta,$don_gia,$giam_gia,$ma_loai);
                    if($hinh!=""){
                        unlink("../img/".$xoahinh);
                    }
                }
                $listdanhmuc=loadall();
                $listsanpham=loadall_sanpham();
                include "sanpham/list.php";
                break;
                case "dskh":
                    $listtk=loadall_tk();

                    include "./taikhoan/list.php";
                    break;
                case "suatk":
                    if(isset($_GET['id'])){
                        $id=$_GET['id'];
                        $tttk=loadtt_user($id);
                        $vai_tro=$tttk['vai_tro'];
                        $kich_hoat=$tttk['kich_hoat'];
                    }
                    if(isset($_POST['thaydoi'])){
                        $id=$_POST['id'];
                        $vai_tro=$_POST['vai_tro'];
                        $kich_hoat=$_POST['kich_hoat'];
                        update_vaitro($id,$vai_tro,$kich_hoat);
                    }
                    include "./taikhoan/update.php";
                    break;
                case "dsbl":
                    $list_bl=loadall_bl();
                    include "./binhluan/list.php";
                    break;
                case "xoabl":
                    if(isset($_GET['ma_bl'])){
                        $ma_bl=$_GET['ma_bl'];
                        delete_one_bl($ma_bl);
                    }
                    $list_bl=loadall_bl();
                    include "./binhluan/list.php";
                    break;
                case "listbill":
                    if(isset($_POST['search'])){
                        $kyw=$_POST['kyw'];
                    }else{
                        $kyw="";
                    }
                    $listbill=loadall_bill(0,$kyw);
                    include "./bill/list.php";
                    break;
                case 'suabill':
                    $id_bill=$_GET['id_bill'];
                    $bill=loadone_bill($id_bill);
                    $status=$bill['status'];
                    if(isset($_POST['thaydoi'])){
                        $status=$_POST['ttdh'];
                        update_ttdh($status,$id_bill);
                    }
                    include "./bill/update.php";
                    break;
                case 'xoabill':
                    if(isset($_GET['id_bill'])){
                        $id_bill=$_GET['id_bill'];
                        deleteone_bill($id_bill);
                    }
                    $listbill=loadall_bill(0);
                    include "./bill/list.php";
                    break;
                case "thongke":
                    $thongke=loadall_thongke();
                    include "./thongke/list.php";
                    break;
                case "bieudotk":
                    $listbieudo=loadall_thongke();
                    include "./thongke/bieudo.php";
                    break;
            default:
                include "home.php";
                break;
        }
    }else{
        include "home.php";
    }
    require_once "home.php";
    require_once "footer.php";
?>