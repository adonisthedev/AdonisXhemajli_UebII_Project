<footer class="main-footer">
        <div class="main-footer-content container">
            <p>&copy; Accura Lab 2023. All rights reserved.</p>
        </div>
    </footer>

    <script src="jquery-3.6.0.js"></script>
    <script src="slick.min.js"></script>
    <script src="jquery.validate.min.js"></script>
    <script>
        $().ready(function() {
            $("#login").validate({
                rules: {
                    email: {
                        required: true,
                        email: true
                    },
                    fjalekalimi: {
                        required: true,
                        minlength: 5
                    }
                },
                messages: {
                    email: {
                        required: "Ju lutem shenoni nje email!",
                        email: "Ju lutemi shenoni nje email adrese valide!"
                    },
                    fjalekalimi: {
                        required: "Ju lutem shenoni nje fjalekalim!",
                        minlength: "Fjalekalimi juaj duhet te kete se paku 5 karaktere!"
                    }
                }
            });
            $("#totalforma").validate({
                rules: {
                    emri: {
                        required: true,
                        minlength: 3,
                        lettersonly: true
                    },
                    mbiemri: {
                        required: true,
                        minlength: 3,
                        lettersonly: true
                    },
                    gjinia: {
                        required: true
                    },
                    shteti: {
                        required: true,
                        minlength: 3,
                        lettersonly: true
                    },
                    komuna: {
                        required: true,
                        minlength: 3,
                        lettersonly: true
                    },
                    adresa: {
                        required: true,
                        minlength: 3,
                    },
                    telefoni: {
                        required: true,
                        number: true,
                        minlength: 9
                    },
                    emaili: {
                        required: true,
                        email: true
                    },
                    riemaili: {
                        required: true,
                        email: true,
                        equalTo: "#emaili"
                    },
                    fjalekalimi: {
                        required: true,
                        minlength: 5
                    },
                    rifjalekalimi: {
                        required: true,
                        minlength: 5,
                        equalTo: "#fjalekalimi"
                    },
                    grupiigjakut: {
                        required:true
                    },
                    pacientiid: {
                        required: true
                    },
                    doktoriid: {
                        required: true
                    },
                    analizat: {
                        required: true
                    },
                    rezultatet: {
                        required: true
                    },
                    dataekontrolles: {
                        required: true,
                        date: true
                    },
                    dataerezultatit: {
                        required: true,
                        date: true
                    },
                    epaguar: {
                        required: true
                    }
                },
                messages: {
                    emri: {
                        required: "Ju lutem shenoni emrin!",
                        minlength: "Emri juaj duhet te kete se paku tre karaktere!",
                        lettersonly: "Emri nuk duhet te kete numra!"
                    },
                    mbiemri: {
                        required: "Ju lutem shenoni mbiemrin!",
                        minlength: "Mbiemri juaj duhet te kete se paku tre karaktere!",
                        lettersonly: "Mbiemri nuk duhet te kete numra!"
                    },
                    gjinia: {
                        required: "Ju lutem caktoni gjinine!"
                    },
                    shteti: {
                        required: "Ju lutem shenoni shtetin!",
                        minlength: "Emri i shtetit duhet te kete se paku 3 karaktere!",
                        lettersonly: "Emri i shtetit permban vetem shkronja!"
                    },
                    komuna: {
                        required: "Ju lutem shenoni komunen!",
                        minlength: "Emri i komunes duhet te kete se paku 3 karaktere!",
                        lettersonly: "Emri i komunes permban vetem shkronja!"
                    },
                    adresa: {
                        required: "Ju lutem shenoni adresen!",
                        minlength: "Adresa duhet te kete se paku 3 karaktere!"
                    },
                    telefoni: {
                        required: "Ju lutem shenoni numrin e telefonit!",
                        number: "Numri i telefonit permban vetem numra!",
                        minlength: "Numri i telefonit ka se paku 9 numra"
                    },
                    emaili: {
                        required: "Ju lutem shenoni emailin!",
                        email: "Ju lutem shenoni email adrese valide!"
                    },
                    riemaili: {
                        required: "Ju lutem rishkruani emailin!",
                        email: "Ju lutem shenoni email adrese valide!",
                        equalTo: "Email adresat nuk jane te njejta!"
                    },
                    fjalekalimi: {
                        required: "Ju lutem shenoni fjalekalimin!",
                        minlength: "Fjalekalimi i juaj duhet te kete se paku pese karaktere!"
                    },
                    rifjalekalimi: {
                        required: "Ju lutem rishkruani fjalekalimin!",
                        minlength: "Fjalekalimi i juaj duhet te kete se paku pese karaktere!",
                        equalTo: "Fjalekalimet nuk jane te njejta!"
                    },
                    grupiigjakut: {
                        required: "Ju lutem zgjedhni grupin e gjakut!"
                    },
                    pacientiid: {
                        required: "Ju lutem zgjedhni njerin nga pacientet!"
                    },
                    doktoriid: {
                        required: "Ju lutem zgjedhni njerin nga doktoret!"
                    },
                    analizat: {
                        required: "Ju lutem shkruani analizat!"
                    },
                    rezultatet: {
                        required: "Ju lutem shkruani rezultatet!"
                    },
                    dataekontrolles: {
                        required: "Ju lutem caktoni nje date!",
                        date: "Shenimi duhet te jete date!"
                    }, 
                    dataerezultatit: {
                        required: "Ju lutem caktoni nje date!",
                        date: "Shenimi duhet te jete date!"
                    },
                    epaguar: {
                        required: "Ju lutem caktoni pagesen!"
                    }
                }
            });
            jQuery.validator.addMethod("lettersonly", function(value, element) {
            return this.optional(element) || /^[a-z]+$/i.test(value);
            }, "Letters only please");
        });
        $('.slider').slick({
                dots: true,
                // infinite: false,
                //  speed: 300,
                nextArrow: false,
                prevArrow: false,
                slidesToShow: 3,
                responsive: [{
                        breakpoint: 1024,
                        settings: {
                            slidesToShow: 3,
                        }
                    },
                    {
                        breakpoint: 600,
                        settings: {
                            slidesToShow: 2,
                            slidesToScroll: 2
                        }
                    },
                    {
                        breakpoint: 480,
                        settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1
                        }
                    }
                ]
            });
            $('#dalja').click(function(){
                $.ajax({
                    url: './inc/functions.php?argument=dalja',
                    success: function(data) {
                        window.location.href = data;
                    }
                });
            });
    </script>
</body>
</html>