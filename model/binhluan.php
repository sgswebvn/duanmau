<?php

function insert_bl($noi_dung,$ma_hh,$id,$ngay_bl){
    $sql="insert into binh_luan(noi_dung,ma_hh,id,ngay_bl) values('$noi_dung','$ma_hh','$id','$ngay_bl')";
    pdo_execute($sql);
}
function loadall_bl(){
    $sql="select * from binh_luan where 1";
    $listbl=pdo_query($sql);
    return $listbl;
}
function delete_one_bl($ma_bl){
    $sql="delete from binh_luan where ma_bl=$ma_bl";
    pdo_execute($sql);
}
?>