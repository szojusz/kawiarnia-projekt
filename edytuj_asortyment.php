<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <title>Dodaj Zamówienie - Kawiarnia</title>
    </head>
    <body>
    <!-- Nowy klient -->
        <?php include "menu.php";
        $typ = $_REQUEST['typ'];
        switch ($typ) {
            case "nowy":
        ?>

            <!-- Formularz dodawania -->

        <?php
                break;
            case "insert":  
                header('Refresh:5 ; URL=asortyment.php'); 
                $nazwa = $_POST['nazwa'];
                $kategoria = $_POST['kategoria'];
                $cena = $_POST['cena'];
                $status = $_POST['status'];
                $sql = "INSERT INTO klienci (nazwa, kategoria, cena, status)
                        VALUES ('$nazwa', '$kategoria', '$cena', 'Dostępny')";
                $result = $conn->query($sql);
                $sql_id = "SELECT MAX(id_towaru) id FROM asortyment";
                $result_id = $conn->query($sql_id);
                $row_id = $result_id->fetch_assoc();
            ?>
                <div class="container-fluid">
                    <p>Dodano nowy asortyment:<br><br>
                        ID produktu: <b><?php echo $row_id['id_asortmentu'];?>,</b><br> 
                        Nazwa: <b><?php echo $nazwa;?>,</b><br>
                        Kategoria: <b><?php echo $kategoria;?>,</b><br>
                        Cena: <b><?php echo $cena;?>.</b>
                    </p>   
                    <a href="asortyment.php"><button type="button" class="btn btn-success">Powrót do klientów</button></a>  
                </div>
    <!-- Edycja klienta -->
        <?php
                break;
            case "edycja":
                $id_klienta = $_POST['id_klienta'];
                $sql = "SELECT nazwa, kategoria, cena, status_asortymentu FROM asortyment WHERE id_towaru=$id_towaru";
                $result = $conn->query($sql);
                $row = $result->fetch_assoc();
                $status = $row['status_asortymentu'];
        ?>
                
            <!-- Forularz Edycji -->

        <?php
                break;
            case "update": 
                header('Refresh:5 ; URL=asortyment.php');
                $id_towaru = $_POST['id_towaru'];
                $nazwa = $_POST['nazwa'];
                $kategoria = $_POST['kategoria'];
                $cena = $_POST['cena'];
                $status = $_POST['status'];
                $sql = "UPDATE klienci SET nazwa = '$nazwa', kategoria = '$kategoria', cena = '$cena', status_asortymentu = '$status' WHERE id_towaru = $id_towaru";
                $result = $conn->query($sql);
        ?>
                <div class="container-fluid">
                    <p>Dodano nowy asortyment:<br><br>
                        ID produktu: <b><?php echo $row_id['id_asortmentu'];?>,</b><br> 
                        Nazwa: <b><?php echo $nazwa;?>,</b><br>
                        Kategoria: <b><?php echo $kategoria;?>,</b><br>
                        Cena: <b><?php echo $cena;?>.</b>
                    </p>   
                    <a href="asortyment.php"><button type="button" class="btn btn-success">Powrót do klientów</button></a>  
                </div>
    <!-- Usuwanie klienta -->
        <?php
                break;
            case "delete":
                header('Refresh:5 ; URL=asortyment.php');
                $id_klienta = $_POST['id_asorymentu'];
                $sql = "UPDATE asortyment SET status_asortymentu = 'Nie dostępny' WHERE id_towaru = $id_towaru";
                $result = $conn->query($sql);
                $sql_kl = "SELECT nazwa, kategoria, cena FROM asortyment WHERE id_towaru=$id_towaru";
                $result_kl = $conn->query($sql_kl);
                $row_kl = $result_kl->fetch_assoc();
        ?>
                <div class="container-fluid">
                    <p>Dodano nowy asortyment:<br><br>
                        ID produktu: <b><?php echo $row_id['id_asortmentu'];?>,</b><br> 
                        Nazwa: <b><?php echo $nazwa;?>,</b><br>
                        Kategoria: <b><?php echo $kategoria;?>,</b><br>
                        Cena: <b><?php echo $cena;?>.</b>
                    </p>   
                    <a href="asortyment.php"><button type="button" class="btn btn-success">Powrót do klientów</button></a>  
                </div>
            <?php
                break;
        }?>    

    </body>
</html>