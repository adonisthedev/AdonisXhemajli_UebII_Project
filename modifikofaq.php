    <?php include 'inc/header.php' ?>
    <div class="parent">
        <div class="form-wrapper">
        <?php
        if (isset($_GET['faqid'])) {
            $faq = merrFaqId($_GET['faqid']);
            $faqid = $faq['faqid'];
            $doktor = $faq['emridoktori'] . " " . $faq['mbiemridoktori'];
            $pyetja = $faq['pyetja'];
            $pergjigja = $faq['pergjigja'];
            
        }
        if (isset($_POST['modifiko'])) {
            modifikoFaq(
                $_POST['faqid'],
                $_POST['doktoriid'],
                $_POST['pyetja'],
                $_POST['pergjigja']
            );
        }
        ?>
        <form id="totalforma" class="forma" method="post">
            <h1>Forma p&euml;r modifikimin e pyetjes</h1>

            <input type="hidden" name="faqid" id="faqid" value="<?php if (!empty($faqid)) echo $faqid; ?>">

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
            <input type="text" id="pyetja" name="pyetja" value="<?php if(!empty($pyetja)) {echo $pyetja;}?>">

            <label for="pergjigja">Pergjigja:</label>
            <input type="text" id="pergjigja" name="pergjigja" value="<?php if(!empty($pergjigja)) {echo $pergjigja;}?>">
            
            <input type="submit" name="modifiko" id="modifiko" value="Modifiko">
          </form>
        </div>
    </div>
    <?php include 'inc/footer.php' ?>