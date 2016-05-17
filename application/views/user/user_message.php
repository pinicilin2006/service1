<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
	<?php $this->view('head') ?>

  <body>

  <?php $this->view('main_navigation') ?>

    <div class="container">

    <?php $this->view('blog_title') ?>

        <div class="col-sm-9 blog-main">
          <?php $this->view('auth/user_menu') ?>
          <div class="blog-post">
              <?=(!$user_messages ? '<span class="text-success">Отсутствуют сообщения</span>' : '')?>
              <div class="panel-group" id="accordion">
                  <?php $x = 0;?>
                  <?php foreach ($user_messages as $row):?>
                    <?php $x++?>
                <div class="panel panel-primary">
                  <div class="panel-heading">
                    <h4 class="panel-title message_name">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapse<?=$row->id_message?>">
                              <?=date('d.m.Y',$row->time_create)?>. <?=$row->message_name?>
                            </a>
                          </h4>
                  </div>
                  <div id="collapse<?=$row->id_message?>" class="panel-collapse collapse <?=($x == 1 ? 'in' : '')?>">
                    <div class="panel-body">
                      <?=$row->message_text?>
                    </div>
                  </div>
                </div>

              <?php endforeach;?>
              </div>


          </div>	
        </div><!-- /.blog-main -->

        <?php $this->view('right_sidebar') ?>



    </div><!-- /.container -->

    <?php $this->view('footer'); ?>
    <?php $this->view('javascript'); ?>
  </body>
</html>