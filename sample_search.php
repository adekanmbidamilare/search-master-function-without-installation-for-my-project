<?php require_once('connection.php'); 
?>


  <html>
  <body>
    <center>
     <form action="sample_search.php" method="GET">
         <input type="text" name="search" />
         <input type="submit" name="searchw" />
     </form>
   </center>
 <table>
 <table class="table-bordered tbl" border="1">
							<thead>
   <tr>
    <th><font face="comic sans ms">BOOKS</font></th>
    <th><font face="comic sans ms">AUTHORS </font></th>
	<th><font face="comic sans ms">Download Files </font></th>
  </tr>
 
</thead>
  <tbody> 
   <?php

      if(isset($_GET['search']))
      {
        
         
          echo $_GET['search']."<br>";
          $query= $_GET['search'];


          

          //sepaerating words and appending the metaphone of
          //each words with a space
          $search=explode(" ",$query);
          $search_string="";
          foreach($search as $word)
          {
               $search_string.=metaphone($word)." ";
          }
          echo $search_string."<br>";
          
          $res=mysqli_query($conn,"(SELECT * FROM html WHERE indexing like '%$search_string%') 
          union
           (SELECT * FROM css WHERE indexing like '%$search_string%')
          union
           (SELECT * FROM js WHERE indexing like '%$search_string%')
          union
           (SELECT * FROM react WHERE indexing like '%$search_string%')
          union
           (SELECT * FROM angular WHERE indexing like '%$search_string%')
          union
           (SELECT * FROM bootstrap WHERE indexing like '%$search_string%')
          union
           (SELECT * FROM c WHERE indexing like '%$search_string%')
          union
           (SELECT * FROM cplus WHERE indexing like '%$search_string%')
          union
           (SELECT * FROM csharp WHERE indexing like '%$search_string%')
          union
           (SELECT * FROM java WHERE indexing like '%$search_string%')
          union
           (SELECT * FROM php WHERE indexing like '%$search_string%')
          union
           (SELECT * FROM phyton WHERE indexing like '%$search_string%')
          union
           (SELECT * FROM catone WHERE indexing like '%$search_string%')
          union
           (SELECT * FROM cattwo WHERE indexing like '%$search_string%') LIMIT 2");
          if(!$res)
          {
              echo mysqli_error($conn);
          }

          if(mysqli_num_rows($res)>0)
          {
              while($row=mysqli_fetch_assoc($res))
              {






                $bname = $row['book'] ;
                $aname = $row['author'];
                $fname = $row['file'];
                $id = $row['id']; 
                echo " 
                <tr>";
                echo "<td style='background-color:black;color:white;' border=0>$bname</td>";
                echo "<td style='background-color:gray;color:white;' border=0>$aname</td>";
                echo "<td border=0 style='background-color:Deepskyblue;border-radius:10px;'><a title='Click here to download in file.' 
                                        href='{$row['file']}'> download </a>
                    </td>";
                    echo "</tr>";






                   ?>
                  
                   <?php
              }
          }

         
          
          if(mysqli_num_rows($res)==0)
          {
              $count=0;
              $words=explode(" ",$query);
              foreach ($words as $word)
              {
                  $mword=metaphone($word);
               
                  $res=mysqli_query($conn,"(SELECT * FROM html WHERE indexing like '%$mword%') 
                  union
                   (SELECT * FROM css WHERE indexing like '%$mword%')
                  union
                   (SELECT * FROM js WHERE indexing like '%$mword%')
                  union
                   (SELECT * FROM react WHERE indexing like '%$mword%')
                  union
                   (SELECT * FROM angular WHERE indexing like '%$mword%')
                  union
                   (SELECT * FROM bootstrap WHERE indexing like '%$mword%')
                  union
                   (SELECT * FROM c WHERE indexing like '%$mword%')
                  union
                   (SELECT * FROM cplus WHERE indexing like '%$mword%')
                  union
                   (SELECT * FROM csharp WHERE indexing like '%$mword%')
                  union
                   (SELECT * FROM java WHERE indexing like '%$mword%')
                  union
                   (SELECT * FROM php WHERE indexing like '%$mword%')
                  union
                   (SELECT * FROM phyton WHERE indexing like '%$mword%')
                  union
                   (SELECT * FROM catone WHERE indexing like '%$mword%')
                  union
                   (SELECT * FROM cattwo WHERE indexing like '%$mword%') LIMIT 2");
                  if(!$res)
                  {
                      echo mysqli_error($conn);
                  }
                  if(mysqli_num_rows($res)>0)
                  {
                    while($row=mysqli_fetch_assoc($res))
                    {
                         $count++;





                         $bname = $row['book'] ;
        $aname = $row['author'];
        $fname = $row['file'];
        $id = $row['id']; 
        echo " 
        <tr>";
        echo "<td style='background-color:black;color:white;' border=0>$bname</td>";
        echo "<td style='background-color:gray;color:white;' border=0>$aname</td>";
        echo "<td border=0 style='background-color:Deepskyblue;border-radius:10px;'><a title='Click here to download in file.' 
                                href='{$row['file']}'> download </a>
            </td>";
            echo "</tr>";




                         ?>
                         
                         <?php
                         
                    }
                  }
              }
              if($count==0)
              {
                   echo "no search results found :(";
              }
          }


      }

    ?></tbody></table>
    
    
</body>
</html>
