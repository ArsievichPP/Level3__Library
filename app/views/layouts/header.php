<section id="header" class="header-wrapper">
    <nav class="navbar navbar-default">
        <div class="container">
            <div class="col-xs-5 col-sm-2 col-md-2 col-lg-2">
                <div class="logo"><a href="http://<?php echo HOST_NAME ?>/" class="navbar-brand"><span class="sh">Ш</span><span
                                class="plus">++</span></a></div>
            </div>
            <div class="col-xs-12 col-sm-7 col-md-8 col-lg-8">
                <div class="main-menu">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <form class="navbar-form navbar-right" method="post" action="/search" autocomplete="off">
                            <div class="form-group">
                                <input id="search" name="search" type="text" placeholder="Найти книгу" class="form-control">
                                <div class="loader"><img src="/public/images/loading.gif"></div>
                                <div id="list" size="" class="bAutoComplete mSearchAutoComplete"></div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-xs-2 col-sm-3 col-md-2 col-lg-2 hidden-xs">
                <div class="social"><a href="https://www.facebook.com/shpp.kr/" target="_blank"><span
                                class="fa-stack fa-sm"><i class="fa fa-facebook fa-stack-1x"></i></span></a>
                                    <a href="http://programming.kr.ua/ru/courses#faq" target="_blank"><span class="fa-stack fa-sm"><i
                                class="fa fa-book fa-stack-1x"></i></span></a>
                                    <a href="http://<?php echo HOST_NAME ?>/admin" target="_blank"><span class="fa-stack fa-sm"><i
                                class="fa fa-cogs fa-stack-1x"></i></span></a></div>
            </div>
        </div>
    </nav>
</section>