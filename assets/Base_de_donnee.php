<?php

// Connexion à MySQL
$connection=mysqli_connect("localhost", "root", "", "Calendrier");

if (!$connection){ // Contrôler la connexion
    $MessageConnexion = die ("connection impossible");
}
else {
if(isset($_POST['Bouton'])){ // Autre contrôle pour vérifier si la variable $_POST['Bouton'] est bien définie
   $Date_start=$_POST['start'];
   $Date_end=$_POST['end'];
   $Titre=$_POST['title'];
   $Commentaire=$_POST['Commentaire'];


   // Requête d'insertion
   $sql="INSERT INTO Date (start, end, title, Commentaire) VALUES ('$Date_start', '$Date_end', '$Titre', '$Commentaire')";

   // Exécution de la reqête
   mysqli_query($connection, $sql) or die('Erreur SQL !'.$sql.'<br>'.mysqli_error($connection));
}
}

sleep(2);
header("Location: index.html" );
$connection = null;
?>
