<?php
require_once "C:\OSPanel\domains\localhost\pocker\include\db.php";

$data = $_POST;
if (isset($data['do_signup'])) {
    //регистрация

    if (trim($data['login']) == '') {
        $errors[] = 'Введите логин!';
    }
    if (trim($data['email']) == '') {
        $errors[] = 'Введите Email!';
    }
    if (trim($data['password']) == '') {
        $errors[] = 'Введите пароль!';
    }
    if (trim($data['password_2']) != $data['password']) {
        $errors[] = 'Повторный пароль введен не верно!';
    }

    if (empty($errors)) {
        //все ок
        $user = R::dispense('user');
        $user->login = $data['login'];
        $user->email = $data['email'];
        $user->password = $data['password'];
        R::store($user);
        echo '<div style="color: green;">'.'Регистрация успешна</div><hr>';
    } else {
        echo '<div style="color: red;">' . array_shift($errors) . '</div><hr>';
    }
}
?>


<form action="Signup.php" method="post">
    <p>
    <p><strong>Ваш логин</strong></p>
    <input type="text" name="login">
    </p>

    <p>
    <p><strong>Ваш email</strong></p>
    <input type="email" name="email">
    </p>
    <p>
    <p><strong>Ваш пароль</strong></p>
    <input type="password" name="password">
    </p>
    <p>
    <p><strong>Повторите пароль</strong></p>
    <input type="password" name="password_2">
    </p>
    <p>
        <button type="submit" name="do_signup">Зарегистрироваться</button>
    </p>
</form>
