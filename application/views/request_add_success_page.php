<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
	<?php include_once('head.php'); ?>

  <body>

  <?php 

  	include_once('main_navigation.php');

  ?>

    <div class="container">

    <?php include_once('blog_title.php'); ?>

      <div class="row">

        <div class="col-sm-9 blog-main">

          <div class="blog-post">
            <!-- Содержимое страницы здесь -->
            <div class="alert alert-success">Заявка успешна добавлена в базу данных.</div>
          </div>	

        </div><!-- /.blog-main -->

        <?php include_once('right_sidebar.php') ?>

      </div><!-- /.row -->

    </div><!-- /.container -->
	<!-- Google Code for &#1044;&#1086;&#1073;&#1072;&#1074;&#1083;&#1077;&#1085;&#1080;&#1077; &#1079;&#1072;&#1103;&#1074;&#1082;&#1080; Conversion Page -->
	<script type="text/javascript">
	/* <![CDATA[ */
	var google_conversion_id = 1025519354;
	var google_conversion_language = "en";
	var google_conversion_format = "3";
	var google_conversion_color = "ffffff";
	var google_conversion_label = "0FNzCOj71GoQ-t2A6QM";
	var google_remarketing_only = false;
	/* ]]> */
	</script>
	<script type="text/javascript" src="//www.googleadservices.com/pagead/conversion.js">
	</script>
	<noscript>
	<div style="display:inline;">
	<img height="1" width="1" style="border-style:none;" alt="" src="//www.googleadservices.com/pagead/conversion/1025519354/?label=0FNzCOj71GoQ-t2A6QM&amp;guid=ON&amp;script=0"/>
	</div>
	</noscript>

    <?php include_once('footer.php'); ?>
    <?php include_once('javascript.php'); ?>
  </body>
</html>
