
    -- Affiche toutes les données.
SELECT * FROM `students`;

    -- Affiche uniquement les prénoms.
SELECT nom FROM `students`;

    -- Affiche les prénoms, les dates de naissance et l’école de chacun.
SELECT nom, prenom, school FROM `students`;

    -- Affiche uniquement les élèves qui sont de sexe féminin.
SELECT * FROM `students` WHERE genre ='F';

    -- Affiche uniquement les élèves qui font partie de l’école Charleroi
SELECT * FROM `students` WHERE school = 2;

    -- Affiche uniquement les prénoms des étudiants, par ordre inverse à l’alphabet (DESC). Ensuite, la même chose mais en limitant les résultats à 2.
SELECT prenom FROM `students` ORDER BY prenom DESC;
SELECT prenom FROM `students` ORDER BY prenom DESC LIMIT 0,2;

    -- Ajoute Ginette Dalor, née le 01/01/1930 et affecte-la à Bruxelles, toujours en SQL.
    INSERT INTO `students`(`idStudent`, `nom`, `prenom`, `datenaissance`, `genre`, `school`)
    VALUES (idStudent,'Dalor','Ginette','1990-01-01','F',2);

    -- Modifie Ginette (toujours en SQL) et change son sexe et son prénom en “Omer”.
    UPDATE `students`
    SET `prenom`='Omer',`genre`= 'M'
    WHERE prenom = "Ginette" AND genre = "F";

    -- Supprimer la personne dont l’ID est 3.
DELETE FROM `students` WHERE idStudent = 3;

    -- Modifier le contenu de la colonne School de sorte que "1" soit remplacé par "Bruxelles" et "2" soit remplacé par "Charleroi". (attention au type de la colonne !)
    -- Faire d’autres manipulations pour voir si t’es bien compris.

Changement valeur de la colonne dans structure
   UPDATE `students`

    SET school = "Bruxelles"

    WHERE school  = 1;

    UPDATE `students`

     SET school = "Charleroi"

     WHERE school  = '2';
