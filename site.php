<?php
session_start();
?>
<!DOCTYPE html>
<head>
    <title>Kawasaki motorbikes</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="site.css?v=<?php echo time(); ?>"> <!--!!!!!!!!!!! --->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>


<div class="header">
    <div class="div-logo">
        <img class="logo" src="photos/logo.png">
        <div class="LogInSignIn">
            <form id="Login" action ="LogIn-page.html">
                <button class="LogIn">Login</button>
            </form>
            <form id="SignIn" action ="SignIn-page.html">
                <button class="SignIn">SignIn</button>
            </form>
        </div>
          </div>

    </div>

    <div class="container mt-4">
    <!-- Form de filtrare categorii -->
    <div class="category-form mb-3">
        <form action="" method="GET">
            <label for="category" class="form-label">Select Category:</label>
            <select class="form-select" id="category" name="category">
                <option value="">All Categories</option>
                <option value="Sport">Sport</option>
                <option value="Naked">Naked</option>
                <option value="Supercharged">Supercharged</option>
            </select>
            <button type="submit" class="btn btn-primary mt-2">Filter</button>
        </form>
    </div>

    <?php 
if ($_SESSION['role'] == 'admin'): 
?>
    <div class="add">
        <a href="add_motorcycle.html">
            <button type="button" id="add" class="btn btn-primary add">Add motorcycle</button>
        </a>
    </div>
<?php 
else: 
    $_SESSION['role'] = 'user';
endif;
?>




<div class="grid">
<!-- <a href="https://www.freecodecamp.org/">
    <button>freeCodeCamp</button>
  </a>  -->
        <?php include 'fetch_motorbikes.php'; ?>
    </div>


<div class="pagination-container">
    <ul class="pagination">
        <?php if ($page > 1): ?>
            <li class="page-item">
                <a class="page-link" href="?page=<?php echo ($page - 1); ?>">Previous</a>
            </li>
        <?php else: ?>
            <li class="page-item disabled">
                <span class="page-link">Previous</span>
            </li>
        <?php endif; ?>

        <?php for ($i = 1; $i <= $totalPages; $i++): ?>
            <li class="page-item <?php echo ($page == $i) ? 'active' : ''; ?>">
                <a class="page-link" href="?page=<?php echo $i; ?>"><?php echo $i; ?></a>
            </li>
        <?php endfor; ?>

        <?php if ($page < $totalPages): ?>
            <li class="page-item">
                <a class="page-link" href="?page=<?php echo ($page + 1); ?>">Next</a>
            </li>
        <?php else: ?>
            <li class="page-item disabled">
                <span class="page-link">Next</span>
            </li>
        <?php endif; ?>
    </ul>
</div>

<div class="div-official">
    <a href="https://www.motocicletekawasaki.ro/"><button class="official">Go to official Kawasaki site</button></a>
</div>
<div class="div-second-hand">
    <a href="https://www.motocicletekawasaki.ro/"><button class="second">Go check out second hand models</button></a>
</div>


<div class="container mt-4">
    <h2>Add Page Review</h2>
    <form action="save_review.php" method="POST">
        <input type="hidden" name="user_id" value="<?php echo $_SESSION['user_id']; ?>">
        <div class="mb-3">
            <label for="rating" class="form-label">Rating (1-5):</label>
            <input type="number" id="rating" name="rating" min="1" max="5" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="comment" class="form-label">Comment:</label>
            <textarea id="comment" name="comment" rows="3" class="form-control" required></textarea>
        </div>
        <button type="submit" name="submit" class="btn btn-primary">Submit Review</button>
    </form>
</div>






<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="site.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>



</body>

</html>
