<html>
<head><title>Addition php</title>

</head>
<body>
<?php
     /* $xml = simplexml_load_file("one_piece.xml") or die("Error: Cannot create object"); */
     function one_piece() {
     $xml = simplexml_load_file("one_piece.xml") or die("Error: Cannot create object");
     echo $xml->entry[0]->synopsis;
     }

     function onepiece_img() {
        $xml = simplexml_load_file("one_piece.xml") or die("Error: Cannot create object");
        echo $xml->entry[0]->image;
     }
?>
</body>
</html> 