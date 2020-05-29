<?php
require $_SERVER['DOCUMENT_ROOT'] . '/functions/EnumAnswer.php';

/**
 * Регистрация
 * Class RegFunc
 */
class RegFunc
{
    /**
     * Регистрация первого пользователя
     *
     * @param array $arrData
     * @param string $sFileName
     */
    public function FirstUserRegistration(array $arrData, string $sFileName)
    {
        $arrNewUser[] = [
            'login' => $arrData['login'],
            'email' => $arrData['email'],
            'password' => md5($arrData['password'])
        ];
        $sJson = json_encode($arrNewUser, JSON_UNESCAPED_UNICODE);
        file_put_contents($sFileName, $sJson);
        echo EnumAnswer::REGISTRATION;
    }

    /**
     * Регистрация пользователя
     *
     * @param array $arrData
     * @param string $sFileName
     * @param array $arrOldUsers
     */
    public function UserRegistration(array $arrData, string $sFileName, array $arrOldUsers)
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