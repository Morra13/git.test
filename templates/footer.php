<hr/>
<p><a href="/index.php">На главную страницу</a></p>

<?php
if (isset($_COOKIE['pass_cookie'])) {
    ?>
    <form action="/php/info.php" method="post" name="formPhp">
        <p><input type="submit" name="sub" value="Получить информацию из Json"></p>
    </form>
    <form action="/php/info.php" method="post">
        <p><input type="submit" name="exit" value="Выход"></p>
    </form>
    <?php
}
?>

</body>
</html>