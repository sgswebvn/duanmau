<?php
    function insert_danhmuc($ten_loai){
        $sql="insert into loai_hang(ten_loai) values('$ten_loai')";
        pdo_execute($sql);
    }
    function delete_danhmuc($ma_loai){
        $sql="delete from loai_hang where ma_loai='$ma_loai'";
        pdo_execute($sql);
    }
    function update_danhmuc($ten_loai,$ma_loai){
        $sql="update loai_hang set ten_loai='$ten_loai' where ma_loai='$ma_loai'";
        pdo_execute($sql);
    }
    function loadall_danhmuc_home(){
        $sql="select * from loai_hang where 1 order by ma_loai desc limit 0,10";
        $listdanhmuc=pdo_query($sql);
        return $listdanhmuc;
    }
    function loadall(){
        $sql="select * from loai_hang where 1 order by ma_loai desc";
        $listdanhmuc=pdo_query($sql);
        return $listdanhmuc;    
    }
    function loadone($ma_loai){
        $sql="select * from loai_hang where ma_loai=".$ma_loai;
        $dn=pdo_query_one($sql);
        return $dn;
    }
?>