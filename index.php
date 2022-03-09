<?php
    include("connexion.php");

    $count=$pdo->prepare("select count(id) as cpt from mytable");
    $count->setFetchMode(PDO::FETCH_ASSOC);
    $count->execute();
    $tcount=$count->fetchAll();
    //var_dump ($count);


     //Pagination 
     @$page=$_GET["Page"];
     if(empty($page)) $page=1;
     $nbr_elements_par_page=5;
     $nbr_de_pages=ceil($tcount[0] ["cpt"]/$nbr_elements_par_page);
     $debut=($page-1)*$nbr_elements_par_page;

    // pour récupérer les enregistrement eux meme
    $sel=$pdo->prepare("select name from mytable order by name asc");
    $sel->setFetchMode(PDO::FETCH_ASSOC); 
    $sel->execute();
    $tab=$sel->fetchAll(); 
    if(count($tab)==0)
         header ("location:./");

 ?> 

    <!DOCTYPE html> 
    <html> 
        <head> 
            <meta charset="UTF_8" /> 
            <link rel="stylesheet" type="text/css" href="css/style.css?ts=<?php echo time ()?>" />

       </head>
       <style>


.page {
    color:red; 
    padding:1%;
}
           </style>

       <body>
           <header>
               <h1>Système de Pagination</h1>
          </header>
          <div id="pagination">
        <?php
        echo"<br>";
            for($i=1;$i<=$nbr_de_pages;$i++) {
                
        echo "<a class='page' href='?Page=".$i."'>".$i." </a>";

            }
            ?>
            </div>
        <section id="count"> 
            <?php for($i=1;$i<6;$i++) { ?>
                <div>
                    <?php if ($i*$page<count($tab)) {
                        echo"<br>";
                        echo $tab[$i*$page]["name"];
                    }
                        ?> 
            </div>
            <?php } ?> 
            </section> 
            </body> 

        </html>