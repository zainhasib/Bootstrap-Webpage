<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="title.png">
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">

    <!-- Style.css-->
    <link rel="stylesheet" href="style.css">

    <!-- Font Awesome -->
    <script src="https://use.fontawesome.com/cac9c56b07.js"></script>
    
    <title>Anime Joy! | Home</title>
  </head>
  <body>
      <?php 
        include("one.php");
        include("two.php");
        include("anime.php");
      ?>
    <!-- Navigational Bar -->
    <nav class="navbar navbar-expand-md bg-dark navbar-dark sticky-top" >
        <!-- Brand -->
        <a class="navbar-brand" href="index.php"><img src="shop/b.png" id="home-img"></a>
      
        <!-- Toggler/collapsibe Button -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
          <span class="navbar-toggler-icon"></span>
        </button>
      
        <!-- Navbar links -->
        <div class="collapse navbar-collapse" id="collapsibleNavbar">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link active" href="#">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="pop.php">Popular Anime</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="genre.php">Genre List</a>
            </li> 
          </ul>
          <ul class="navbar-nav ml-auto">
          <form id="search-form" class="form-inline my-2 my-lg-0 pull-right" action="search.php" method="get">
              <input id="search-input" class="form-control mr-sm-2 pull-right" type="text" name="search_input" placeholder="Search">
              <button id="search-btn" class="btn btn-outline-success my-2 my-sm-0 pull-right" type="submit">Search</button>
          </form>
        </ul>
        </div> 
    </nav>
    <!-- Aside Menu -->
    <aside>
        
    </aside>
    <!-- Header -->
    <header class="container-fluid">
        <div class="jumbotron jumbotron-fluid">
            <div class="container">
              <h1 class="display-4">Wanna know my favorite Anime?</h1>
              <p class="lead">Alright! Here is the list.</p>
            </div>
        </div>
    </header>
    <!-- Section 1 -->
    <section class="container-fluid">
        <div id="demo" class="carousel slide" data-ride="carousel">
            
              <!-- Indicators -->
              <ul class="carousel-indicators">
                <li data-target="#demo" data-slide-to="0" class="active"></li>
                <li data-target="#demo" data-slide-to="1"></li>
                <li data-target="#demo" data-slide-to="2"></li>
              </ul>
              
              <!-- The slideshow -->
              <div class="carousel-inner">
                <div class="carousel-item active">
                  <img src="slides/2.jpg" alt="" width="1100" height="500">
                  <div class="carousel-caption">
                      <h3>ASL - Ace, Sabo, Luffy</h3>
                      <p>One Piece</p>
                    </div>
                </div>
                <div class="carousel-item">
                  <img src="slides/3.jpg" alt="Chicago" width="1100" height="500">
                  <div class="carousel-caption">
                      <h3>Naruto & Sasuke</h3>
                      <p>Naruto Shippuden</p>
                    </div>
                </div>
                <div class="carousel-item">
                  <img src="slides/4.jpg" alt="New York" width="1100" height="500">
                  <div class="carousel-caption">
                      <h3>Strawhats</h3>
                      <p>One Piece</p>
                    </div>
                </div>
              </div>
              
              <!-- Left and right controls -->
              <a class="carousel-control-prev" href="#demo" data-slide="prev">
                <span class="carousel-control-prev-icon"></span>
              </a>
              <a class="carousel-control-next" href="#demo" data-slide="next">
                <span class="carousel-control-next-icon"></span>
              </a>
            </div>
    </section>
    <!-- Section 2 -->
    <section class="container">
      <!--                                         test                                            -->
            

      <?php
        $array_anime = array("One+Piece", "naruto", "steins+gate", 'Death+Note', 'Code+Geass', 'Seven+Deadly+Sins', 'Anohana', 'Attack+on+Titan', 'Black+Clover', 'Mirai+Nikki', 'One+Punch+Man', 'your+lie+in+april', 'tokyo+ghoul', 'Angel+Beats', 'Another', 'case+closed', 'dragon+ball+super', 'fullmetal+alchemist', 'mob+psycho+100', 'parasyte', 'sword+art+online'); 
        $switch = TRUE;
        $t = 1;
        foreach ($array_anime as $anim) {
          if ($switch) {
              echo '<div class="nest">  
              <img class="right-align img-fluid" width="450px" style="height: 315px;" src="'.find_img($anim).'">     
              <h2 sytle="text-align: center;">'.$t.'. '.find_title($anim).'</h2>
               
                '.find_anime($anim).'
              
                  
                  <div class="clearfix"></div>
              </div>';
              /* echo '<img src="'.find_img($anim).'">'; */
              $switch = FALSE; 
            } 
          else {
            echo '<div class="nest">  
            <img class="left-align img-fluid" width="450px" style="height: 315px;" src="'.find_img($anim).'">     
            <h2 sytle="text-align: center;">'.$t.'. '.find_title($anim).'</h2>
             
              '.find_anime($anim).'
            
                
                <div class="clearfix"></div>
            </div>'; 
            $switch = TRUE; 
          }$t++;
        }?>


      <!--                                         test                                            -->
      
    </section>

    <!-- Section 3 -->
    <section>
    <ul class="pagination">
  <li class="page-item"><a class="page-link" href="#">Previous</a></li>
  <li class="page-item"><a class="page-link" href="#">1</a></li>
  <li class="page-item active"><a class="page-link" href="#">2</a></li>
  <li class="page-item"><a class="page-link" href="#">3</a></li>
  <li class="page-item"><a class="page-link" href="#">Next</a></li>
</ul>
    </section>

    <!-- Footer -->
    <footer>
      <div class="container-fluid foot">
      <h4 class="content-center">Copyright &copy; reserved 2017-2018</h4>
      </div>
    </footer>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js" integrity="sha384-a5N7Y/aK3qNeh15eJKGWxsqtnX/wWdSZSKp+81YjTmS15nvnvxKHuzaWwXHDli+4" crossorigin="anonymous"></script>
    <script src="script.js"></script>
    

    <!--  HELP 
    <html>
    <head>
      <title>Books API Example</title>
    </head>
    <body>
      <div id="content"></div>
      <script>
        function handleResponse(response) {
        for (var i = 0; i < response.items.length; i++) {
          var item = response.items[i];
          // in production code, item.text should have the HTML entities escaped.
          document.getElementById("content").innerHTML += "<br>" + item.volumeInfo.title;
        }
      }
      </script>
      <script src="https://www.googleapis.com/books/v1/volumes?q=naruto&callback=handleResponse"></script>
    </body>
  </html>
   HELP  -->

  </body>
</html>