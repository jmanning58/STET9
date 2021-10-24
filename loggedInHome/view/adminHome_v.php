<html>
    <head>
        <title>Admin Home</title>
    </head>
    <body>
        <h1>Hello <?php echo $_SESSION["USERNAME"] ?></h1>
        <a href="index.php?action=viewReports">View Reports</a><br>
        <a href="index.php?action=viewNests">View Nests</a><br>
        <a href="index.php?action=viewTasks">View Tasks</a><br>
    </body>
</html>