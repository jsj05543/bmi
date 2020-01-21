<?php
//身長
$height = 0;
//体重
$weight = 0;
require "service/calculation_mn.php";
if (isset($_POST[weight]) && isset($_POST[height])) {
    $height1 = $_POST[height];
    $weight1 = $_POST[weight];
}
//クラスのインスタンス化
$obj = new calculation;

//標準体重
$standard_weight = $obj->getStandardWeight($height1);
//BMI
$bmi = $obj->getMbi($height1, $weight1);
//肥満度％
$obesity_degree = $obj->getObesityDegree($height1, $weight1);
//標準体重との差
$difference = $obj->getDifference($height1, $weight1);
//身体タイプ
$style_types = $obj->getStyleType($height1, $weight1);
$style_type = $style_types['style_type'];
//身体イメージ
$style_image =$style_types['style_image'];
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
	<header class=" header row text-center">
	 		<div class="col-sm-10"></div>
			<div class="col-sm-1 tate">
             	<a href="/">日本語</a>
         	</div>
         	<div class=" col-sm-1 MongolianWhite tate">
            	<a href="mn.php">ᠮᠤᠩᠭᠤᠯ</a>
            </div>
	</header>
	<!-- header end -->
	<!-- main start -->
	<main class="main">
			<!-- cart start -->
			<div class="card tate mn-card">
				<div class="card-header MongolianTitle mn-title">ᠡᠷᠡᠭᠦᠯ ᠴᠢᠬᠢᠷᠠᠭ  ᠤᠨ  ᠬᠡᠮᠵᠢᠭᠦᠷ</div>
				<!-- cart body1 start -->
				<div class="card-body bg01 bg">
					<!-- form start -->
					<!-- <form method="post" data-toggle="validator" role="form"> -->
					<form name="myform" method="POST" class="needs-validation" novalidate>
						<!-- height -->
						<div class="col-sm-12 form-group row">
							<div class="col-sm-5">
								<label for="height" class="MenkHarTig mn-subtitle"> ᠲᠠᠨ  ᠤ ᠪᠡᠶ᠎ᠡ ᠶᠢᠨ ᠦᠨᠳᠤᠷ
									<span class="badge badge-danger MenkQimigTig">ᠡᠷᠬᠡᠪᠰᠢ</span>
								</label>
							</div>
							<div class="col-sm-1 leftclear">
								<input type="number" class="form-control MenkQimedTig mn-input" id="height" 
								name="height" placeholder="0" min="1" max="500"step="0.01" required>
								<span class="tani1 tani2 text-muted">m</span>
							</div>
							<small id="heightHelp" class="form-text text-muted MenkQimedTig col-sm-3">
								1~3ᠬᠤᠭᠤᠷᠤᠨᠳᠤᠬᠢ ᠲᠤᠭ᠎ᠠ ᠶᠢ ᠪᠢᠴᠢᠭᠡᠷᠡᠢ
							</small>
						</div>
						<!-- weight -->
						<div class="col-sm-12 form-group row">
							<div class="col-sm-5">
								<label for="weight" class="MenkHarTig mn-subtitle">ᠲᠠᠨ  ᠤ ᠪᠡᠶ᠎ᠡ ᠶᠢᠨ  ᠬᠦᠨᠳᠦ
									<span class="badge badge-danger MenkQimigTig">ᠡᠷᠬᠡᠪᠰᠢ</span>
								</label>
							</div>
							<div class="col-sm-1 leftclear">
								<input type="number" class="form-control MenkQimedTig mn-input" id="weight", 
								name="weight" placeholder="0" min="1" max="500" step="0.01" required>
								<span class="tani1 text-muted">&#13199;</span>
							</div>
							<small id="weightHelp" class="form-text text-muted MenkQimedTig col-sm-3">
								1~500ᠬᠤᠭᠤᠷᠤᠨᠳᠤᠬᠢ ᠲᠤᠭ᠎ᠠ ᠶᠢ ᠪᠢᠴᠢᠭᠡᠷᠡᠢ
							</small>
						</div>
						<!-- button-group -->
						<div class="col-sm-12 button-group row">
							<div class="col-sm-6"></div>
							<div class="col-sm-3">
								<button class="btn btn-primary  MongolianWhite mn-button"><span class="mn-btn-span">ᠬᠡᠮᠵᠢᠬᠦ</span></button>
							</div>
							<div class="col-sm-3">
								<button type="button" class="btn btn-secondary  MongolianWhite mn-button" onclick="clickReset()">
									<span class="mn-btn-span">ᠪᠠᠯᠠᠯᠠᠬᠤ</span>
								</button>
							</div>
						</div>
					</form>
					<!-- form end -->
				</div>
				<!-- cart body1 end -->
				<!-- cart body2 start -->
				<div class="card-body border-left bg01 bg">
						<div class="col-sm-12 form-group mn-width-ie row">
							<div class="col-sm-5 text-right">
								<label for="tandardWeight" class="MenkHarTig mn-subtitle"> 
									ᠪᠠᠷᠢᠮᠵᠢᠶ᠎ᠠ ᠪᠡᠶ᠎ᠡ ᠶᠢᠨ ᠬᠦᠨᠳᠦ	
								</label>
							</div>
							<div class="col-sm-1 leftclear">
								<input type="text" class="form-control MongolianWhite mn-out"　
								name="tandard_weight" value="<?=$standard_weight?>">
								<span class="tani1 text-muted">&#13199;</span>
							</div>
						</div>
						<div class="col-sm-12 form-group mn-width-ie row">
							<div class="col-sm-5 text-right">
								<label for="bmi" class="MenkHarTig mn-subtitle"> 
									BMI
								</label>
							</div>
							<div class="col-sm-1 leftclear">
								<input type="text" class="form-control MongolianWhite mn-out"　
								name="bmi" value="<?=$bmi?>">
								<span class="tani1 text-muted" style="font-size: 9px;">&#13199;&frasl;&#13217;</span>
							</div>
						</div>
						<div class="col-sm-12 form-group mn-width-ie row">
							<div class="col-sm-5 text-right">
								<label for="obesityDegree" class="MenkHarTig mn-subtitle"> 
									ᠮᠠᠷᠢᠶ᠎ᠠ ᠶᠢᠨ ᠬᠡᠮᠵᠢᠶ᠎ᠡ
								</label>
							</div>
							<div class="col-sm-1 leftclear">
								<input type="text" class="form-control MongolianWhite mn-out"　
								name="obesity_degree" value="<?=$obesity_degree?>">
								<span class="tani1 tani2 text-muted">&#037;</span>
							</div>
						</div>
						<div class="col-sm-12 form-group mn-width-ie row">
							<div class="col-sm-5 text-right">
								<label for="difference" class="MenkHarTig mn-subtitle"> 
									ᠪᠠᠷᠢᠮᠵᠢᠶ᠎ᠠ ᠬᠦᠨᠳᠦ  ᠶᠢᠨ ᠵᠦᠷᠢᠶ᠎ᠠ
								</label>
							</div>
							<div class="col-sm-1 leftclear">
								<input type="text" class="form-control MongolianWhite mn-out"　
								name="difference" value="<?=$difference?>">
								<span class="tani1 text-muted">&#13199;</span>
							</div>
						</div>
						<div class="col-sm-6 form-group mn-width-ie row">
							<div class="col-sm-5 text-right">
								<label for="styleType" class="MenkHarTig mn-subtitle">
									ᠪᠡᠶ᠎ᠡ ᠭᠠᠳᠡᠷ
								</label>
							</div>
							<div class="col-sm-6">
								<label for="styleType" class="MenkHarTig mn-subtitle border"><?=$style_type?></label>
							</div>
						</div>
						<div class="col-sm-12 form-group mn-width-ie row">
							<div class="col-sm-5 text-right">
								<label for="styleImage" class="MenkHarTig mn-subtitle">ᠪᠠᠷᠤᠭ ᠡᠢᠮᠦ</label>
							</div>
							<div class="col-sm-1" style="padding-left:0">
								<img src="<?=$style_image?>" alt="" class="rounded border">
							</div>
						</div>
				</div>
				<!-- cart body2 end -->
			</div>
			<!-- cart end -->
	</main>	
	<!-- main end -->
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