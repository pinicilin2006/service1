<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<ul class="nav nav-tabs">
  
  <li class="<?php echo (uri_string() == 'auth/edit_user/'.$this->ion_auth->user()->row()->id ? 'active' : '') ?>"><a href="/auth/edit_user/<?=$this->ion_auth->user()->row()->id?>">Профиль</a></li>

<li class="<?php echo (uri_string() == 'user/user_message' ? 'active' : '') ?>"><a href="/user/user_message">Сообщения</a></li>

<?php if($this->ion_auth->in_group('Klient')):?>
<li class="<?php echo (uri_string() == 'user/user_sms' ? 'active' : '') ?>"><a href="/user/user_sms">Отчёт по SMS</a></li>
<?php endif;?>

<?php if($this->ion_auth->in_group('operator')):?>
<li class="<?php echo (uri_string() == 'user/user_request' ? 'active' : '') ?>"><a href="/user/user_request/">Отчёт по заявкам</a></li>
<?php endif;?>

<li class="<?php echo (uri_string() == 'user/user_payment' ? 'active' : '') ?>"><a href="/user/user_payment">Оплата</a></li>

</ul>
<hr>