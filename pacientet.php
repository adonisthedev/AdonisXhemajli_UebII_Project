<?php include 'inc/header.php' ?>
    <div class="parent">
        <div class="form-wrapper">
            <table id="tabela">
                <tr>
                    <th>Emri</th>
                    <th>Mbiemri</th>
                    <th>Gjinia</th>
                    <th>Emaili</th>
                    <th>Shteti</th>
                    <th>Komuna</th>
                    <th>Telefoni</th>
                    <th>Gjaku</th>
                    <?php
                        if($_SESSION['doktori']['statusi']==1){
                            echo "<th>Modifiko</th>";
                            echo "<th>Fshij</th>";
                        }
                    ?>
                </tr>
                <?php
                    $pacientet = merrPacientet();
                    $i=0;
                    while($pacienti = mysqli_fetch_assoc($pacientet)){
                        if($i%2==0) {echo "<tr>";}else{echo "<tr class='alt'>";}
                        $pacientiid = $pacienti['pacientiid'];
                        echo "<td>" . $pacienti['emri'] . "</td>";
                        echo "<td>" . $pacienti['mbiemri'] . "</td>";
                        echo "<td>" . $pacienti['gjinia'] . "</td>";
                        echo "<td>" . $pacienti['emaili'] . "</td>";
                        echo "<td>" . $pacienti['shteti'] . "</td>";
                        echo "<td>" . $pacienti['komuna'] . "</td>";
                        echo "<td>" . $pacienti['telefoni'] . "</td>";
                        echo "<td>" . $pacienti['grupiigjakut'] . "</td>";
                        if($_SESSION['doktori']['statusi']!=0){
                            echo "<td><a href='modifikopacient.php?pid={$pacientiid}'>
                            <i class='fas fa-edit'></i></a></td>";
                            echo "<td><a href='fshijpacient.php?pid={$pacientiid}'>
                            <i class='fas fa-trash-alt'></i></a></td>";
                            echo "</tr>";
                            $i++;
                        }
                    }
                ?>
            </table>
            <?php
                if($_SESSION['doktori']['statusi']==1){
                    echo "<a class='shtobtn' href='shtopacient.php'>Shto Pacient</a>";
                }
            ?>
        </div>
    </div>
    <?php include 'inc/footer.php' ?>