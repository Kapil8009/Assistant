<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Uniforms</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<?php 
	require_once(dirname(__FILE__) ."/menu.php");
	?>
<div class="container">
    <h2 class="mt-5">List of Uniforms</h2>
    <table class="table table-striped mt-3">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Name</th>
            <th scope="col">Size</th>
            <th scope="col">Color</th>
            <th scope="col">Price</th>
        </tr>
        </thead>
        <tbody>
        <?php
        include('db.php');
        if (!empty($conn)) {
            $stmt = $conn->prepare("SELECT * FROM uniforms");
        }
        $stmt->execute();
        $uniforms = $stmt->fetchAll();

        foreach ($uniforms as $uniform) {
            echo "<tr>
                            <td>{$uniform['id']}</td>
                            <td>{$uniform['name']}</td>
                            <td>{$uniform['size']}</td>
                            <td>{$uniform['color']}</td>
                            <td>{$uniform['price']}</td>
                          </tr>";
        }
        ?>
        </tbody>
    </table>
</div>
</body>
</html>
