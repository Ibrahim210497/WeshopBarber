create or replace view vue_produit_cat as select
produit.id_produit,produit.nom_produit,produit.image,produit.prix, 
produit.stock,produit.description,categorie.id_cat,categorie.nom_cat,categorie.photo
from  produit,categorie
where produit.id_cat = categorie.id_cat;

