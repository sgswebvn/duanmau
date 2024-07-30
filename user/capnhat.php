<?php
    $imgpath="./img/".$xoahinh;
    if(is_file($imgpath)){
        $img="<img src='".$imgpath."' height='80px' width='100px' style='margin: -50px 30%' alt='không có hình'>";
    }else{
        $img="không có hình";
    }
?>
<div class="row mb totle ">
                <div class="boxtrai mr demo">
                    <div class="row row-dk">
                        <?php 
                            if(isset($_SESSION['user'])&&is_array($_SESSION['user'])){
                                extract($_SESSION['user']);
                            }
                        ?>
                        <h1 class="title">Cập nhật tài khoản</h1>
                        <form action="index.php?act=edit_user" class="form-dangki" enctype="multipart/form-data" method="post">
                            <div>
                                <label for="">Tên đăng nhập</label>
                                <input type="text" name="user" disabled  value="<?php if(isset($user)){echo $user;} ?>">
                            </div>
                            <div>
                                <label for="">Email</label>
                                <input type="email" value="<?php if(isset($email)){echo $email;} ?>" name="email" id="">
                            </div>
                            <div>
                                <label for="">Họ và tên</label>
                                <input type="text" name="ho_ten" value="<?php if(isset($ho_ten)){echo $ho_ten;} ?>" id="">
                            </div>
                            <div>
                                <label for="">Số điện thoại</label>
                                <input type="text" name="sdt" value="<?php if(isset($sdt)){echo $sdt;} ?>" id="">
                            </div>
                            <div>
                                <label for="">Địa chỉ</label>
                                <input type="text" name="dia_chi" value="<?php if(isset($dia_chi)){echo $dia_chi;} ?>" id="">
                            </div>
                            <div>
                                <label for="">Hình</label>
                                <input type="file" name="hinh" id="">
                                <?=$img?>
                            </div>
                            <div>
                                <label for="">Vai trò</label>
                                <select name="vai_tro" disabled id="">
                                    <?php
                                        if($vai_tro==0){
                                            echo '<option value="0">Người dùng</option>';                                            
                                        }else if($vai_tro==1){
                                            echo '<option value="1">Quản trị viên</option>';
                                        }
                                    ?>
                                </select>
                            </div>
                            <input type="hidden" name="id" value="<?php echo $id ?>">
                            <button type="submit" name="submit" >Cập nhật</button>
                            <button type="reset">Nhập lại</button>
                        </form>
                        <?php 
                            if(isset($tb)){
                                echo $tb;
                            }
                        ?>
                    </div>
                    
                </div>
                <div class="boxphai">
                    <?php include "./view/boxright.php"; ?>
                </div>
            </div>