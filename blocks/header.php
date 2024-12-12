<header>
    <span class="logo">Blog Master</span>
    <nav>
        <a href="/">Главная</a>
        <a href="/contacts.php">Контакты</a>
        <?php if(isset($_COOKIE['login'])) : ?>
            <a href="/add-article.php">Добавить статью</a>
            <a href="/users.php" class="btn">Список пользователей</a>
            <a href="/login.php" class="btn">Кабинет пользователя</a>
        <?php else : ?>
            <a href="/login.php" class="btn">Войти</a>
            <a href="/register.php" class="btn">Регистрация</a>
        <?php endif; ?>
    </nav>
</header>