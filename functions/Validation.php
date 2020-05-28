<?php

class Validation
{
    public $sRegistration = 'Вы зарегистрировались';

    public function DataValidation(array $arrData)
    {
        if (isset($arrData['reg'])) {
            if (trim($arrData['login'] == '')) {
                $arrError[] = 'Введите логин!';
            }
            if (trim($arrData['email'] == '')) {
                $arrError[] = 'Введите email!';
            }
            if ($arrData['password'] == '') {
                $arrError[] = 'Введите пароль!';
            }
            if ($arrData['password_2'] != $arrData['password']) {
                $arrError[] = 'Повторный пароль не верный';
            }
        }
        if (isset($arrError)) {
            return array_shift($arrError);
        } else {
            return true;
        }
    }

    public function UserRegistration(array $arrData, string $sFileName)
    {
        $arrNewUser[] = [
            'login' => $arrData['login'],
            'email' => $arrData['email'],
            'password' => md5($arrData['password'])
        ];
        $sJson = json_encode($arrNewUser, JSON_UNESCAPED_UNICODE);
        file_put_contents($sFileName, $sJson);
        echo $this->sRegistration;
    }

    public function UserValidation(array $arrData, string $sFileName, array $arrOldUsers)
    {
        foreach ($arrOldUsers as $arrValue) {
            if (trim($arrData['login']) === $arrValue['login']) {
                $arrError[] = 'Такой логин уже есть!';
            }
            if (trim($arrData['email']) === $arrValue['email']) {
                $arrError[] = 'Такой email уже есть!';
            }
        }
        if (empty($arrError)) {
            $arrNewUser = [
                'login' => $arrData['login'],
                'email' => $arrData['email'],
                'password' => md5($arrData['password'])
            ];
            $arrOldUsers[] = $arrNewUser;
            $sJson = json_encode($arrOldUsers, JSON_UNESCAPED_UNICODE);
            file_put_contents($sFileName, $sJson);
            echo $this->sRegistration;
        } else {
            echo array_shift($arrError);
        }
    }

    public function AuthValidation(array $arrData, array $arrUsers)
    {
        foreach ($arrUsers as $v) {
            if (trim($arrData['email']) === $v['email'] && md5($arrData['password']) === $v['password']) {
                setcookie('pass_cookie', 'inf', time() + 86400, '/');
                header('Location: /php/info.php');
                exit;
            } else {
                $arrError[] = 'Не верный емейл или пароль';
            }
        }
        if (!empty($arrError)) {
            echo array_shift($arrError);
            require($_SERVER['DOCUMENT_ROOT'] . '/templates/header.php');
        }
    }

}