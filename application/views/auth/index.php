<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
	<?php $this->view('head') ?>

  <body>

  <?php $this->view('main_navigation') ?>

    <div class="container">

    <?php $this->view('blog_title') ?>

      <div class="row">

        <div class="col-sm-12 blog-main">
        <?php $this->view('auth/admin_menu') ?>
          <div class="blog-post">
			<div id="infoMessage"><?php echo $message;?></div>

				<div class="panel panel-default">
	              <!-- Default panel contents -->
	              <div class="panel-heading">Администрирование пользователей системы</div>           
			        <table class="table table-hover table-condensed table-bordered" id="request_table">
						<thead>
							<tr>
								<th>#</th>
								<th><?php echo lang('index_fname_th');?></th>
								<th><?php echo lang('index_lname_th');?></th>
								<th><?php echo lang('index_email_th');?></th>
								<th><?php echo lang('index_groups_th');?></th>
								<th><?php echo lang('index_status_th');?></th>
								<th><?php echo lang('index_dop_info_th');?></th>
								<th><?php echo lang('index_action_th');?></th>
							</tr>
						</thead>
						<tbody>
						<?php foreach ($users as $user):?>
							<tr>
								<td><?php echo $user->id;?></td>
					            <td><?php echo htmlspecialchars($user->first_name,ENT_QUOTES,'UTF-8');?></td>
					            <td><?php echo htmlspecialchars($user->last_name,ENT_QUOTES,'UTF-8');?></td>
					            <td><?php echo htmlspecialchars($user->email,ENT_QUOTES,'UTF-8');?></td>
								<td>
									<?php foreach ($user->groups as $group):?>
										<?php echo anchor("auth/edit_group/".$group->id, htmlspecialchars($group->name,ENT_QUOTES,'UTF-8')) ;?><br />
					                <?php endforeach?>
								</td>

								<td><?php echo ($user->active) ? anchor("auth/deactivate/".$user->id, lang('index_active_link')) : anchor("auth/activate/". $user->id, lang('index_inactive_link'));?></td>
								<td><?php echo htmlspecialchars($user->dop_info,ENT_QUOTES,'UTF-8');?></td>
								<td><?php echo anchor("auth/edit_user/".$user->id, 'Edit') ;?></td>

							</tr>
						<?php endforeach;?>
						</tbody>
					</table>
			</div>

			<p><?php echo anchor('auth/create_user', lang('index_create_user_link'))?> | <?php echo anchor('auth/create_group', lang('index_create_group_link'))?></p>




          </div>	

        </div><!-- /.blog-main -->

      </div><!-- /.row -->

    </div><!-- /.container -->

    <?php $this->view('footer'); ?>
    <?php $this->view('javascript'); ?>
  </body>
</html>
