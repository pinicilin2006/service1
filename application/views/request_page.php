<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
	<?php include_once('head.php'); ?>

  <body>

  <?php 


  	include_once('main_navigation.php');

  ?>

    <div class="container">

    <?php include_once('blog_title.php'); ?>

      <div class="row">

        <div class="col-sm-9 blog-main">

          <div class="blog-post">
              <?php echo validation_errors(); ?>
              <?php
              $attributes = array(
                'class' => 'form-horizontal',
                'role'  => 'form'
              );
              echo form_open('main/request_add', $attributes);
              ?>
              <legend>Добавление заявки на поиск автозапчасти</legend>

                <div class="form-group">
                  <label for="name" class="col-sm-4 control-label">Ваше имя</label>
                  <div class="col-sm-8">
                    <input type="text" name="name" class="form-control" id="name" placeholder="Имя">
                  </div>
                </div>

                <div class="form-group">
                  <label for="phone" class="col-sm-4 control-label">Телефон*</label>
                  <div class="col-sm-8">
                    <input type="text" name="phone" class="form-control" id="phone" placeholder="Телефон" required="required">
                  </div>
                </div>

                <div class="form-group">
                  <label for="email" class="col-sm-4 control-label">Email</label>
                  <div class="col-sm-8">
                    <input type="email" name="email" class="form-control" id="email" placeholder="Email">
                  </div>
                </div>

                <div class="form-group">
                  <label for="region" class="col-sm-4 control-label">Ваш регион*</label>
                  <div class="col-sm-8">
                    <select class="form-control" name="region" id="region" required>
                      <option value="" disabled="disabled" selected="selected">Выберите Ваш регион</option>
                      <?php foreach ($region_data as $item):?>
                        <option value="<?=$item->region_id?>"><?=$item->name?></option>
                      <?php endforeach;?>
                    </select>
                  </div>
                </div>
                <div id="message_city"></div>

                <div class="form-group">
                  <label for="auto_mark" class="col-sm-4 control-label">Марка автомобиля*</label>
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
                <div id="message_modification_auto"></div>

                <div class="form-group">
                  <label for="detail_category" class="col-sm-4 control-label">Категория детали*</label>
                  <div class="col-sm-8">
                    <select class="form-control" name="detail_category" id="detail_category" required>
                      <option value="" disabled="disabled" selected="selected">Категория детали</option>
                      <?php foreach ($detail_category_data as $item):?>
                        <option value="<?=$item->id_detail_category?>"><?=$item->name_detail_category?></option>
                      <?php endforeach;?>
                    </select>
                  </div>
                </div>                
                <div id="message_detail_type"></div>

                <div class="form-group">
                  <label for="name_detail" class="col-sm-4 control-label">Наименование детали (деталей)*</label>
                  <div class="col-sm-8">
                    <textarea name="detail_name" id="detail_name" class="form-control" rows="3" required></textarea>
                  </div>
                </div>

                <div class="form-group">
                  <label for="dop_info" class="col-sm-4 control-label">Дополнительная информация (vin, описание и т.д.)</label>
                  <div class="col-sm-8">
                    <textarea name="dop_info" class="form-control" rows="3"></textarea>
                  </div>
                </div>                

                <div class="form-group">
                  <label for="urgency" class="col-sm-4 control-label">Срочность заявки</label>
                  <div class="col-sm-8">
                    <select class="form-control" name="urgency" id="urgency" required>
                      <option value="1" selected="selected">Не срочно</option>
                      <option value="2">Срочно</option>
                      <option value="3">Очень срочно</option>
                    </select>
                  </div>
                </div>

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
      $("#phone").mask("+7(999)999-99-99");

      $(document).on("change", "#auto_mark", function(){
        var a = $(this).val();
        get_model_list(a);
        $('#message_modification_auto').html('');
      });

      $(document).on("change", "#auto_model", function(){
        var a = $(this).val();
        get_modification_list(a);
      });

      $(document).on("change", "#detail_category", function(){
        var a = $(this).val();
        get_detail_type_list(a);
      });
      $(document).on("change", "#region", function(){
        var a = $(this).val();
        get_city_list(a);
      });                   
  </script>    
  </body>
</html>