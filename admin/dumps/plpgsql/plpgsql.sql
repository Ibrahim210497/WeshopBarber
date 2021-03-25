

CREATE TABLE client (
    id_clt INTEGER NOT NULL,
    nom TEXT,
    prenom TEXT,
    rue TEXT NOT NULL,
    cp INTEGER NOT NULL,
    localite TEXT NOT NULL,
    telephone TEXT NOT NULL,
    email TEXT NOT NULL,
    pass_clt TEXT,
    PRIMARY KEY (id_clt)
);

CREATE TABLE produit (
    id_produit INTEGER NOT NULL,
    id_cat INTEGER NOT NULL,
    nom_produit TEXT,
    description TEXT NOT NULL,
    image TEXT NOT NULL,
    prix REAL,
    stock INTEGER,
    PRIMARY KEY (id_produit)
);

CREATE TABLE categorie (
    id_cat INTEGER NOT NULL,
    nom_cat TEXT,
    photo TEXT NOT NULL,
    PRIMARY KEY (id_cat)
);

CREATE TABLE comfact (
    id_comfact INTEGER NOT NULL,
    id_client INTEGER NOT NULL,
    id_produit INTEGER NOT NULL,
    prix REAL,
    quantite INTEGER,
    date_livraison DATE,
    PRIMARY KEY (id_comfact)
);

CREATE TABLE panier (
    id_panier INTEGER NOT NULL,
    id_produit INTEGER NOT NULL,
    PRIMARY KEY (id_panier)
);

ALTER TABLE produit ADD FOREIGN KEY (id_cat) REFERENCES categorie (id_cat);
ALTER TABLE comfact ADD FOREIGN KEY (id_client) REFERENCES client (id_clt);
ALTER TABLE comfact ADD FOREIGN KEY (id_produit) REFERENCES produit (id_produit);
ALTER TABLE panier ADD FOREIGN KEY (id_produit) REFERENCES produit (id_produit);