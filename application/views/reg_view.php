<div class="container">
  <hr>
  <form action="/" method="get">
  <div class="row">   
    <div class="col-lg-2 col-md-2 col-sm-0"></div>
    <div class="col-lg-10 col-md-10 col-sm-12">
      <p><strong>Введите личные данные:</strong></p></div></div>
      <hr>
    
    <div class="row">     
      <div class="col-lg-2 col-md-2 col-sm-0"></div>
      <div class="col-lg-5 col-md-5 col-sm-6"> <p>Имя:</p> </div>        
      <div class="col-lg-5 col-md-5 col-sm-6"> <input type="text" name="name" placeholder=" <?php if(isset($_GET['name'])) echo "$_GET[name]"?> "> </div> 
    </div>
    <hr>
    
    <div class="row">     
      <div class="col-lg-2 col-md-2 col-sm-0"></div>
      <div class="col-lg-5 col-md-5 col-sm-6"> <p>Фамилия:</p> </div>        
      <div class="col-lg-5 col-md-5 col-sm-6"> <input type="text" name="surname" placeholder=" <?php if(isset($_GET['surname'])) echo "$_GET[surname]"?> "> </div> 
    </div>
    <hr>
    
    <div class="row">     
      <div class="col-lg-2 col-md-2 col-sm-0"></div>
      <div class="col-lg-5 col-md-5 col-sm-6"> <p>Email:</p> </div>        
      <div class="col-lg-5 col-md-5 col-sm-6"> <input type="email" name="email" placeholder=" <?php if(isset($_GET['email'])) echo "$_GET[email]"?> "> </div> 
    </div>
    <hr>

    <div class="row">     
      <div class="col-lg-2 col-md-2 col-sm-0"></div>
      <div class="col-lg-5 col-md-5 col-sm-6"> <p>Пароль:</p> </div>        
      <div class="col-lg-5 col-md-5 col-sm-6"> <input type="password" name="password"> </div> 
    </div>
    <hr>

    <div class="row">     
      <div class="col-lg-2 col-md-2 col-sm-0"></div>
      <div class="col-lg-5 col-md-5 col-sm-6"> <p>Пол:</p> </div>
      <div class="col-lg-5 col-md-5 col-sm-6"> <input type="radio" name="gender" value="male"> Мужской <input type="radio" name="gender" value="female"> Женский </div> 
    </div>
    <hr>

    <div class="row">     
      <div class="col-lg-2 col-md-2 col-sm-0"></div>
      <div class="col-lg-5 col-md-5 col-sm-6"> <p>Дата рождения:</p> </div>
      <div class="col-lg-5 col-md-5 col-sm-6"> <input type="text" name="birthday" placeholder=" <?php if(isset($_GET['birthday'])) echo "$_GET[birthday]"?> "> </div> 
  </div>
  <hr>

  <div class="row">     
      <div class="col-lg-2 col-md-2 col-sm-0"></div>
      <div class="col-lg-5 col-md-5 col-sm-6"></div>
      <div class="col-lg-5 col-md-5 col-sm-6"> <input type="submit" name="doSubmit" value="Отправить!" > </div> 
  </div>
</form>

  <hr>
</div>