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
          		echo form_open(uri_string(), $attributes);
      		?>
		<legend>Редактировать пользователя</legend>
		
		<div class="form-group">
			<label for="first_name" class="col-sm-4 control-label"><?php echo lang('edit_user_fname_label', 'first_name');?></label>            
             <div class="col-sm-8">
            	<?php echo form_input($first_name);?>
            </div>
        </div>


		<div class="form-group">
			<label for="first_name" class="col-sm-4 control-label"><?php echo lang('edit_user_lname_label', 'last_name');?> </label>            
             <div class="col-sm-8">
            	<?php echo form_input($last_name);?>
            </div>
        </div>     
      
		<div class="form-group">
			<label for="first_name" class="col-sm-4 control-label"><?php echo lang('edit_user_company_label', 'company');?></label>            
             <div class="col-sm-8">
            	<?php echo form_input($company);?>
            </div>
        </div>

		<div class="form-group">
			<label for="first_name" class="col-sm-4 control-label"><?php echo lang('edit_user_phone_label', 'phone');?></label>            
             <div class="col-sm-8">
            	<?php echo form_input($phone);?>
            </div>
        </div>            
      

		<div class="form-group">
			<label for="first_name" class="col-sm-4 control-label"><?php echo lang('edit_user_password_label', 'password');?></label>            
             <div class="col-sm-8">
            	<?php echo form_input($password);?>
            </div>
        </div>
      
		<div class="form-group">
			<label for="first_name" class="col-sm-4 control-label"><?php echo lang('edit_user_password_confirm_label', 'password_confirm');?></label>            
             <div class="col-sm-8">
            	<?php echo form_input($password_confirm);?>
            </div>
        </div>      
      
      <?php if ($this->ion_auth->is_admin()): ?>
		<div class="form-group">
			<label for="first_name" class="col-sm-4 control-label"><?php echo lang('edit_user_groups_heading');?></label>            
             <div class="col-sm-8">
          <?php foreach ($groups as $group):?>
              <label class="checkbox">
              <?php
                  $gID=$group['id'];
                  $checked = null;
                  $item = null;
                  foreach($currentGroups as $grp) {
                      if ($gID == $grp->id) {
                          $checked= ' checked="checked"';
                      break;
                      }
                  }
              ?>
              <input type="checkbox" name="groups[]" value="<?php echo $group['id'];?>"<?php echo $checked;?>>
              <?php echo htmlspecialchars($group['name'],ENT_QUOTES,'UTF-8');?>
              </label>
          <?php endforeach?>
          	</div>
          	</div>
      <?php endif ?>

      <?php echo form_hidden('id', $user->id);?>
      <?php echo form_hidden($csrf); ?>

		<div class="form-group">
			<div class="col-sm-offset-4 col-sm-8">
				<button type="submit" class="btn btn-success">Изменить</button>
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