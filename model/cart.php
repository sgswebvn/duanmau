    
<?php
    function viewcart($option){
        
        $i=0; 
        $tong=0;
        if($option==1){
            $xoacart_th="<th>Hành động</th>";
            $xoacart_td="<td><a href='index.php?act=xoacart&ma_cart=".$i."'><input type='button' value='Xoá' name='xoa'></a></td> ";
        }else{
            $xoacart_th="";
            $xoacart_td="";

        }

        echo ' <table class="listsp" border="1">
                        
        <tr>
            <th>Mã HH</th>
            <th>Hình</th>
            <th>Sản phẩm</th>
            <th>Giá</th>
            <th>Số lượng</th>
            <th>Thành tiền</th>
            '.$xoacart_th.'
        </tr>';
   
       
        foreach($_SESSION['mycart'] as $cart){
            $ttien=$cart[3]*$cart[4];
            $tong+=$ttien;
            echo '<tr>
                <td>'.$cart[5].'</td>
                <td><img src="./img/'.$cart[0].'" alt="Lỗi"></td>
                <td>'.$cart[1].'</td>
                <td>'.$cart[2].'</td>
                <td>'.$cart[3].'</td>
                <td>'.$cart[4].'</td>
                '.$xoacart_td.'
                </tr>';
            $i+=1;
        }
        echo ' <tr>
                <td colspan="5">Tổng đơn hàng</td>
                <td colspan="2">'.$tong.'</td>
            </tr>';
        echo ' </table>';
    }
    function view_bill($listcart){
        $i=0; 
        $tong=0;
        echo ' <table class="listsp" border="1">
                        
        <tr>
            <th>Mã HH</th>
            <th>Hình</th>
            <th>Sản phẩm</th>
            <th>Giá</th>
            <th>Số lượng</th>
            <th>Thành tiền</th>
            
        </tr>';
   
       
        foreach($listcart as $cart){
            $ttien=$cart['don_gia']*$cart['so_luong'];
            $tong+=$ttien;
            echo '<tr>
                <td>'.$cart['ma_hh'].'</td>
                <td><img src="./img/'.$cart['hinh'].'" alt="Lỗi"></td>
                <td>'.$cart['ten_hh'].'</td>
                <td>'.$cart['don_gia'].'</td>
                <td>'.$cart['so_luong'].'</td>
                <td>'.$cart['thanh_tien'].'</td>
             
                </tr>';
            $i+=1;
        }
        echo ' <tr>
                <td colspan="5">Tổng đơn hàng</td>
                <td colspan="2">'.$tong.'</td>
            </tr>';
        echo ' </table>';
    }
    function tongdonhang(){
        
        $i=0; 
        $tong=0;
       
        foreach($_SESSION['mycart'] as $cart){
            $ttien=$cart[3]*$cart[4];
            $tong+=$ttien;
            $i+=1;
        }
        return $tong;
    }

    function insert_bill($ho_ten,$email,$dia_chi,$sdt,$pttt,$total,$ngay_dat_hang,$id){
        $sql="insert into bill(ho_ten,email,dia_chi,sdt,pttt,total,ngay_dat_hang,id) values('$ho_ten','$email','$dia_chi','$sdt','$pttt','$total','$ngay_dat_hang','$id')";
        return pdo_execute_return_lastInsertID($sql);
    }
    function deleteone_bill($id_bill){
        $sql="delete from bill where id_bill='$id_bill'";
        pdo_execute($sql);
    }

    function insert_cart($id,$ma_hh,$hinh,$ten_hh,$don_gia,$so_luong,$thanh_tien,$id_bill){
        $sql="insert into cart(id,ma_hh,hinh,ten_hh,don_gia,so_luong,thanh_tien,id_bill) values('$id','$ma_hh','$hinh','$ten_hh','$don_gia','$so_luong','$thanh_tien','$id_bill')";
        pdo_execute($sql);
    }
    function loadone_bill($id_bill){
        $sql="select * from bill where id_bill ='$id_bill'";
        $arr=pdo_query_one($sql);
        return $arr;
    }
    function loadall_cart($id_bill){
        $sql="select * from cart where id_bill='$id_bill'";
        $arr=pdo_query($sql);
        return $arr;
    }
    function loadall_bill($id,$kyw=""){
        if($id>0){
            $sql="select * from bill where id='$id'";
        }else{
            $sql="select * from bill where 1";
        }
        if($kyw!=""){
            $sql.=" and id_bill like '%".$kyw."%'";
        }
        $sql.=" order by id_bill desc";
        // $sql.=" order by id_bill desc";
        $arr=pdo_query($sql);
        return $arr;
    }
    function loadall_thongke(){
        $sql="select loai_hang.ten_loai as tenloai, count(hang_hoa.ma_hh) as countsp, min(hang_hoa.don_gia) as minprice, max(hang_hoa.don_gia) as maxprice, avg(hang_hoa.don_gia)";
        $sql.=" from loai_hang left join hang_hoa on loai_hang.ma_loai=hang_hoa.ma_loai ";
        $sql.=" group by loai_hang.ma_loai order by loai_hang.ma_loai";
        $arr=pdo_query($sql);
        return $arr;
    }
    function get_ttdh($status){
        switch($status){
            case 0:
                $tt= "Đơn hàng mới";
                break;
            case 1:
                $tt="Đang xử lí";
                break;
            case 2:
                $tt= "Đã giao";
                break;
            case 3:
                $tt="Đã bị boom";
                break;
            default:
                $tt="Đơn hàng mới";
                break;
        }
        return $tt;
    }
    function get_sl_mh($id_bill){
        $sql="select sum(so_luong) from cart where id_bill='$id_bill'";
        $sl=pdo_query_one($sql);
        return $sl;
    }
    function update_ttdh($status,$id_bill){
        $sql="update bill set status='$status' where id_bill='$id_bill'";
        pdo_execute($sql);
    }
    
?>
