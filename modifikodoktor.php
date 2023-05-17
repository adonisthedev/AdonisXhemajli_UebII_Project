    <?php include 'inc/header.php' ?>
    <div class="parent">
        <div class="form-wrapper">
        <?php
        if (isset($_GET['did'])) {
            $doktori = merrDoktoriId($_GET['did']);
            $doktoriid = $doktori['doktoriid'];
            $emri = $doktori['emri'];
            $mbiemri = $doktori['mbiemri'];
            $gjinia = $doktori['gjinia'];
            $shteti = $doktori['shteti'];
            $komuna = $doktori['komuna'];
            $adresa = $doktori['adresa'];
            $emaili = $doktori['emaili'];
            $fjalekalimi = $doktori['fjalekalimi'];
            $telefoni = $doktori['telefoni'];
        }
        if (isset($_POST['modifiko'])) {
            modifikoDoktor(
                $_POST['doktoriid'],
                $_POST['emri'],
                $_POST['mbiemri'],
                $_POST['gjinia'],
                $_POST['shteti'],
                $_POST['komuna'],
                $_POST['adresa'],
                $_POST['emaili'],
                $_POST['fjalekalimi'],
                $_POST['telefoni']
            );
        }
        ?>
        <form id="totalforma" class="forma" method="post">
            <h1>Forma p&euml;r modifikimin e doktor&euml;ve</h1>

            <input type="hidden" name="doktoriid" id="doktoriid" value="<?php if (!empty($doktoriid)) echo $doktoriid; ?>">

            <label for="emri">Emri:</label>
            <input type="text" id="emri" name="emri" value="<?php if(!empty($emri)) {echo $emri;}?>">
    
            <label for="mbiemri">Mbiemri:</label>
            <input type="text" id="mbiemri" name="mbiemri" value="<?php if(!empty($mbiemri)) {echo $mbiemri;}?>">

            <label for="gjinia">Gjinia:</label>
            <input type="radio" id="mashkull" name="gjinia" value="M" <?php if($gjinia == "M") {echo "checked";}?>>
            <label for="mashkull">Mashkull</label>
            <input type="radio" id="femer" name="gjinia" value="F" <?php if($gjinia == "F") {echo "checked";}?>>
            <label for="femer">Femer</label>
            
            <label for="shteti">Shteti:</label>
            <input type="text" id="shteti" name="shteti" value="<?php if(!empty($shteti)) {echo $shteti;}?>">
    
            <label for="komuna">Komuna:</label>
            <input type="text" id="komuna" name="komuna" value="<?php if(!empty($komuna)) {echo $komuna;}?>">
            
            <label for="komuna">Adresa:</label>
            <input type="text" id="adresa" name="adresa" value="<?php if(!empty($adresa)) {echo $adresa;}?>">
    
            <label for="email">Emaili:</label>
            <input type="email" id="emaili" name="emaili" value="<?php if(!empty($emaili)) {echo $emaili;}?>">

            <label for="password">Fjalekalimi:</label>
            <input type="password" id="fjalekalimi" name="fjalekalimi" value="<?php if(!empty($fjalekalimi)) {echo $fjalekalimi;}?>">

            <label for="telefoni">Telefoni:</label>
            <input type="text" id="telefoni" name="telefoni" value="<?php if(!empty($telefoni)) {echo $telefoni;}?>">
    
            <input type="submit" name="modifiko" id="modifiko" value="Modifiko">
          </form>
        </div>
    </div>
    <?php include 'inc/footer.php' ?>