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
          <?php $this->view('auth/user_menu') ?>
          <div class="blog-post">

			
<div class="panel panel-success">
  <!-- Default panel contents -->
  <div class="panel-heading"><h3 class="panel-title">Отчёт по заявкам</h3></div>
  
  <!-- List group -->
  <ul class="list-group">
    <li class="list-group-item">Всего ваших заявок:<span class="badge"><?=$all_user_request?></span></li>
    <li class="list-group-item">Всего ваших заявок за 30 дней:<span class="badge"><?=$month_user_request?></span></li>
    <li class="list-group-item">Всего ваших заявок за 7 дней:<span class="badge"><?=$week_user_request?></span></li>
    <li class="list-group-item">Всего ваших заявок за последние 24 часа:<span class="badge"><?=$hour24_user_request?></span></li>
    <li class="list-group-item">Всего ваших заявок за последние 4 часа:<span class="badge"><?=$hour4_user_request?></span></li>
    <li class="list-group-item">Всего ваших заявок за последний час:<span class="badge"><?=$hour1_user_request?></span></li>
  </ul>
  

</div>



          </div>	

        </div><!-- /.blog-main -->

        <?php $this->view('right_sidebar') ?>

      </div><!-- /.row -->

    </div><!-- /.container -->

    <?php $this->view('footer'); ?>
    <?php $this->view('javascript'); ?>
  </body>
</html>