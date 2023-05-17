<?php include 'inc/header.php' ?>
    <div class="parent">
        <div class="form-wrapper">
            <table id="tabela">
                <tr>
                    <th>Doktori</th>
                    <th>Pyetja</th>
                    <th>Pergjigja</th>
                    <?php
                        if(isset($_SESSION['doktori'])){
                            echo "<th>Modifiko</th>";
                            echo "<th>Fshij</th>";
                        }
                    ?>
                </tr>
                <?php
                    $faqs = merrFaqs();
                    $i=0;
                    while($faq = mysqli_fetch_assoc($faqs)){
                        if($i%2==0) {echo "<tr>";}else{echo "<tr class='alt'>";}
                        $faqid = $faq['faqid'];
                        echo "<td>" . $faq['emridoktori'] ." ".  $faq['mbiemridoktori'] ."</td>";
                        echo "<td>" . $faq['pyetja'] . "</td>";
                        echo "<td>" . $faq['pergjigja'] . "</td>";
                        if(isset($_SESSION['doktori'])){
                            echo "<td><a href='modifikofaq.php?faqid={$faqid}'>
                            <i class='fas fa-edit'></i></a></td>";
                            echo "<td><a href='fshijfaq.php?faqid={$faqid}'>
                            <i class='fas fa-trash-alt'></i></a></td>";
                        }
                        echo "</tr>";
                        $i++;
                    }
                ?>
            </table>
            <?php
                if(isset($_SESSION['doktori'])){
                    echo "<a class='shtobtn' href='shtofaq.php'>Shto Pyetje</a>";
                }
            ?>
        </div>
    </div>
    <?php include 'inc/footer.php' ?>