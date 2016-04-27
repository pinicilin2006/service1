<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
	<?php include_once('head.php'); ?>

  <body>

  <?php 

  if($this->ion_auth->logged_in())
  {
  	include_once('main_navigation_login.php');
  } else {
  	include_once('main_navigation_not_login.php');
  }

  ?>

    <div class="container">

    <?php include_once('blog_title.php'); ?>

      <div class="row">

        <div class="col-sm-9 blog-main">

          <div class="blog-post">
              <?php if($message):?>
                  <div class="alert alert-warning alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <strong>Внимание ошибка!</strong><?php echo $message;?>
                  </div>
              <?php endif;?>
              <?php
              $attributes = array(
                'class' => 'form-horizontal',
                'role'  => 'form'
              );
              echo form_open('main/add_request', $attributes);
              ?>
              <legend>Добавление заявки на поиск автозапчасти</legend>

                <div class="form-group">
                  <label for="auto_mark" class="col-sm-4 control-label">Марка*</label>
                  <div class="col-sm-8">
                    <select class="form-control" name="auto_mark" id="auto_mark" required>
                      <option value="" disabled="disabled" selected="selected">Марка автомобиля</option>
                      <?php foreach ($auto_mark_data as $item):?>
                        <option value="<?=$item->id_car_mark?>"><?=$item->name?></option>
                      <?php endforeach;?>
                    </select>
                  </div>
                </div>

                <div id="message_model_auto"></div>
          
                <div class="text-right text-warning">
                  <small>Поля отмеченные * обязательны для заполнения</small>
                </div>
                <hr>          
                <div class="form-group">
                  <div class="col-sm-offset-4 col-sm-8">
                    <button type="submit" class="btn btn-success">Добавить заявку</button>
                  </div>
                </div>
              
              <?php echo form_close();?>              

          </div>	

        </div><!-- /.blog-main -->

        <?php include_once('right_sidebar.php') ?>

      </div><!-- /.row -->

    </div><!-- /.container -->

    <?php include_once('footer.php'); ?>
    <?php include_once('javascript.php'); ?>
  <script type="text/javascript">
      $("#phone").mask("(999)999-99-99");
      $(document).on("change", "#auto_mark", function(){
        var a = $(this).val();
        change_mark(a);
      });
  </script>    
  </body>
</html>