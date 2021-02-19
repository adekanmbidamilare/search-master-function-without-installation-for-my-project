<?php


     include('connection.php');
     
     $res1=mysqli_query($conn,"(UPDATE html) 
     union
      (UPDATE css)
     union
      (UPDATE js)
     union
      (UPDATE react)
     union
      (UPDATE angular)
     union
      (UPDATE bootstrap)
     union
      (UPDATE c)
     union
      (UPDATE cplus)
     union
      (UPDATE csharp)
     union
      (UPDATE java)
     union
      (UPDATE php)
     union
      (UPDATE phyton)
     union
      (UPDATE catone)
     union
      (UPDATE cattwo)");
     if(!$res1)
     {
         echo "error ".mysqli_error($conn);
     }


     while($row=mysqli_fetch_assoc($res1))
     {
         $sound=" ";
         if($row['book']!=null)
         {
              $words=explode(" ",$row['book']);
              foreach($words as $word)
              {
                 $sound.=metaphone($word)." ";
              }
         }
         if($row['author']!=null)
         {
             $words=explode(" ",$row['author']);
             foreach($words as $word)
             {
                $sound.=metaphone($word)." ";
             }
         }
         $id=$row['id'];
       
         $res2=mysqli_query($conn,"(UPDATE html SET indexing='$sound' WHERE id=$id) 
         union
          (UPDATE css SET indexing='$sound' WHERE id=$id)
         union
          (UPDATE js SET indexing='$sound' WHERE id=$id)
         union
          (UPDATE react SET indexing='$sound' WHERE id=$id)
         union
          (UPDATE angular SET indexing='$sound' WHERE id=$id)
         union
          (UPDATE bootstrap SET indexing='$sound' WHERE id=$id)
         union
          (UPDATE c SET indexing='$sound' WHERE id=$id)
         union
          (UPDATE cplus SET indexing='$sound' WHERE id=$id)
         union
          (UPDATE csharp SET indexing='$sound' WHERE id=$id)
         union
          (UPDATE java SET indexing='$sound' WHERE id=$id)
         union
          (UPDATE php SET indexing='$sound' WHERE id=$id)
         union
          (UPDATE phyton SET indexing='$sound' WHERE id=$id)
         union
          (UPDATE catone SET indexing='$sound' WHERE id=$id)
         union
          (UPDATE cattwo SET indexing='$sound' WHERE id=$id)");
         if(!$res2)
         {
             echo mysqli_error($conn);
         }
     }


 ?>
