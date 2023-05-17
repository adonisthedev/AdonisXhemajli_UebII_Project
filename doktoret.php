    <?php include 'inc/header.php' ?>
    <div class="parent">
        <div class="form-wrapper">
            <table id="tabela">
                <tr>
                    <th>Emri</th>
                    <th>Mbiemri</th>
                    <th>Gjinia</th>
                    <th>Shteti</th>
                    <th>Komuna</th>
                    <th>Adresa</th>
                    <th>Emaili</th>
                    <th>Telefoni</th>
                    <?php
                        if($_SESSION['doktori']['statusi']==1){
                            echo "<th>Modifiko</th>";
                            echo "<th>Fshij</th>";
                        }
                    ?>
                </tr>
                <?php
                    $doktoret = merrDoktoret();
                    $i=0;
                    while($doktori = mysqli_fetch_assoc($doktoret)){
                        if($i%2==0) {echo "<tr>";}else{echo "<tr class='alt'>";}
                        $doktoriid = $doktori['doktoriid'];
                        echo "<td>" . $doktori['emri'] . "</td>";
                        echo "<td>" . $doktori['mbiemri'] . "</td>";
                        echo "<td>" . $doktori['gjinia'] . "</td>";
                        echo "<td>" . $doktori['shteti'] . "</td>";
                        echo "<td>" . $doktori['komuna'] . "</td>";
                        echo "<td>" . $doktori['adresa'] . "</td>";
                        echo "<td>" . $doktori['emaili'] . "</td>";
                        echo "<td>" . $doktori['telefoni'] . "</td>";
                        if($_SESSION['doktori']['statusi']==1){
                            echo "<td><a href='modifikodoktor.php?did={$doktoriid}'>
                            <i class='fas fa-edit'></i></a></td>";
                            echo "<td><a href='fshijdoktor.php?did={$doktoriid}'>
                            <i class='fas fa-trash-alt'></i></a></td>";
                        }
                        echo "</tr>";
                        $i++;
                    }
                ?>
            </table>
            <?php
                if($_SESSION['doktori']['statusi']==1){
                    echo "<a class='shtobtn' href='shtodoktor.php'>Shto Doktor</a>";
                }
            ?>
            <!-- <a class="shtobtn" href="shtodoktor.php">Shto Doktor</a> -->
        </div>
    </div>
    <?php include 'inc/footer.php' ?>