$('head').append(
'<style type="text/css">body {display:none;}'
);
$(window).load(function() {
$('body').fadeIn("slow");
});