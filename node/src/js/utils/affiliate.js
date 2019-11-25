export default class Affiliate {
  linkCustom() {
    const $btnAmazons = $('.easyLink-info-btn-amazon');
    const $btnRakutens = $('.easyLink-info-btn-rakuten');
    const $btnYahoos = $('.easyLink-info-btn-yahoo');

    if ($btnAmazons) {
      for (let $btnAmazon of $btnAmazons) {
        $btnAmazon.attr({
          'target': '_brank',
        })
      };
    }
  
    if ($btnRakutens) {
      for (let $btnRakuten of $btnRakutens) {
        $btnRakuten.attr({
          'target': '_brank',
        })
      };      
    }

    if($btnYahoos){
      for (let $btnYahoo of $btnYahoos) {
        $btnYahoo.attr({
          'target': '_brank',
        })
      };  
    }
  
  }
}
