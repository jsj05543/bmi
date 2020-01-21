<?php

/**
 * 各計算式をお返すクラス
 */
class calculation{
    
    /**
     * 標準体重を求める
     * 
     * @param height 身長
     * @return 標準体重
     */
    public function getStandardWeight($height){ 
        //標準体重＝22×(身長*身長)
        $standard_weight=$height*$height*22;
        return round($standard_weight,2);
    }

    /**
     * BMIを求める
     * 
     * @param height 身長
     * @param weight 体重
     * @return BMI
     */
    public function getMbi($height,$weight){ 
        //BMI＝体重／(身長*身長)
        $bmi=$weight/$height/$height;
        if(is_nan($bmi))
            return 0;
        
        return round($bmi,2);
    }

    /**
     * 肥満度を求める
     * 
     * @param height 身長
     * @param weight 体重
     * @return 肥満度
     */
    public function getObesityDegree($height,$weight){
        //標準体重
        $standard_weight=$this -> getStandardWeight($height);
        //肥満度％=（実測体重-標準体重）÷標準体重×100
        $obesity_degree=($weight-$standard_weight)/$standard_weight*100;

        if(is_nan($obesity_degree))
            return 0;

        return round($obesity_degree,2);
    }

    /**
     * 標準体重との差を求める
     * 
     * @param height 身長
     * @param weight 体重
     * @return 標準体重との差
     */
    public function getDifference($height,$weight){ 
        //標準体重
        $standard_weight=$this -> getStandardWeight($height);
        //標準体重との差
        $difference=$weight-$standard_weight;

        return round($difference,2);
    }

    /**
     * 身体タイプを求める
     * 
     * @param height 身長
     * @param weight 体重
     * @return 身体タイプ
     */
    public function getStyleType($height,$weight){
        
        //BMI
        $bmi=$this-> getMbi($height,$weight);
        //身体タイプ
        $style_type="未定";
        //イメージ
        $style_image="images/timg.gif";

        if(25<=$bmi && $bmi<30){
            $style_type="肥満1度";
            $style_image="images/ng1.png";
        }
        if(30<=$bmi && $bmi<35){
            $style_type="肥満2度";
            $style_image="images/ng2.png";
        }
        if(35<=$bmi && $bmi<40){
            $style_type="肥満3度";
            $style_image="images/ng3.png";
        }
        if(40<=$bmi){
            $style_type="肥満4度";
            $style_image="images/ng4.png";
        }
        if(18.5<=$bmi && $bmi<25){
            $style_type="普通体重";
            $style_image="images/ok.png";
        }
        if($bmi<18.5){
            $style_type="低体重";
            $style_image="images/ng0.png";
        }
        if($bmi==0){
            $style_type="未定";
            $style_image="images/timg.gif";
        }

        return array('style_type'=>$style_type,'style_image'=>$style_image);
        //return $style_type;
    }
}

?>