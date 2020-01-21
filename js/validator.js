$(function () {
  $('input').blur(function(e) {
    // メッセージをリセット
    e.target.setCustomValidity('');

    // 未入力 required
    if (e.target.validity.valueMissing) {
      e.target.setCustomValidity('この項目は必須項目です');
    }
    // タイプ（email,urlなど）がマッチしない
    if(e.target.validity.typeMismatch){
      e.target.setCustomValidity('型');
    }
    // パターンがマッチしない pattern
    if (e.target.validity.patternMismatch){
      e.target.setCustomValidity('形式');
    }
    // 文字数が超過 maxlength
    if (e.target.validity.tooLong){
      e.target.setCustomValidity('長い');
    }
    // 文字数が不足 minlength
    if (e.target.validity.tooShort){
      e.target.setCustomValidity('短い');
    }
    // 値が大きい max
    if (e.target.validity.rangeOverflow){
      e.target.setCustomValidity('指定範囲から高い数字です');
    }
    // 値が小さい min
    if (e.target.validity.rangeUnderflow){
      e.target.setCustomValidity('指定範囲から低い数字です');
    }
    // ステップがマッチしない step
    // if (e.target.validity.stepMismatch){
    //   e.target.setCustomValidity('ステップ');
    // }
  });
});