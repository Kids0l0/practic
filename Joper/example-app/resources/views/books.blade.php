<!DOCTYPE html>
<html lang="ru">

<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Route;
foreach ($admin as $item) {
    if ($item->admining == 1) {
        $ad = 1;
    } else {
        $ad = 0;
    }
} ?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Книги</title>
    <style>
        body {
            background-color: white;
        }

        h2 {
            color: #080710;
            font-size: 28px;
            font-weight: 800;
        }

        .nazv {
            color: #080710;
            font-size: 16px;
            font-weight: 600;
        }

        .conteiner {
            padding-top: 75px;
            margin: 0 auto;
            width: 77%;
            height: 100%;
        }

        .das {
            text-align: center;
        }

        .conteiner .card {
            box-shadow: 0 6px 10px rgba(0, 0, 0, .1);
            padding: 5px;
            display: inline-block;
            border-radius: 5px;
            height: 350px;
            width: 300px;
            margin: 0 8px 20px 8px;
            background: lightcyan;
            text-align: center;
        }

        img {
            justify-content: center;
            height: 280px;
        }

        .navbar {
            position: fixed;
            background: white;
            width: 100%;
            height: 70px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, .1);
        }

        .navbar .container {
            height: inherit;
            display: flex;
            justify-content: space-around;
            align-items: center;
        }

        .navbar-menu {
            list-style-type: none;
            padding-left: 0;
            margin-bottom: 0;
        }

        .navbar-menu li {
            display: inline-block;
        }

        .navbar-menu li a {
            display: inline-block;
            color: #000;
            opacity: .6;
            text-decoration: none;
            padding: 10px;
            transition: all 0.07s ease-in-out;
        }

        .navbar-menu li a:hover {
            opacity: 1;
            text-decoration: underline black;
            transition: all 0.07s ease-in-out;
        }

        .navbar-wrap {
            display: flex;
            flex-flow: row nowrap;
        }

        .navbar-brand {
            font-weight: 700;
            font-size: 26px;
            text-decoration: none;
            color: #000;
        }
    </style>
</head>

<header>
    <div class="navbar">
        <div class="container">
            <a href="#" class="navbar-brand">Библиотека Знаний</a>
            <div class="navbar-wrap">
                <ul class="navbar-menu">
                    <?php
                    if ($ad == 1)
                        echo "<li><a href=\"/insertBook\">Добавить книгу</a></li>";
                        echo "<li><a href=\"\">Редактировать</a></li>";
                        echo "<li><a href=\"\">Удалить</a></li>";
                    ?>
                    <li><a href="">Контакты</a></li>
                    <li><a href="">Выйти</a></li>
                </ul>
            </div>
        </div>
    </div>
</header>

<body>
    <div class="conteiner">
        <h2>Произведения</h2>
        <div class="das">
            <?php
            $books = DB::select('SELECT Autor.name_autor, books.title, books.count_page, books.image FROM books, Autor WHERE books.author_id = Autor.autor_id');
            foreach ($books as $i) {
                echo "<div class=\"card\"><img src=\"{$i->image}\" alt=\"{$i->title}\"/><p class=\"nazv\">{$i->name_autor}<br>{$i->title}</p></div>";
            }
            ?>
        </div>
    </div>

</body>

</html>
