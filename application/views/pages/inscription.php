<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>Inscription</title>
    <link rel="stylesheet" href="<?php echo base_url('assets/css/inscription.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/fontawesome-5/css/all.css') ?>">

</head>

<body>
    <div class="container">
        <header>Formulaire d' Inscription</header>
        <div class="progress-bar">
            <div class="step">
                <p></p>
                <div class="bullet">
                    <span>1</span>
                </div>
                <div class="check fas fa-check"></div>
            </div>
            <div class="step">
                <p></p>
                <div class="bullet">
                    <span>2</span>
                </div>
                <div class="check fas fa-check"></div>
            </div>
            <div class="step">
                <p></p>
                <div class="bullet">
                    <span>3</span>
                </div>
                <div class="check fas fa-check"></div>
            </div>

        </div>
        <div class="form-outer">
            <form action="<?php echo  base_url('Authentification/insertMembre')  ?>" method="post">
                <div class="page slide-page">
                    <div class="title">Basic Info:</div>
                    <div class="field">
                        <div class="label">Prenom</div>
                        <input type="text" name="prenom">
                    </div>
                    <div class="field">
                        <div class="label">Nom</div>
                        <input type="text" name="nom">
                    </div>
                    <div class="field">
                        <button class="firstNext next">Next</button>
                    </div>
                </div>

                <div class="page">
                    <div class="title">Date of Birth:</div>
                    <div class="field">
                        <div class="label">Date</div>
                        <input type="date" name="dateNaissance">
                    </div>
                    <div class="field">
                        <div class="label">Gender</div>
                        <select name="genre">
                            <option value="m">Male</option>
                            <option value="f">Female</option>
                        </select>
                    </div>
                    <div class="field btns">
                        <button class="prev-1 prev">Previous</button>
                        <button class="next-1 next">Next</button>
                    </div>
                </div>

                <div class="page">
                    <div class="title">Login Details:</div>
                    <div class="field">
                        <div class="label">Email</div>
                        <input type="text" name="email">
                    </div>
                    <div class="field">
                        <div class="label">mot de Passe</div>
                        <input type="password" name="motDePasse">
                    </div>
                    <div class="field btns">
                        <button class="prev-2 prev">Previous</button>
                        <button class="submit">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <script src="<?php echo base_url('assets/js/inscription.js') ?> "></script>
    

</body>

</html>