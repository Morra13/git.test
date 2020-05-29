<?php

/**
 * Авторизация и Выход
 * Class Auth
 */
class Auth
{
    /**
     * Авторизация
     */
    public function UserAuth()
    {
        setcookie('pass_cookie', 'inf', time() + 86400, '/');
        header('Location: /php/info.php');
    }

    /**
     * Выход
     */
    public function UserExit()
    {
        setcookie('pass_cookie', 'inf', time() - 1, '/');
        header('Location: /html/exit.php');
    }

}