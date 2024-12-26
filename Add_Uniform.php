
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Uniform</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<?php 
	require_once(dirname(__FILE__) ."/menu.php");
	?>
<div class="container">
    <h2 class="mt-5">Add Uniform</h2>
    <form action="add_uniform.php" method="POST" class="mt-4">
        <div class="mb-3">
            <label for="name" class="form-label">Uniform Name</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="mb-3">
            <label for="size" class="form-label">Size</label>
            <input type="text" class="form-control" id="size" name="size">
        </div>
        <div class="mb-3">
            <label for="color" class="form-label">Color</label>
            <input type="text" class="form-control" id="color" name="color">
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Price</label>
            <input type="number" class="form-control" id="price" name="price" step="0.01" required>
        </div>
        <button type="submit" name="submit" class="btn btn-primary">Add Uniform</button>
    </form>
</div>

<?php
if (isset($_POST['submit'])) {
    include('db.php');

    $name = $_POST['name'];
    $size = $_POST['size'];
    $color = $_POST['color'];
    $price = $_POST['price'];

    // Prepare and bind
    if (isset($conn)) {
        $stmt = $conn->prepare("INSERT INTO uniforms (name, size, color, price) VALUES (:name, :size, :color, :price)");
    }
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':size', $size);
    $stmt->bindParam(':color', $color);
    $stmt->bindParam(':price', $price);

    // Execute the statement
    if ($stmt->execute()) {
        echo "<div class='alert alert-success mt-3'>Uniform added successfully!</div>";
    } else {
        echo "<div class='alert alert-danger mt-3'>Error adding uniform!</div>";
    }
}
?>

</body>
</html>
