<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
	<?php $this->view('head') ?>

  <body>

  <?php $this->view('main_navigation') ?>

    <div class="container">

    <?php $this->view('blog_title') ?>

      <div class="row">

        <div class="col-sm-9 blog-main">
          <div class="blog-post">
          Поздравляем! Вы успешно зарегестрировались.<br>Теперь вы можете <a href="/auth/login">авторизоваться</a>.
          </div>
          

        </div><!-- /.blog-main -->

        <?php $this->view('right_sidebar') ?>

      </div><!-- /.row -->

    </div><!-- /.container -->

    <?php $this->view('footer'); ?>
    <?php $this->view('javascript'); ?>
	<script type="text/javascript">
	    //$("#phone").mask("(999)999-99-99");
	</script>
  </body>
</html>