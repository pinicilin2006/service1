<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
	<?php $this->view('head') ?>

  <body>

  <?php $this->view('main_navigation_not_login') ?>

    <div class="container">

    <?php $this->view('blog_title') ?>

      <div class="row">

        <div class="col-sm-9 blog-main"
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
          		echo form_open('auth/create_user', $attributes);
          		?>
				<legend>Регистрация нового пользователя</legend>
				  <div class="form-group">
				    <label for="first_name" class="col-sm-4 control-label">Имя</label>
				    <div class="col-sm-8">
				      <input type="text" name="first_name" class="form-control" id="first_name" placeholder="Имя">
				    </div>
				  </div>
				  <div class="form-group">
				    <label for="last_name" class="col-sm-4 control-label">Фамилия</label>
				    <div class="col-sm-8">
				      <input type="text" name="last_name" class="form-control" id="last_name" placeholder="Фамилия">
				    </div>
				  </div>
				  <div class="form-group">
				    <label for="company" class="col-sm-4 control-label">Компания</label>
				    <div class="col-sm-8">
				      <input type="text" name="company" class="form-control" id="company" placeholder="Наименование компании">
				    </div>
				  </div>				  
				  <div class="form-group">
				    <label for="phone" class="col-sm-4 control-label">Телефон</label>
				    <div class="col-sm-8">
				      <input type="text" name="phone" class="form-control" id="phone" placeholder="Телефон">
				    </div>
				  </div>				  				  				
				  <div class="form-group">
				    <label for="inputEmail3" class="col-sm-4 control-label">Email*</label>
				    <div class="col-sm-8">
				      <input type="email" name="email" class="form-control" id="inputEmail3" placeholder="Email" required="required">
				    </div>
				  </div>
				  <div class="form-group">
				    <label for="inputPassword3" class="col-sm-4 control-label">Пароль*</label>
				    <div class="col-sm-8">
				      <input type="password" name="password" class="form-control" id="inputPassword3" placeholder="Пароль" required="required">
				    </div>
				  </div>
				  <div class="form-group">
				    <label for="inputPassword4" class="col-sm-4 control-label">Подтверждение пароля*</label>
				    <div class="col-sm-8">
				      <input type="password" name="password_confirm" class="form-control" id="inputPassword4" placeholder="Подтверждение пароля" required="required">
				    </div>
				  </div>
				  <div class="text-right text-warning">
				  	<small>Поля отмеченные * обязательны для заполнения</small>
				  </div>
				  <hr>				  
				  <div class="form-group">
				    <div class="col-sm-offset-4 col-sm-8">
				      <button type="submit" class="btn btn-success">Зарегистрироватся</button>
				    </div>
				  </div>
						  
				<?php echo form_close();?>	

        </div><!-- /.blog-main -->

        <?php $this->view('right_sidebar') ?>

      </div><!-- /.row -->

    </div><!-- /.container -->

    <?php $this->view('footer'); ?>
    <?php $this->view('javascript'); ?>
	<script type="text/javascript">
	    $("#phone").mask("(999)999-99-99");
	</script>
  </body>
</html>