<?php
require '/inc/header.php';
require '/db-connect.php';
$query = "SELECT id, title, content, date FROM news";
$result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));
if (!$result) {
    echo "Выполнение запроса прошло не успешно";
}
mysqli_close($link);
?>

<section class="all-news">
    <div class="container">
        <h1>Новости</h1>
        <div class="wrap-news">
            <?php 
            while ($row = mysqli_fetch_row($result)) {
                ?>
                    <article class="item-news">
                        <h2><?= $row[1]; ?></h2>
                        <date><?= $row[3]; ?></date>
                        <p class="content-news"> <?= $row[2];?></p>
                    </article>
                <?php
            }
            ?>
        </div>
    </div>
</section>

<?php
    require '/inc/footer.php';