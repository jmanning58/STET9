<html>
    <head>
        <title>Confirm/Update Report</title>
    </head>
    <main>
    <h1>Confirm/Update Report</h1>
    <label>Report ID: </label><value><?php echo$report['NID'];?></value><br>
    <label>Address: </label><value><?php echo($report['streetAddress'].', '.$report['cityName']);?></value><br>
    <label>Date reported: </label><value><?php echo$report['dateTime'];?></value><br>
    <label>Description: </label><value><?php echo$description;?></value><br>
    <div class="error">
        <?php if (!empty($error_msg)) {
        include 'error.php'; 
        }; ?><br>
    </div>
    </main>
</html>