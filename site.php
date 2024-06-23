<!DOCTYPE html>
<head>
    <title>Kawasaki motorbikes</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="site.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>


<div class="header">
    <div class="div-logo">
        <img class="logo" src="photos/logo.png">
        <div class="dropdown show">
            <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Categories
            </a>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
              <a class="dropdown-item" href="#">Action</a>
              <a class="dropdown-item" href="#">Another action</a>
              <a class="dropdown-item" href="#">Something else here</a>
            </div>
          </div>

    </div>
    
        <div class="LogInSignIn">
            <form id="Login" action ="LogIn-page.html">
                <button class="LogIn">Login</button>
            </form>
            <form id="SignIn" action ="SignIn-page.html">
                <button class="SignIn">SignIn</button>
            </form>
        </div>

        
    </div>



<div class="grid">
        <?php include 'fetch_motorbikes.php'; ?>
    </div>
</div>

<div class="pagination-container">
    <ul class="pagination">
      <li class="page-item"><a class="page-link" href="#">Previous</a></li>
      <li class="page-item active"><a class="page-link" href="#">1</a></li>
      <li class="page-item"><a class="page-link" href="#">2</a></li>
      <li class="page-item"><a class="page-link" href="#">3</a></li>
      <li class="page-item"><a class="page-link" href="#">Next</a></li>
    </ul>
  </div>
<div class="div-official">
    <a href="https://www.motocicletekawasaki.ro/"><button class="official">Go to official Kawasaki site</button></a>
</div>
<div class="div-second-hand">
    <a href="https://www.motocicletekawasaki.ro/"><button class="second">Go check out second hand models</button></a>
</div>

<div class="cookie-consent">

    <span>This site uses cookies to enhance user experience. see <a href="#" class="ml-1 text-decoration-none">Privacy policy</a> </span>
    <div class="mt-2 d-flex align-items-center justify-content-center g-2">
      <button class="allow-button mr-1">Allow cookies</button>
      <button class="allow-button">cancel</button>
    </div>

    
  </div>



<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>  
<script src="site.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>

</html>
