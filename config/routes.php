<?php
return array(
    array(
        'pattern' => '^$',
        'route' => ['controller' => 'books', 'action' => 'index']
    ),
    array(
        'pattern' => '^books$',
        'route' => ['controller' => 'books', 'action' => 'index']
    ),
    array(
        'pattern' => '^(?P<controller>book)/(?P<book_id>[0-9]+)$',
        'route' => ['action' => 'index']
    ),
    array(
        'pattern' => '^admin$',
        'route' => ['controller' => 'admin', 'action' => 'index']
    ),
    array(
        'pattern' => '^admin/addBook$',
        'route' => ['controller' => 'admin', 'action' => 'addBook']
    ),
    array(
        'pattern' => '^admin/deleteBook$',
        'route' => ['controller' => 'admin', 'action' => 'deleteBook']
    ),
    array(
        'pattern' => '^search$',
        'route' => ['controller' => 'books', 'action' => 'search']
    ),
    array(
        'pattern' => '^wantRead$',
        'route' => ['controller' => 'book', 'action' => 'increaseClicks']
    ),
    array(
        'pattern' => '^logout$',
        'route' => ['controller' => 'admin', 'action' => 'logout']
    )
);