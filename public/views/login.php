<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <title>Student Dashboard</title>
  </head>
  <body>
    <div class="container">
      <div class="logo">
        <!-- <img src="" alt="Logo" /> -->
      </div>
      <div class="login-container">
        <form action="login" method="POST" class="login-form">
          <div class="messages">
            <?php 
              if(isset($messages)){
                foreach($messages as $message){
                  echo $message;
                }
              }
            ?>
          </div>
          <input name="email" type="text" placeholder="email.@email.com" class="login-input"/>
          <input name="password" type="password" placeholder="password" class="login-input"/>
          <button type=submit class="login-btn">LOGIN</button>
        </form>
      </div>
  </div>
  </body>
</html>
