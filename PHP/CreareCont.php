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
        <meta HTTP-EQUIV="PRAGMA" CONTENT="NO-CACHE">

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link rel="stylesheet" href="../CSS/menu.css">
        <link rel="stylesheet" href="../CSS/CreareCont.css">
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
                    <a class="nav-link" href="applications.php">Formular Cerere</a>
                  </li>
                    <li class="nav-item">
                    <a class="nav-link" href="CereriAprobate.php">Verifica Cerere</a>
                  </li>
                    <li class="nav-item">
                    <a class="nav-link" href="VizualizareCereri.php">Cereri in asteptare</a>
                  </li>
                    <li class="nav-item">
                    <a class="nav-link active" href="CreareCont.php">Creaza Cont</a>
                  </li>
                  
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
            <div>
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                <div class="afiseazaCont">
                    <button type="submit" name="Afiseaza" class="btn btn-primary mybutton">Afiseaza Conturi</button>
                    <input type="button" class="btn btn-primary" value="Ascunde conturi" onclick="document.getElementById('collaps').style.display = 'none';">
                </div>
            </form>
            <?php
                if (isset($_POST['Afiseaza'])) {
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
                $querySelect = "SELECT * FROM users";
                $resultSelect =  mysqli_query($connection, $querySelect) or die ("Error in query: $querySelect. ".mysqli_error($connection));
                if (mysqli_num_rows($resultSelect) > 0) { 
                    echo '<table id="collaps" cellpadding=15 border=2 style="margin-bottom:10px;display:table;" align="center">'; 
                    echo "<tr>";
                    echo "<th>ID</th>";
                    echo "<th>Nume</th>";
                    echo "<th>Prenume</th>";
                    echo "<th>Adresa de Email</th>";
                    echo "<th>Departament</th>";
                    echo "</tr>";
                    while($row = mysqli_fetch_object($resultSelect)) { 
                        echo "<tr>"; 
                        echo "<td>".$row->id_cont."</td>"; 
                        echo "<td>".$row->first_name."</td>"; 
                        echo "<td>".$row->last_name."</td>";
                        echo "<td>".$row->email."</td>";
                        echo "<td>".$row->position."</td>";
                        echo "</tr>"; 
                    } 
                    echo "</table>"; 
                }else{ 
                    echo '<br><div id="collaps" style="margin-bottom:10px;display: none;margin-left:auto;margin-right:auto;">No rows found!</div>';
                } 
                mysqli_free_result($resultSelect); 
                mysqli_close($connection);
                }
            ?>
            </div>
                <div>
                <br>
                <form  action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" onSubmit="return confirm('are you sure?')">
                    <h6>Stergeti cont:</h6>
                    <div class="form-row">
                        <div class="form-group col-md-2">
                          <label for="inputID">ID Cont:</label>
                          <input type="text" class="form-control" id="inputID" name="inputID" placeholder="ID" required>
                        </div>
                        <div class="form-group col-md-2">
                            <br>
                            <button type="submit" name="sterge" class="btn btn-primary mybutton">Sterge Cont</button>
                        </div>
                    </div>
                </form>
                <?php
                        if (isset($_POST['sterge'])) {
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
                        $idCont = empty($_POST['inputID']) ? die ("ERROR: Introduceti ID-ul contului!") : mysqli_real_escape_string($connection, $_POST['inputID']); 
                        $queryDelete = "DELETE FROM users WHERE id_cont =".$idCont;
                        $resultDelete = mysqli_query($connection, $queryDelete) or die ("Error in query: $queryDelete. ".mysqli_error($connection));
                        // print message with ID of inserted record 
                        $message = "Contul a fost sters!";
                        echo "<script type='text/javascript'>alert('$message');</script>";
                    // close connection 
                    mysqli_close($connection); 
                        
                    }
                ?>
            </div>
            <div>
            <h6>Creati cont nou:</h6>
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
              <div class="form-row">
                <div class="form-group col-md-3">
                  <label for="inputNume">Nume</label>
                  <input type="text" class="form-control" id="inputNume" name="inputNume" placeholder="Nume" required>
                </div>
                  <div class="form-group col-md-3">
                  <label for="inputPrenume">Prenume</label>
                  <input type="text" value = "" class="form-control" id="inputPrenume" name="inputPrenume" placeholder="Prenume" required>
                </div>
                <div class="form-group col-md-2">
                  <label for="inputCheieN">Cheie nume utilizator:</label>
                  <input type="text" class="form-control" id="inputCheieN" name="inputCheieN" placeholder="Cheie nume utilizator" required>
                </div>
                <div class="form-group col-md-2">
                  <label for="inputCheieP">Cheie parola:</label>
                  <input type="text" class="form-control" id="inputCheieP" name="inputCheieP" placeholder="Cheie parola" required>
                </div>
                <div class="form-group col-md-2">
                    <br>
                  <button type="submit" name="cripteaza" class="btn btn-primary mybutton">Cripteaza</button>
                </div>
              </div>
                <div class="myresult"></div>
            </form>
            <?php 
                if (isset($_POST['cripteaza'])) {
                    $str1 = $_POST['inputNume'];
                    $str2 = $_POST['inputPrenume'];
                    $cheie1 = $_POST['inputCheieN'];
                    $cheie2 = $_POST['inputCheieP'];
                    function criptare($str, $cheie) 
                    { 
                        $array = str_split($str);
                        foreach ($array as $char) {
                        $ascii = ord($char);
                        $p = $ascii - 65;
                        $e = ($p + $cheie) % 26;
                        $ascii2 = $e + 65;
                        $rezultat = chr($ascii2);
                        echo $rezultat;
                        }
                    } 
                
            ?>

            <br>     
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                <div class="form-row">
                <div class="form-group col-md-3">
                  <label for="inputUserN">Nume utilizator</label>
                  <input type="text" class="form-control" id="inputUserN" placeholder="Nume utilizator" value="<?php  criptare($str1, $cheie1); ?>"  name="UserName" required>
                </div>
                <div class="form-group col-md-3">
                  <label for="inputParola">Parola</label>
                  <input type="text" class="form-control" id="inputParola" placeholder="Parola" value="<?php criptare($str2, $cheie2); ?>" name="Password" required>
                </div>
                </div>
                <div class="form-row">
                <div class="form-group col-md-3">
                  <label for="inputNumeU">Nume</label>
                  <input type="text" class="form-control" id="inputNumeU" name="FirstName" placeholder="Nume utilizator" required>
                </div>
                <div class="form-group col-md-3">
                  <label for="inputPrenume">Prenume</label>
                  <input type="text" class="form-control" id="inputPrenume" name="LastName" placeholder="Prenume" required>
                </div>
                </div>
                <div class="form-row">
                <div class="form-group col-md-3">
                  <label for="inputEmail">Adresa de email:</label>
                  <input type="text" class="form-control" id="inputEmail" placeholder="Adresa email" name="Email" required>
                </div>
                <div class="form-group col-md-3">
                  <label for="inputDep">Departament</label>
                  <select class="form-control" id="inputDep" placeholder="Departament" name="Department" required>
                    <option value="fochist">Fochist</option>
                    <option value="magazie">Magazie</option>
                    <option value="bucatarie">Bucatarie</option>
                    <option value="furnizorAlimente">Furnizor Alimente</option>
                  </select>
                </div>
                </div>
                <br />
                <button type="submit" name="Trimite" class="btn btn-primary">Creaza Cont</button>
            </form>
                <?php
                }
                ?>
            <br />
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
                    $user_name = empty($_POST['UserName']) ? die ("ERROR: Introduceti numele de utilizator!") : mysqli_real_escape_string($connection, $_POST['UserName']); 
                    $password = empty($_POST['Password']) ? die ("ERROR: Introduceti parola!") :mysqli_real_escape_string($connection, $_POST['Password']);
                    $first_name = empty($_POST['FirstName']) ? die ("ERROR: Introduceti numele angajatului!") : mysqli_real_escape_string($connection, $_POST['FirstName']);
                    $last_name = empty($_POST['LastName']) ? die ("ERROR: Introduceti prenumele angajatului!") : mysqli_real_escape_string($connection, $_POST['LastName']);
                    $email = empty($_POST['Email']) ? die ("ERROR: Introduceti adresa de Email a angajatului!") : mysqli_real_escape_string($connection, $_POST['Email']);
                    $position = empty($_POST['Department']) ? die ("ERROR: Selectati departamentul!") : mysqli_real_escape_string($connection, $_POST['Department']);
                    // create query
                    $queryInsert = "INSERT INTO users (user_name, password, first_name, last_name, email, position) VALUES ('$user_name', '$password', '$first_name', '$last_name', '$email', '$position')";
                    // execute query
                    $resultInsert = mysqli_query($connection, $queryInsert) or die ("Error in query: $queryInsert. ".mysqli_error($connection));
                    // print message with ID of inserted record 
                    $message = "Noul cont a fost inserat!";
                    echo "<script type='text/javascript'>alert('$message');</script>";
                    // close connection 
                    mysqli_close($connection); 
                 }
            ?>
            <br />
        </div>

            
            
        </div>

        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
        <script src="../JavaScript/jquery-3.2.1.min.js" type="text/javascript" charset="utf-8"></script>
        
    </body> 
</html>