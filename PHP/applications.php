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
                    <a class="nav-link active" href="applications.php">Formular Cerere</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="CereriAprobate.php">Verifica Cerere</a>
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

        <div class="content ">
            <h6>Formular cerere:</h6>
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
              <div class="form-row">
                <div class="form-group col-md-4">
                  <label for="inputName">Nume</label>
                  <input type="text" class="form-control" id="inputNume" name="FirstName" placeholder=" Nume" required>
                </div>
                  <div class="form-group col-md-4">
                  <label for="inputPreName">Prenume</label>
                  <input type="text" class="form-control" id="inputPrenume" name="LastName" placeholder=" Prenume" required>
                </div>
              </div>
                <div class="col-md-8">
                    <label for="validationTextarea">Motiv:</label>
                    <textarea class="form-control" id="validationTextarea" name="motiv" placeholder="Motiv" required></textarea>
                  </div>

              <div class="form-row">
                <div class="form-group col-md-2">
                  <label for="inputDepart">Departament:</label>
                  <select class="form-control" id="inputDepart" placeholder="Departament" name="department" required>
                    <option value="fochist">Fochist</option>
                    <option value="magazie">Magazie</option>
                    <option value="bucatarie">Bucatarie</option>
                    <option value="furnizorAlimente">Administrator Aplicatie</option>
                  </select>
                </div>
                  <div class="form-group col-md-2">
                  <label for="inputPrimaZi">Prima zi:</label>
                  <input type="date" class="form-control" id="inputPrimaZi" name="PrimaZi" required>
                </div>
                  <div class="form-group col-md-2">
                  <label for="inputUltimaZI">Ultima zi:</label>
                  <input type="date" class="form-control" id="inputUltimaZI" name="UltimaZi" required>
                </div>
                <div class="form-group col-md-2">
                  <label for="inputState">Alege tipul cererii:</label>
                  <select id="inputTipCerere" class="form-control" name="tipCerere" required>
                    <option value="Cerere concediu">Cerere concediu</option>
                    <option value="Cerere schimb tura">Cerere schimb tura</option>
                  </select>
                </div>
              </div>
              <button type="submit" name="Trimite" class="btn btn-primary">Trimite</button>
            </form>
            <?php
            if (isset($_POST['Trimite'])) {
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
                // get form input 
                // check to make sure it's all there 
                // escape input values for greater safety
                    $first_name = empty($_POST['FirstName']) ? die ("ERROR: Introduceti numele!") : mysqli_real_escape_string($connection, $_POST['FirstName']);
                    $last_name = empty($_POST['LastName']) ? die ("ERROR: Introduceti prenumele!") : mysqli_real_escape_string($connection, $_POST['LastName']);
                    $motiv = empty($_POST['motiv']) ? die ("ERROR: Introduceti motivul!") : mysqli_real_escape_string($connection, $_POST['motiv']);
                    $position = empty($_POST['department']) ? die ("ERROR: Selectati departamentul!") : mysqli_real_escape_string($connection, $_POST['department']);
                    $first_day = empty($_POST['PrimaZi']) ? die ("ERROR: Introduceti prima zi!") : mysqli_real_escape_string($connection, $_POST['PrimaZi']);
                    $last_day = empty($_POST['UltimaZi']) ? die ("ERROR: Introduceti ultima zi!") : mysqli_real_escape_string($connection, $_POST['UltimaZi']);
                    $tip_cerere = empty($_POST['tipCerere']) ? die ("ERROR: Selectati tipul cererii!") : mysqli_real_escape_string($connection, $_POST['tipCerere']);
                    // create query
                    $queryInsert = "INSERT INTO cerere (nume, prenume, motiv, departament, prima_zi, ultima_zi, tip_cerere) VALUES ('$first_name', '$last_name', '$motiv', '$position', '$first_day', '$last_day', '$tip_cerere')";
                    // execute query
                    $resultInsert = mysqli_query($connection, $queryInsert) or die ("Error in query: $queryInsert. ".mysqli_error($connection));
                    // print message with ID of inserted record 
                    $message = "Cererea a fost salvata!";
                    echo "<script type='text/javascript'>alert('$message');</script>";
                    // close connection 
                    mysqli_close($connection); 
                 }
            ?>
        </div>
        
        


        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
        <script src="../JavaScript/jquery-3.2.1.min.js" type="text/javascript" charset="utf-8"></script>
    </body> 
</html>