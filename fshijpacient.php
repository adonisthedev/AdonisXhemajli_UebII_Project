    <?php include 'inc/header.php' ?>
    <div class="parent">
      <div class="form-wrapper">
          <?php
             if (isset($_GET['pid'])) {
                $pacienti=merrPacientiId($_GET['pid']);
                $pacientiid = $pacienti['pacientiid'];
                $emri = $pacienti['emri'];
                $mbiemri = $pacienti['mbiemri'];
                $gjinia = $pacienti['gjinia'];
                $emaili = $pacienti['emaili'];
                $fjalekalimi = $pacienti['fjalekalimi'];
                $shteti = $pacienti['shteti'];
                $komuna = $pacienti['komuna'];
                $telefoni = $pacienti['telefoni'];
                $grupiigjakut = $pacienti['grupiigjakut'];
            }
            if (isset($_POST['fshij'])) {
                fshijPacient($_POST['pacientiid']);
            }
          ?>
          <form class="forma" method="post">
            <h1>Forma per fshirjen e doktorit</h1>

            <input type="hidden" id="pacientiid" name="pacientiid" value="<?php if (!empty($pacientiid)) { echo $pacientiid;} ?>">

            <label for="emri">Emri:</label>
            <input disabled type="text" id="emri" name="emri" value="<?php if (!empty($emri)) { echo $emri;} ?>">
    
            <label for="mbiemri">Mbiemri:</label>
            <input disabled type="text" id="mbiemri" name="mbiemri" value="<?php if (!empty($mbiemri)) { echo $mbiemri;} ?>">
    
            <label for="gjinia">Gjinia:</label>
            <input disabled type="text" id="gjinia" name="gjinia" value="<?php if (!empty($gjinia)) { echo $gjinia;} ?>">
    
            <label for="emaili">Emaili:</label>
            <input disabled type="text" id="emaili" name="emaili" value="<?php if (!empty($emaili)) { echo $emaili;} ?>">
    
            <label for="fjalekalimi">Fjalekalimi:</label>
            <input disabled type="password" id="fjalekalimi" name="fjalekalimi" value="<?php if (!empty($fjalekalimi)) { echo $fjalekalimi;} ?>">
            
            <label for="shteti">Shteti:</label>
            <input disabled type="text" id="shteti" name="shteti" value="<?php if (!empty($shteti)) { echo $shteti;} ?>">
    
            <label for="komuna">Komuna:</label>
            <input disabled type="text" id="komuna" name="komuna" value="<?php if (!empty($komuna)) { echo $komuna;} ?>">
    
            <label for="telefoni">Telefoni:</label>
            <input disabled type="text" id="telefoni" name="telefoni" value="<?php if (!empty($telefoni)) { echo $telefoni;} ?>">
            
            <label for="grupiigjakut">Grupi i gjakut:</label>
            <input disabled type="text" id="grupiigjakut" name="grupiigjakut" value="<?php if (!empty($grupiigjakut)) { echo $grupiigjakut;} ?>">

            <input type="submit" name="fshij" id="fshij" value="Fshij">
          </form>
      </div>
    </div>
    <?php include 'inc/footer.php' ?>