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

          		<?php
          		$attributes = array(
          			'class' => 'form-horizontal',
          			'role' 	=> 'form'
          		);
          		echo form_open('auth/reset_password/' . $code, $attributes);
          		?>
          		<div id="infoMessage"><?php echo $message;?></div>
				<legend><?php echo lang('reset_password_heading');?></legend>        			
				  
				  <div class="form-group">
				    <label for="group_name" class="col-sm-4 control-label"><?php echo sprintf(lang('reset_password_new_password_label'), $min_password_length);?></label>
				    <div class="col-sm-8">
				      <?php echo form_input($new_password);?>
				    </div>
				  </div>

				  <div class="form-group">
				    <label for="group_name" class="col-sm-4 control-label"><?php echo lang('reset_password_new_password_confirm_label', 'new_password_confirm');?></label>
				    <div class="col-sm-8">
				      <?php echo form_input($new_password_confirm);?>
				    </div>
				  </div>
					<?php echo form_input($user_id);?>
					<?php echo form_hidden($csrf); ?>
				  <div class="form-group">
				    <div class="col-sm-offset-4 col-sm-8">
				      <button type="submit" class="btn btn-success">Отправить</button>
				    </div>
				  </div>

				<?php echo form_close();?>



          </div>	

        </div><!-- /.blog-main -->

        <?php $this->view('right_sidebar') ?>

      </div><!-- /.row -->

    </div><!-- /.container -->

    <?php $this->view('footer'); ?>
    <?php $this->view('javascript'); ?>
  </body>
</html>