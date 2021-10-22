<html>
    <head>
       
    </head>
    <main>
    <h1>Report Nest</h1>
        <form action="." method="post">
            <label>City Name:</label><input type="text" name="cityName"><br>
            <label>Street Address</label><input type="text" name="streetAddress"><br>
            <label>Beach Access Number:</label><input type="number" name="accessNum"><br>
            <textarea name="description" rows ="4" cols="50" placeholder="Please write a description of how to get to the nest."></textarea><br>
            <input type="hidden" name="action" value="reportNest">
            <input type="submit" value="Submit">
        </form><br>
    <div class="error">
        <?php if (!empty($error_msg)) {
        include 'error.php'; 
        }; ?><br>
    </div>
    </main>
</html>