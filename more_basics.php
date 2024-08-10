  <!DOCTYPE html>
  <html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
  </head>
  <style>
    *{
        marin:0;
        padding:0;
    }
    .container{
        max-width: 80%;
        background-color: red;
        margin:auto;
        padding:23px;
    }
  </style>
  <body>
    <div class="container">
        <h1>Lets learn about php</h1>
      <p>Your party status is here:</p>
        <?php 
        $age=34;
        if($age>18){
            echo"You can go to party";
        }
        else{
            echo "Your can not go to party ";
        }
        echo "<br>";
        $languages=array("php","jquery","html", "css");
        echo count($languages);
        $a=0;
        while($a<=10){
            echo "The valur of  a is:$a";
            echo "<br>";
            $a++;
        }
        $a=0;
        while($a< count($languages)){
            echo $languages[$a];
            echo"<br>";
            $a++;
        }
        
        ?>
    </div>
  </body>
  </html>