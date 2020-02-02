<?php
//身長
$height = 0;
//体重
$weight = 0;
require "service/calculation_mn.php";
 
$height=$_POST['height'];
$weight=$_POST['weight'];

if ( isset($height) && isset($weight) ) {
//クラスのインスタンス化
$obj = new calculation;

//標準体重
$standard_weight = $obj->getStandardWeight($height);
//BMI
$bmi = $obj->getMbi($height, $weight);
//肥満度％
$obesity_degree = $obj->getObesityDegree($height, $weight);
//標準体重との差
$difference = $obj->getDifference($height, $weight);
//身体タイプ
$style_types = $obj->getStyleType($height, $weight);
$style_type = $style_types['style_type'];
//身体イメージ
$style_image =$style_types['style_image'];
}
?>

<!DOCTYPE html>
<html lang = “ja”>
<head>
	<meta charset = “UFT-8”>
	<title> ᠡᠷᠡᠭᠦᠯ ᠴᠢᠬᠢᠷᠠᠭ  ᠤᠨ  ᠬᠡᠮᠵᠢᠭᠦᠷ</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/mongolfont.css">
	<link rel="stylesheet" href="css/mn-style.css">
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
    <!-- header start -->
     <header class="header row">
        <a href="/"><span class="bg-warning tate header-ran">日本語</span></a>
        <a href="mn.php"><span class="bg-success MongolianWhite mn-fontsize tate tate_safari">ᠮᠤᠩᠭᠤᠯ</span></a>
    </header>
    <!-- header end -->
    <main class="main">
    	<div class="container-fluid">
    		<div class="content tate tate_safari">
    			<div class="content-header">
    				<h1 class="h1 MongolianTitle border-right border-success">
    				ᠡᠷᠡᠭᠦᠯ ᠴᠢᠬᠢᠷᠠᠭ  ᠤᠨ  ᠬᠡᠮᠵᠢᠭᠦᠷ
    				</h1><hr>
    			</div>
    			<div class="content-box">
    				    <form name="myform" method="POST" class="needs-validation" novalidate>
    				    	<!-- height -->
    				    	<div class="col-sm-12 form-group row">
    				    		<label for="height" class="col-sm-7 MenkHarTig mn-subtitle">
    				    			ᠲᠠᠨ  ᠤ ᠪᠡᠶ᠎ᠡ ᠶᠢᠨ ᠦᠨᠳᠤᠷ
    				    			<span class="badge badge-danger MenkQimigTig">ᠡᠷᠬᠡᠪᠰᠢ</span>
    				    		</label>
    				    		<div class="col-sm-1">
    				    			<input type="number" class="form-control MenkQimedTig" id="height" 
									name="height" placeholder="0" min="1" max="3"step="0.01" required>
									<span class="tani1 tani2 text-muted">m</span>
								</div>
								<small id="heightHelp" class="col-sm-3 form-text text-muted MenkQimedTig">
									1~3ᠲᠤᠭ᠎ᠠ ᠶᠢ ᠪᠢᠴᠢᠭᠡᠷᠡᠢ
								</small>
							</div>
							<div class="col-sm-12 form-group row">
								<label for="weight" class="col-sm-7 MenkHarTig mn-subtitle">
									ᠲᠠᠨ  ᠤ ᠪᠡᠶ᠎ᠡ ᠶᠢᠨ  ᠬᠦᠨᠳᠦ
									<span class="badge badge-danger MenkQimigTig">ᠡᠷᠬᠡᠪᠰᠢ</span>
								</label>
								<div class="col-sm-1">
									<input type="number" class="form-control MenkQimedTig" id="weight", 
									name="weight" placeholder="0" min="1" max="500" step="0.01" required>
									<span class="tani1 text-muted">&#13199;</span>
								</div>
								<small id="weightHelp" class="col-sm-3 form-text text-muted MenkQimedTig">
									1~500ᠲᠤᠭ᠎ᠠ ᠶᠢ ᠪᠢᠴᠢᠭᠡᠷᠡᠢ
								</small>
							</div>
							<!-- button-group -->
							<div class="col-sm-12 button-group row">
								<button class="btn btn-primary  MongolianWhite mn-button" style="margin-top:300px;"><span class="mn-btn-span">ᠬᠡᠮᠵᠢᠬᠦ</span>
								</button>
								<button type="button" class="btn btn-secondary  MongolianWhite mn-button" 
									onclick="clickReset()" style="margin-top:60px;">
									<span class="mn-btn-span">ᠪᠠᠯᠠᠯᠠᠬᠤ</span>
								</button>
							</div>
    				    </form>
    			</div>
    			dd
    		</div>
    		

    	</div>
    	
    </main>


    <footer class="footer text-center">brgd</footer>
<script type="text/javascript" src="js/jquery-3.4.1.js"></script>
<script type="text/javascript" src="js/jquery-3.3.1.slim.min.js"></script>
<script type="text/javascript" src="js/bootstrap.bundle.js"></script>
<script type="text/javascript" src="js/validator.js"></script>
<script type="text/javascript" src="js/common.js"></script>
</body>
</html>

<script>
(function() {
  'use strict';
  window.addEventListener('load', function() {
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.getElementsByClassName('needs-validation');
    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function(form) {
      form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add('was-validated');
      }, false);
    });
  }, false);
})();
</script>