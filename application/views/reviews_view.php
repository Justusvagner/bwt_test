
<div class="container">
	<hr>
	<div class="row">   
	  <div class="col-lg-3 col-md-3 col-sm-0"></div>
	  <div class="col-lg-9 col-md-9 col-sm-12">
      <p><strong>Отзывы пользователей:</strong></p></div></div>
      <hr>

<?php
foreach ($data as $d) {
	?>
	<div class="row review">   
		<div class="col-lg-3 col-md-3 col-sm-0"></div>
		<div class="col-lg-9 col-md-9 col-sm-12">
		<?php

		echo "<strong> $d[review_author] </strong> <br>";
		echo "$d[review_body] <br><hr>";
		echo "</div></div>";
}

?>	
</div>