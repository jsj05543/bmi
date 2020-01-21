<?php
//身長
$height = 0;
//体重
$weight = 0;
require "service/calculation.php";
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
	<title>健康測定システム</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/mongolfont.css">
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/bmi-style.css">

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
		<!-- container start -->
		<div class="container">
			<!-- card start -->
			<div class="card">
				<div class="card-header">健康測定システム</div>
				<!-- cart body1 start -->
				<div class="card-body bg04">
					<!-- form start -->
					<form name="myform"  data-toggle="validator" role="form">
						<div class="form-group row has-feedback">
							<label for="height" class="col-sm-3 col-form-label text-right">
								あなたの身長は:<span class="badge badge-danger">必須</span>
							</label>
							<div class="col-sm-4">
								<div class="input-group">
									<input type="number" class="form-control" step="0.01" min="1" max="3" 
								style="width:80%" id="height" name="height" placeholder="身長" required>
									<div class="input-group-append">
								  		<span class="input-group-text" id="text1b">m</span>
								  	</div>
								</div>
								<small id="heightHelp" class="form-text text-muted">1~3の数字で入力してください.</small>
							</div>
						</div>
						<div class="form-group row">
							<label for="weight" class="col-sm-3 col-form-label text-right">
								あなたの体重は:<span class="badge badge-danger">必須</span>
							</label>
							<div class="col-sm-4">
								<div class="input-group">
									<input type="number" class="form-control" step="0.01" min="1" max="500" 
								style="width:80%" id="weight", name="weight" placeholder="体重"	required>
									<div class="input-group-append">
										<span class="input-group-text" id="text1b">&#13199;</span>
									</div>
								</div>
								<small id="weightHelp" class="form-text text-muted">1~500の数字で入力してください.
								</small>
							</div>
						</div>
						<div class="form-group row">
							<label for="submit" class="col-sm-3 col-form-label"></label>
							<div class="col-sm-7">
								<button class="btn btn-primary">測定する</button>
								<button type="button" class="btn btn-secondary" onclick="clickReset()">リセット</button>
							</div>
						</div>
					</form>
					<!-- form end -->
				</div>
				<!-- cart body1 end -->
				<hr class="my-8">
				<!-- cart body2 start -->
				<div class="card-body bg04">
						<div class="form-group row">
							<label for="height" class="col-sm-3 col-form-label text-right">あなたの標準体重:</label>
							<div class="col-sm-4">
								<div class="input-group">
										<input type="text" class="form-control"　name="standard_weight" 
								value="<?=$standard_weight?>">
									<div class="input-group-append">
										<span class="input-group-text" id="text1b">&#13199;</span>
									</div>
								</div>
							</div>
						</div>
						<div class="form-group row">
							<label for="height" class="col-sm-3 col-form-label text-right">BMI:</label>
							<div class="col-sm-4">
								<div class="input-group">
									<input type="text" class="form-control"　name="bmi" value="<?=$bmi?>">
									<div class="input-group-append">
										<span class="input-group-text" id="text1b">&#13199;/&#13217;</span>
									</div>
								</div>
							</div>
						</div>
						<div class="form-group row">
							<label for="height" class="col-sm-3 col-form-label text-right">肥満度:</label>
							<div class="col-sm-4">
								<div class="input-group">
									<input type="text" class="form-control"　name="obesity_degree" 
								value="<?=$obesity_degree?>">
									<div class="input-group-append">
										<span class="input-group-text" id="text1b">%</span>
									</div>
								</div>
							</div>
						</div>
						<div class="form-group row">
							<label for="height" class="col-sm-3 col-form-label text-right">標準体重との差は:</label>
							<div class="col-sm-4">
								<div class="input-group">
									<input type="text" class="form-control"　name="difference" 
									value="<?=$difference?>">
									<div class="input-group-append">
										<span class="input-group-text" id="text1b">&#13199;</span>
									</div>
								</div>
							</div>
						</div>	
						<div class="form-group row">
							<label for="height" class="col-sm-3 col-form-label text-right">身体タイプ:</label>
							<div class="col-sm-4">
								<div class="input-group">
									<input type="text" class="form-control"　name="style_type" 
									value="<?=$style_type?>">
									<div class="input-group-append">
										<span class="input-group-text" id="text1b">体</span>
									</div>
								</div>
							</div>
						</div>
						<div class="form-group row">
							<label for="height" class="col-sm-3 col-form-label text-right">イメージ:</label>
							<div class="col-sm-4">
								<img src="<?=$style_image?>" alt="" class="rounded">
							</div>
						</div>
				</div>
				<!-- cart body2 end -->
			</div>
			<!-- cart end -->
		</div>
		<!-- container end -->
	</main>	
	<!-- main end -->
<script type="text/javascript" src="js/jquery-3.4.1.js"></script>
<script type="text/javascript" src="js/jquery-3.3.1.slim.min.js"></script>
<script type="text/javascript" src="js/bootstrap.bundle.js"></script>
<script type="text/javascript" src="js/validator.js"></script>
<script type="text/javascript" src="js/common.js"></script>
</body>
</html>