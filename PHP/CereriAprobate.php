<?php
include('session.php');
if(!isset($_SESSION['login_user'])){
header("location: index.php"); // Redirecting To Home Page
}
?>
<html> 
    <head> 
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="../CSS/menu.css">
        <link rel="stylesheet" href="../CSS/content.css">
        <link rel="stylesheet" href="../CSS/CreareCont.css">

        <title>Ministerul Apararii Nationale</title>
        
    </head> 
    <body> 

        <!--    HEADER  -->
      
      <header>
          
        <!--     NAV     -->
          
          <nav class="main-header" >  
            <div class="container">
              <div class="no-gutters row">
                <div class="col" style="padding-top: 5px;">
                    <img class="flagR" id="flag" src="../Images/Layer%202.png" alt="flag" width="100%">
                    <img class="stemaR" id="stema" src="../Images/Layer 3.png" alt="stema Romaniei">
                </div>
              </div>
            </div>
          </nav>
          <!--     /NAV     -->

            
          <!--     MENU     -->
            <nav class="navbar navbar-light" style="background-color: #53699b">
            <nav class="navbar-expand-lg">
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse menu-line" id="navbarTogglerDemo01">
                <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                    <li class="nav-item">
                    <a class="nav-link" href="applications.php">Formular Cerere</a>
                  </li>
                    <li class="nav-item">
                    <a class="nav-link active" href="CereriAprobate.php">Verifica Cerere</a>
                  </li>
                    <?php
                        if (mysqli_num_rows($resultSelect) > 0) { 
                            while($row = mysqli_fetch_object($resultSelect)) { 
                                if($row->position == "fochist")
                                    {
                     ?>
                    <li class="nav-item">
                        <a class="nav-link" href="fochistInfo.php">Vreme</a>
                    </li>
                    <?php
                    }
                    else if($row->position == "bucatarie")
                    {
                    ?>
                    <li class="nav-item">
                        <a class="nav-link" href="fStocAlm.php">Informatii stoc alimente</a>
                    </li>
                    <?php
                    }
                    else if($row->position == "magazie")
                    {
                    ?>
                    <li class="nav-item">
                        <a class="nav-link" href="fStocMag.php">Informatii stoc magazie</a>
                    </li>
                    <?php    
                    }
                    else
                    {
                        ?>
                    <li class="nav-item">
                    <a class="nav-link" href="VizualizareCereri.php">Cereri in asteptare</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#">Creare Cont</a>
                  </li>
                    <?php
                    }
                    }
                    }
                    ?>
                     
                  <li class="nav-item">
                    <a class="nav-link deconectare" href="logout.php">Deconectare</a>
                  </li>
                </ul>
              </div>
            </nav>
          </nav>
            <!--     /MENU     -->
      
            </header>
            <!--     /HEADER     -->

        <div class="content">
                        <?php
                            // form submitted 
                // set server access variables 
                $host = "localhost"; 
                $user = "root"; 
                $pass = ""; 
                $db = "licenta";
                // open connection 
                $connection = mysqli_connect($host, $user, $pass) or die ("Unable to connect!"); 
                // select database 
                mysqli_select_db($connection, $db) or die ("Unable to select database!"); 
                $querySelect = "SELECT cerere.nume, cerere.prenume, cerere.prima_zi, cerere.ultima_zi, cerere.tip_cerere, aprobarec.aprobata FROM cerere INNER JOIN aprobarec ON cerere.id_cerere=aprobarec.id_cerere ORDER BY cerere.prima_zi";
                $resultSelect =  mysqli_query($connection, $querySelect) or die ("Error in query: $querySelect. ".mysqli_error($connection));
                if (mysqli_num_rows($resultSelect) > 0) { 
                    echo '<table id="collaps" cellpadding=15 border=2 style="margin-bottom:10px;display:table;" align="center">'; 
                    echo "<tr>";
                    echo "<th>Nume</th>";
                    echo "<th>Prenume</th>";
                    echo "<th>Prima zi</th>";
                    echo "<th>Ultima zi</th>";
                    echo "<th>Tipul cererii</th>";
                    echo "<th>Aprobata/Respinsa</th>";
                    echo "</tr>";
                    while($row = mysqli_fetch_object($resultSelect)) { 
                        echo "<tr>"; 
                        echo "<td>".$row->nume."</td>"; 
                        echo "<td>".$row->prenume."</td>";
                        echo "<td>".$row->prima_zi."</td>";
                        echo "<td>".$row->ultima_zi."</td>";
                        echo "<td>".$row->tip_cerere."</td>";
                        echo "<td>".$row->aprobata."</td>";
                        echo "</tr>"; 
                    } 
                    echo "</table>"; 
                }else{ 
                    echo '<br><div id="collaps" style="margin-bottom:10px;margin-left:auto;margin-right:auto;">No rows found!</div>';
                } 
                mysqli_free_result($resultSelect); 
                mysqli_close($connection);
            ?>
        </div>

        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
        <script src="../JavaScript/jquery-3.2.1.min.js" type="text/javascript" charset="utf-8"></script>
    </body> 
</html>