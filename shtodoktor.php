    <?php include 'inc/header.php' ?>
    <div class="parent">
      <div class="form-wrapper">
          <?php
            if (isset($_POST['shto'])) {
                shtoDoktor($_POST['emri'], $_POST['mbiemri'], $_POST['gjinia'], 
                $_POST['shteti'], $_POST['komuna'], $_POST['adresa'], $_POST['emaili'],
                $_POST['fjalekalimi'], $_POST['telefoni']);
            }
          ?>
          <form id="totalforma" class="forma" method="post">
            <h1>Forma per shtimin e doktorit</h1>
            <label for="emri">Emri:</label>
            <input type="text" id="emri" name="emri">
    
            <label for="mbiemri">Mbiemri:</label>
            <input type="text" id="mbiemri" name="mbiemri">
    
            <label for="gjinia">Gjinia:</label>
            <input type="radio" id="mashkull" name="gjinia" value="M">
            <label for="mashkull">Mashkull</label>
            <input type="radio" id="femer" name="gjinia" value="F">
            <label for="femer">Femer</label>

            <label for="shteti">Shteti:</label>
            <input type="text" id="shteti" name="shteti">
    
            <label for="komuna">Komuna:</label>
            <input type="text" id="komuna" name="komuna">

            <label for="komuna">Adresa:</label>
            <input type="text" id="adresa" name="adresa">
    
            <label for="email">Emaili:</label>
            <input type="email" id="emaili" name="emaili">

            <label for="email">Rishkruaj emailin:</label>
            <input type="email" id="riemaili" name="riemaili">

            <label for="password">Fjalekalimi:</label>
            <input type="password" id="fjalekalimi" name="fjalekalimi">

            <label for="password">Rishkruaj fjalekalimin:</label>
            <input type="password" id="rifjalekalimi" name="rifjalekalimi">

            <label for="telefoni">Telefoni:</label>
            <input type="text" id="telefoni" name="telefoni">
    
            <input type="submit" name="shto" id="shto" value="Shto">
          </form>
      </div>
    </div>
    <?php include 'inc/footer.php' ?>