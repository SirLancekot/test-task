    <?php
    require '/inc/header.php';
    require '/db-connect.php';
    ?>

    <section>
        <div class="container">
            <div class="wrap">
                <h1>Форма обратной связи</h1>
                <div id="form_container">
                    <form id="form" name="forma" action="form.php" method="post" accept-charset="UTF-8">
                        <ul class="errorMessages"></ul>

                        <label for="first_name">ФИО:</label>
                        <input id="first_name" type="text" onblur="requiredField(this)" name="first_name" placeholder="ФИО" required>

                        <label for="your_address">Адрес:</label>
                        <input id="your_address" type="text" name="your_address" onblur="requiredField(this)" placeholder="Адрес" required>

                        <label for="email">E-mail:</label>
                        <input id="email" type="email" name="email" onblur="requiredField(this)" placeholder="E-mail" required>

                        <label for="phone">Телефон:</label>
                        <input id="phone" type="tel" name="phone" onblur="requiredField(this)" placeholder="Телефон" minlength="11" maxlength="11" required>
                        <input name="submit" type="submit" value="Отправить">
                    </form>


                </div>
                <div id="table-form" style="display: none;">
                    <table id="customers">
                        <thead>
                            <tr>
                                <th>Вас зовут</th>
                                <th>Адрес</th>
                                <th>Почта</th>
                                <th>Номер</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php
                            $queryForm = "SELECT first_name, your_address, email, phone FROM formweb";
                            $resultForm = mysqli_query($link, $queryForm) or die("Ошибка " . mysqli_error($link));
                            if (!$resultForm) {
                                echo "Выполнение запроса прошло не успешно";
                            }
                            mysqli_close($link);
                            while ($row = mysqli_fetch_row($resultForm)) { 
                            ?>

                                <tr>
                                    <td data-label="Вас зовут"><?= $row[0]; ?></td>
                                    <td data-label="Адрес"><?= $row[1]; ?></td>
                                    <td data-label="Почта"><?= $row[2]; ?></td>
                                    <td data-label="Номер"><?= $row[3]; ?></td>
                                </tr>


                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </section>




<?php
    require '/inc/footer-info-form.php';