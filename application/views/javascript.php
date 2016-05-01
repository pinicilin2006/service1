	<script type="text/javascript" src="<?php echo base_url("assets/js/jquery.js"); ?>"></script>
	<script type="text/javascript" src="<?php echo base_url("assets/js/bootstrap.js"); ?>"></script>
	<script type="text/javascript" src="<?php echo base_url("assets/js/maskedinput.js"); ?>"></script>	
	<script type="text/javascript" src="<?php echo base_url("assets/js/function.js"); ?>"></script>
	<!-- BEGIN JIVOSITE CODE {literal} -->
	<script type='text/javascript'>
	(function(){ var widget_id = '1XDVwtSYcV';var d=document;var w=window;function l(){
	var s = document.createElement('script'); s.type = 'text/javascript'; s.async = true; s.src = '//code.jivosite.com/script/widget/'+widget_id; var ss = document.getElementsByTagName('script')[0]; ss.parentNode.insertBefore(s, ss);}if(d.readyState=='complete'){l();}else{if(w.attachEvent){w.attachEvent('onload',l);}else{w.addEventListener('load',l,false);}}})();
	</script>
	<!-- {/literal} END JIVOSITE CODE -->
	<script type='text/javascript'>
		$(document).keydown(function(e) {
		    var elid = $(document.activeElement).hasClass('textInput');
		    if (e.keyCode === 8 && !elid) {
		        return false;
		    };
		});
	</script>
