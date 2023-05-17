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
            $dataekontrolles = date('Y-m-d', strtotime($dataekontrolles));
            $dataerezultatit = $kontrolla['dataerezultatit'];
            $dataerezultatit = date('Y-m-d', strtotime($dataerezultatit));
            if($kontrolla['epaguar']==1){
                $epaguar = "Po";
            }else{
                $epaguar = "Jo";
            }
            
        }
        if (isset($_POST['fshij'])) {
            fshijKontroll($_POST['kontrollaid']);
        }
        ?>
        <form class="forma" method="post">
            <h1>Forma p&euml;r fshirjen e kontrollave</h1>

            <input type="hidden" name="kontrollaid" id="kontrollaid" value="<?php if (!empty($kontrollaid)) echo $kontrollaid; ?>">

            <label for="pacienti">Pacienti:</label>
            <input disabled type="text" id="pacient" name="pacient" value="<?php if(!empty($pacient)) {echo $pacient;}?>">

            <label for="doktori">Doktori:</label>
            <input disabled type="text" id="doktor" name="doktor" value="<?php if(!empty($doktor)) {echo $doktor;}?>">

            <label for="analizat">Analizat:</label>
            <input disabled type="text" id="analizat" name="analizat" value="<?php if(!empty($analizat)) {echo $analizat;}?>">
            
            <label for="rezultatet">Rezultatet:</label>
            <input disabled type="text" id="rezultatet" name="rezultatet" value="<?php if(!empty($rezultatet)) {echo $rezultatet;}?>">

            <label for="dataekontrolles">Data e kontrolles:</label>
            <input disabled type="date" id="dataekontrolles" name="dataekontrolles" value="<?php if(!empty($dataekontrolles)) {echo $dataekontrolles;}?>">
            
            <label for="dataerezultatit">Data e rezultatit:</label>
            <input disabled type="date" id="dataerezultatit" name="dataerezultatit" value="<?php if(!empty($dataerezultatit)) {echo $dataerezultatit;}?>">
            
            <label for="epaguar">E paguar:</label>
            <input disabled type="text" id="epaguar" name="epaguar" value="<?php if(!empty($epaguar)) {echo $epaguar;}?>">
            
            <input type="submit" name="fshij" id="fshij" value="Fshij">
          </form>
        </div>
    </div>
    <?php include 'inc/footer.php' ?>