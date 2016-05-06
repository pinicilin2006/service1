	<script type="text/javascript" src="<?php echo base_url("assets/js/jquery.js"); ?>?t=<?php echo(microtime(true)) ?>"></script>
	<script type="text/javascript" src="<?php echo base_url("assets/js/bootstrap.js"); ?>?t=<?php echo(microtime(true)) ?>"></script>
	<script type="text/javascript" src="<?php echo base_url("assets/js/maskedinput.js"); ?>?t=<?php echo(microtime(true)) ?>"></script>
	<script type="text/javascript" src="<?php echo base_url("assets/js/bootstrap-select.js"); ?>?t=<?php echo(microtime(true)) ?>"></script>
	<script type="text/javascript" src="<?php echo base_url("assets/js/i18n/defaults-ru_RU.js"); ?>?t=<?php echo(microtime(true)) ?>"></script>			
	<script type="text/javascript" src="<?php echo base_url("assets/js/function.js"); ?>?t=<?php echo(microtime(true)) ?>"></script>
	<!-- BEGIN JIVOSITE CODE {literal} -->
	<script type='text/javascript'>
	(function(){ var widget_id = '1XDVwtSYcV';var d=document;var w=window;function l(){
	var s = document.createElement('script'); s.type = 'text/javascript'; s.async = true; s.src = '//code.jivosite.com/script/widget/'+widget_id; var ss = document.getElementsByTagName('script')[0]; ss.parentNode.insertBefore(s, ss);}if(d.readyState=='complete'){l();}else{if(w.attachEvent){w.attachEvent('onload',l);}else{w.addEventListener('load',l,false);}}})();
	</script>
	<!-- {/literal} END JIVOSITE CODE -->
	<!-- Появление кнопки вверх и прокрутка  вверх при нажатие на неё-->
	<script type="text/javascript">
	var top_show = 150; // В каком положении полосы прокрутки начинать показ кнопки "Наверх"
	var delay = 1000; // Задержка прокрутки
	$(window).scroll(function () { // При прокрутке попадаем в эту функцию
      /* В зависимости от положения полосы прокрукти и значения top_show, скрываем или открываем кнопку "Наверх" */
      if ($(this).scrollTop() > top_show) $('#top').fadeIn();
      else $('#top').fadeOut();
    });
    $('#top').click(function () { // При клике по кнопке "Наверх" попадаем в эту функцию
      /* Плавная прокрутка наверх */
      $('body, html').animate({
        scrollTop: 0
      }, delay);
    });
    </script>