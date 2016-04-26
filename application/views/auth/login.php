<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
	<?php $this->view('head') ?>

  <body>

  <?php $this->view('main_navigation_not_login') ?>

    <div class="container">

    <?php $this->view('blog_title') ?>

      <div class="row">

        <div class="col-sm-9 blog-main">

          <div class="blog-post">
          <?php if ($message):?>
	          <div class="alert alert-warning alert-dismissable">
	          	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	          	<strong>Внимание ошибка!</strong><?php echo $message;?>
	          </div>
	      <?php endif;?>
          		<?php
          		$attributes = array(
          			'class' => 'form-horizontal',
          			'role' 	=> 'form'
          		);
          		echo form_open('auth/login', $attributes);
          		?>
				<legend>Вход для зарегистрированых пользователей</legend>
				  <div class="form-group">
				    <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
				    <div class="col-sm-10">
				      <input type="email" name="identity" class="form-control" id="inputEmail3" placeholder="Email">
				    </div>
				  </div>
				  <div class="form-group">
				    <label for="inputPassword3" class="col-sm-2 control-label">Пароль</label>
				    <div class="col-sm-10">
				      <input type="password" name="password" class="form-control" id="inputPassword3" placeholder="Пароль">
				    </div>
				  </div>
				  <div class="form-group">
				    <div class="col-sm-offset-2 col-sm-10">
				      <div class="checkbox">
				        <label>
				          <input type="checkbox" name="remember"> Запомнить меня
				        </label>
				      </div>
				    </div>
				  </div>
				  <div class="form-group">
				    <div class="col-sm-offset-2 col-sm-10">
				      <button type="submit" class="btn btn-default">Войти</button>
				    </div>
				  </div>
				  <hr>
				  <div class="login-help text-right">
					  <ul class="list-inline">
					  	<li><a href="create_user">Зарегистрироватся</a></li>
					  	<li><a href="forgot_password"><?php echo lang('login_forgot_password');?></a></li>
					  </ul>
				  </div>						  
				<?php echo form_close();?>




            <p></p>
          </div>	

        </div><!-- /.blog-main -->

        <?php $this->view('right_sidebar') ?>

      </div><!-- /.row -->

    </div><!-- /.container -->

    <?php $this->view('footer'); ?>
    <?php $this->view('javascript'); ?>
  </body>
</html>