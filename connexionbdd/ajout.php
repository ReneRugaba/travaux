<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <title>ajout d'employé</title>
</head>
<body>
    <div class="container-fluid">
        <div class="col-6 rounded mx-auto d-block">
            <form action="gestion.php?action=ajouter" method="POST">
                <div class="form-row">
                    <div class="form-group col-md-6">
                    <input type="text" class="form-control" id="noemp" name="noemp" placeholder="NU employé">
                    </div>
                    <div class="form-group col-md-6">
                    <input type="text" class="form-control" id="nom" name="nom" placeholder="Nom">
                    </div>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" id="prenom" name="prenom" placeholder="PRENOM">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" id="emploi" name="emploi" placeholder="Emploi">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" id="sup" name="sup" placeholder="Sup">
                </div>
                <div class="form-group">
                <label for="date">Date embauche:</label>
                    <input type="date" class="form-control" id="date" name="embauche">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" id="sal" name="sal" placeholder="Salaire">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" id="comm" name="comm" placeholder="Commission">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" id="noserv" name="noserv" placeholder="Numéro de service">
                </div>
                <button type="submit" class="btn btn-primary">Sign in</button>
            </form>
        </div>
    </div>
</body>
</html>