SELECT UPPER(fiche_personne.nom)
AS NOM, prenom, prix
FROM fiche_personne
INNER JOIN membre
ON fiche_personne.id_perso = membre.id_fiche_perso
INNER JOIN abonnement
ON membre.id_abo = abonnement.id_abo
WHERE prix > 42
ORDER BY UPPER(fiche_personne.nom) ASC, prenom ASC;
