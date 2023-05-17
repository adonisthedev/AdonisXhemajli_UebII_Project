    <?php include 'inc/header.php' ?>
    <div class="parent">
        <div class="form-wrapper">
            <table id="tabela">
                <tr>
                    <th>Pacienti</th>
                    <th>Doktori</th>
                    <th>Analizat</th>
                    <th>Rezultatet</th>
                    <th>Data e kontrolles</th>
                    <th>Data e rezultatit</th>
                    <th>Paguar</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
                <?php
                    $kontrollat = merrKontrollat();
                    $i=0;
                    while($kontrolla = mysqli_fetch_assoc($kontrollat)){
                        if($i%2==0) {echo "<tr>";}else{echo "<tr class='alt'>";}
                        $kontrollaid = $kontrolla['kontrollaid'];
                        echo "<td>" . $kontrolla['pacientiemri'] . "</td>";
                        echo "<td>" . $kontrolla['doktoriemri'] . "</td>";
                        echo "<td>" . $kontrolla['analizat'] . "</td>";
                        echo "<td>" . $kontrolla['rezultatet'] . "</td>";
                        echo "<td>" . $kontrolla['dataekontrolles'] . "</td>";
                        echo "<td>" . $kontrolla['dataerezultatit'] . "</td>";
                        if($kontrolla['epaguar'] == 1) echo "<td>" . "Po" . "</td>";
                        else echo "<td>" . "Jo" . "</td>";
                        echo "<td><a href='modifikokontroll.php?kid={$kontrollaid}'>
                        <i class='fas fa-edit'></i></a></td>";
                        echo "<td><a href='fshijkontroll.php?kid={$kontrollaid}'>
                        <i class='fas fa-trash-alt'></i></a></td>";
                        echo "</tr>";
                        $i++;
                    }
                ?>
            </table>
            <a class="shtobtn" href="shtokontroll.php">Shto Kontroll&euml;</a>
        </div>
    </div>
    <?php include 'inc/footer.php' ?>