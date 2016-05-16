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
            <div class="panel panel-success">
              <!-- Default panel contents -->
              <div class="panel-heading">Отчёт по смс</div>            
              <!-- List group -->
              <ul class="list-group">
                <li class="list-group-item">Всего доступно смс:<span class="badge"><?=($this->ion_auth->user()->row()->sms + $this->ion_auth->user()->row()->sms_paid)?></span></li>
                <li class="list-group-item">Из них бесплатных:<span class="badge"><?=($this->ion_auth->user()->row()->sms)?></span></li>
                <li class="list-group-item">Из них оплаченных:<span class="badge"><?=($this->ion_auth->user()->row()->sms_paid)?></span></li>                           
              </ul>
            </div>
          </div>	
          <p><small><em>Пояснение по начислению и списыванию смс. При оплате полного доступа на месяц автоматически начисляется 100 бесплатных смс. При желании, возможно купить дополнительный пакет смс сообщений из расчёта 1 смс = 2 рубля. Если на балансе есть бесплатные и платные сообщения, то при отправке смс списывается бесплатные. Количество списываемых смс зависит от размера сообщения. если в поле "Название детали" вбит большой текст и итоговая длина сообщения превышает 70 символов то списываются два смс сообщения. Если итоговая длина сообщения превышает 140 символов то списывается 3 сообщения и так далее. Если в течение оплаченного периода бесплатные смс израсходованы не полностью то при оплате следующего периода полного доступа зачисляется 100 смс. Оставшиеся не плюсуются. Оплаченные смс остаются без изменений и переходят на следующий период.</em></small></p>
        </div><!-- /.blog-main -->

        <?php $this->view('right_sidebar') ?>

      </div><!-- /.row -->

    </div><!-- /.container -->

    <?php $this->view('footer'); ?>
    <?php $this->view('javascript'); ?>
  </body>
</html>