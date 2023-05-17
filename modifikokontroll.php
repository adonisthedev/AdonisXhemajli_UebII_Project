    <?php include 'inc/header.php' ?>
    <div class="parent">
        <div class="form-wrapper">
        <?php
        if (isset($_GET['kid'])) {
            $kontrolla = merrKontrollaId($_GET['kid']);
            $kontrollaid = $kontrolla['kontrollaid'];
            $pacient = $kontrolla['pacientiemri'] . " " . $kontrolla['pacientimbiemri'];
            $doktor = $kontrolla['doktoriemri'] . " " . $kontrolla['doktorimbiemri'];
            $analizat = $kontrolla['analizat'];
            $rezultatet = $kontrolla['rezultatet'];
            $dataekontrolles = $kontrolla['dataekontrolles'];
            $dataerezultatit = $kontrolla['dataerezultatit'];
            $epaguar = $kontrolla['epaguar'];
            
        }
        if (isset($_POST['modifiko'])) {
            modifikoKontroll(
                $_POST['kontrollaid'],
                $_POST['analizat'],
                $_POST['rezultatet'],
                $_POST['dataekontrolles'],
                $_POST['dataerezultatit'],
                $_POST['epaguar']
            );
        }
        ?>
        <form id="totalforma" class="forma" method="post">
            <h1>Forma p&euml;r modifikimin e kontrollave</h1>

            <input type="hidden" name="kontrollaid" id="kontrollaid" value="<?php if (!empty($kontrollaid)) echo $kontrollaid; ?>">

            <label for="pacienti">Pacienti:</label>
            <input disabled type="text" id="pacient" name="pacient" value="<?php if(!empty($pacient)) {echo $pacient;}?>">

            <label for="doktori">Doktori:</label>
            <input disabled type="text" id="doktor" name="doktor" value="<?php if(!empty($doktor)) {echo $doktor;}?>">

            <label for="analizat">Analizat:</label>
            <input type="text" id="analizat" name="analizat" value="<?php if(!empty($analizat)) {echo $analizat;}?>">
            
            <label for="rezultatet">Rezultatet:</label>
            <input type="text" id="rezultatet" name="rezultatet" value="<?php if(!empty($rezultatet)) {echo $rezultatet;}?>">


            <label for="dataekontrolles">Data e kontrolles:</label>
            <input type="date" id="dataekontrolles" name="dataekontrolles" value="<?php if(!empty($dataekontrolles)) {echo $dataekontrolles;}?>">
            
            <label for="dataerezultatit">Data e rezultatit:</label>
            <input type="date" id="dataerezultatit" name="dataerezultatit" value="<?php if(!empty($dataerezultatit)) {echo $dataerezultatit;}?>">
            
            <label for="epaguar">E paguar:</label>
            <input type="radio" id="po" name="epaguar" value="1" <?php if($epaguar == "1") {echo "checked";}?>>
            <label for="po">Po</label>
            <input type="radio" id="jo" name="epaguar" value="0" <?php if($epaguar == "0") {echo "checked";}?>>
            <label for="jo">Jo</label>
            
            <input type="submit" name="modifiko" id="modifiko" value="Modifiko">
          </form>
        </div>
    </div>
    <?php include 'inc/footer.php' ?>