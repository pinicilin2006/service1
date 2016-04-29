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

        <div class="col-sm-12 blog-main" style="padding-top: 5px">

          <div class="blog-post">
          <?=$pagination?>
            <!-- Содержимое страницы здесь -->
            <div class="panel panel-default">
              <!-- Default panel contents -->
              <div class="panel-heading">Заявки на подбор автодеталей</div>           
              <table class="table table-hover table-condensed table-bordered" id="request_table">
                <thead>
                <tr>
                  <th>Id</th>
                  <th>Дата</th>
                  <th>Город</th>
                  <th>Авто</th>
                  <th>Категория</th>
                  <th>Наименование</th>
                  <th>Срочность</th>
                  <th>Клиент</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($table_data as $row):?>
                    <tr>
                      <td data-label="ID заявки:"><?=$row['id_request']?></td>
                      <td data-label="Дата:"><?=date('d.m.y', $row['time_create'])?><br><?=date('H:i', $row['time_create'])?></td>
                      <td data-label="Город:"><?=$row['region_name']?>/<br><b><?=$row['city_name']?></b></td>
                      <td data-label="Авто:"><?=$row['mark_name']?>/<br><b><?=$row['model_name']?></b></td>
                      <td data-label="Категория:"><?=$row['name_detail_category']?></td>
                      <td data-label="Наименование:"><?=$row['detail_name']?></td>
                      <td data-label="Срочность:"><?=$row['name']?></td>
                      <td data-label="Данные клиента:"><a  href="#info_modal" role="button" id="<?=$row['id_request']?>" class="btn  btn-success" data-toggle="modal">info</a></td>
                    </tr>
                  <?php endforeach;?>
                </tbody>
              </table>
            </div>
            <?=$pagination?>
          </div>	

        </div><!-- /.blog-main -->

        <?php //include_once('right_sidebar.php') ?>

      </div><!-- /.row -->

    </div><!-- /.container -->
    <?php include_once('footer.php'); ?> 

    <div id="info_modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
          <h3 id="myModalLabel">TKLIENT.RU</h3>
      </div>
      <div class="modal-body">
        <p><div id="info-modal-text"></div></p>
      </div>
      <div class="modal-footer">
    <?php if(!$this->ion_auth->logged_in()):?>
      <a href="/auth/login" role="button" class="btn  btn-success">Вход</a>
      <a href="/auth/create_user" role="button" class="btn  btn-success">Зарегестрироватся</a>
    <?php endif;?>
      </div>
    </div>


    <?php include_once('javascript.php'); ?>

    <script type="text/javascript">
      $('#info_modal').on('show.bs.modal', function (e) {
        get_request_info(e.relatedTarget.id);
      })

    </script>  
  </body>
</html>