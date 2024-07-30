<?php
    session_start();
    include "../../model/pdo.php";
    include "../../model/binhluan.php";
    include "../../model/taikhoan.php";
    $idpro=$_REQUEST['idpro'];

    $list_bl=loadall_bl();
    
?>
<head>
    <style>
        *{
            padding: 0;
            margin: 0;
        }
        .comment{
            width: 100%;
            margin-top: 20px;
            border: 1px solid gray;
        }
        .detail-title>h1{
            background-color: gainsboro;
            border-radius: 3px;
            line-height: 46px;
            color: rgb(92, 81, 81);
            padding-left: 15px;
            box-sizing: border-box;
        }
        
        .comment-opinion{
            width: 100%;
            margin: 5px;           
        }
        .comment-opinion>table{
            width: 100%;
        }
        
        
        .comment-opinion>table td:nth-of-type(1){
            width: 50%;
            height: 20px;
        }
        .comment-opinion>table td:nth-of-type(2){
            width: 25%;
        }
        .comment-opinion>table td:nth-of-type(3){
            width: 25%;
        }
        .form-comment{
            height: 60px;
            background-color: gainsboro;
            border-bottom-left-radius: 3px;
            border-bottom-right-radius: 3px;
            padding: 0 15px;
        }
        .notification-dn{
            height: 100%;
            display: flex;
        }
        .notification-dn>h2{
            margin: auto;
            font-size: 17px;
            color: red;
        }
        .form-comment>form{
            display: flex;
            height: 100%;
            flex-direction: row;
            justify-content: space-between;
            align-items: center;
        }
        .form-comment input:not(input[type="submit"]){
            flex: 0 0 85%;
            height: 25px;
        }
        .form-comment input[type="submit"]{
            flex: 0 0 10%;
            height: 25px;
            background-color: white;
            border: 1px solid gray;
        }
        
    </style>
</head>
<div class="comment">
        <div class="detail-title">
            <h1>Bình luận</h1>
        </div>
        <div class="comment-opinion">
            <table>
                <tr>
                    <td>Đánh giá</td>
                    <td>Người dùng</td>
                    <td>Ngày bình luận</td>
                </tr>
                <?php
                    foreach($list_bl as $bl){
                        extract($bl);
                        $user=loadtt_user($id);
                        echo "<tr>";
                        echo '<td>'.$noi_dung.'</td>';
                        echo '<td>'.$user['user'].'</td>';
                        echo '<td>'.$ngay_bl.'</td>';
                        echo "</tr>"; 
                    }
                ?>
                    
                    
            </table>
        </div>
        <div class="form-comment">
            <?php
                if(isset($_SESSION['user'])){

            ?>    
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                    <input type="hidden" name="idpro"  value="<?php echo $idpro;?>">
                    <input type="text" name="comment" id="">
                    <input type="submit" value="Gửi" name="gui">
                </form>
            <?php
                }else{
                   echo '<div class="notification-dn"><h2> Bạn cần đăng nhập để bình luận</h2></div>';        
                }
            ?>
            
        </div>
        
    </div>

<?php
    if(isset($_REQUEST['gui'])&&($_POST['comment'])!=""){
        $noi_dung=$_POST['comment'];
        $id=$_SESSION['user']['id'];
        $ma_hh=$_POST['idpro'];
        $ngay_bl=date("Y:m:d");

        insert_bl($noi_dung,$ma_hh,$id,$ngay_bl);
        header("Location: ".$_SERVER['HTTP_REFERER']);
    }

?>