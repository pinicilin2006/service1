<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="row">
    <div class="col-sm-9">
		<div class="blog-header">
		    <h1 class="blog-title">Tklient.ru - регулярно обновляемая база заявок <br>по поиску контрактных запчастей</h1>
		    <p class="lead blog-description">Гарантия низкой цены на контрактные запчасти</p>
		</div>
	</div>
	<div class="col-sm-3">
		<div class="show-info">
			<div class="panel panel-default">
			  <!-- Default panel contents -->
			  <div class="panel-heading">Информация по заявкам:</div>
			  <!-- List group -->
			  <ul class="list-group">
			    <li class="list-group-item"><span class="badge"><?=$all_request_count_today?></span>Добавлено за сутки</li>
			    <li class="list-group-item"><span class="badge"><?=$all_request_count_all?></span>Всего заявок</li>
			  </ul>
			</div>


	    </div>		
	</div>
</div>
