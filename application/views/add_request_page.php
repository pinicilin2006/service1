<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
	<?php include_once('head.php'); ?>

  <body>

  <?php 

  if($this->ion_auth->logged_in())
  {
  	include_once('main_navigation_login.php');
  } else {
  	include_once('main_navigation_not_login.php');
  }

  ?>

    <div class="container">

    <?php include_once('blog_title.php'); ?>

      <div class="row">

        <div class="col-sm-9 blog-main">

          <div class="blog-post">
            <!-- Содержимое страницы здесь -->
            <pre>
            <?php print_r($user_data)?>
            </pre>
          </div>	

        </div><!-- /.blog-main -->

        <?php include_once('right_sidebar.php') ?>

      </div><!-- /.row -->

    </div><!-- /.container -->

    <?php include_once('footer.php'); ?>
    <?php include_once('javascript.php'); ?>
  </body>
</html>