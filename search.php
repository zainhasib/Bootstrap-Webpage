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
    
    <title>Anime Joy!</title>
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
              <a class="nav-link" href="index.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Features</a>
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
              <h1 class="display-4">Search Results for <?php echo $_GET["search_input"] ?></h1>
              <p class="lead">Alright! Here is the search result .</p>
            </div>
        </div>
    </header>
    
    <!-- Section 2 -->
    <section class="container">
    <?php
        $query = $_GET["search_input"];


        $user = 'Anime_Joy'; 
        $password = 'iGudPucNCi0j'; 


        function query_func($query) {
            $ch = curl_init(); 
            
            curl_setopt($ch, CURLOPT_URL, "https://myanimelist.net/api/anime/search.xml?q=$query");
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET"); 
            
            curl_setopt($ch, CURLOPT_USERPWD, $GLOBALS['user'] . ":" . $GLOBALS['password']); 
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
            
            $result = curl_exec($ch); 
            
            $result = simplexml_load_string($result)or die("Unable to get the response. Try again later."); 
            $data = $result->entry[0]->title;


            foreach ($result->entry as $e) {
                $t = $e->title;
                $s = $e->synopsis;
                $i = $e->image;

                echo '<div class="anime"><a id="1" href=""><img src="'.$i.'" alt=""><h5>'.$t.'</h5></div></a></div>';

                //echo $data."<br>";
            }



            if (curl_errno($ch)) {
                echo 'Error:' . curl_error($ch); 
            }
        }

        query_func($query);

        /* foreach ($array_anime as $anim) {
          if ($switch) {
              echo '<div class="nest">  
              <img class="right-align img-fluid" width="450px" style="height: 315px;" src="'.find_img($anim).'">     
              <h2 sytle="text-align: center;">'.find_title($anim).'</h2>
               
                '.find_anime($anim).'
              
                  
                  <div class="clearfix"></div>
              </div>';
              /* echo '<img src="'.find_img($anim).'">'; */
              /* $switch = FALSE; 
            } 
          else {
            echo '<div class="nest">  
            <img class="left-align img-fluid" width="450px" style="height: 315px;" src="'.find_img($anim).'">     
            <h2 sytle="text-align: center;">'.find_title($anim).'</h2>
             
              '.find_anime($anim).'
            
                
                <div class="clearfix"></div>
            </div>'; 
            $switch = TRUE; 
          }  */
        ?>
    
    
    </section>

    <!-- Section 3 -->
    <section id="gap">

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