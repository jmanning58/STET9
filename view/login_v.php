<html>
    <main>
    <h1>Log In</h1>
        <form action="index.php" method="post">
            <input type="text" name="key" placeholder="User name/Email"><br>
            <input type="password" name="pass" placeholder="Password"><br>
            <input type="hidden" name="action" value="login">
            <input type="submit" value="Submit">
        </form><br>
    <div class="error">
        <?php if (!empty($error_msg)) {
        include 'error.php'; 
        }; ?><br>
    </div>
    </main>
</html>

