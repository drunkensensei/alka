            <form id=login action="login.php" method="post">
                <input id="login" type="text" name="login"/><input id="password" name="password" type="password" />
                <?php
                if (isset($_GET['error'])) {
                    
                ?>
                <p class=error>
                    Ошибка авторизации
                </p>
                <?php
                }
                else {
                    
                ?>
                <p class=noterror>
                    Введите логин и пароль
                </p>
                <?php
                }
                ?>
				<a class="btnlogin" href="#" onclick="document.getElementById('login').submit(); return false;">Вход</a>
               </form>
       