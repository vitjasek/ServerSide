<?php 
  include_once('common_functions.php');
  include_once('db_connector.php');
  redirect_if_not_logged();

  if($_SERVER['REQUEST_METHOD']=="POST")
  {
    if(isset($_POST['idkurz']))
    {
      if(strlen($_POST['idkurz'])>0 && strlen($_POST['anslist01'])>0 && strlen($_POST['anslist02'])>0 && strlen($_POST['anslist03'])>0)
      {
        $wantedid = $_POST['idkurz'];
        $upkurz = "UPDATE kurz SET nazev='".$_POST['name']."' WHERE id='".$_POST['idkurz']."'";
        $conn->query($upkurz);
        
        $select = "SELECT k.id, k.nazev, k.userid, ot.id as idOtazka, ot.datum, ot.odpoved, ob.id as idObrazek, ob.obrazek FROM kurz AS k INNER JOIN otazka AS ot ON k.id=ot.kurzid INNER JOIN obrazek AS ob ON ot.obrazekid=ob.id WHERE k.id='{$_POST['idkurz']}'";
        $otazky = mysqli_query($conn, $select);

        $i = 1;
        while($row = mysqli_fetch_array($otazky, MYSQLI_ASSOC)){
        $img_id = NULL;
          if(is_uploaded_file($_FILES['pic0'.$i]['tmp_name'])){
            $dltpic = "DELETE FROM obrazek WHERE id='{$rowot['idObrazek']}'";
            $conn->query($dltpic);
            $image = addslashes(file_get_contents($_FILES['pic0'.$i]['tmp_name']));
            $query = "INSERT INTO obrazek (id,obrazek) VALUES('', '$image')";
            $qry = mysqli_query($conn, $query);
            $img_id = $conn->insert_id;            
          }
          $ans = $_POST['anslist0'.$i]=="ano" ? 1 : 0;
          if(!empty($img_id)){
            $otazkaup = "UPDATE otazka SET datum=NOW(), odpoved=$ans, kurzid='".$_POST['idkurz']."', obrazekid='$img_id' WHERE id='$row[idOtazka]'";          
          }
          else
          {
            $otazkaup = "UPDATE otazka SET datum=NOW(), odpoved=$ans, kurzid='".$_POST['idkurz']."', obrazekid='$row[idObrazek]' WHERE id='$row[idOtazka]'";            
          }
          $conn->query($otazkaup);
          $i++;
        }
        header("Location: kurz_edit.php"); 
        exit();
      }      
    }
    else
    {
      $wantedid = $_POST['edit'];
      $select = "SELECT k.id, k.nazev, k.userid, ot.id as idOtazka, ot.datum, ot.odpoved, ob.id as idObrazek, ob.obrazek FROM kurz AS k INNER JOIN otazka AS ot ON k.id=ot.kurzid INNER JOIN obrazek AS ob ON ot.obrazekid=ob.id WHERE k.id='$wantedid'";
      $otazky = mysqli_query($conn, $select);
      $slctkurz = "SELECT * FROM kurz WHERE id='$wantedid'";
      $kurzy = mysqli_query($conn, $slctkurz);
      $kurz = $kurzy->fetch_assoc();
    }
  }
?>
<!DOCTYPE html>
<html lang="cs">

<head>
<?php echo html_hlavička('new', 'Nový kurz'); ?>
<link rel="stylesheet" type="text/css" href="css/new.css">
</head>

<body>
  <div class="layer">
    <section>
      <div class="main_div">
        <div class="kurz">
          <h2>Tvorba nového kurzu</h2>
          <form action="kurz_update.php" method="POST" enctype="multipart/form-data">
            <span>Název kurzu s otázkou: </span> <input type="text" class="main" name="name" value="<?php echo $kurz['nazev']; ?>"><br>
            <?php
            $x=0;
            while($row = mysqli_fetch_array($otazky, MYSQLI_ASSOC))
            {
              $x++;
              $sl = "SELECT id, obrazek FROM obrazek WHERE id='{$row['idObrazek']}'";
              $slqry = mysqli_query($conn, $sl);
              $rowobr = $slqry->fetch_assoc();              
              echo "<hr>
              <h2>Otázka č.".$x."</h2>
              <img src='data:image/jpeg;base64,".base64_encode( $rowobr['obrazek'] )."' style='max-width: 300px;'>
              <table>
                <tr><td><span class='inside'>Obrázek vztahující se k otázce:</span></td><td><input type='file' class='inside' name='pic0".$x."'></td></tr>
                <tr><td><span class='inside'>Odpověď:</span></td><td>
                <select id='ans0".$x."' name='anslist0".$x."'>
                  <option value='ano' ".(($row['odpoved']==1)?'selected="selected"':"").">Ano</option>
                  <option value='ne'".(($row['odpoved']==0)?'selected="selected"':"").">Ne</option>
                </select></td></tr>
              </table>";
            }
            ?>
            <?php
            echo "<input type='hidden' name='idkurz' value='".$wantedid."'>"
            ?>
            <button type="submit">Upravit</button>
          </form>
        </div>
      </div>

    </section>

    <footer class="footer">
      <p>&copy; Vytvořeno studenty na ČZU jako semestrální projekt.</p>
    </footer>
  </div>
</body>

</html>