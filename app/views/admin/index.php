<div class="container-fluid">
    <div class="row">
        <div class="col">
            <table class="table table-bordered">
                <caption>Таблица книг</caption>
                <thead class="table-dark">
                <tr>
                    <th scope="col">#id</th>
                    <th scope="col">Название книги</th>
                    <th scope="col">Авторы</th>
                    <th scope="col">Год</th>
                    <th scope="col">Действия</th>
                    <th scope="col">Просмотров</th>
                    <th scope="col">Кликов</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($books as $book): ?>
                    <tr>
                        <th scope="row"><?php echo $book['id'] ?></th>
                        <td><?php echo $book['book_name'] ?></td>
                        <td><?php echo $book['author'] ?></td>
                        <td><?php echo $book['year'] ?></td>
                        <td>
                            <form name="delete" action="/admin/deleteBook/" method="post">
                                <?php if (!$book['deleted']): ?>
                                    <button class="btn-danger" type="submit" name="id"
                                            value="<?php echo $book['id'] ?>">delete
                                    </button>
                                <?php else: ?>
                                    <button class="btn disabled" >delete
                                    </button>
                                <?php endif ?>
                            </form>
                        </td>
                        <td> <?php echo $book['views'] ?></td>
                        <td> <?php echo $book['clicks'] ?></td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
            <nav aria-label="pagination">
                <ul class="pagination justify-content-center ">
                    <?php for ($i = 1; $i <= $sum_page; $i++): ?>
                        <?php if ($i == $current_page): ?>
                            <li class="page-item active"><a class="page-link" href=""><?php echo $i; ?></a></li>
                        <?php else: ?>
                            <li class="page-item"><a class="page-link"
                                                     href="/admin/?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
                        <?php endif; ?>
                    <?php endfor; ?>
                </ul>
            </nav>
        </div>
        <div class="col">
            <form enctype="multipart/form-data" action="/admin/addBook" method="post">
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="book_name">Название книги</label>
                            <input name="book_name" type="text" class="form-control" id="book_name"
                                   placeholder="Введите название"><br>

                            <label for="year">Год</label>
                            <input name="year" type="number" class="form-control" id="year" placeholder="Год"><br>

                            <label for="about_book">Описание</label>
                            <textarea class="form-control" name="about_book" id="about_book" rows="3"></textarea><br>
                        </div>
                    </div>
                    <div class="col">
                        <div class="row-cols-2">
                            <label for="author_1">Автор 1</label>
                            <input type="text" class="form-control" name="author_1" id="author_1"
                                   placeholder="Ф.И.О автора">
                            <label for="author_2">Автор 2</label>
                            <input type="text" class="form-control" name="author_2" id="author_2"
                                   placeholder="Ф.И.О автора">
                            <label for="author_3">Автор 3</label>
                            <input type="text" class="form-control" name="author_3" id="author_3"
                                   placeholder="Ф.И.О автора">

                            <label class="text-danger">Если авторов < 3, оставьте поля пустыми!</label><br>

                            <label>Загрузить обложку книги:</label><br>
                            <input type="file" class="form-control-file" name="image" id="image">
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-success">Добавить книгу →</button>
            </form>
        </div>
    </div>
</div>



