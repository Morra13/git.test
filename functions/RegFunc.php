<?php
require $_SERVER['DOCUMENT_ROOT'] . '/functions/EnumAnswer.php';

/**
 * Регистрация
 * Class RegFunc
 */
class RegFunc
{

    /**
     * Регистрация пользователя
     *
     * @param array $arrData
     * @param string $sFileName
     * @param mixed $arrOldUsers
     */
    public function userRegistration(array $arrData, string $sFileName, $arrOldUsers)
    {
        $arrNewUser = [
            'login' => $arrData['login'],
            'email' => $arrData['email'],
            'password' => md5($arrData['password'])
        ];
        $arrOldUsers[] = $arrNewUser;
        $sJson = json_encode($arrOldUsers, JSON_UNESCAPED_UNICODE);
        file_put_contents($sFileName, $sJson);
        echo EnumAnswer::REGISTRATION;
    }
}