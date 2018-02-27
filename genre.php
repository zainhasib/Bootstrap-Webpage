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
    <script>
    
    $(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip(); 
});</script>
    
    <title>Anime Joy! | Genre List</title>
  </head>
  <body>
      <?php 
        include("one.php");
        include("two.php");
        include("anime.php");
        include("../newtoken.php");
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
              <a class="nav-link" href="pop.php">Popular Anime</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="#">Genre List</a>
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
              <h1 class="display-4">Genre List</h1>
              <p class="lead">Alright! Here is the list of genre.</p>
            </div>
        </div>
    </header>
    
    <!-- Section 2 -->
    <section class="container">
    <?php

        $ch = curl_init();
        $token = new_token();
        $URL = "https://anilist.co/api/genre_list?access_token=$token";

        curl_setopt($ch, CURLOPT_URL, $URL);

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        /*
        curl_setopt($ch, CURLOPT_URL, "https://anilist.co/api/auth/access_token");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS,"grant_type=authorization_code&client_id=animejoy-i7mz5&client_secret=pBzDv6AjaTY1yjHVucxfBNac&code=KsvLBYxz4PRqVraAQnJovVgbp1FbBSWYvbAZ1sBv&redirect_uri=http://www.deviantart.com"); */


        $headers = array();
        $headers[] = "Content-Type: application/x-www-form-urlencoded";
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);


        $result = curl_exec($ch);

        $json = json_decode($result, true);
        echo "<ul>";
        foreach ($json as $img) {
            $i = $img["genre"];
            echo '<li><a href="pop.php?genre='.$i.'" data-toggle="tooltip" title="Hooray!">'.$i.'</a></li><br>';
        }
        echo "</ul";
        /* foreach ($json as $img){
        $output = '<div class="anime" style="margin: 40px;"><a id="1" href=""><img src="'.$img["image_url_lge"].'" alt=""><h5>'.$img["title_english"].'</h5></div></a></div>';
        echo $output;} */ 
        if (curl_errno($ch)) {
            echo 'Error:' . curl_error($ch);
        }
        curl_close ($ch);

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