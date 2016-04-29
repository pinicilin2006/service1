<!-- <h1><?php echo lang('deactivate_heading');?></h1>
<p><?php echo sprintf(lang('deactivate_subheading'), $user->username);?></p>

<?php echo form_open("auth/deactivate/".$user->id);?>

  <p>
  	<?php echo lang('deactivate_confirm_y_label', 'confirm');?>
    <input type="radio" name="confirm" value="yes" checked="checked" />
    <?php echo lang('deactivate_confirm_n_label', 'confirm');?>
    <input type="radio" name="confirm" value="no" />
  </p>

  <?php echo form_hidden($csrf); ?>
  <?php echo form_hidden(array('id'=>$user->id)); ?>

  <p><?php echo form_submit('submit', lang('deactivate_submit_btn'));?></p>

<?php echo form_close();?> -->




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
          		echo form_open("auth/deactivate/".$user->id, $attributes);
          		?>
				<legend><?php echo lang('deactivate_heading');?></legend>
				  <div class="form-group">
					<div class="radio">
					  <label class="radio-inline">
					          <input type="radio" name="confirm" id="optionsRadios1" value="yes" checked>
					          Да
					        </label>
					
					  <label class="radio-inline">
					          <input type="radio" name="confirm" id="optionsRadios2" value="no">
					          Нет
					        </label>
					</div>
				  </div>			  
				  <div class="form-group">
				    <div >
				      <button type="submit" class="btn btn-success">Подтвердить</button>
				    </div>
				  </div>
				  <?php echo form_hidden($csrf); ?>
				  <?php echo form_hidden(array('id'=>$user->id)); ?>
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