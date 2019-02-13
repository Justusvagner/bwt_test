<div class="container">
    <hr>
    <form method="POST">
        <div class="row">   
            <div class="col-lg-3 col-md-3 col-sm-0"></div>
            <div class="col-lg-9 col-md-9 col-sm-12">
                <p><strong>Введите личные данные:</strong></p>
                <?php 
                if (isset($_POST['submit'])) {
                    if (count($data)>0) {
                        echo "<b>При регистрации произошли следующие ошибки:</b><br>";
                        foreach ($data AS $error) {
                            echo "$error <br>";
                        }
                    } else {
                        echo "Регистрация успешна!";
                    }
                }
                ?>

            </div>
        </div>
        <hr>
        
        <div class="row">     
            <div class="col-lg-3 col-md-3 col-sm-0"></div>
            <div class="col-lg-4 col-md-4 col-sm-6"> 
                <label for="name">Имя:</label> 
            </div>        
            <div class="col-lg-5 col-md-5 col-sm-6"> 
                <input type="text" name="name" placeholder=" 
                <?php if (isset($_GET['name'])) echo '$_GET[name]'?> " required> 
            </div> 
        </div>
        <hr>
        
        <div class="row">     
            <div class="col-lg-3 col-md-3 col-sm-0"></div>
            <div class="col-lg-4 col-md-4 col-sm-6"> 
                <label for="surname">Фамилия:</label> 
            </div>        
            <div class="col-lg-5 col-md-5 col-sm-6"> 
                <input type="text" name="surname" placeholder=" 
                <?php if (isset($_GET['surname'])) echo '$_GET[surname]'?> " required> 
            </div> 
        </div>
        <hr>
        
        <div class="row">     
            <div class="col-lg-3 col-md-3 col-sm-0"></div>
            <div class="col-lg-4 col-md-4 col-sm-6"> 
                <label for="email">Email:</label> 
            </div>        
            <div class="col-lg-5 col-md-5 col-sm-6"> 
                <input type="email" name="email" placeholder=" 
                <?php if (isset($_GET['email'])) echo '$_GET[email]'?> " required> 
            </div> 
        </div>
        <hr>

        <div class="row">     
            <div class="col-lg-3 col-md-3 col-sm-0"></div>
            <div class="col-lg-4 col-md-4 col-sm-6"> 
                <label for="password">Пароль:</label> 
            </div>
            <div class="col-lg-5 col-md-5 col-sm-6"> 
                <input type="password" name="password" required> 
            </div> 
        </div>
        <hr>

        <div class="row">     
            <div class="col-lg-3 col-md-3 col-sm-0"></div>
            <div class="col-lg-4 col-md-4 col-sm-6"> 
                <label for="gender">Пол:</label> 
            </div>
            <div class="col-lg-5 col-md-5 col-sm-6"> 
                <input type="radio" name="gender" value="Мужской"> Мужской 
                <input type="radio" name="gender" value="Женский"> Женский 
            </div> 
        </div>
        <hr>

        <div class="row">     
            <div class="col-lg-3 col-md-3 col-sm-0"></div>
            <div class="col-lg-4 col-md-4 col-sm-6"> 
                <label for="bday">Дата рождения:</label> 
            </div>
            <div class="col-lg-5 col-md-5 col-sm-6"> 
                <input type="date" name="bday" placeholder=" 
                <?php if (isset($_GET['bday'])) echo '$_GET[bday]'?> "> 
            </div> 
        </div>
        <hr>

        <div class="row">     
            <div class="col-lg-3 col-md-3 col-sm-0"></div>
            <div class="col-lg-4 col-md-4 col-sm-6"></div>
            <div class="col-lg-5 col-md-5 col-sm-6"> 
                <input type="submit" name="submit" value="Отправить!" > 
            </div> 
        </div>
    </form>
<hr>
</div>
