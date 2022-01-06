<?php

// 1. Je vérifie que je récupère bien les info du formulaire en POST
echo "<pre>";
print_r($_POST);
echo "</pre>";

// 2. Je c/c les clefs de mon tableau $_POST pour me faciliter la tâche pour la vérification des conditions :
//     [email] => test@test
//     [password] => testtestet
//     [address] => test
//     [city] => test
//     [zip] => 93330
//     [country] => france

// 3. Je vérifie que mon tableau $_POST convient des valeurs et que chaque n'est pas vide
if (isset($_POST["email"]) && !empty($_POST["email"])
&& isset($_POST["password"]) && !empty($_POST["password"])
&& isset($_POST["address"]) && !empty($_POST["address"])
&& isset($_POST["city"]) && !empty($_POST["city"])
&& isset($_POST["zip"]) && !empty($_POST["zip"])
&& isset($_POST["country"]) && !empty($_POST["country"])
){

    // 5. Je vais stocker les valeurs de mes clefs dans des variables + les formater
    $email = strtolower(trim($_POST["email"]));
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT); // je n'oublie pas de hasher le mdp
    $address = trim($_POST["address"]);
    $city = ucfirst(trim($_POST["city"]));
    $zip = $_POST["zip"];
    $country = strtoupper($_POST["country"]);


    // 4. Si les conditions sont remplies, je me connecte à la DB
    $dsn = 'mysql:dbname=mini-project;host=localhost';
    $user = 'root';
    $password = 'root';
    
    try {
        $bdd = new PDO($dsn, $user, $password);
        $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        echo 'Échec lors de la connexion : ' . $e->getMessage();
    }
    


}




?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8" />
    <meta name="description" content="A project made with love & laugh by Marilène Khieu!">
    <!--description de la page-->
    <meta name="keywords" content="HTML, CSS, JavaScript, PHP">
    <!--Mot clef de la page-->
    <meta name="author" content="Marilène Khieu">
    <!--Auteur du site-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mini project with PHP</title>
    <link rel="icon" href="images/mk-logo.png" type="image/gif" sizes="16x16">
    <link rel="stylesheet" href="css/reset.css" />
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>

    <header>

    </header>

    <main>
        <h1>Welcome on board</h1>

        <section>
            <form class="row g-3 container mx-3" method="POST" action="#">

                <div class="col-md-6">
                    <label for="inputEmail4" class="form-label">Email</label>
                    <input type="email" class="form-control" id="inputEmail4" name="email">
                </div>

                <div class="col-md-6">
                    <label for="inputPassword4" class="form-label">Password</label>
                    <input type="password" class="form-control" id="inputPassword4" placeholder="8 characters min." name="password">
                </div>

                <div class="col-12">
                    <label for="inputAddress" class="form-label">Address</label>
                    <input type="text" class="form-control" id="inputAddress" placeholder="127 rue du Belvédère" name="address">
                </div>

                <div class="col-md-6">
                    <label for="inputCity" class="form-label">City</label>
                    <input type="text" class="form-control" id="inputCity" placeholder="Pré-St-Gervais" name="city">
                </div>

                <div class="col-md-2">
                    <label for="inputZip" class="form-label">Zip</label>
                    <input type="number" class="form-control" id="inputZip" placeholder="93330" name="zip">
                </div>

                <div class="col-md-4">
                    <label for="inputState" class="form-label">Country</label>
                    <select id="inputState" class="form-select" name="country">
                        <option selected>Choose...</option>
                        <option value="france">France</option>
                        <option value="germany">Germany</option>
                        <option value="uk">UK</option>
                        <option value="spain">Spain</option>
                        <option value="other">Other</option>
                    </select>
                </div>

                <div class="col-12">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="gridCheck">
                        <label class="form-check-label" for="gridCheck">
                            Check me out
                        </label>
                    </div>
                </div>

                <div class="col-12">
                    <button type="submit" class="btn btn-primary">Sign in</button>
                </div>

            </form>
        </section>
    </main>

    <footer>
    </footer>

</body>

</html>