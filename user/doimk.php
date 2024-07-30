<div class="row mb totle ">
                <div class="boxtrai mr demo">
                    <div class="row row-dk">
                        <?php 
                            if(isset($_SESSION['user'])&&is_array($_SESSION['user'])){
                                extract($_SESSION['user']);
                            }
                        ?>
                        <h1 class="title">Đổi mật khẩu</h1>
                        <form action="index.php?act=doimkc" class="form-dangki" method="post">
                            <div>
                                <label for="">Mật khẩu cũ</label>
                                <input type="password" name="mat_khau" value="">
                            </div>
                            <div>
                                <label for="">Mật khẩu mới</label>
                                <input type="password" name="new-pass">
                            </div>
                            <div>
                                <label for="">Xác nhận mật khẩu mới</label>
                                <input type="password" name="new-pass-again">
                            </div>
                            
                            <input type="hidden" name="id" value="<?php echo $id ?>">
                            <button type="submit" name="submit" >Thay đổi</button>
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