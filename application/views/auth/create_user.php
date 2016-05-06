<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php $this->view('head') ?>

  <body>

  <?php $this->view('main_navigation') ?>

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
                <div class="row" id="register-message">
                  <p>
                  	<span class="text-danger">Для внесения заявки на поиск запчастей не требуется регистрация</span>
                  	<br>
                  	<span class="text-success">В случае успешной регистрации<br> в течение 30 минут с Вами свяжется наш менеджер<br> для уточнения времени начала тестового периода</span>
                  </p>
                </div>				
				  <div class="form-group">
				    <label for="first_name" class="col-sm-4 control-label">Имя</label>
				    <div class="col-sm-8">
				      <input type="text" name="first_name" value="<?php echo set_value('first_name'); ?>" class="form-control" id="first_name" placeholder="Имя">
				      <span class="text-danger"><em><small><?php echo form_error('first_name'); ?></em></small></span>
				    </div>
				  </div>
				  <div class="form-group">
				    <label for="last_name" class="col-sm-4 control-label">Фамилия</label>
				    <div class="col-sm-8">
				      <input type="text" name="last_name" value="<?php echo set_value('last_name'); ?>" class="form-control" id="last_name" placeholder="Фамилия">
				      <span class="text-danger"><em><small><?php echo form_error('last_name'); ?></em></small></span>
				    </div>
				  </div>
				  <div class="form-group">
				    <label for="company" class="col-sm-4 control-label">Компания</label>
				    <div class="col-sm-8">
				      <input type="text" name="company" value="<?php echo set_value('company'); ?>" class="form-control" id="company" placeholder="Наименование компании">
				      <span class="text-danger"><em><small><?php echo form_error('company'); ?></em></small></span>
				    </div>
				  </div>				  				  
				  <div class="form-group">
				    <label for="phone" class="col-sm-4 control-label">Телефон*</label>
				    <div class="col-sm-8">
				      <input type="text" name="phone" value="<?php echo set_value('phone'); ?>" class="form-control" id="phone" placeholder="Телефон" required>
				      <span class="text-danger"><em><small><?php echo form_error('phone'); ?></em></small></span>
				    </div>
				  </div>				  				  				
				  <div class="form-group">
				    <label for="inputEmail3" class="col-sm-4 control-label">Email*</label>
				    <div class="col-sm-8">
				      <input type="email" name="email" value="<?php echo set_value('email'); ?>" class="form-control" id="inputEmail3" placeholder="Email" required="required">
				      <span class="text-danger"><em><small><?php echo form_error('email'); ?></em></small></span>
				    </div>
				  </div>
				  <div class="form-group">
				    <label for="promocode" class="col-sm-4 control-label">Промокод (если есть)</label>
				    <div class="col-sm-8">
				      <input type="text" name="promocode" value="<?php echo set_value('promocode'); ?>" class="form-control" id="promocode" placeholder="Промокод">
				      <span class="text-danger"><em><small><?php echo form_error('promocode'); ?></em></small></span>
				    </div>
				  </div>				  
				  <div class="form-group">
				    <label for="inputPassword3" class="col-sm-4 control-label">Пароль*</label>
				    <div class="col-sm-8">
				      <input type="password" name="password" value="<?php echo set_value('password'); ?>" class="form-control" id="inputPassword3" placeholder="Пароль" required="required">
				      <span class="text-danger"><em><small><?php echo form_error('password'); ?></em></small></span>
				    </div>
				  </div>
				  <div class="form-group">
				    <label for="inputPassword4" class="col-sm-4 control-label">Подтверждение пароля*</label>
				    <div class="col-sm-8">
				      <input type="password" name="password_confirm" value="<?php echo set_value('password_confirm'); ?>" class="form-control" id="inputPassword4" placeholder="Подтверждение пароля" required="required">
						<span class="text-danger"><em><small><?php echo form_error('password_confirm'); ?></em></small></span>				      
				    </div>
				  </div>
				  <div class="text-right text-warning">
				  	<small>Поля отмеченные * обязательны для заполнения</small>
				  </div>
				  <hr>				  
				  <div class="form-group">
				    <div class="col-sm-offset-4 col-sm-8">
				      <button type="submit" class="btn btn-success">Зарегистрироваться</button>
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
	    //$("#phone").mask("99999999999");
	</script>
  </body>
</html>
