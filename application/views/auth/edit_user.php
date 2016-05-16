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
              <span class="text-danger"><em><small><?php echo form_error('first_name'); ?></em></small></span>
            </div>
        </div>


		<div class="form-group">
			<label for="last_name" class="col-sm-4 control-label"><?php echo lang('edit_user_lname_label', 'last_name');?> </label>            
             <div class="col-sm-8">
            	<?php echo form_input($last_name);?>
              <span class="text-danger"><em><small><?php echo form_error('last_name'); ?></em></small></span>
            </div>
        </div>     
      
		<div class="form-group">
			<label for="company" class="col-sm-4 control-label"><?php echo lang('edit_user_company_label', 'company');?></label>            
             <div class="col-sm-8">
            	<?php echo form_input($company);?>
              <span class="text-danger"><em><small><?php echo form_error('company'); ?></em></small></span>
            </div>
        </div>

		<div class="form-group">
			<label for="phone" class="col-sm-4 control-label"><?php echo lang('edit_user_phone_label', 'phone');?></label>            
             <div class="col-sm-8">
            	<?php echo form_input($phone);?>
              <span class="text-danger"><em><small><?php echo form_error('phone'); ?></em></small></span>
            </div>
        </div>            

    <div class="form-group">
      <label for="promocode" class="col-sm-4 control-label"><?php echo lang('edit_user_promocode_label', 'promocode');?></label>            
             <div class="col-sm-8">
              <?php echo form_input($promocode);?>
              <span class="text-danger"><em><small><?php echo form_error('promocode'); ?></em></small></span>
            </div>
        </div>      

		<div class="form-group">
			<label for="password" class="col-sm-4 control-label"><?php echo lang('edit_user_password_label', 'password');?></label>            
             <div class="col-sm-8">
            	<?php echo form_input($password);?>
              <span class="text-danger"><em><small><?php echo form_error('password'); ?></em></small></span>
            </div>
        </div>
      
		<div class="form-group">
			<label for="password_confirm" class="col-sm-4 control-label"><?php echo lang('edit_user_password_confirm_label', 'password_confirm');?></label>            
             <div class="col-sm-8">
            	<?php echo form_input($password_confirm);?>
              <span class="text-danger"><em><small><?php echo form_error('password_confirm'); ?></em></small></span>
            </div>
        </div>      
      
<?php if ($this->ion_auth->is_admin()): ?>
    <div class="form-group">
      <label for="dop_info" class="col-sm-4 control-label"><?php echo lang('edit_user_dop_info_label', 'dop_info');?></label>            
             <div class="col-sm-8">
              <?php echo form_input($dop_info);?>
              <span class="text-danger"><em><small><?php echo form_error('dop_info'); ?></em></small></span>
            </div>
    </div>

    <div class="form-group">
      <label for="sms" class="col-sm-4 control-label"><?php echo lang('edit_user_sms_label', 'sms');?></label>            
             <div class="col-sm-8">
              <?php echo form_input($sms);?>
              <span class="text-danger"><em><small><?php echo form_error('sms'); ?></em></small></span>
            </div>
    </div>

    <div class="form-group">
      <label for="sms_paid" class="col-sm-4 control-label"><?php echo lang('edit_user_sms_paid_label', 'sms');?></label>            
             <div class="col-sm-8">
              <?php echo form_input($sms_paid);?>
              <span class="text-danger"><em><small><?php echo form_error('sms_paid'); ?></em></small></span>
            </div>
    </div>

    <div class="form-group">
      <label for="time_end" class="col-sm-4 control-label"><?php echo lang('edit_user_time_end_label', 'time_end');?></label>            
             <div class="col-sm-8">
              <?php echo form_input($time_end);?>
              <span class="text-danger"><em><small><?php echo form_error('time_end'); ?></em></small></span>
            </div>
    </div>

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
              (<small><?php echo htmlspecialchars($group['description'],ENT_QUOTES,'UTF-8');?></small>)
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
</div>
        <?php $this->view('right_sidebar') ?>

      </div><!-- /.row -->

    </div><!-- /.container -->

    <?php $this->view('footer'); ?>
    <?php $this->view('javascript'); ?>
	<script type="text/javascript">
	    $(".datepicker").mask("99.99.9999");
      $(".datepicker" ).datepicker({
        minDate: 0,
        dateFormat: "dd.mm.yy",
        firstDay: 1,
        changeMonth: true,
        changeYear: true
      });
	</script>
  </body>
</html>