<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class user extends Controller
{
    public function bookis()
    {
        if (isset($_GET['login'])) {
            $user = DB::select("SELECT name_user, password_user, admining FROM user WHERE name_user = \"{$_GET['username']}\"");
            $pass = DB::select("SELECT name_user, password_user FROM user WHERE password_user = \"{$_GET['password']}\"");
            if (count($user) == 0) {
                echo "<p>Неверное имя пользователя!<br></p>";
            } else if (count($pass) == 0) {
                echo "<p>Неверный пароль!<br></p>";
            } else {
                if ($_GET['password'] == $user[0]->password_user) {
                    return view('books',['admin'=> $user]);
                }
            }
        }
    }

    public function cont()
    {
        return view('insert');
    }

    public function insert(){
        $nameBooks = $_GET['nameBooks'];
        $author = $_GET['author'];
        $count_page = $_GET['count_page'];
        $image = $_GET['image'];
        DB::insert('INSERT INTO \'books\' (author_id, title, count_page, image) VALUE (?, ?, ?, ?)',[$author, $nameBooks, $count_page, $image]);
    }
}
