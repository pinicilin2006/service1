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

				<div id="infoMessage"><?php echo $message;?></div>

          		<?php
          		$attributes = array(
          			'class' => 'form-horizontal',
          			'role' 	=> 'form'
          		);
          		echo form_open('auth/create_group', $attributes);
          		?>
				<legend><?php echo lang('create_group_heading');?></legend>
				  <div class="form-group">
				    <label for="group_name" class="col-sm-4 control-label">Название группы</label>
				    <div class="col-sm-8">
				      <input type="text" name="group_name" class="form-control" id="group_name" placeholder="Название группы">
				    </div>
				  </div>
				  <div class="form-group">
				    <label for="group_description" class="col-sm-4 control-label">Описание</label>
				    <div class="col-sm-8">
				      <input type="text" name="group_description" class="form-control" id="group_description" placeholder="Описание">
				    </div>
				  </div>				  
				  <div class="form-group">
				    <div class="col-sm-offset-4 col-sm-8">
				      <button type="submit" class="btn btn-success">Добавить группу</button>
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