<?php

$contenu ="";

if (isset($_GET['id'])){
    $id = $_GET['id'];
$sql =  'SELECT U.id, titre, alimage, annee, album, N.styles, genre, M.noms, descriptionAlbums 
FROM albums U, genres N, artistes M, descriptions D
WHERE N.id = U.genre AND M.id = U.artiste AND U.id = '.$id.' AND D.id = U.description AND U.id = '.$id.'
ORDER BY album';
echo $sql;
foreach ($dbh->query($sql) as $row) {
    $id = $row['id'];
    $album = $row['album'];
    $titre = $row['titre'];
    $annee = $row['annee'];
    $genre = $row['styles'];
    $photo = $row['alimage'];
    $artiste = $row['noms'];
    $description = $row['descriptionAlbums'];


    $contenu .= "<div class='row'>";
    album($id, $photo, $titre, $album, $annee, $genre, $artiste, $description);
    affich($id, $photo, $titre, $album, $annee, $genre, $artiste, $description);
    $contenu .= "</div>";
}
}else{
    $contenu .= "Rien afficher";
}

$texte = array("titre"=> "Description","contenu"=>$contenu);