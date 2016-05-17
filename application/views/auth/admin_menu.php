<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<ul class="nav nav-pills">
  
	<li class="<?php echo (uri_string() == 'auth' ? 'active' : '') ?>"><a href="/auth/">Пользователи</a></li>
	<li class="<?php echo (uri_string() == 'user/admin_send_message' ? 'active' : '') ?>"><a href="/user/admin_send_message">Отправить сообщение</a></li>
</ul>
<hr>