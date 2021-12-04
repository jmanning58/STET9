

<html>
    <main>
    <h1>Add User</h1>
        <form action="index.php" method="post">
            <input type="hidden" name ="action" value ="addUser">
            <input type="email" name="email" placeholder="Email"><br>
            <select name ="userType">
                <option value ="0" selected> worker </option>
                <option value ="1" > admin</option>
            </select>
            <input type="submit" value="Send Email">
        </form><br>
    <div class="error">
        <?php if (!empty($error_msg)) {
        include 'error.php';
        }; ?><br>
    </div>
    </main>
</html>