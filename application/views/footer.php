
        <!--<div class="container">-->
        <!--    <div class="footer-content">-->
        <!--        <div class="row">-->
        <!--            <div class="col-md-12  pagination-centered">-->

        <!--                    <div>-->
        <!--                        <script type="text/javascript">(function() {-->
        <!--                          if (window.pluso)if (typeof window.pluso.start == "function") return;-->
        <!--                          if (window.ifpluso==undefined) { window.ifpluso = 1;-->
        <!--                            var d = document, s = d.createElement('script'), g = 'getElementsByTagName';-->
                                    <!-- s.type = 'text/javascript'; s.charset='UTF-8'; s.async = true; -->
        <!--                            s.src = ('https:' == window.location.protocol ? 'https' : 'http')  + '://share.pluso.ru/pluso-like.js';-->
        <!--                            var h=d[g]('body')[0];-->
        <!--                            h.appendChild(s);-->
        <!--                          }})();</script>-->
        <!--                       <div class="pluso" data-background="transparent" data-options="medium,round,line,horizontal,counter,theme=06" data-services="vkontakte,odnoklassniki,facebook,twitter,google,moimir"></div>-->
        <!--                    </div>-->
        <!--            </div>    -->
        <!--        </div>-->
        <!--    </div>-->
        <!--</div>-->
    <div id="top">
        <a href='#'><span class="glyphicon glyphicon-arrow-up"></span></a>
    </div>
    <div class="blog-footer">
        <div class='container'>
            <div class='row'>
                    <div class="col-sm-6 footer-menu">
                        <ul class="list-unstyled">
                        <?php if($this->ion_auth->logged_in()):?>                       
                            <li><a href="/auth/edit_user/<?=$this->ion_auth->user()->row()->id?>"><small>Личный кабинет</small></a></li>
                        <?php endif;?>    
                        <?php if($this->ion_auth->is_admin()):?>
                            <li><a href="/auth/"><small>Админка</small></a></li>
                        <?php endif;?>                            
                        </ul>
                    </div>
                    <div class="col-sm-6 text-right">
                        <ul class="list-unstyled">
                            <li><a href="mailto:info@tklient.ru"><small>Связаться с нами</small></a></li>
                            <li><a href="http://h-aa.ru"><small>Изготовление сайта</small></a></li> 
                        </ul>                                              
                    </div>            
            </div>
        </div>
    </div><