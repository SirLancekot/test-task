</main>
<footer></footer>
<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
<script src="./js/inputmask.js"></script>
<script src="./js/script.js"> </script>

</script>
<script type="text/javascript">
    $(document).ready(function() {
        $("#form").submit(function(e) {
            e.preventDefault();
            var form_data = $(this).serialize();
            $.ajax({
                type: "POST",
                url: "/demis/form.php",
                data: form_data,
                success: function() {
                    alert("Ваше сообщение отправлено!");
                    $('#table-form').css("display", "block");
                    $("#table-form").load("info-form.php #customers");
                    $('.wrap').css("height", "100%");
                    $('input[type="submit"]').css("display", "none");
                    $('.errorMessages').css("display", "none");
                }
            });
        });
    });

    $(document).ready(function() {
        $("#phone").inputmask({
            "mask": "79999999999"
        });
    });
</script>
</body>
</html>