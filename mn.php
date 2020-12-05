<?php

//身長
//$height = 1;
//体重
//$weight = 1;
require "service/calculation_mn.php";

$standard_weight = '';
$bmi = '';
$obesity_degree = '';
$difference = '';
$style_type = '';

if ( isset($_POST['height']) && isset($_POST['weight']) ) {

$height=$_POST['height'];
$weight=$_POST['weight'];

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
	<link rel="stylesheet" href="css/bootstrap.css" media="all">
	<link rel="stylesheet" href="css/mongolfont.css" media="all">
	<link rel="stylesheet" href="css/mn-style.css" media="all">
	<link rel="stylesheet" href="css/style.css" media="all">
</head>
<body>
    <!-- header start -->
     <header class="header row">
        <a href="/"><span class="bg-warning tate header-ran">日本語</span></a>
        <a href="mn.php"><span class="bg-success MongolianWhite header-fontsize tate tate_safari">ᠮᠤᠩᠭᠤᠯ</span></a>
    </header>
	<!-- header end -->
	<div class="container-fluid bg bg01">
    <div class="jumbotron tate tate_safari mn-jumbotron bg bg01">
    	<h1 class="h1 MongolianTitle rounded bg-opacity border-right border-success ">ᠡᠷᠡᠭᠦᠯ ᠴᠢᠬᠢᠷᠠᠭ  ᠤᠨ  ᠬᠡᠮᠵᠢᠭᠦᠷ</h1>
        <hr>
        <!-- <form method="post" data-toggle="validator" role="form"> -->
		<form name="myform" method="POST" class="needs-validation mn-form-top rounded border border-white" novalidate>
			<!-- height -->
			<div class="col-sm-12 form-group row">
				<div class="col-sm-5">
					<label for="height" class="MenkHarTig mn-subtitle">
						ᠲᠠᠨ  ᠤ ᠪᠡᠶ᠎ᠡ ᠶᠢᠨ ᠦᠨᠳᠤᠷ<span class="badge badge-danger MenkQimigTig">ᠡᠷᠬᠡᠪᠰᠢ</span>
					</label>
				</div>
				<div class="col-sm-1">
					<input type="number" class="form-control MenkQimedTig mn-inputwidth-edge" id="height" 
					name="height" placeholder="0" min="1" max="3"step="0.01" required>
					<span class="tani1 tani2 text-muted">m</span>
				</div>
				<small id="heightHelp" class="form-text text-muted MenkQimedTig col-sm-4">
					1~3ᠬᠤᠭᠤᠷᠤᠨᠳᠤᠬᠢ ᠲᠤᠭ᠎ᠠ ᠶᠢ ᠪᠢᠴᠢᠭᠡᠷᠡᠢ
				</small>
			</div>
			<!-- weight -->
			<div class="col-sm-12 form-group row">
				<div class="col-sm-5">
					<label for="weight" class="MenkHarTig mn-subtitle">
						ᠲᠠᠨ  ᠤ ᠪᠡᠶ᠎ᠡ ᠶᠢᠨ  ᠬᠦᠨᠳᠦ<span class="badge badge-danger MenkQimigTig">ᠡᠷᠬᠡᠪᠰᠢ</span>
					</label>
				</div>
				<div class="col-sm-1">
					<input type="number" class="form-control MenkQimedTig mn-inputwidth-edge" id="weight", 
					name="weight" placeholder="0" min="1" max="500" step="0.01" required>
					<span class="tani1 text-muted">&#13199;</span>
				</div>
				<small id="weightHelp" class="form-text text-muted MenkQimedTig col-sm-4">
					1~500ᠬᠤᠭᠤᠷᠤᠨᠳᠤᠬᠢ ᠲᠤᠭ᠎ᠠ ᠶᠢ ᠪᠢᠴᠢᠭᠡᠷᠡᠢ
				</small>
			</div>
			<!-- button-group -->
		
			
				<div class="col-sm-12">
					<button class="btn btn-primary  MongolianWhite mn-button"><span class="mn-btn-span">ᠬᠡᠮᠵᠢᠬᠦ</span></button>
				</div>

				<div class="col-sm-12"><button type="button" class="btn btn-secondary  MongolianWhite mn-button" onclick="clickReset()"><span class="mn-btn-span">ᠪᠠᠯᠠᠯᠠᠬᠤ</span></button></div>
				
				

				
		</form>

		<h1 class="h2 MongolianTitle  mn-content-top"> ᠪᠠᠢᠴᠠᠭᠠᠯᠲᠠ ᠶᠢᠨ ᠳ᠋ᠦᠩ</h1>
		<hr>

		<div class="content border border-info rounded">

		<div class="col-sm-2 form-group row mn-content-top">
			<!-- tandardWeight -->
			<div class="col-sm-6">
				<label for="tandardWeight" class=" MenkHarTig mn-subtitle"> 
					ᠪᠠᠷᠢᠮᠵᠢᠶ᠎ᠠ ᠪᠡᠶ᠎ᠡ ᠶᠢᠨ ᠬᠦᠨᠳᠦ	
				</label>
				<input type="text" class="form-control MongolianWhite mn-out"　
					name="tandard_weight" value="<?=$standard_weight?>">
					<span class="tani1 text-muted">&#13199;</span>
			</div>
			<!-- bmi -->
			<div class="col-sm-6">
				<label for="bmi" class=" MenkHarTig mn-subtitle"> BMI</label>
				<input type="text" class="form-control MongolianWhite mn-out" name="bmi" value="<?=$bmi?>">
				<span class="tani1 text-muted" style="font-size: 9px;">&#13199;&frasl;&#13217;</span>
				</div>
		</div>

		<div class="col-sm-2 form-group row mn-content-top">
			<!-- obesityDegree -->
			<div class="col-sm-6">
				<label for="obesityDegree" class="MenkHarTig mn-subtitle"> 
					ᠮᠠᠷᠢᠶ᠎ᠠ ᠶᠢᠨ ᠬᠡᠮᠵᠢᠶ᠎ᠡ
				</label>
				<input type="text" class="form-control MongolianWhite mn-out"　
				name="obesity_degree" value="<?=$obesity_degree?>">
				<span class="tani1 tani2 text-muted">&#037;</span>
			</div>
			<!-- difference -->
			<div class="col-sm-6">
				<label for="difference" class="MenkHarTig mn-subtitle"> 
				ᠪᠠᠷᠢᠮᠵᠢᠶ᠎ᠠ ᠬᠦᠨᠳᠦ  ᠶᠢᠨ ᠵᠦᠷᠢᠶ᠎ᠠ
				</label>
				<input type="text" class="form-control MongolianWhite mn-out" name="difference" value="<?=$difference?>">
				<span class="tani1 text-muted">&#13199;</span>
			</div>
		</div>
		
		<div class="col-sm-2 form-group mn-width-ie row mn-content-top">
			<!-- styleType -->
			<div class="col-sm-5">
				<label for="styleType" class="MenkHarTig mn-subtitle">
					ᠪᠡᠶ᠎ᠡ ᠭᠠᠳᠡᠷ
				</label>
			</div>
			<label for="styleType" class="col-sm-6 MenkHarTig mn-subtitle" style="color: red;"><?=$style_type?></label>
		</div>	
		<div class="col-sm-2 form-group mn-width-ie row mn-content-top">
		<!-- styleImage -->
			<div class="col-sm-5">
				<label for="styleImage" class="MenkHarTig mn-subtitle">ᠪᠠᠷᠤᠭ ᠡᠢᠮᠦ</label>
			</div>
			<div class="col-sm-1" style="padding-left:0">
				<img src="<?=$style_image?>" alt="" class="rounded border">
			</div>
		</div>
		</div><!-- /.content -->
	</div><!-- /.jumbotron -->
</div><!-- /.container-fluid -->
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