<?php
//身長
$height = 0;
//体重
$weight = 0;
require "service/calculation.php";
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
<html lang=“en”>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>健康測定システム</title>
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/mongolfont.css">
	<link rel="stylesheet" href="css/style.css">
</head>

<body>
    <!-- header start -->
    <header class="header row" style="padding-left:30px; ">
        <a href="/"><span class="bg-warning tate header-ran">日本語</span></a></br>
        <a href="mn.php"><span class="bg-success MongolianWhite mn-fontsize tate tate_safari">ᠮᠤᠩᠭᠤᠯ</span></a>
    </header>
    <!-- header end -->
    <div class="jumbotron">
        <h1 class="h1">健康測定システム</h1>
        <hr>
        <!-- form start -->
        <form name="myform" method="POST" data-toggle="validator" role="form">
       <!--  <form name="myform" method="POST" class="needs-validation" novalidate> -->
            <div class="form-group row has-feedback className">
                <label for="height" class="col-sm-2 col-form-label text-left">
                    あなたの身長は:<span class="badge badge-danger">必須</span>
                </label>
                <div class="col-sm-4">
                    <div class="input-group">
                        <input type="number" class="form-control" step="0.01" min="1" max="3" style="width:80%" id="height" name="height" placeholder="身長" required>
                        <div class="input-group-append">
                            <span class="input-group-text" id="text1b">m</span>
                        </div>
                    </div>
                    <small id="heightHelp" class="form-text text-muted">1~3の数字で入力してください.</small>
                </div>
            </div>
            <div class="form-group row">
                <label for="weight" class="col-sm-2 col-form-label text-left">
                    あなたの体重は:<span class="badge badge-danger">必須</span>
                </label>
                <div class="col-sm-4">
                    <div class="input-group">
                        <input type="number" class="form-control" step="0.01" min="1" max="500" style="width:80%" id="weight" , name="weight" placeholder="体重" required>
                        <div class="input-group-append">
                            <span class="input-group-text" id="text1b">&#13199;</span>
                        </div>
                    </div>
                    <small id="weightHelp" class="form-text text-muted">1~500の数字で入力してください.
                    </small>
                </div>
            </div>
            <div class="form-group row">
                <label for="submit" class="col-sm-2 col-form-label"></label>
                <div class="col-sm-7">
                    <button class="btn btn-primary">測定する</button>
                    <button type="button" class="btn btn-secondary" onclick="clickReset()">リセット</button>
                </div>
            </div>
        </form>
        <!-- form end -->
         <h1 class="h2">測定結果</h1>
            <hr>
        <div class="form-group row">
           
        	<div class="col-sm-1"></div>
            <label for="height" class="col-sm-2 col-form-label">あなたの標準重:</label>
            <div class="col-sm-4">
                <div class="input-group">
                    <input type="text" class="form-control" 　name="standard_weight" value="<?=$standard_weight?>">
                    <div class="input-group-append">
                        <span class="input-group-text" id="text1b">&#13199;</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group row">
        	<div class="col-sm-1"></div>
            <label for="height" class="col-sm-2 col-form-label text-left">BMI:</label>
            <div class="col-sm-4">
                <div class="input-group">
                    <input type="text" class="form-control" 　name="bmi" value="<?=$bmi?>">
                    <div class="input-group-append">
                        <span class="input-group-text" id="text1b">&#13199;/&#13217;</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group row">
        	<div class="col-sm-1"></div>
            <label for="height" class="col-sm-2 col-form-label text-left">肥満度:</label>
            <div class="col-sm-4">
                <div class="input-group">
                    <input type="text" class="form-control" 　name="obesity_degree" value="<?=$obesity_degree?>">
                    <div class="input-group-append">
                        <span class="input-group-text" id="text1b">%</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group row">
        	<div class="col-sm-1"></div>
            <label for="height" class="col-sm-2 col-form-label text-left">標準体重との差は:</label>
            <div class="col-sm-4">
                <div class="input-group">
                    <input type="text" class="form-control" 　name="difference" value="<?=$difference?>">
                    <div class="input-group-append">
                        <span class="input-group-text" id="text1b">&#13199;</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group row">
        	<div class="col-sm-1"></div>
            <label for="height" class="col-sm-2 col-form-label text-left">身体タイプ:</label>
            <div class="col-sm-4">
                <div class="input-group">
                    <input type="text" class="form-control" 　name="style_type" value="<?=$style_type?>">
                    <div class="input-group-append">
                        <span class="input-group-text" id="text1b">体</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group row">
        	<div class="col-sm-1"></div>
            <label for="height" class="col-sm-2 col-form-label">イメージ:</label>
            <div class="col-sm-4">
                <img src="<?=$style_image?>" alt="" class="rounded">
            </div>
        </div>
    </div><!-- /.jumbotron -->
    <footer class="footer text-center">brgd</footer>
    <script type="text/javascript" src="js/jquery-3.4.1.js"></script>
    <script type="text/javascript" src="js/jquery-3.3.1.slim.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.bundle.js"></script>
    <script type="text/javascript" src="js/validator.js"></script>
    <script type="text/javascript" src="js/common.js"></script>
</body>
</html>