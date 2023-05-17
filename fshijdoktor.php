    <?php include 'inc/header.php' ?>
    <div class="parent">
      <div class="form-wrapper">
          <?php
             if (isset($_GET['did'])) {
                $doktori=merrDoktoriId($_GET['did']);
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
                if($doktori['statusi']==1){
                  $statusi = "Administrator";
                }else{
                  $statusi = "Doktor/Infermier";
                }
            }
            if (isset($_POST['fshij'])) {
                fshijDoktor($_POST['doktoriid']);
            }
          ?>
          <form class="forma" method="post">
            <h1>Forma per fshirjen e doktorit</h1>

            <input type="hidden" id="doktoriid" name="doktoriid" value="<?php if (!empty($doktoriid)) { echo $doktoriid;} ?>">

            <label for="emri">Emri:</label>
            <input disabled type="text" id="emri" name="emri" value="<?php if (!empty($emri)) { echo $emri;} ?>">
    
            <label for="mbiemri">Mbiemri:</label>
            <input disabled type="text" id="mbiemri" name="mbiemri" value="<?php if (!empty($mbiemri)) { echo $mbiemri;} ?>">
    
            <label for="gjinia">Gjinia:</label>
            <input disabled type="text" id="gjinia" name="gjinia" value="<?php if (!empty($gjinia)) { echo $gjinia;} ?>">
    
            <label for="shteti">Shteti:</label>
            <input disabled type="text" id="shteti" name="shteti" value="<?php if (!empty($shteti)) { echo $shteti;} ?>">
    
            <label for="komuna">Komuna:</label>
            <input disabled type="text" id="komuna" name="komuna" value="<?php if (!empty($komuna)) { echo $komuna;} ?>">
    
            <label for="adresa">Adresa:</label>
            <input disabled type="text" id="adresa" name="adresa" value="<?php if (!empty($adresa)) { echo $adresa;} ?>">
    
            <label for="emaili">Emaili:</label>
            <input disabled type="text" id="emaili" name="emaili" value="<?php if (!empty($emaili)) { echo $emaili;} ?>">
            
            <label for="fjalekalimi">Fjalekalimi:</label>
            <input disabled type="password" id="fjalekalimi" name="fjalekalimi" value="<?php if (!empty($fjalekalimi)) { echo $fjalekalimi;} ?>">

            <label for="telefoni">Telefoni:</label>
            <input disabled type="text" id="telefoni" name="telefoni" value="<?php if (!empty($telefoni)) { echo $telefoni;} ?>">
    
            <label for="statusi">Statusi:</label>
            <input disabled type="text" id="statusi" name="statusi" value="<?php if (!empty($statusi)) { echo $statusi;} ?>">

            <input type="submit" name="fshij" id="fshij" value="Fshij">
          </form>
      </div>
    </div>
    <?php include 'inc/footer.php' ?>