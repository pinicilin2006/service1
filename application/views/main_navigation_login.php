<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!--     <div class="blog-masthead">
      <div class="container">
        <nav class="blog-nav">
          <a class="blog-nav-item <?php echo (uri_string() == 'main/index') ? 'active' : '' ?>" href="/main/index"><b>Заявки</b></a>
          <a class="blog-nav-item <?php echo (uri_string() == 'main/request') ? 'active' : '' ?>" href="/main/request"><b>Добавить заявку</b></a>
          <a class="blog-nav-item <?php echo (uri_string() == 'main/about') ? 'active' : '' ?>" href="/main/about"><b>О сервисе</b></a>
          <a class="blog-nav-item <?php echo (uri_string() == 'auth/logout') ? 'active' : '' ?>" href="/auth/logout"><b>Выход</b></a>
        </nav>
      </div>
    </div> -->
    
        <nav class="navbar navbar-default navbar-fixed-top">
            <div class="container">
                <div class="row">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
                          <i class="fa fa-bars"></i>
                        </button>
                        <div class="logo-wrapper">
                            <a class="navbar-brand" href="/">
                                <p>TKLIENT.RU</p>
                            </a>
                        </div>  
                    </div>
                    <div class="collapse navbar-collapse" id="main-menu">
                        <ul class="nav navbar-nav navbar-right">
                            <li><span></span><a class=" <?php echo (uri_string() == 'main/index') ? 'active' : '' ?>" href="/main/index"><b>Заявки</b></a></li>
                            <li><span></span><a class=" <?php echo (uri_string() == 'main/request') ? 'active' : '' ?>" href="/main/request"><b>Добавить заявку</b></a></li>
                            <li><span></span><a class=" <?php echo (uri_string() == 'main/about') ? 'active' : '' ?>" href="/main/about"><b>О сервисе</b></a></li>
                            <li><span></span><a class=" <?php echo (uri_string() == 'auth/logout') ? 'active' : '' ?>" href="/auth/logout"><b>Выход</b></a></li>
                        </ul>
                    </div>
                </div> 
            </div>
        </nav>
    