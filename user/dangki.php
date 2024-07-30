<div class="row mb totle ">
                <div class="boxtrai mr demo">
                    <div class="row row-dk">
                        <h1 class="title">Đăng kí thành viên</h1>
                        <form action="index.php?act=dangki" class="form-dangki" method="post">
                            <div>
                                <label for="">Tên đăng nhập</label>
                                <input type="text" name="user" id="">
                            </div>
                            <div>
                                <label for="">Email</label>
                                <input type="email" name="email" id="">
                            </div>
                            <div>
                                <label for="">Mật khẩu</label>
                                <input type="password" name="mat_khau" id="">
                            </div>
                            <div>
                                <label for="">Xác nhận mật khẩu</label>
                                <input type="password" name="confirm-pass" id="">
                            </div>
                            <button type="submit" name="submit" >Đăng kí</button>
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