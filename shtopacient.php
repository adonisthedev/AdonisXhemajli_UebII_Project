    <?php include 'inc/header.php' ?>
    <div class="parent">
      <div class="form-wrapper">
          <?php
            if (isset($_POST['shto'])) {
                shtoPacient($_POST['emri'], $_POST['mbiemri'], $_POST['gjinia'], 
                $_POST['emaili'], $_POST['fjalekalimi'], $_POST['shteti'], 
                $_POST['komuna'], $_POST['telefoni'], $_POST['grupiigjakut']);
            }
          ?>
          <form id="totalforma" class="forma" method="post">
            <h1>Forma per shtimin e pacientit</h1>
            <label for="emri">Emri:</label>
            <input type="text" id="emri" name="emri">
    
            <label for="mbiemri">Mbiemri:</label>
            <input type="text" id="mbiemri" name="mbiemri">
    
            <label for="gjinia">Gjinia:</label>
            <input type="radio" id="mashkull" name="gjinia" value="M">
            <label for="mashkull">Mashkull</label>
            <input type="radio" id="femer" name="gjinia" value="F">
            <label for="femer">Femer</label>

            <label for="email">Emaili:</label>
            <input type="email" id="emaili" name="emaili">

            <label for="email">Rishkruaj emailin:</label>
            <input type="email" id="riemaili" name="riemaili">

            <label for="password">Fjalekalimi:</label>
            <input type="password" id="fjalekalimi" name="fjalekalimi">

            <label for="password">Rishkruaj fjalekalimin:</label>
            <input type="password" id="rifjalekalimi" name="rifjalekalimi">

            <label for="shteti">Shteti:</label>
            <input type="text" id="shteti" name="shteti">
    
            <label for="komuna">Komuna:</label>
            <input type="text" id="komuna" name="komuna">
    
            <label for="telefoni">Telefoni:</label>
            <input type="text" id="telefoni" name="telefoni">
    
            <label for="grupiigjakut">Grupi i gjakut:</label>
            <select id="grupiigjakut" name="grupiigjakut">
              <option value="">Zgjedhni grupin e gjakut</option>
              <option value="A+">A+</option>
              <option value="A-">A-</option>
              <option value="B+">B+</option>
              <option value="B-">B-</option>
              <option value="AB+">AB+</option>
              <option value="AB-">AB-</option>
              <option value="0+">0+</option>
              <option value="0-">0-</option>
            </select>

            <input type="submit" name="shto" id="shto" value="Shto">
          </form>
      </div>
    </div>
    <?php include 'inc/footer.php' ?>