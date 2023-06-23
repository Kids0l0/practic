<?php
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Route;
?>
<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Добавление</title>
    <style>
        form{
            height: 300px;
            width: 500px;
            margin: 0 auto;
        }
    </style>
</head>

<body>
    <form action="{{route('insertBook')}}" method="get">
        <h3>Добавление</h3>
        <label for="username">Название</label>
        <input type="text" name="nameBooks" id="username" placeholder="Введите название">
        <label for="author">Автор</label>
        <select name="author">
            <?php
            $autor = DB::select("SELECT autor_id, name_autor FROM Autor");
            foreach($autor as $value){
                echo "<option value=\"{$value->autor_id}\">{$value->name_autor}</option>";
            }   
            ?>
        </select>
        <label for="count_page">Количество страниц</label>
        <input type="number" name="count_page" placeholder="Введите количество страниц"/>
        <label for="image">Изображение</label>
        <input type="text" name="image" placeholder="Введите ссылку на изображение"/>
        <input type="submit" name="login" value="Добавить"/>
    </form>
</body>

</html>
