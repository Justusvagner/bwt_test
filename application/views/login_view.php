<div class="container">
  <hr>
  <form method="POST">
  <div class="row">   
    <div class="col-lg-3 col-md-3 col-sm-0"></div>
    <div class="col-lg-9 col-md-9 col-sm-12">
      <p><strong>Введите данные для входа:</strong></p>
      
      
      <?php 

      if(isset($_POST['submit']))
      {
        if (isset($data))
        {
          echo "<b>Произошли следующие ошибки:</b><br>";
          print_r($data);
        }
        else 
        {
          echo "Добро пожаловать!";
        }
      }

      ?>

      </div></div>
      <hr>


    <div class="row">     
      <div class="col-lg-3 col-md-3 col-sm-0"></div>
      <div class="col-lg-4 col-md-4 col-sm-6"> <p>Email:</p> </div>        
      <div class="col-lg-5 col-md-5 col-sm-6"> <input type="email" name="email" placeholder=" <?php if(isset($_GET['email'])) echo '$_GET[email]'?> " required> </div> 
    </div>
    <hr>

    <div class="row">     
      <div class="col-lg-3 col-md-3 col-sm-0"></div>
      <div class="col-lg-4 col-md-4 col-sm-6"> <p>Пароль:</p> </div>        
      <div class="col-lg-5 col-md-5 col-sm-6"> <input type="password" name="password" required> </div> 
    </div>
    <hr>

  <div class="row">     
      <div class="col-lg-3 col-md-3 col-sm-0"></div>
      <div class="col-lg-4 col-md-4 col-sm-6"></div>
      <div class="col-lg-5 col-md-5 col-sm-6"> <input type="submit" name="submit" value="Отправить!" > </div> 
  </div>
</form>

  <hr>
</div>