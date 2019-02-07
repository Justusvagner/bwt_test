<div class="container">
  <hr>
  <div class="row">   
    <div class="col-lg-3 col-md-3 col-sm-0"></div>
    <div class="col-lg-9 col-md-9 col-sm-12">
      <h2><strong>Погода на сегодня:</strong></h2>
     
      <h1><?php echo $data['atemp']; ?></h1><br>
      <p><b><?php echo $data['wtr']; ?></b></p> 
      <p>Скорость ветра: <b><?php echo strip_tags($data['wnd']); ?></b></p>
      <p>Атмосферное давление: <b><?php echo strip_tags($data['prs']); ?></b></p>
      <p>Воздух: <b><?php echo strip_tags($data['hum']); ?></b></p>
      <p><b><?php echo strip_tags($data['wtemp']); ?></b></p>

    </div>
    </div>
    </div>