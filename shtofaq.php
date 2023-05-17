    <?php include 'inc/header.php' ?>
    <div class="parent">
      <div class="form-wrapper">
          <?php
            if (isset($_POST['shto'])) {
                shtoFaq($_POST['doktoriid'], $_POST['pyetja'], $_POST['pergjigja']);
            }
          ?>
          <form id="totalforma" class="forma" method="post">
          <h1>Forma per shtimin e pyetjes</h1>
            <label for="doktori">Doktori:</label>
            <select name="doktoriid" id="doktoriid">
              <option value="">Zgjedhni doktorin</option>
                    <?php
                        if(isset($_SESSION['doktori'])){
                          $doktori=merrDoktoriId($_SESSION['doktori']['doktoriid']);
                          $doktoriid = $doktori['doktoriid'];
                          $emri = $doktori['emri'];
                          $mbiemri = $doktori['mbiemri'];
                          $Emrimbiemri=$emri." ".$mbiemri;
                          echo "<option value='{$doktoriid}'>{$Emrimbiemri}</option>"; 
                        }
                    ?>
            </select>

            <label for="pyetja">Pyetja:</label>
            <input type="text" id="pyetja" name="pyetja">
    
            <label for="pergjigja">Pergjigja:</label>
            <input type="text" id="pergjigja" name="pergjigja">
    
            <input type="submit" name="shto" id="shto" value="Shto">
          </form>
      </div>
    </div>
    <?php include 'inc/footer.php' ?>