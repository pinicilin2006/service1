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
            <p class="lead">TKlient.ru является удобным инструментом для поиска и продажи запчастей.</p> 
            <p>Ежедневно сотни клиентов оставляют свои заявки и только десятки авторизованных авторазборов отвечают на них.</p>
            
            <div class="col-sm-6">
              Отправьте запрос в TKlient.ru и вы получите:
              <ul>
                <li>Лучшие предложения от авторазборов с твоего города и не только.</li>
                <li>Гарантию низкой цены на вашу запчасть (большое количество авторазборок в клиентской базе гарантирует конкуренцию).</li>
                <li>Только проверенные и надёжные авторазборы (проверка уставных документов и исключительно платный доступ к базе заявок).</li>
              </ul>
            </div>
            <div class="col-sm-6">
              Отвечая на запросы в TKlient.ru и вы получите:
              <ul>
                <li>Ежедневное поступление горячих заявок на ДВС, КПП, кузовные элементы и прочие детали (всего 17 груп деталей)</li>
                <li>Количество заявок не менее 300 в день (все заявки проходят модерацию)</li>
                <li>Ограниченное количество авторазборов. Будь в числе первых!</li>
                <li>Увеличение продаж вашего разбора/стола заказов!</li>
              </ul>
            </div>

        </div><!-- /.blog-main -->

        <?php //include_once('right_sidebar.php') ?>

      </div><!-- /.row -->

    </div><!-- /.container -->
    <?php include_once('footer.php'); ?> 
    <?php include_once('javascript.php'); ?>
  </body>
</html>    
