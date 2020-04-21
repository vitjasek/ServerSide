<?php
  include_once('common_functions.php');
  include_once('db_connector.php');
  redirect_if_not_logged();
?>

<!DOCTYPE html>
<html lang="cs">

<head>
  <?php echo html_hlavička('zebricky', 'Žebříčky'); ?>
  <link rel="stylesheet" type="text/css" href="css/zebricky.css">
</head>

<body>
  <div class="layer">
    <section>
      <div class="main_div">
        <h1>Žebříčky</h1>
       
        <?php
/*        $sqlCreateView = "CREATE VIEW skoreview AS SELECT uzivatel.login, obrazek.obrazek, SUM(dokonceno.skore) AS skore, ROW_NUMBER() OVER(ORDER BY skore DESC) AS num, uzivatel.id FROM uzivatel, dokonceno, obrazek WHERE uzivatel.id = dokonceno.userid && uzivatel.obrazekid = obrazek.id GROUP BY login ORDER BY skore DESC";
        $sqlCheckView = "SELECT * FROM skoreview LIMIT 1";
        if (mysqli_query($conn, $sqlCheckView) == false){
          mysqli_query($conn, $sqlCreateView);
        }                                            */


            $sql = "SELECT uz.login, ob.obrazek, SUM(dok.skore) AS skore, uz.id FROM uzivatel AS uz INNER JOIN dokonceno AS dok ON uz.id=dok.userid LEFT JOIN obrazek AS ob ON uz.obrazekid=ob.id GROUP BY uz.login, ob.obrazek, uz.id ORDER BY skore DESC";
            $result = mysqli_query($conn, $sql);
            $resultCheck = mysqli_num_rows($result);

            if ($resultCheck >  0){
              $i = 0;
              while ($row = mysqli_fetch_assoc($result)) {
                $i++;
                // echo   $i . " " . $row['login'] . " " . $row['skore'] .  "<br>";
                if ($row['id']==$_SESSION['id']) {
                  $us=$i;
                }
                echo '<div class="tops_wrap">';
                if ($result->num_rows == 1) {
                  echo '
                        <div class="top first">
                        <h3>1#</h3>
                        <img alt = "profilovy obrazek" src="data:image/jpeg;base64,'.base64_encode( $row['obrazek'] ).'">
                        <h3>' . $row['login'] . '</h3>
                        <p>' . $row['skore'] . '</p>
                        </div>
                        </div>';
                }
                else {
                  if ($i == 1) {
                    $obh = $row['obrazek'];
                    $logh = $row['login'];
                    $skh = $row['skore'];
                   
                  }
  
                  if ($i == 2) {
                    echo '<div class="top second">
                            <h3>2#</h3>
                            <img alt = "profilovy obrazek" src="data:image/jpeg;base64,'.base64_encode( $row['obrazek'] ).'">
                            <h3>' . $row['login'] . '</h3>
                            <p>' . $row['skore'] . '</p>
                          </div>';
                    echo '<div class="top first">
                        <h3>1#</h3>
                        <img alt = "profilovy obrazek" src="data:image/jpeg;base64,'.base64_encode( $obh ).'">
                        <h3>' . $logh . '</h3>
                        <p>' . $skh . '</p>
                      </div>';
                  }
  
                  if ($i == 3) {
                    echo '<div class="top third">
                            <h3>3#</h3>
                            <img alt = "profilovy obrazek" src="data:image/jpeg;base64,'.base64_encode( $row['obrazek'] ).'">
                            <h3>' . $row['login'] . '</h3>
                            <p>' . $row['skore'] . '</p>
                          </div>
                          </div>';
                  }
                  if ($i > 3) {
                    echo '<div class="places_view">
                            <div class="place">
                              <img alt = "profilovy obrazek" src="data:image/jpeg;base64,'.base64_encode( $row['obrazek'] ).'">
                              <div>' . $row['login'] . '</div>
                              <span class="score">' . $row['skore'] . '</span>
                              <span class="score_place" >#'.$i.'</span>
                            </div>';
                  }
                  
                }
              }
              echo '</div>';
              $sql = "SELECT uz.login, ob.obrazek, SUM(dok.skore) AS skore, uz.id FROM uzivatel AS uz INNER JOIN dokonceno AS dok ON uz.id=dok.userid LEFT JOIN obrazek AS ob ON uz.obrazekid=ob.id WHERE uz.id='{$_SESSION['id']}' GROUP BY uz.login, ob.obrazek, uz.id ORDER BY skore DESC";
                     $result = mysqli_query($conn, $sql);
                     $resultCheck = mysqli_num_rows($result);
                     if($resultCheck > 0){
                      $row = mysqli_fetch_assoc($result);
                      echo '<div class="places_wrap">
                        <hr class="first_hr">

                        <div class="my_place">
                          <div class="place">
                                <img alt = "profilovy obrazek" src="data:image/jpeg;base64,'.base64_encode( $row['obrazek'] ).'">
                            <div>' . $row['login'] . '</div>
                            <span class="score">Skóre: ' . $row['skore'] . '</span>
                            <span class="score_place" >VAŠE POZICE #' . $us . '</span>
                          </div>
                        </div>
                        <hr class="second_hr">';
                     }
            }
            echo "</div>";  
             ?>        

      </div>

        <div class="mobile_div">

         <?php
            $sql = "SELECT uz.login, ob.obrazek, SUM(dok.skore) AS skore, uz.id FROM uzivatel AS uz INNER JOIN dokonceno AS dok ON uz.id=dok.userid LEFT JOIN obrazek AS ob ON uz.obrazekid=ob.id GROUP BY uz.login, ob.obrazek, uz.id ORDER BY skore DESC";
            $result = mysqli_query($conn, $sql);
            $resultCheck = mysqli_num_rows($result);

            if ($resultCheck >  0){
              $i = 0;
              while ($row = mysqli_fetch_assoc($result)) {
                $i++;
                // echo   $i . " " . $row['login'] . " " . $row['skore'] .  "<br>";
                if ($row['id']==$_SESSION['id']) {
                  $us=$i;
                }
                echo '<div class="tops_wrap">';
                if ($result->num_rows = 1) {
                  echo '
                        <div class="top first">
                        <h3>1#</h3>
                        <img alt = "profilovy obrazek" src="data:image/jpeg;base64,'.base64_encode( $row['obrazek'] ).'">
                        <h3>' . $row['login'] . '</h3>
                        <p>' . $row['skore'] . '</p>
                        </div>
                        </div>';
                }
                else {
                  if ($i == 1) {
                    $obh = $row['obrazek'];
                    $logh = $row['login'];
                    $skh = $row['skore'];
                   
                  }
  
                  if ($i == 2) {
                    echo '<div class="top second">
                            <h3>2#</h3>
                            <img alt = "profilovy obrazek" src="data:image/jpeg;base64,'.base64_encode( $row['obrazek'] ).'">
                            <h3>' . $row['login'] . '</h3>
                            <p>' . $row['skore'] . '</p>
                          </div>';
                    echo '<div class="top first">
                        <h3>1#</h3>
                        <img alt = "profilovy obrazek" src="data:image/jpeg;base64,'.base64_encode( $obh ).'">
                        <h3>' . $logh . '</h3>
                        <p>' . $skh . '</p>
                      </div>';
                  }
  
                  if ($i == 3) {
                    echo '<div class="top third">
                            <h3>3#</h3>
                            <img alt = "profilovy obrazek" src="data:image/jpeg;base64,'.base64_encode( $row['obrazek'] ).'">
                            <h3>' . $row['login'] . '</h3>
                            <p>' . $row['skore'] . '</p>
                          </div>
                          </div>';
                  }
                  if ($i > 3) {
                    echo '<div class="places_view">
                            <div class="place">
                              <img alt = "profilovy obrazek" src="data:image/jpeg;base64,'.base64_encode( $row['obrazek'] ).'">
                              <div>' . $row['login'] . '</div>
                              <span class="score">Skóre: ' . $row['skore'] . '</span>
                              <span class="score_place" >#'.$i.'</span>
                            </div>';
                  }
                  
  
                }
                echo '</div>';
                 $sql = "SELECT uz.login, ob.obrazek, SUM(dok.skore) AS skore, uz.id FROM uzivatel AS uz INNER JOIN dokonceno AS dok ON uz.id=dok.userid LEFT JOIN obrazek AS ob ON uz.obrazekid=ob.id WHERE uz.id='{$_SESSION['id']}' GROUP BY uz.login, ob.obrazek, uz.id ORDER BY skore DESC LIMIT 1";
                     $result = mysqli_query($conn, $sql);
                     $resultCheck = mysqli_num_rows($result);
                     if($resultCheck > 0){
                      $row = mysqli_fetch_assoc($result);
                      echo '<div class="places_wrap">
                        <hr class="first_hr">

                        <div class="my_place">
                          <div class="place">
                            <img alt = "profilovy obrazek" src="data:image/jpeg;base64,'.base64_encode( $row['obrazek'] ).'">
                            <div>' . $row['login'] . '</div>
                            <span class="score">' . $row['skore'] . '</span>
                            <span class="score_place" >#' . $us . '</span>
                          </div>
                        </div>
                        <hr class="second_hr">';
                     }
              }
            }
            echo "</div>";  
             ?>        
      </div>
    </section>
    <footer class="footer">
      <p>&copy; Vytvořeno studenty na ČZU jako semestrální projekt.</p>
    </footer>
  </div>
</body>

</html>