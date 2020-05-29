<?php

/**
 * Ошибки
 * Class EnumError
 */
class EnumError
{
    /**
     * Есть такой логин
     */
    const ERROR_LOGIN = 'Такой логин уже существует!';
    /**
     * Есть такой email
     */
    const ERROR_EMAIL = 'Такой email уже есть!';
    /**
     * Нет email'а
     */
    const ERROR_NO_EMAIL = 'Введите email!';
    /**
     * Нет пароля
     */
    const ERROR_NO_PASSWORD = 'Введите пароль!';
    /**
     * Повторный пароль не правильный
     */
    const ERROR_PASSWORD = 'Повторный пароль не верный!';
    /**
     * Нет логина
     */
    const ERROR_NO_LOGIN = 'Введите логин!';
    /**
     * Не верный емейл или пароль
     */
    const ERROR_EMAIL_PASSWORD = 'Не верный емейл или пароль';
    /**
     * Ошибка доступа
     */
    const ACCESS_ERROR = 'У вас нет доступа!';

}