<!DOCTYPE html>
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Mon Blog</title>

    <!-- Bootstrap core CSS -->
    <link href="http://localhost/monblog/Webroot/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    
    <link href="https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://use.fontawesome.com/8b7afb83b3.css">
    <!-- Custom styles for this template -->
    <link href="http://localhost/monblog/Webroot/css/app.css" rel="stylesheet">
    <link href="http://localhost/monblog/Webroot/css/404.css" rel="stylesheet"> 
    <script src="http://localhost/monblog/Webroot/js/tinymce/js/tinymce/tinymce.min.js"></script>
    <script>
      tinymce.init({
        selector:'#myTiny',
        height:300,
        language:'fr_FR',
        plugins:['media','emoticons'],
        toolbar:['media','emoticons']
      });
    </script>
  </head>
  <body>
     
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
      <div class="container">
        
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          Menu
          <i class="fa fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link" href="/monblog">Accueil</a>
            </li>
            <?php if(isset($_SESSION['auth'])): ?>
            <li class="nav-item">
              <a class="nav-link"href="/monblog/admin">Admin</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/monblog/logout">Deconnexion</a>
            </li> 
            <?php else : ?>
            <li class="nav-item">
              <a class="nav-link" href="/monblog/login">Connexion</a>
            </li>
            <?php endif; ?>
            <li class="nav-item">
              <a class="nav-link" href="contact.html">Contact</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <!-- Page Header -->
    <header class="masthead" >
      <img class="img-responsive" src="/monblog/Webroot/img/Plume-ecrivain.jpg" alt="">
      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-md-10 mx-auto">
            <div class="site-heading">
              <h1>Blog</h1>
              <h2 class="subheading">recueil de nouvelles </h2>
            </div>
          </div>
        </div>
      </div>
    </header>

    <!-- Main Content -->
    <div class="container">
    <?php App\App::alert(); ?>
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">

                <?= $content ; ?>

            </div>
        </div><!-- row -->    
    </div> <!-- container -->

    <hr>

    <!-- Footer -->
    <footer>
      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-md-10 mx-auto">
            <ul class="list-inline text-center">
              <li class="list-inline-item">
                <a href="#">
                  <span class="fa-stack fa-lg">
                    <i class="fa fa-circle fa-stack-2x"></i>
                    <i class="fa fa-twitter fa-stack-1x fa-inverse"></i>
                  </span>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="#">
                  <span class="fa-stack fa-lg">
                    <i class="fa fa-circle fa-stack-2x"></i>
                    <i class="fa fa-facebook fa-stack-1x fa-inverse"></i>
                  </span>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="#">
                  <span class="fa-stack fa-lg">
                    <i class="fa fa-circle fa-stack-2x"></i>
                    <i class="fa fa-github fa-stack-1x fa-inverse"></i>
                  </span>
                </a>
              </li>
            </ul>
            <p class="copyright text-muted">Copyright © Mon blog 2017</p>
          </div>
        </div>
      </div>
    </footer>

    

    <!-- Custom scripts for this template -->
    <script src="/monblog/Webroot/js/jquery.min.js"></script>
    <script src="/monblog/Webroot/js/popper.min.js"></script>
    <script src="/monblog/Webroot/js/bootstrap.min.js"></script>
    <script src="/monblog/Webroot/js/clean-blog.js"></script>

  


</body>
</html>