<?php
    include "../model/pdo.php";
    session_start();
?>
    <head>
        <link rel="stylesheet" href="../css/style.css">
        
    </style>
</head>
<div class="boxcenter ">
                <div class=" ">
                    <div class="">
                        <form action="#" class="form-dangki" method="post">
                            <h1 class="title">Thay đổi mật khẩu</h1>
                            <div>
                                <label for="">Mật khẩu mới:</label>
                                <input type="password" name="NewPass" id="">
                            </div>
                            <div>
                                <label for="">Nhập lại Pass:</label>
                                <input type="password" name="again-Pass" id="">
                            </div>
                            <button type="submit" name="submit">Thay đổi</button>
                        </form>
                    </div>
                </div>
</div>
 <?php   
    if(!isset($_REQUEST['submit'])){
        echo "Nhấn thay đổi để hoàn tất";
    }else{
        if(empty($_POST['NewPass'])==false&&empty($_POST['again-Pass'])==false){
            $NewPass=$_POST['NewPass'];
            $again_Pass=$_POST['again-Pass'];
            $email=$_SESSION['email'];
            $sql="update khach_hang set mat_khau='$NewPass' where email='$email'";
            if($NewPass==($again_Pass)){
                    pdo_execute($sql);
                    echo "Thay đổi thành công";
            }else{
                echo "Hai thông tin phải khớp nhau";
            }
        }
    }
?>