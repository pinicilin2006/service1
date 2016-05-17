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
          <?php $this->view('auth/admin_menu') ?>
          <div class="blog-post">
            <?php echo validation_errors(); ?>
<!-- Форма добавления сообщения -->
            <div class="panel-group" id="accordion">
                <!-- Отправка сообщения группе -->
                <div class="panel panel-primary">
                  <div class="panel-heading">
                    <h4 class="panel-title message_name">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">
                              Отправка сообщения группе пользователей
                            </a>
                          </h4>
                  </div>
                  <div id="collapse1" class="panel-collapse collapse in">
                    <div class="panel-body">
                      <?php
                      $attributes = array(
                        'class' => 'form-horizontal',
                        'role'  => 'form'
                      );
                      echo form_open('user/admin_send_message_add', $attributes);
                      ?>
                        <div class="form-group">
                          <label for="group" class="col-sm-4 control-label">Выберите группу</label>
                          <div class="col-sm-8">
                            <select class="form-control selectpicker" name="group[]" id="group" title="Группа" data-live-search="true" multiple required>
                              <?php foreach ($this->ion_auth->groups()->result() as $item):?>
                                <option value="<?=$item->id?>"><?=$item->name?></option>
                              <?php endforeach;?>
                            </select>
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="message_name" class="col-sm-4 control-label">Тема сообщения</label>
                          <div class="col-sm-8">
                            <input type="text" name="message_name" id="message_name" class="form-control" required>
                          </div>
                        </div>                                        
                        <div class="form-group">
                          <label for="message_text" class="col-sm-4 control-label">Сообщение</label>
                          <div class="col-sm-8">
                            <textarea name="message_text" id="message_text" class="form-control" rows="3" required></textarea>
                          </div>
                        </div>
                        <hr>          
                        <div class="form-group">
                          <div class="col-sm-offset-4 col-sm-8">
                            <button type="submit" class="btn btn-success">Отправить сообщение</button>
                          </div>
                        </div>               
                      <?php echo form_close();?> 
                    </div>
                  </div>
                </div>
                <!-- Отправка сообщения группе -->

                <!-- Отправка сообщения пользователям -->
                <div class="panel panel-primary">
                  <div class="panel-heading">
                    <h4 class="panel-title message_name">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapse2">
                              Отправка сообщения пользователям
                            </a>
                          </h4>
                  </div>
                  <div id="collapse2" class="panel-collapse collapse">
                    <div class="panel-body">
                      <?php
                      $attributes = array(
                        'class' => 'form-horizontal',
                        'role'  => 'form'
                      );
                      echo form_open('user/admin_send_message_add', $attributes);
                      ?>
                        <div class="form-group">
                          <label for="group" class="col-sm-4 control-label">Выберите пользователей</label>
                          <div class="col-sm-8">
                            <select class="form-control selectpicker" name="users[]" id="users" title="Пользователи" data-live-search="true" multiple required>
                              <?php foreach ($this->ion_auth->users()->result() as $item):?>
                                <option value="<?=$item->id?>"><?=$item->email?>(<?=$item->first_name?> <?=$item->last_name?> - <?=$item->company?>)</option>
                              <?php endforeach;?>
                            </select>
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="message_name" class="col-sm-4 control-label">Тема сообщения</label>
                          <div class="col-sm-8">
                            <input type="text" name="message_name" id="message_name" class="form-control" required>
                          </div>
                        </div>                                        
                        <div class="form-group">
                          <label for="message_text" class="col-sm-4 control-label">Сообщение</label>
                          <div class="col-sm-8">
                            <textarea name="message_text" id="message_text" class="form-control" rows="3" required></textarea>
                          </div>
                        </div>
                        <hr>          
                        <div class="form-group">
                          <div class="col-sm-offset-4 col-sm-8">
                            <button type="submit" class="btn btn-success">Отправить сообщение</button>
                          </div>
                        </div>               
                      <?php echo form_close();?> 
                    </div>
                  </div>
                </div>
                <!-- Отправка сообщения пользователям -->                
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