<?php
include('../../connection.php');

if (isset($_GET['id'])) {
  $id = $_GET['id'];
  $sql = "select * from tabel_chat where id=" . $id;
  $result = mysqli_query($kon, $sql);
  if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
  } else {
    $errorMsg = 'Tidak ada Pesan';
  }
}
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>Balas pesan</title>
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.css">
</head>

<body>

  <nav class="navbar navbar-expand-md navbar-light" style="background-color: #d669a5;">
    <div class="container">
      <a class="navbar-brand" href="message.php">Massage</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto"></ul>
        <ul class="navbar-nav ml-auto">
          <li class="nav-item"><a class="btn btn-outline-danger" href="index.php"><i class="fa fa-sign-out-alt"></i></a></li>
        </ul>
      </div>
    </div>
  </nav>

  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <div class="card">
          <div class="card-header">
            Balas Pesan
          </div>
          <div class="card-body">
            <form class="" action="" method="post" enctype="multipart/form-data">
              <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" name="name" placeholder="Enter Name" readonly value="<?php echo $row['name']; ?>">
              </div>
              <div class="form-group">
                <label for="contact">Phone</label>
                <input type="text" class="form-control" name="contact" placeholder="Enter Mobile Number" readonly value="<?php echo $row['contact']; ?>">
              </div>
              <div class="form-group">
                <label for="email">E-Mail</label>
                <input type="email" class="form-control" name="email" placeholder="Enter Email" readonly value="<?php echo $row['email']; ?>">
              </div>
              <div class="form-group">
                <label for="chat">Pesan</label>
                <input type="text" class="form-control" name="chat" placeholder="Enter Email" readonly value="<?php echo $row['chat']; ?>">
              </div>
              <div class="form-group">
                <label for="reply">Balas Pesan</label>
                <input type="text" class="form-control" name="reply" placeholder="Tulis Balasan" value="">
              </div>
              <div class="form-group">
                <button type="submit" name="Submit" class="btn btn-primary waves">Kirim</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="js/bootstrap.min.js" charset="utf-8"></script>
  <script src="https://code.jquery.com/jquery-3.3.1.min.js" charset="utf-8"></script>
</body>

</html>





<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if (isset($_POST['Submit'])) {




  /**
   * This example shows settings to use when sending via Google's Gmail servers.
   */

  //SMTP needs accurate times, and the PHP time zone MUST be set
  //This should be done in your php.ini, but this is how to do it if you don't have access to that
  date_default_timezone_set('Etc/UTC');

  //require 'vendor/Autoload.php';



  require 'PHPMailer/src/Exception.php';
  require 'PHPMailer/src/PHPMailer.php';
  require 'PHPMailer/src/SMTP.php';

  //Create a new PHPMailer instance
  $mail = new PHPMailer;

  //Tell PHPMailer to use SMTP
  $mail->isSMTP();

  //Enable SMTP debugging
  // 0 = off (for production use)
  // 1 = client messages
  // 2 = client and server messages
  //$mail->SMTPDebug = 2;

  //Ask for HTML-friendly debug output
  $mail->Debugoutput = 'html';

  //Set the hostname of the mail server
  $mail->Host = 'smtp.gmail.com';
  // use
  // $mail->Host = gethostbyname('smtp.gmail.com');
  // if your network does not support SMTP over IPv6

  //Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
  $mail->Port = 587;

  //Set the encryption system to use - ssl (deprecated) or tls
  $mail->SMTPSecure = 'tls';

  //Whether to use SMTP authentication
  $mail->SMTPAuth = true;

  //Username to use for SMTP authentication - use full email address for gmail
  $mail->Username = "GIsender.2021@gmail.com";

  //Password to use for SMTP authentication
  $mail->Password = "GI123456";

  //Set who the message is to be sent from
  $mail->setFrom('gi.sender.2021@gmail.com', 'Globalindo Intimates');

  //Set who the message is to be sent to
  $mail->addAddress($row['email'], $row['name']);

  //Set the subject line
  $mail->Subject = "Terima kasih telah menghubungi kami " . $row['name'];

  //Read an HTML message body from an external file, convert referenced images to embedded,
  //convert HTML into a basic plain-text alternative body
  //$mail->msgHTML(file_get_contents('tunjukan'));
  //$mail->addStringAttachment($attch,"TIKET_BERTAMU.pdf");

  //Replace the plain text body with one created manually
  $mail->Body = stripslashes($_POST['reply']);


  //send the message, check for errors
  if (!$mail->send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
  } else {
    //echo "Message sent!";

    $reply = $_POST['reply'];
    

    if (!isset($errorMsg)) {

      $sql = "update tabel_chat
            set reply = '" . $reply . "'
            where id=" . $id;
      $result = mysqli_query($kon, $sql);
      if ($result) {
        $successMsg = 'Pesan Terbalas';
        header('Location:message.php');
      } else {
        $errorMsg = 'Error ' . mysqli_error($kon);
      }
    }
  }
}

?>