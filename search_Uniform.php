<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Uniforms</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<?php 
	require_once(dirname(__FILE__) ."/menu.php");
	?>
<div class="container">
    <h2 class="mt-5">Search Uniforms</h2>
    <form method="GET" class="mt-4">
        <div class="mb-3">
            <label for="search" class="form-label">Search by Name</label>
            <input type="text" class="form-control" id="search" name="search" required>
        </div>
        <button type="submit" class="btn btn-primary">Search</button>
    </form>

    <?php
    if (isset($_GET['search'])) {
        include('db.php');
        $search = $_GET['search'];

        if (!empty($conn)) {
            $stmt = $conn->prepare("SELECT * FROM uniforms WHERE name LIKE :search");
        }
        $stmt->bindValue(':search', "%$search%");
        $stmt->execute();
        $results = $stmt->fetchAll();

        if ($results) {
            echo "<table class='table table-striped mt-3'>
                        <thead>
                            <tr>
                                <th scope='col'>ID</th>
                                <th scope='col'>Name</th>
                                <th scope='col'>Size</th>
                                <th scope='col'>Color</th>
                                <th scope='col'>Price</th>
                            </tr>
                        </thead>
                        <tbody>";

            foreach ($results as $uniform) {
                echo "<tr>
                            <td>{$uniform['id']}</td>
                            <td>{$uniform['name']}</td>
                            <td>{$uniform['size']}</td>
                            <td>{$uniform['color']}</td>
                            <td>{$uniform['price']}</td>
                          </tr>";
            }

            echo "</tbody></table>";
        } else {
            echo "<div class='alert alert-warning mt-3'>No uniforms found.</div>";
        }
    }
    ?>
</div>
</body>
</html>
