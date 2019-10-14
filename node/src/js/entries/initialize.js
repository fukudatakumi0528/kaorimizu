(function(){
  var html = document.getElementsByTagName('html')||[];
  html[0].classList.add('enable-javascript');
  window.addEventListener("load", function(){
    html[0].classList.add('window-load');
  }, false);
})();
