<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
    <div class="blog-masthead">
      <div class="container">
        <nav class="blog-nav">
          <a class="blog-nav-item <?php echo (uri_string() == 'main/index') ? 'active' : '' ?>" href="/main/index"><b>Заявки</b></a>
          <a class="blog-nav-item <?php echo (uri_string() == 'main/request') ? 'active' : '' ?>" href="/main/request"><b>Добавить заявку</b></a>
          <a class="blog-nav-item <?php echo (uri_string() == 'main/about') ? 'active' : '' ?>" href="/main/about"><b>О сервисе</b></a>
          <a class="blog-nav-item <?php echo (uri_string() == 'main/login') ? 'active' : '' ?>" href="/auth/login"><b>Выход</b></a>
        </nav>
      </div>
    </div>