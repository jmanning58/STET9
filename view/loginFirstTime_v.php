<html>
    <main>
    <h1>Create Username and Password</h1>
        <form action="index.php" method="post">
            <input type="text" name="userName" placeholder="User name"><br>
            <input type="password" name="pass" placeholder="Password"><br>
            <input type="password" name="passR" placeholder="Repeat Password"><br>
            <input type="hidden" name="action" value="loginFirstTime">
            <input type="hidden" name="hash" value="<?php echo $hash; ?>">
            <input type="submit" value="Submit">
        </form><br>
    <div class="error">
        <?php if (!empty($error_msg)) {
        include 'error.php';
        }; ?><br>
    </div>
    </main>
</html>
