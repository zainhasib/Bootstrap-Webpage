<!DOCTYPE html>
<?php 
include('anime.php');
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<img src="<?php echo find_img($array_anime[0]); ?>">


<?php
        $array_anime = array("One+Piece", "naruto", "steins+gate", 'Death+Note', 'Code+Geass', 'Seven+Deadly+Sins', 'Anohana', 'Attack+on+Titan', 'Black+Clover', 'Mirai+Nikki', 'One+Punch+Man'); 
        $switch = TRUE;
        foreach ($array_anime as $anim) {
          if ($switch) {
              echo $anim."<br>";
              echo '<img src="'.find_img($anim).'">';
              $switch = FALSE; 
            } 
          else {
            echo '<img src="'.find_img($anim).'">'; 
            $switch = TRUE; 
          }
        }?>

</body>
</html>