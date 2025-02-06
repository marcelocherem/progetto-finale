<div class="overlay"></div>
<div class="loginArea">
    <div class="loginAreaInt">
        <h2 class="loginAreaBtn">Login</h2>
        <h3 class="avviso">
            <!-- messagio di avviso -->
            <?php mostraAvviso(); ?>
        </h3>
        <div class="formPart">
            <form class="loginPart">
                <!-- funzione login -->
                <?php login(); ?>
                <input class="name" type="text" placeholder="Name" name="username" required>
                <input class="password" type="password" placeholder="Password" name="password" required>
                <a href="">Forgot password?</a>
                <button type="submit">Login</button>
                <div class="registerNow">Don't have an account? Sign Up!</div>
            </form>
        </div>
        <!-- settore di creare account -->
        <div class="signUpArea">
            <h2 class="signupBtn">Sign up</h2>
            <div class="formPart">
                <form class="loginPart">
                    <input class="name" type="text" placeholder="Name" name="name" required>
                    <input type="email" placeholder="E-mail" name="email" required>
                    <input class="password" type="password" placeholder="Password" name="password" required>
                    <button type="submit">Sign Up</button>
                    <div class="loginNow">Already have an account? Login now!</div>
                </form>
                <img class="logoSignUp" src="../risorse/immagini/Logo.png" alt="">
            </div>
        </div>
    </div>
</div>