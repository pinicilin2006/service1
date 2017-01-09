<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
		<div class="col-sm-3  blog-sidebar">
<!--           <div class="sidebar-module">
            <h4>Архив заявок</h4>
            <ol class="list-unstyled">
              <li><a href="#">Март 2016</a></li>
              <li><a href="#">Февраль 2016</a></li>
              <li><a href="#">Январь 2016</a></li>
              <li><a href="#">Декабрь 2015</a></li>
              <li><a href="#">Ноябрь 2015</a></li>
              <li><a href="#">Октябрь 2015</a></li>
              <li><a href="#">Сентябрь 2015</a></li>
              <li><a href="#">Август 2015</a></li>
              <li><a href="#">Июль 2015</a></li>
              <li><a href="#">Июнь 2015</a></li>
              <li><a href="#">Май 2015</a></li>
              <li><a href="#">Апрель 2015</a></li>
            </ol>
          </div> -->
          <div class="sidebar-module">
            <div class="panel panel-default">
              <?php if($this->ion_auth->logged_in()):?> 
              <!-- Default panel contents -->
              <div class="panel-heading">Новости <a href="http://tklient.ru">TKlient.ru</a>:</div>
              <!-- List group -->
              <ul class="list-group">
                    <li class="list-group-item"><small><em>Мы рады Вам представить новый сервис по поиску контрактных автозапчастей.<br> Если вы нашли ошибку в сервисе, то просьба сообщить о ней по адресу <a href="mailto:info@tklient.ru">info@tklient.ru.</a></em></small></li>
                    <li class="list-group-item"><small><em>Согласно пожеланиям клиентов добавлена возможность оставлять примечание к заявке.</em></small></li>
                    <li class="list-group-item"><small><em>Добавлена возможность отправлять sms. Лимит sms для пользователя 100 штук. Возможность будет доступна только при внесение платы за полный доступ. Увелечение лимита sms возможно за дополнительную плату. Цена сверх лимита 2 рубля за смс</em></small></li>
              </ul>
              <?php endif;?>             
            </div>

   
          </div>
    </div><!-- /.blog-sidebar -->


