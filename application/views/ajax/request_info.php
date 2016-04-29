<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!-- <pre>
	<?php print_r($request_info)?>
</pre> -->
<ol class="list-group">
  	<li class="list-group-item active">Полная информация по заявке</li>
  <?php foreach($request_info as $row):?>
	
	<li class="list-group-item">
		<ol class="list-inline">
  			<li><b>ID заявки:</b></li>
  			<li><?=$row['id_request']?></li>
		</ol>
	</li>
	<li class="list-group-item">
		<ol class="list-inline">
  			<li><b>Регион:</b></li>
  			<li><?=$row['region_name']?></li>
		</ol>
	</li>	
	<li class="list-group-item">
		<ol class="list-inline">
  			<li><b>Город:</b></li>
  			<li><?=$row['city_name']?></li>
		</ol>
	</li>
	<li class="list-group-item">
		<ol class="list-inline">
  			<li><b>Марка автомобиля:</b></li>
  			<li><?=$row['mark_name']?></li>
		</ol>
	</li>
	<li class="list-group-item">
		<ol class="list-inline">
  			<li><b>Модель автомобиля:</b></li>
  			<li><?=$row['model_name']?></li>
		</ol>
	</li>
	<?php if(isset($row['modification_name'])):?>
	<li class="list-group-item">
		<ol class="list-inline">
  			<li><b>Модификация автомобиля:</b></li>
  			<li><?=$row['modification_name']?></li>
		</ol>
	</li>
	<?php endif;?>

	<li class="list-group-item">
		<ol class="list-inline">
  			<li><b>Категоря детали:</b></li>
  			<li><?=$row['name_detail_category']?></li>
		</ol>
	</li>
	<li class="list-group-item">
		<ol class="list-inline">
  			<li><b>Тип детали:</b></li>
  			<li><?=$row['name_detail_type']?></li>
		</ol>
	</li>	
	<li class="list-group-item">
		<ol class="list-inline">
  			<li><b>Название детали (деталей):</b></li>
  			<li><?=$row['detail_name']?></li>
		</ol>
	</li>
	<li class="list-group-item">
		<ol class="list-inline">
  			<li><b>Срочность:</b></li>
  			<li><?=$row['urgency_name']?></li>
		</ol>
	</li>
	<li class="list-group-item">
		<ol class="list-inline">
  			<li><b>Максимальная цена:</b></li>
  			<li><?=$row['price']?></li>
		</ol>
	</li>
	<li class="list-group-item">
		<ol class="list-inline">
  			<li><b>Имя клиента:</b></li>
  			<li><?=$row['name']?></li>
		</ol>
	</li>
	<li class="list-group-item">
		<ol class="list-inline">
  			<li><b>Телефон:</b></li>
  			<li><a href="tel:+<?=preg_replace("/\D+/", "", $row['phone'])?>"><?=$row['phone']?></a></li>
		</ol>
	</li>
	<li class="list-group-item">
		<ol class="list-inline">
  			<li><b>Email:</b></li>
  			<li><a href="mailto:<?=$row['email']?>"><?=$row['email']?></a></li>
		</ol>
	</li>					
  <?php endforeach;?>
</ol>
