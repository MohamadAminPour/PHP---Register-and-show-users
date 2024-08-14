<?php
  include "./database/POD-Connection.php";
  $error = "";
  $successERR="";

  if(isset($_POST['sub'])){
    $statement = $conn->prepare("SELECT * FROM users WHERE email=?");
    $statement->execute([$_POST['email']]);
    $user = $statement->fetch();
    if(!$user){
      if($_POST['password'] === $_POST['confrim']){
        if(strlen($_POST['password']) >= 4){
          $username=$_POST['username'];
          $email=$_POST['email'];
          $phone=$_POST['phone'];
          $password=$_POST['password'];
          $confrim=$_POST['confrim'];
        
          $result = $conn->prepare("INSERT INTO users SET username=?, email=?, phone=?, password=?");
          $result->bindValue(1, $username);
          $result->bindValue(2, $email);
          $result->bindValue(3, $phone);
          $result->bindValue(4, $password);
          $result->execute();

          $successERR="ثبت نام با موفقیت انجام شد";
          $error="";
        }
        else{
          $error="رمز عبور باید حدقل 4 رقم باشد";
        }
      }
      else{
        $error="رمز عبور با تکرار آن مطابقت ندارد";
      }
    }
    else{
      $error="ایمیل قبلا استفاده شده است";
    }
  }

?>


<!DOCTYPE html>
<html lang="en" dir="rtl">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="./style.css" />
    <title>Register</title>
  </head>
  <body>
  
    <div class="errorContainer">
      <span class="validation-msgF"><?php echo $error; ?></span>
      <span class="validation-msgT"><?php echo $successERR; ?></span>
    </div>

    <div class="validation">
      <div class="signUp">
        <form action="" method="POST">
          <p class="signUp-form__title title">عضویت</p>
          <p class="signUp-form__subtitle subtitle">
            قبلا ثبت نام کرده اید ؟ <a href="">ورود</a>
          </p>

          <div class="input-signUp form-signUp__username">
            <input type="text" name="username" placeholder="نام کاربری" />
            <i class="bx bx-user" style="color: #919191"></i>
          </div>
          <div class="input-signUp form-signUp__email">
            <input type="text" name="email" placeholder="ایمیل" />
            <i class="bx bx-envelope" style="color: #919191"></i>
          </div>
          <div class="input-signUp form-signUp__phoneNumber">
            <input type="text" name="phone" placeholder="شماره تلفن" />
            <i class="bx bx-phone" style="color: #919191"></i>
          </div>
          <div class="input-signUp form-signUp__password">
            <input type="password" name="password" placeholder="رمز عبور" />
            <i class="bx bx-lock-alt" style="color: #919191"></i>
          </div>
          <div class="input-signUp form-signUp__confPassword">
            <input
              type="password"
              name="confrim"
              placeholder="تکرار رمز عبور"
            />
            <i class="bx bx-shield" style="color: #919191"></i>
          </div>
          <button class="signUpBtn" type="submit" name="sub">ثبت نام</button>
        </form>
      </div>
      <div class="signIn"></div>
    </div>

    <script src="./script.js"></script>
  </body>
</html>
