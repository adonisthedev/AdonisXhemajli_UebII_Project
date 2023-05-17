    <?php include 'inc/header.php' ?>
    <div class="parent">
        <div class="form-wrapper">
        <?php
        if (isset($_GET['pid'])) {
            $pacienti = merrPacientiId($_GET['pid']);
            $pacientiid = $pacienti['pacientiid'];
            $emri = $pacienti['emri'];
            $mbiemri = $pacienti['mbiemri'];
            $gjinia = $pacienti['gjinia'];
            $emaili = $pacienti['emaili'];
            $fjalekalimi = $pacienti['fjalekalimi'];
            $shteti = $pacienti['shteti'];
            $komuna = $pacienti['komuna'];
            $telefoni = $pacienti['telefoni'];
            $Grupiigjakut = $pacienti['grupiigjakut'];
        }
        if (isset($_POST['modifiko'])) {
            modifikoPacient(
                $_POST['pacientiid'],
                $_POST['emri'],
                $_POST['mbiemri'],
                $_POST['gjinia'],
                $_POST['emaili'],
                $_POST['fjalekalimi'],
                $_POST['shteti'],
                $_POST['komuna'],
                $_POST['telefoni'],
                $_POST['grupiigjakut']
            );
        }
        ?>
        <form id="totalforma" class="forma" method="post">
            <h1>Forma p&euml;r modifikimin e pacient&euml;ve</h1>

            <input type="hidden" name="pacientiid" id="pacientiid" value="<?php if (!empty($pacientiid)) echo $pacientiid; ?>">

            <label for="emri">Emri:</label>
            <input type="text" id="emri" name="emri" value="<?php if(!empty($emri)) {echo $emri;}?>">
    
            <label for="mbiemri">Mbiemri:</label>
            <input type="text" id="mbiemri" name="mbiemri" value="<?php if(!empty($mbiemri)) {echo $mbiemri;}?>">

            <label for="gjinia">Gjinia:</label>
            <input type="radio" id="mashkull" name="gjinia" value="M" <?php if($gjinia == "M") {echo "checked";}?>>
            <label for="mashkull">Mashkull</label>
            <input type="radio" id="femer" name="gjinia" value="F" <?php if($gjinia == "F") {echo "checked";}?>>
            <label for="femer">Femer</label>

            <label for="email">Emaili:</label>
            <input type="email" id="emaili" name="emaili" value="<?php if(!empty($emaili)) {echo $emaili;}?>">

            <label for="password">Fjalekalimi:</label>
            <input type="password" id="fjalekalimi" name="fjalekalimi" value="<?php if(!empty($fjalekalimi)) {echo $fjalekalimi;}?>">

            <label for="shteti">Shteti:</label>
            <input type="text" id="shteti" name="shteti" value="<?php if(!empty($shteti)) {echo $shteti;}?>">
    
            <label for="komuna">Komuna:</label>
            <input type="text" id="komuna" name="komuna" value="<?php if(!empty($komuna)) {echo $komuna;}?>">

            <label for="telefoni">Telefoni:</label>
            <input type="text" id="telefoni" name="telefoni" value="<?php if(!empty($telefoni)) {echo $telefoni;}?>">

            <label for="grupiigjakut">Grupi i gjakut:</label>
            <select id="grupiigjakut" name="grupiigjakut">
            <?php
                $grupet = ['A+', 'A-', 'B+', 'B-', 'AB+', 'AB-', '0+', '0-'];
                if (($grupi = array_search($Grupiigjakut, $grupet)) !== false) {
                    unset($grupet[$grupi]);
                }
                echo "<option value='{$Grupiigjakut}' selected>{$Grupiigjakut}</option>";
                foreach ($grupet as $grupi) {
                    echo "<option value='{$grupi}'>{$grupi}</option>";
                }
            ?>
            </select>
            <input type="submit" name="modifiko" id="modifiko" value="Modifiko">
          </form>
        </div>
    </div>
    <?php include 'inc/footer.php' ?>