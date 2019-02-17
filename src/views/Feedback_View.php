<div class="container">
    <hr>
    <div class="row">   
        <div class="col-lg-3 col-md-3 col-sm-0"></div>
        <div class="col-lg-9 col-md-9 col-sm-12">
            <p><strong>Оставьте отзыв о моём сайте:</strong></p>
            <?php 
            if (isset($_POST['submit'])) {
                if ($_POST['answer'] == $_POST['realanswer']) {
                    echo '<p style="border: 1px solid darkgreen; padding: 5px; 
                    background-color: green">Ваш отзыв успешно отправлен!</p>';
                } else {
                    echo '<p style="border: 1px solid darkgreen; padding: 5px; 
                    background-color: red">Вероятно, вы - робот!</p>';
                }
            }
            ?>
            <form method="POST">
                Ваше имя:<br><input type="text" name="name" placeholder="
                <?php if (isset($_GET['name'])) echo '$_GET[name]'; ?>" required><br>
                Ваш email:<br><input type="email" name="email" placeholder="
                <?php if (isset($_GET['email'])) echo '$_GET[email]'; ?>" required><br>
                Отзыв:<br><textarea name="body" rows="5" cols="40" placeholder="
                <?php if (isset($_GET['body'])) echo '$_GET[body]'; ?>" required></textarea><br>
                <?php echo $data['num1'] . " " . $data['op'] . " " . $data['num2'] . " = "; ?>
                <input type="number" name="answer" required>
                <input type="hidden" name="realanswer" value="<?php echo $data['answer']; ?>">
                <input type="submit" name="submit" value="Отправить">
            </form>
        </div>
    </div>
</div>
