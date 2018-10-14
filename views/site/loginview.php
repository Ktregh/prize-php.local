<div class="logindiv">
    <form action="/controllers/LoginController.php" method="post" class="mineform">
        <table>
            <tbody>
                <tr>
                    <th colspan="2">
                        Для участия в розыгрыше призов необходимо авторизоваться!
                    </th>
                </tr>
               
                <tr>
                    <td>
                        E-mail:
                    </td>
                    <td>
                        <input class="inputAuthText" type="text" name="login" />
                    </td>
                </tr>
                <tr>
                    <td>
                        Пароль:
                    </td>
                    <td>
                        <input class="inputAuthText" type="password" name="password" />
                    </td>
                </tr>
                <tr>
                    <td>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input id="enter" type="submit" name="enter" value="Войти" />
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <a href="respass">Забыли пароль?</a>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <a href="registration">Регистрация</a>						
                    </td>
                </tr>
            </tbody>
        </table>
    </form>
</div>
