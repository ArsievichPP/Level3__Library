<section id="main" class="main-wrapper">
    <div class="container">
        <div id="content" class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <?php if (!empty($books)): ?>
                <?php foreach ($books as $book): ?>
                        <div data-book-id="<?php echo $book['id']; ?>"
                             class="book_item col-xs-6 col-sm-3 col-md-2 col-lg-2">
                            <div class="book">
                                <a href="http://<?php echo HOST_NAME ?>/book/<?php echo $book['id']; ?>"><img
                                            src="/public/images/<?php echo $book['image']; ?>"
                                            alt="<?php echo $book['book_name']; ?>">
                                    <div data-title="<?php echo $book['book_name']; ?>" class="blockI"
                                         style="height: 46px;">
                                        <div data-book-title="<?php echo $book['book_name']; ?>"
                                             class="title size_text"><?php echo $book['book_name']; ?>
                                        </div>
                                        <div data-book-author="<?php echo $book['author']; ?>"
                                             class="author"><?php echo $book['author']; ?></div>
                                    </div>
                                </a>
                                <a href="http://<?php echo HOST_NAME ?>/book/<?php echo $book['id']; ?>">
                                    <button type="button" class="details btn btn-success">Читать</button>
                                </a>
                            </div>
                        </div>
                <?php endforeach; ?>
            <?php endif; ?>

        </div>
    </div>
    <center>
        <?php if ($data['sum_page'] > 1 && $data['current_page'] == 1): ?>
            <a class="btn btn-success disabled" href="?page=<?php echo $data['current_page'] - 1 ?>" role="button">←
                Предыдущая</a>
            <label class="text-success"><?php echo $data['current_page'].'/'.$data['sum_page']?></label>
            <a class="btn btn-success btnBook" href="?page=<?php echo $data['current_page'] + 1 ?>" role="button">Следующая
                → </a>
        <?php elseif ($data['sum_page'] > 1 && $data['current_page'] > 1 && $data['current_page'] < $data['sum_page']): ?>
            <a class="btn btn-success" href="?page=<?php echo $data['current_page'] - 1 ?>" role="button">←
                Предыдущая</a>
            <label class="text-success"><?php echo $data['current_page'].'/'.$data['sum_page']?></label>
            <a class="btn btn-success" href="?page=<?php echo $data['current_page'] + 1 ?>" role="button">Следующая
                → </a>
        <?php elseif ($data['sum_page'] > 1 && $data['current_page'] > 1 && $data['current_page'] == $data['sum_page']): ?>
            <a class="btn btn-success" href="?page=<?php echo $data['current_page'] - 1 ?>" role="button">←
                Предыдущая</a>
            <label class="text-success"><?php echo $data['current_page'].'/'.$data['sum_page']?></label>
            <a class="btn btn-success disabled" href="?page=<?php echo $data['current_page'] + 1 ?>" role="button">Следующая
                → </a>
        <?php endif; ?>
    </center>
</section>