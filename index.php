<?php
require("script.php");

if(isset($_POST['submit'])) {
   if(empty($_POST['email']) || empty($_POST['subject']) || empty($_POST['message'])) {
      $response = "Все поля обязательны для заполнения";
   } elseif(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
      $response = "Пожалуйста, введите корректный email-адрес";
   } else {
      $response = sendMail($_POST['email'], $_POST['subject'], $_POST['message']);
   }
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="styles.css">
   <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
   <title>Отправка email с помощью PHPMailer и Gmail</title>
</head>
<body>
   <section class="contact-section">
      <div class="container">
         <h1 class="section-title">Свяжитесь с нами</h1>
         <p class="section-subtitle">Отправьте нам сообщение, и мы ответим в кратчайшие сроки!</p>
         <form action="" method="post" enctype="multipart/form-data" class="contact-form">
            <div class="form-group">
               <label for="email">Ваш Email</label>
               <input type="email" id="email" name="email" placeholder="Введите ваш email" required>
            </div>
            <div class="form-group">
               <label for="subject">Тема</label>
               <input type="text" id="subject" name="subject" placeholder="Тема вашего сообщения" required>
            </div>
            <div class="form-group">
               <label for="message">Сообщение</label>
               <textarea id="message" name="message" placeholder="Ваше сообщение" required></textarea>
            </div>
            <button type="submit" name="submit" class="submit-btn">Отправить</button>
            <?php if(isset($response)) { ?>
               <p class="<?php echo $response == 'success' ? 'success' : 'error'; ?>">
                  <?php echo $response == 'success' ? 'Сообщение успешно отправлено!' : $response; ?>
               </p>
            <?php } ?>
         </form>
      </div>
   </section>
</body>
</html>