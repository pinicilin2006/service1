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
              <div class="panel-heading">
                <div class="row">
                  <div id="request_search_form">
                    <?php
                    $attributes = array(
                      'class' => 'form-inline',
                      'role'  => 'form'
                    );
                    // echo '<pre>';
                    // print_r($this->input->post());
                    // echo '</pre>';
                    echo form_open('/', $attributes);
                    ?>
                      <!-- <div class="col-sm-2 col-xs-12">  -->
                        <div class="form-group">               
                          <select name="region_request[]" id="region" class="selectpicker" multiple title="Все регионы" data-live-search="true" data-width="150px">
                            <!-- <option value="0">Все регионы</option> -->
                            <?php foreach ($all_region as $row):?>
                              <option value="<?=$row['region_id']?>" 
                                <?php
                                  if($this->session->flashdata('filter'))
                                  {
                                    $val = $this->session->flashdata('filter');
                                    if(isset($val['region']) && in_array($row['region_id'], $val['region']))
                                    {
                                     echo ' selected';
                                    }
                                  }
                                ?>                                
                              ><?=$row['name']?></option>
                            <?php endforeach;?>
                          </select>
                        </div>
                      <!-- </div> -->
                      <!-- <div class="col-sm-2 col-xs-12"> -->
                        <div class="form-group">               
                          <select name="mark_request[]" class="selectpicker" multiple title="Все марки" data-live-search="true" data-width="150px">
                            <!-- <option value="0">Все категории</option> -->
                            <?php foreach ($all_mark as $row):?>
                              <option value="<?=$row['id_car_mark']?>"
                                <?php
                                  if($this->session->flashdata('filter'))
                                  {
                                    $val = $this->session->flashdata('filter');
                                    if(isset($val['mark']) && in_array($row['id_car_mark'], $val['mark']))
                                    {
                                     echo ' selected';
                                    }
                                  }
                                ?>
                              ><?=$row['name']?></option>
                            <?php endforeach;?>
                          </select>
                        </div>
                      <!-- </div> -->
                      <!-- <div class="col-sm-2 col-xs-12"> -->
                        <div class="form-group">               
                          <select name="category_request[]" class="selectpicker" multiple title="Все категории" data-width="150px">
                            <!-- <option value="0">Все категории</option> -->
                            <?php foreach ($all_category as $row):?>
                              <option value="<?=$row['id_detail_category']?>"
                                <?php
                                  if($this->session->flashdata('filter'))
                                  {
                                    $val = $this->session->flashdata('filter');
                                    if(isset($val['category']) && in_array($row['id_detail_category'], $val['category']))
                                    {
                                     echo ' selected';
                                    }
                                  }
                                ?>
                              ><?=$row['name_detail_category']?></option>
                            <?php endforeach;?>
                          </select>
                        </div>
                       <!-- </div> -->
<!--                        <div class="col-sm-4"> 
                        <div class="form-group" >               
                          <select name="type_request" class="selectpicker" data-width="150px">
                            <option value="0">Все заявки</option>
                            <option value="1">Непросмотренные</option>
                          </select>
                        </div>
                      </div> -->
                       <!-- <div class="col-sm-2 col-xs-12">  -->
                        <div class="form-group" >               
                          <input type="text" name="name_search_detail" value="<?=$this->input->post('name_search_detail')?>" class="form-control" placeholder="Поиск по наименованию">
                        </div>
                     <!--  </div>  -->                     
                      <!-- <div class="col-sm-3 col-xs-12"> -->
                        <div class="form-group pull-right">                          
                            <button type="submit" name="clear" value="yes" class="btn btn-success">Фильтр</button>   
                        </div>
                      </div>
                    <?=form_close()?>                  
                  </div>
                </div> 
              </div>           
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
                <?php if($this->ion_auth->in_group('operator')): ?>
                  <th>Действия</th>
                <?php endif; ?>                  
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
                    <?php if($this->ion_auth->in_group('operator')): ?>
                      <td data-label="Удалить:"><a  href="/main/request_del/<?=$row['id_request']?>" role="button"class="btn  btn-danger" data-toggle="modal">del</a></td>                      
                    <?php endif; ?>
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