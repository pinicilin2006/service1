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
  			<li><b>Регион/город:</b></li>
  			<li><?=$row['region_name']?> / <?=$row['city_name']?><li>
		</ol>
	</li>	
	<li class="list-group-item">
		<ol class="list-inline">
  			<li><b>Марка/модель автомобиля:</b></li>
  			<li><?=$row['mark_name']?> / <?=$row['model_name']?></li>
		</ol>
	</li>
	<?php if(isset($row['auto_year'])):?>
	<li class="list-group-item">
		<ol class="list-inline">
  			<li><b>Год выпуска автомобиля:</b></li>
  			<li><?=$row['auto_year']?></li>
		</ol>
	</li>
	<?php endif;?>

	<li class="list-group-item">
		<ol class="list-inline">
  			<li><b>Категория детали:</b></li>
  			<li><?=$row['name_detail_category']?></li>
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
  			<li><b>Дополнительная информация:</b></li>
  			<li><?=$row['dop_info']?></li>
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
	<li class="list-group-item">
		<textarea name="notes" id="<?=$row['id_request']?>" class="user_notes" rows="2" placeholder="Здесь вы можете оставить отметку о работе по данной заявке, которая видна будет только Вам" style="width:100%;"><?=$notes_text?></textarea>		
	</li>						

	  <?php	if($this->ion_auth->logged_in() && $this->ion_auth->in_group('SMS') && $row['phone']):?>
	  	<li class="list-group-item">
	  		<div id="sms_data">
				<form class="form-inline" id='send_sms' role="form">
				  <div class="form-group">
				    <label class="sr-only" for="sms_name">Название детали</label>
				    <input type="text" class="form-control" name="sms_name" id="sms_name" placeholder="Название детали" required="required">
				  </div>
				  <div class="form-group">
				    <label class="sr-only" for="sms_price">Цена</label>
				    <input type="text" class="form-control" name="sms_price" id="sms_price" placeholder="Цена" required="required">
				  </div>
				  <input type="hidden" name="id_request" value="<?=$row['id_request']?>"></input>
				  <button type="submit" id="button_send_sms" data-loading-text="Отправка..." class="btn btn-success">Отправить SMS</button>
				</form>
			</div>
	  	</li>
	  <?php endif;?>
  <?php endforeach;?>	  
</ol>

	
