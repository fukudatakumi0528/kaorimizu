export default class Affiliate {
  linkCustom() {
    $(setTimeout(function () {

      const $btnAmazons = $('.easyLink-info-btn-amazon');
      const $btnRakutens = $('.easyLink-info-btn-rakuten');
      const $btnYahoos = $('.easyLink-info-btn-yahoo');
  
      if ($btnAmazons) {
        $btnAmazons.each(function (i, elem) {
          elem.setAttribute('target', '_brank');
        })
      }
    
      if ($btnRakutens) {
        $btnRakutens.each(function (i, elem) {
          elem.setAttribute('target', '_brank');
        })
      }
  
      if ($btnYahoos) {
        $btnYahoos.each(function (i, elem) {
          elem.setAttribute('target', '_brank');
        })
      }
      
    },5000))
  }
}
