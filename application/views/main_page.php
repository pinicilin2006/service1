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
              <table class="table-responsive table-hover table-condensed table-bordered" id="request_table">
                <thead>
                  <th>Id заявки</th>
                  <th>Дата</th>
                  <th>Город</th>
                  <th>Авто</th>
                  <th>Категория</th>
                  <th>Наименование</th>
                  <th>Срочность</th>
                  <th>Данные клиента</th>
                </thead>
                <tbody>
                  <?php foreach ($table_data as $row):?>
                    <tr>
                      <td><?=$row['id_request']?></td>
                      <td><?=date('d.m.y', $row['time_create'])?><br><?=date('H:i', $row['time_create'])?></td>
                      <td><?=$row['region_name']?>/<br><b><?=$row['city_name']?></b></td>
                      <td><?=$row['mark_name']?>/<br><b><?=$row['model_name']?></b></td>
                      <td><?=$row['name_detail_category']?></td>
                      <td><?=$row['detail_name']?></td>
                      <td><?=$row['name']?></td>
                      <td><button type="button" class="btn btn-success">Info</button></td>
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
    <?php include_once('javascript.php'); ?>
  </body>
</html>