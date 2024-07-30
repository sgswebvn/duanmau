<div class="row mb totle ">
                <div class="boxtrai mr demo">
                    <div class="row row-dk">
                        <h1 class="title">Quên mật khẩu</h1>
                        <form action="index.php?act=quenmk" class="form-dangki" method="post">
                            <div>
                                <label for="">Email</label>
                                <input type="email" name="email" id="">
                            </div>
                          
                            <button type="submit" name="submit" >Gửi về</button>
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