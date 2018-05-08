<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>  
        <nav class="navbar navbar-default navbar-fixed-top">
            <div class="container">
                <div class="row">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
                          <i class="fa fa-bars"></i>
                        </button>
                        <div class="logo-wrapper">
                            <a  href="/main/index/all">
                                <img src="/assets/images/logo_brand3.png" alt="TKlient.ru" > 
                            </a>
                        </div>  
                    </div>
                    <div class="collapse navbar-collapse" id="main-menu">
                        <ul class="nav navbar-nav navbar-right">
                            <li><span></span><a class=" <?php echo (uri_string() == 'main/index/all' OR uri_string() == 'main/index' OR uri_string() == '') ? 'active' : '' ?>" href="/main/index/all"><b>Заявки</b></a></li>
                            <li><span></span><a class=" <?php echo (uri_string() == 'main/request') ? 'active' : '' ?>" href="/main/request"><b>Добавить заявку</b></a></li>
                            <li><span></span><a class=" <?php echo (uri_string() == 'main/about') ? 'active' : '' ?>" href="/main/about"><b>О сервисе</b></a></li>
                            <?php if($this->ion_auth->logged_in()):?>
                              <li><span></span><a class=" <?php echo (uri_string() == 'auth/logout') ? 'active' : '' ?>" href="/auth/logout"><b>Выход</b></a></li>
                            <?php else: ?>
                              <li><span></span><a class=" <?php echo (uri_string() == 'auth/login') ? 'active' : '' ?>" href="/auth/login"><b>Вход</b></a></li>
                            <?php endif; ?>
                        </ul>
                    </div>
                </div> 
            </div>
        </nav>
    <div class="container">
            <div class="row">
                    <!--google adsense-->
            </div>
    </div>
