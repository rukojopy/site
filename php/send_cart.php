<?php
if (isset ($_POST['cartFF'])) {
  $to = "ieeemetod@gmail.com";
  $from = "info@legoshop.com";
  $subject = "Заповнена контактна форма на сайті ".$_SERVER['HTTP_REFERER'];
  $message = "Ім'я користувача: ".$_POST['nameFF']."\nКошик користувача(id товарів): ".$_POST['cartFF']."\nТелефон користувача ".$_POST['telFF']."\Повідомлення: ".$_POST['projectFF']."\n\nАдреса сайта: ".$_SERVER['HTTP_REFERER'];
 
  $boundary = md5(date('r', time()));
  $filesize = '';
  $headers = "MIME-Version: 1.0\r\n";
  $headers .= "From: " . $from . "\r\n";
  $headers .= "Reply-To: " . $from . "\r\n";
  $headers .= "Content-Type: multipart/mixed; boundary=\"$boundary\"\r\n";
  $message="
Content-Type: multipart/mixed; boundary=\"$boundary\"
 
--$boundary
Content-Type: text/plain; charset=\"utf-8\"
Content-Transfer-Encoding: 7bit
 
$message";
     if(is_uploaded_file($_FILES['fileFF']['tmp_name'])) {
         $attachment = chunk_split(base64_encode(file_get_contents($_FILES['fileFF']['tmp_name'])));
         $filename = $_FILES['fileFF']['name'];
         $filetype = $_FILES['fileFF']['type'];
         $filesize = $_FILES['fileFF']['size'];
         $message.="
 
--$boundary
Content-Type: \"$filetype\"; name=\"$filename\"
Content-Transfer-Encoding: base64
Content-Disposition: attachment; filename=\"$filename\"
 
$attachment";
     }
   $message.="
--$boundary--";
 
  if ($filesize < 10000000) { // перевірка на загальний розмір всіх файлів. Деякі поштові сервіси не приймають вкладення більше 10 МБ
    mail($to, $subject, $message, $headers);
    echo $_POST['nameFF'].', Ваше повідомлення надіслано, спасибі!';
  } else {
    echo 'Вибачте, лист не відправлено. Розмір всіх файлів перевищує 10 МБ.';
  }
}
?>
