--par manque de temps je vais mettres les differentes requets SQL ici pour le dernier exercice

--Afficher le nombre de conducteur.
select count(*) from conducteur;

-- Afficher le nombre de vehicule.
select count(*) from vehicule;

--Afficher le nombre d’association.
select count(*) from association_vehicule_conducteur;

-- Afficher les vehicules n’ayant pas de conducteur
select id_vehicule from association_vehicule_conducteur where id_association= Null;

--Afficher les conducteurs n’ayant pas de vehicule

--Afficher les vehicules conduit par « Philippe Pandre »
--combien de livres benoit a emprunté a la bibilotheques
select vehicules from vehicules where id_vehicules in
(select id_vehicule from abonassociation_vehicule_conducteurne where id_conducteur='Philippe Pandre');
--Afficher tous les conducteurs (meme ceux qui n'ont pas de correspondance) ainsi que les vehicules
select * from vtc;

--Afficher les conducteurs et tous les vehicules (meme ceux qui n'ont pas de correspondance)

--Afficher tous les conducteurs et tous les vehicules, peut importe les correspondances. 