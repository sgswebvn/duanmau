
<?php
    function loadall_tk(){
        $sql="select * from khach_hang where 1";
        $list=pdo_query($sql);
        return $list;
    }
    function goimail($nguoigui,$tennguoigui,$to){ 
        require "PHPMailer-master/src/PHPMailer.php";  //nhúng thư viện vào để dùng, sửa lại đường dẫn cho đúng nếu bạn lưu vào chỗ khác
        require "PHPMailer-master/src/SMTP.php"; //nhúng thư viện vào để dùng
        require 'PHPMailer-master/src/Exception.php'; //nhúng thư viện vào để dùng
        $mail = new PHPMailer\PHPMailer\PHPMailer(true);  //true: enables exceptions
          try {
              $mail->SMTPDebug = 0;  // 0,1,2: chế độ debug. khi mọi cấu hình đều tớt thì chỉnh lại 0 nhé
              $mail->isSMTP();  
              $mail->CharSet  = "utf-8";
              $mail->Host = 'smtp.gmail.com';  //SMTP servers
              $mail->SMTPAuth = true; // Enable authentication
            $nguoigui = 'trandangkhoa19022004@gmail.com';
          $matkhau = 'vcuznrihexkmrtst';
          $tennguoigui = 'Admin';
              $mail->Username = $nguoigui; // SMTP username
              $mail->Password = $matkhau;   // SMTP password
              $mail->SMTPSecure = 'tls';  // encryption TLS/SSL 
              $mail->Port = 587;  // port to connect to                
              $mail->setFrom($nguoigui, $tennguoigui ); 
            //   $to = "nhập email của người nhận";
              $to_name = "Người dùng";
              
              $mail->addAddress($to, $to_name); //mail và tên người nhận  
              $mail->isHTML(true);  // Set email format to HTML
              $mail->Subject = 'Gửi thư từ php';      
              $noidungthu = "http://localhost/DUANMAU/user/thaydoimk.php" ;
              $mail->Body = $noidungthu;
              $mail->smtpConnect( array(
                  "ssl" => array(
                      "verify_peer" => false,
                      "verify_peer_name" => false,
                      "allow_self_signed" => true
                  )
              ));
              $mail->send();
              echo 'Đã gửi mail xong';
          } catch (Exception $e) {
              echo 'Mail không gửi được. Lỗi: ', $mail->ErrorInfo;
          }
}
    function insert_user($user,$email,$mat_khau,$confirm){
        if($confirm==$mat_khau){
            $sql="select * from khach_hang where user='$user'";
            $sl=pdo_query_row($sql);
            if($sl==0){
                $sql="insert into khach_hang(user,email,mat_khau) values('$user','$email','$mat_khau')";
                pdo_execute($sql);
                $tb="Đăng kí thành công";
            }else{
                $tb="Tài khoản đã tồn tại";
            }
        }else{
            $tb="mật khẩu ko khớp";
        }
        return $tb;
    }
    function check_email_guive($email){
        $sql="select * from khach_hang where email='$email'";
        $sl=pdo_query_row($sql);
        return $sl;
    }
    function check_user($user,$mat_khau){
        $sql="select * from khach_hang where user='$user' and mat_khau='$mat_khau'";
        $arr=pdo_query_one($sql);
        return $arr;
    }
    function update_mk($id,$mat_khau_moi){
        
            $sql="update khach_hang set mat_khau='$mat_khau_moi' where id='$id'";
            pdo_execute($sql);
    }
    
    function check_doimk($id,$mat_khau){
        $sql="select * from khach_hang where mat_khau='$mat_khau' and id='$id'";
        $sl=pdo_query_row($sql);
        return $sl;
    }
    function loadtt_user($id){
        $sql="select * from khach_hang where id='$id'";
        $arr=pdo_query_one($sql);
        return $arr;
    }
    function update_user($id,$ho_ten,$email,$hinh,$dia_chi,$sdt){
        if($hinh!=""){
            $sql="update khach_hang set ho_ten='$ho_ten',email='$email',hinh='$hinh',dia_chi='$dia_chi',sdt='$sdt' where id='$id'";
        }elseif($hinh==""){
            $sql="update khach_hang set ho_ten='$ho_ten',email='$email',dia_chi='$dia_chi',sdt='$sdt' where id='$id'";
        }
        pdo_execute($sql);
    }
    function update_vaitro($id,$vai_tro,$kich_hoat){
        $sql="update khach_hang set vai_tro='$vai_tro',kich_hoat='$kich_hoat' where id='$id'";
        pdo_execute($sql);
    }
?>