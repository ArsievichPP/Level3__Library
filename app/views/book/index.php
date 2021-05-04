<section id="main" class="main-wrapper">
    <div class="container">
        <div id="content" class="book_block col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <script id="pattern" type="text/template">
                <div data-book-id="{id}" class="book_item col-xs-6 col-sm-3 col-md-2 col-lg-2">
                    <div class="book">
                        <a href="/book/{id}"><img src="img/books/{id}.jpg" alt="{title}">
                            <div data-title="{title}" class="blockI">
                                <div data-book-title="{title}" class="title size_text">{title}</div>
                                <div data-book-author="{author}" class="author">{author}</div>
                            </div>
                        </a>
                        <a href="/book/{id}">
                            <button type="button" class="details btn btn-success">Читать</button>
                        </a>
                    </div>
                </div>
            </script>
            <div id="id" book-id="<?php echo($data[0]['id']) ?>">
                <div id="bookImg" class="col-xs-12 col-sm-3 col-md-3 item" style="
    margin:;
"><img src="<?php echo('/public/images/' . $data[0]['image']) ?>" alt="Responsive image" class="img-responsive">

                    <hr>
                </div>
                <div class="col-xs-12 col-sm-9 col-md-9 col-lg-9 info">
                    <div class="bookInfo col-md-12">
                        <div id="title" class="titleBook"><?php echo($data[0]['book_name']) ?></div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <div class="bookLastInfo">
                            <div class="bookRow"><span class="properties">автор:</span><span
                                        id="author"><?php echo($data[0]['author']) ?></span></div>
                            <div class="bookRow"><span class="properties">год:</span><span
                                        id="year"><?php echo($data[0]['year']) ?></span></div>
                            <div class="bookRow"><span class="properties">страниц:</span><span
                                        id="pages"><?php echo($data[0]['num_pages']) ?></span></div>
                            <div class="bookRow"><span class="properties">isbn:</span><span id="isbn"></span></div>
                        </div>
                    </div>
                    <div class="btnBlock col-xs-12 col-sm-12 col-md-12">

                        <button type="button" class="btnBookID btn-lg btn btn-success" name="id"
                                value="<?php echo($data[0]['id']) ?>">Хочу читать!
                        </button>

                        <script>
                            $(document).ready(function () {
                                $('button.btnBookID').on('click', function () {
                                    var book_id = $('button.btnBookID').val();
                                    $.ajax({
                                        type: "POST",
                                        url: "/wantRead",
                                        data: {id: book_id},
                                        success: function () {
                                            alert("Книга свободна и ты можешь прийти за ней." +
                                            " Наш адрес: г. Кропивницкий, переулок Васильевский 10, 5 этаж." +
                                            " Лучше предварительно прозвонить и предупредить нас, чтоб " +
                                            " не попасть в неловкую ситуацию. Тел. 099 196 24 69");
                                        }
                                    });
                                });
                            });
                        </script>


                    </div>
                    <div class="bookDescription col-xs-12 col-sm-12 col-md-12 hidden-xs hidden-sm">
                        <h4>О книге</h4>
                        <hr>
                        <p id="description"><?php echo($data[0]['about_book']) ?></p>
                    </div>
                </div>
                <div class="bookDescription col-xs-12 col-sm-12 col-md-12 hidden-md hidden-lg">
                    <h4>О книге</h4>
                    <hr>
                    <p class="description"><?php echo($data[0]['about_book']) ?></p>
                </div>
            </div>
            <script src="../public/js/book.js" defer=""></script>
        </div>
    </div>
</section>