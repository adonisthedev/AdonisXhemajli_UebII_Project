    <?php include 'inc/header.php' ?>
    <div class="parent">
      <div class="form-wrapper">
          <?php
            if (isset($_POST['shto'])) {
                shtoKontroll($_POST['pacientiid'], $_POST['doktoriid'], $_POST['analizat'], 
                $_POST['rezultatet'], $_POST['dataekontrolles'], $_POST['dataerezultatit'], 
                $_POST['epaguar']);
            }
          ?>
          <form id="totalforma" class="forma" method="post">
            <label for="pacienti">Pacienti:</label>
            <select name="pacientiid" id="pacientiid">
              <option value="">Zgjedhni pacientin</option>
              <?php
                        $pacientet=merrPacientet();
                        while ($pacienti= mysqli_fetch_assoc($pacientet)) {
                            $pacientiid=$pacienti['pacientiid'];
                            $emrimbiemri=$pacienti['emri']. " " .$pacienti['mbiemri'];
                            echo "<option value='{$pacientiid}'>{$emrimbiemri}</option>"; 
                        }
                    ?>
            </select>
            
            <label for="doktori">Doktori:</label>
            <select name="doktoriid" id="doktoriid">
              <option value="">Zgjedhni doktorin</option>
                    <?php
                        if(isset($_SESSION['doktori']) && $_SESSION['doktori']['statusi']!=1){
                          $doktori=merrDoktoriId($_SESSION['doktori']['doktoriid']);
                          $doktoriid = $doktori['doktoriid'];
                          $emri = $doktori['emri'];
                          $mbiemri = $doktori['mbiemri'];
                          $Emrimbiemri=$emri." ".$mbiemri;
                          echo "<option value='{$doktoriid}'>{$Emrimbiemri}</option>"; 
                        }else{
                          $doktoret=merrDoktoret();
                          while ($doktori= mysqli_fetch_assoc($doktoret)) {
                            $doktoriid=$doktori['doktoriid'];
                            $emrimbiemri=$doktori['emri']. " " .$doktori['mbiemri'];
                            echo "<option value='{$doktoriid}'>{$emrimbiemri}</option>"; 
                          }
                        }
                    ?>
            </select>

            <label for="analizat">Analizat:</label>
            <input type="text" id="analizat" name="analizat">
    
            <label for="rezultatet">Rezultatet:</label>
            <input type="text" id="rezultatet" name="rezultatet">

            <label for="dataekontrolles">Data e kontrolles:</label>
            <input type="date" id="dataekontrolles" name="dataekontrolles">

            <label for="dataerezultatit">Data e rezultatit:</label>
            <input type="date" id="dataerezultatit" name="dataerezultatit">

            <label for="epaguar">Paguar:</label>
            <input type="radio" id="po" name="epaguar" value="1">
            <label for="po">Po</label>
            <input type="radio" id="jo" name="epaguar" value="0">
            <label for="jo">Jo</label>
    
            <input type="submit" name="shto" id="shto" value="Shto">
          </form>
      </div>
    </div>
    <?php include 'inc/footer.php' ?>