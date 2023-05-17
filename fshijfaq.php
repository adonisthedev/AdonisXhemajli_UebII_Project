    <?php include 'inc/header.php' ?>
    <div class="parent">
        <div class="form-wrapper">
        <?php
        if (isset($_GET['faqid'])) {
            $faq = merrFaqId($_GET['faqid']);
            $faqid = $faq['faqid'];
            $doktori = $faq['emridoktori']." ".$faq['mbiemridoktori'];
            $pyetja = $faq['pyetja'];
            $pergjigja = $faq['pergjigja'];
        }
        if (isset($_POST['fshij'])) {
            fshijFaq($_POST['faqid']);
        }
        ?>
        <form class="forma" method="post">
            <h1>Forma p&euml;r fshirjen e pyetjes</h1>

            <input type="hidden" name="faqid" id="faqid" value="<?php if (!empty($faqid)) echo $faqid; ?>">

            <label for="doktori">Doktori:</label>
            <input disabled type="text" id="doktori" name="doktori" value="<?php if(!empty($doktori)) {echo $doktori;}?>">

            <label for="pyetja">Pyetja:</label>
            <input disabled type="text" id="pyetja" name="pyetja" value="<?php if(!empty($pyetja)) {echo $pyetja;}?>">

            <label for="pergjigja">Pergjigja:</label>
            <input disabled type="text" id="pergjigja" name="pergjigja" value="<?php if(!empty($pergjigja)) {echo $pergjigja;}?>">
            
            <input type="submit" name="fshij" id="fshij" value="Fshij">
          </form>
        </div>
    </div>
    <?php include 'inc/footer.php' ?>