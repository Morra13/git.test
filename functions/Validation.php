<?php
require $_SERVER['DOCUMENT_ROOT'] . '/functions/EnumError.php';

/**
 * Проверка данных
 * Class Validation
 */
class Validation
{
    /**
     * Проверка введенных данных
     *
     * @param array $arrData
     * @return mixed
     */
    public function dataValidation(array $arrData)
    {
        if (isset($arrData['reg'])) {
            if (trim($arrData['login'] == '')) {
                $arrError[] = 'Введите логин!';
            }
            if (trim($arrData['email'] == '')) {
                $arrError[] = EnumError::ERROR_NO_EMAIL;
            }
            if ($arrData['password'] == '') {
                $arrError[] = EnumError::ERROR_PASSWORD;
            }
            if ($arrData['password_2'] != $arrData['password']) {
                $arrError[] = EnumError::ERROR_PASSWORD;
            }
        }
        if (isset($arrError)) {
            echo array_shift($arrError);
        } else {
            return true;
        }
    }

    /**
     * Проверка наличия данных в файле
     *
     * @param $arrOldUsers
     * @return bool
     */
    public function fileValidation($arrOldUsers): bool
    {
        if (isset($arrOldUsers)) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Проверка логина и емейла на совпадение
     *
     * @param array $arrData
     * @param array $arrOldUsers
     * @return mixed
     */
    public function userValidation(array $arrData, array $arrOldUsers)
    {
        foreach ($arrOldUsers as $arrValue) {
            if (trim($arrData['login']) === $arrValue['login']) {
                $arrError[] = EnumError::ERROR_LOGIN;
            }
            if (trim($arrData['email']) === $arrValue['email']) {
                $arrError[] = EnumError::ERROR_EMAIL;
            }
        }
        if (isset($arrError)) {
            echo array_shift($arrError);
        } else {
            return true;
        }
    }

    /**
     * Проверка емейла и пароля
     *
     * @param array $arrData
     * @param array $arrUsers
     * @return mixed
     */
    public function authValidation(array $arrData, array $arrUsers)
    {
        foreach ($arrUsers as $arrValue) {
            if (trim($arrData['email']) === $arrValue['email'] && md5($arrData['password']) === $arrValue['password']) {
                return true;
            }
        }
        $arrError[] = EnumError::ERROR_EMAIL_PASSWORD;

        require($_SERVER['DOCUMENT_ROOT'] . '/templates/header.php');

        echo array_shift($arrError);
        if (!isset($arrError)) {
            require($_SERVER['DOCUMENT_ROOT'] . '/templates/footer.php');
        }
    }

}