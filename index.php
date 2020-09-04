<?php
    $result = "";
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    require 'vendor/autoload.php';
    
    if(isset($_POST['submit'])){
        $mail = new PHPMailer(true);
        try{
          $mail->isSMTP();
          // $mail->SMTPDebug = 4;
          $mail->Host = 'smtp.gmail.com';
          $mail->Port = 587;
          $mail->SMTPAuth = true;
          $mail->SMTPSecure = 'tls';
          $mail->Username = 'nasa.nase72@gmail.com';
          $mail->Password = 'Jasamnikola1';
  
          $mail->setFrom($_POST['email'], 'Paki');
          $mail->addAddress('nasa.nase72@gmail.com');
          $mail->addReplyTo('no-reply@gmail.com', 'No reply');
  
          $mail->isHTML(true);
          $mail->Subject = 'You got mail';
          $mail->Body = '<p>Name: <h3>'.$_POST['name'].'</h3>Email: <h3>'.$_POST['email'].'</h3>Message: <h3>'.$_POST['message'].'</h3></p>';
  
          $mail->send();
          $result =  'Message Successfully Sent.';
        }
        catch(Exception $e){
          $result = $mail->ErrorInfo;
        }
        exit();
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Contact Us Using PHPMailer & Gmail SMTP</title>
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css' />
</head>

<body class="bg-info">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-6 mt-3">
        <div class="card border-danger shadow">
          <div class="card-header bg-danger text-light">
            <h3 class="card-title">Contact Us</h3>
          </div>
          <div class="card-body px-4">
            <form action="#" method="POST">
              <div class="form-group">
                <?php echo $result; ?>
              </div>
              <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" class="form-control" placeholder="Enter Name" required>
              </div>
              <div class="form-group">
                <label for="email">E-Mail</label>
                <input type="email" name="email" id="email" class="form-control" placeholder="Enter E-Mail" required>
              </div>
              <div class="form-group">
                <label for="subject">Subject</label>
                <input type="text" name="subject" id="subject" class="form-control" placeholder="Enter Subject"
                  required>
              </div>
              <div class="form-group">
                <label for="message">Message</label>
                <textarea name="message" id="message" rows="5" class="form-control" placeholder="Write Your Message"
                  required></textarea>
              </div>
              <div class="form-group">
                <input type="submit" name="submit" value="Send" class="btn btn-danger btn-block" id="sendBtn">
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

</html>