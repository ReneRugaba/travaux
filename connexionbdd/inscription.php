<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-4 mx-auto d-block">
                <form class="needs-validation form" novalidate>
                    <div class="form-row">
                        <div class="col-md-12 mb-3">
                            <input type="email" class="form-control" name="email" placeholder="votre e-mail" required>
                            <div class="valid-tooltip">
                                Looks good!
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-12 mb-3">
                            <input type="password" name="password" class="form-control" required placeholder="mot de pass">
                            <div class="valid-tooltip">
                                Looks good!
                            </div>
                            <input type="password" name="password" class="form-control" required placeholder="confirmation mo de passe">
                            <div class="valid-tooltip">
                                Looks good!
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col">
                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    <input type="radio" name="profil" class="form-check-input">
                                    <label for="profil" class="form-check-label">utilisateur</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    <input type="radio" name="profil" class="form-check-input">
                                    <label for="profil" class="form-check-label">admin</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-primary col-md-12" type="submit">soumettre</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>