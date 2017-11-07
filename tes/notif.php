<?php


include "email/class.phpmailer.php";

$message = '
    <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>


<body style="font-family:Verdana, Geneva, sans-serif;font-size:12px;">
<table width="100%" cellspacing="0" cellpadding="0" align="center" style="padding:20px;border:dashed 1px #333;"><tr><td>
Sistem Telah Menerima Pemesanan Dari input user dengan data sebagai berikut :    <br><br>
        <div style="float:left; width:150px; margin-bottom:5px;">Nama</div>
        <div style="float:left;"><strong>'.$nama.'</strong></div>
        <div style="clear:both"></div>
        <div style="float:left; width:150px; margin-bottom:5px;">Alamat</div>
        <div style="float:left;"><strong>'.$alamat.'</strong></div>
        <div style="clear:both"></div>
        <div style="float:left; width:150px; margin-bottom:5px;">Telpon</div>
        <div style="float:left;"><strong>'.$telepon.'</strong></div>
        <div style="clear:both"></div>
 <td><tr></table>
</body>
</html>';


   
$mail = new PHPMailer;
$mail->IsSMTP();
$mail->SMTPSecure = 'ssl';
$mail->Host = "smtp.gmail.com"; //host masing2 provider email
$mail->SMTPDebug = 2;
$mail->Port = 465;
$mail->SMTPAuth = true;
$mail->Username = "blogiouss@gmail.com"; //user email yang sebelumnya anda buat
$mail->Password = "minang2009"; //password email yang sebelumnya anda buat
$mail->SetFrom("blogiouss@gmail.com","aliasemail@namadomain.com"); //set email pengirim
$mail->Subject = "Judul Email Anda"; //subyek email
$mail->AddAddress("dafidxxx@gmail.com","dafidxxx@gmail");  //tujuan email
$mail->MsgHTML($message);
if($mail->Send()){


 echo "<script>window.alert('tulis notifikasi / pesan anda disini !');
    window.location=('url halaman tujuan jika berhasil')</script>";


}else {
	echo "Tulis peringatan disini bila gagal pengiriman";


}


?>
