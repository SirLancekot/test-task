<?php
include '/inc/header.php';
include '/db-connect.php';


$query = "SELECT id, title, content, date FROM news ORDER BY date DESC LIMIT 3"; //производим выборку по двум столбцам запросом SQL
$result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));
if (!$result) { //в случае ошибки запроса уведомляем об этом
    echo "Выполнение запроса прошло не успешно";
}

mysqli_close($link); // закрываем соединение с базой данных
?>

<section>
    <div class="container">

        <h1>Новости</h1>
        <div class="wrap-news-main">

            <?php

            while ($row = mysqli_fetch_row($result)) { //выводим на страницу результаты выборки
            ?>
                <article class="item-news-main">
                    <h3><?= $row[1] ?></h3>
                    <div class="content-news-main"><?= $row[2] ?></div>
                    <date><?= $row[3] ?></date>
                </article>
            <?php
                //echo "Заголовок новости - $row[1]<br> Содержание - $row[2] <br> Дата $row[3]<hr>";
            }
            ?>
        </div>
        <div class="wrap-buttons">
            <a href="/demis/news.php" class="button-main">Все новости</a>
            <a href="/demis/info-form.php" class="button-main">Обратная связь</a>
        </div>
    </div>
</section>
<?php
require '/inc/footer.php';
