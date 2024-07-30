<?php
    function insert_sanpham($ten_hh,$don_gia,$giam_gia,$hinh,$ngay_nhap,$mo_ta,$so_luot_xem,$ma_loai){
        $sql="insert into hang_hoa(ten_hh,don_gia,giam_gia,hinh,ngay_nhap,mo_ta,so_luot_xem,ma_loai) values('$ten_hh','$don_gia','$giam_gia','$hinh','$ngay_nhap','$mo_ta','$so_luot_xem','$ma_loai')";
        pdo_execute($sql);
    }
    function delete_sanpham($ma_hh){
        $sql="delete from hang_hoa where ma_hh=".$ma_hh;
        pdo_execute($sql);
    }
    function loadall_sanpham_home(){
        $sql="select * from hang_hoa where 1 order by ma_hh desc limit 0,9";
        $listsanpham=pdo_query($sql);
        return $listsanpham;
    }
    function loadall_sanpham($kyw="",$iddm=0){
        $sql="select * from hang_hoa where 1";
        if($kyw!=""){
            $sql.=" and ten_hh like '%".$kyw."%'";
        }
        if($iddm>0){
            $sql.=" and ma_loai ='".$iddm."'";
        }
        $sql.=" order by ma_hh desc";
        $listsanpham=pdo_query($sql);
        return $listsanpham;
    }
    function loadall_sanpham_cungloai($ma_loai,$ma_hh){
        $sql="select * from hang_hoa where ma_loai=$ma_loai and ma_hh!=$ma_hh";
        $sql.=" order by ma_hh desc";
        $listspcungloai=pdo_query($sql);
        return $listspcungloai;
    }
    function loadall_sanpham_top10(){
        $sql="select * from hang_hoa where 1 order by so_luot_xem desc";
        $listop10=pdo_query($sql);
        return $listop10;
    }
    function update_sanpham($ten_hh,$ma_hh,$hinh,$mo_ta,$don_gia,$giam_gia,$ma_loai){
        if($hinh!=""){
            $sql="update hang_hoa set ten_hh='$ten_hh',hinh='$hinh',don_gia='$don_gia',mo_ta='$mo_ta',giam_gia='$giam_gia',ma_loai='$ma_loai' where ma_hh='$ma_hh'";
        }else{
            $sql="update hang_hoa set ten_hh='$ten_hh',don_gia='$don_gia',mo_ta='$mo_ta',giam_gia='$giam_gia',ma_loai='$ma_loai' where ma_hh='$ma_hh'";
        }
        pdo_execute($sql);
    }
    function loadone_sanpham($ma_hh){
        $sql="select * from hang_hoa where ma_hh=".$ma_hh;
        $sp=pdo_query_one($sql);
        return $sp;
    }
?>