<div class="container">
	<hr>
	<div class="row">   
	  <div class="col-lg-2 col-md-2 col-sm-0"></div>
	  <div class="col-lg-10 col-md-10 col-sm-12">
      <p><strong>Оставьте отзыв о моём сайте:</strong></p></div></div>
      <hr>
    
    <form action="thankyou">
    <div class="row">     
    	<div class="col-lg-2 col-md-2 col-sm-0"></div>
      <div class="col-lg-5 col-md-5 col-sm-6"> <p>Имя:</p> </div>        
      <div class="col-lg-5 col-md-5 col-sm-6"> <input type="text" name="fb[name]" placeholder=" <?php if(isset($_GET['name'])) echo "$_GET[name]"?> "> </div> 
    </div>
    <hr>
    
    <div class="row">     
      <div class="col-lg-2 col-md-2 col-sm-0"></div>
      <div class="col-lg-5 col-md-5 col-sm-6"> <p>Email:</p> </div>        
      <div class="col-lg-5 col-md-5 col-sm-6"> <input type="text" name="fb[email]" placeholder=" <?php if(isset($_GET['email'])) echo "$_GET[email]"?> "> </div> 
    </div>
    <hr>

    <div class="row">     
      <div class="col-lg-2 col-md-2 col-sm-0"></div>
      <div class="col-lg-5 col-md-5 col-sm-6"> <p>Отзыв:</p> </div>        
      <div class="col-lg-5 col-md-5 col-sm-6"> <textarea rows="5" cols="30" name="fb[feedback]"></textarea> </div> 
    </div>
    <hr>

    <div class="row">     
      <div class="col-lg-2 col-md-2 col-sm-0"></div>
      <div class="col-lg-5 col-md-5 col-sm-6"></div>
      <div class="col-lg-5 col-md-5 col-sm-6"> <input type="submit" name="doSubmit" value="Отправить!" > </div> 
    </div>


    </form>