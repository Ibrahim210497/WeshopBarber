--
-- PostgreSQL database dump
--

-- Dumped from database version 13.2
-- Dumped by pg_dump version 13.2

-- Started on 2021-05-24 18:19:04

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET xmloption = content;
SET client_min_messages = warning;
SET row_security = off;

--
-- TOC entry 3 (class 2615 OID 2200)
-- Name: public; Type: SCHEMA; Schema: -; Owner: -
--

CREATE SCHEMA public;


--
-- TOC entry 3055 (class 0 OID 0)
-- Dependencies: 3
-- Name: SCHEMA public; Type: COMMENT; Schema: -; Owner: -
--

COMMENT ON SCHEMA public IS 'standard public schema';


--
-- TOC entry 212 (class 1255 OID 25255)
-- Name: is_admin(text, text); Type: FUNCTION; Schema: public; Owner: -
--

CREATE FUNCTION public.is_admin(text, text) RETURNS integer
    LANGUAGE plpgsql
    AS '
	declare f_login alias for $1;
	declare f_password alias for $2;
	declare  id integer;
	declare retour integer;
BEGIN
	select into id id_admin from bp_admin where login = f_login and password = f_password;
IF NOT FOUND
THEN 
		retour = 0;
		else
		retour = 1;
		END IF;
		return retour;
END;

';


--
-- TOC entry 213 (class 1255 OID 25337)
-- Name: is_client(text, text); Type: FUNCTION; Schema: public; Owner: -
--

CREATE FUNCTION public.is_client(text, text) RETURNS integer
    LANGUAGE plpgsql
    AS '
	declare f_email alias for $1;
	declare f_pass_clt alias for $2;
	declare  id integer;
	declare retour integer;
BEGIN
	select into id id_clt from client where email = f_email and pass_clt = f_pass_clt;
IF NOT FOUND
THEN 
		retour = 0;
		else
		retour = id;
		END IF;
		return retour;
END;

';


SET default_tablespace = '';

SET default_table_access_method = heap;

--
-- TOC entry 200 (class 1259 OID 25256)
-- Name: bp_admin; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE public.bp_admin (
    id_admin integer NOT NULL,
    login text,
    password text
);


--
-- TOC entry 201 (class 1259 OID 25262)
-- Name: bp_admin_id_admin_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE public.bp_admin_id_admin_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 3056 (class 0 OID 0)
-- Dependencies: 201
-- Name: bp_admin_id_admin_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE public.bp_admin_id_admin_seq OWNED BY public.bp_admin.id_admin;


--
-- TOC entry 203 (class 1259 OID 25266)
-- Name: categorie; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE public.categorie (
    id_cat integer NOT NULL,
    nom_cat text,
    photo text NOT NULL
);


--
-- TOC entry 202 (class 1259 OID 25264)
-- Name: categorie_id_cat_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE public.categorie_id_cat_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 3057 (class 0 OID 0)
-- Dependencies: 202
-- Name: categorie_id_cat_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE public.categorie_id_cat_seq OWNED BY public.categorie.id_cat;


--
-- TOC entry 205 (class 1259 OID 25275)
-- Name: client; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE public.client (
    id_clt integer NOT NULL,
    nom text,
    prenom text,
    rue text NOT NULL,
    cp integer NOT NULL,
    localite text NOT NULL,
    telephone text NOT NULL,
    email text NOT NULL,
    pass_clt text,
    matricule text
);


--
-- TOC entry 204 (class 1259 OID 25273)
-- Name: client_id_clt_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE public.client_id_clt_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 3058 (class 0 OID 0)
-- Dependencies: 204
-- Name: client_id_clt_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE public.client_id_clt_seq OWNED BY public.client.id_clt;


--
-- TOC entry 207 (class 1259 OID 25284)
-- Name: comfact; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE public.comfact (
    id_comfact integer NOT NULL,
    id_produit integer NOT NULL,
    prix real,
    quantite integer,
    date_livraison date,
    id_clt integer NOT NULL
);


--
-- TOC entry 206 (class 1259 OID 25282)
-- Name: comfact_id_comfact_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE public.comfact_id_comfact_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 3059 (class 0 OID 0)
-- Dependencies: 206
-- Name: comfact_id_comfact_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE public.comfact_id_comfact_seq OWNED BY public.comfact.id_comfact;


--
-- TOC entry 208 (class 1259 OID 25288)
-- Name: panier; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE public.panier (
    id_panier integer NOT NULL,
    id_produit integer NOT NULL
);


--
-- TOC entry 210 (class 1259 OID 25293)
-- Name: produit; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE public.produit (
    id_produit integer NOT NULL,
    id_cat integer NOT NULL,
    nom_produit text,
    description text NOT NULL,
    image text NOT NULL,
    prix real,
    stock integer,
    reference text
);


--
-- TOC entry 209 (class 1259 OID 25291)
-- Name: produit_id_produit_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE public.produit_id_produit_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 3060 (class 0 OID 0)
-- Dependencies: 209
-- Name: produit_id_produit_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE public.produit_id_produit_seq OWNED BY public.produit.id_produit;


--
-- TOC entry 211 (class 1259 OID 25300)
-- Name: vue_produit_cat; Type: VIEW; Schema: public; Owner: -
--

CREATE VIEW public.vue_produit_cat AS
 SELECT produit.id_produit,
    produit.nom_produit,
    produit.image,
    produit.prix,
    produit.stock,
    produit.description,
    categorie.id_cat,
    categorie.nom_cat,
    categorie.photo
   FROM public.produit,
    public.categorie
  WHERE (produit.id_cat = categorie.id_cat);


--
-- TOC entry 2888 (class 2604 OID 25304)
-- Name: bp_admin id_admin; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.bp_admin ALTER COLUMN id_admin SET DEFAULT nextval('public.bp_admin_id_admin_seq'::regclass);


--
-- TOC entry 2889 (class 2604 OID 25269)
-- Name: categorie id_cat; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.categorie ALTER COLUMN id_cat SET DEFAULT nextval('public.categorie_id_cat_seq'::regclass);


--
-- TOC entry 2890 (class 2604 OID 25278)
-- Name: client id_clt; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.client ALTER COLUMN id_clt SET DEFAULT nextval('public.client_id_clt_seq'::regclass);


--
-- TOC entry 2891 (class 2604 OID 25287)
-- Name: comfact id_comfact; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.comfact ALTER COLUMN id_comfact SET DEFAULT nextval('public.comfact_id_comfact_seq'::regclass);


--
-- TOC entry 2892 (class 2604 OID 25296)
-- Name: produit id_produit; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.produit ALTER COLUMN id_produit SET DEFAULT nextval('public.produit_id_produit_seq'::regclass);


--
-- TOC entry 3039 (class 0 OID 25256)
-- Dependencies: 200
-- Data for Name: bp_admin; Type: TABLE DATA; Schema: public; Owner: -
--

INSERT INTO public.bp_admin (id_admin, login, password) VALUES (1, 'barber', 'af2f73a588dcc5696e37514328f2ae76');


--
-- TOC entry 3042 (class 0 OID 25266)
-- Dependencies: 203
-- Data for Name: categorie; Type: TABLE DATA; Schema: public; Owner: -
--

INSERT INTO public.categorie (id_cat, nom_cat, photo) VALUES (1, 'Produits  Hommes', 'cathomme.jpg
');
INSERT INTO public.categorie (id_cat, nom_cat, photo) VALUES (2, 'Produits  Femmes', 'catfemme.jpg');


--
-- TOC entry 3044 (class 0 OID 25275)
-- Dependencies: 205
-- Data for Name: client; Type: TABLE DATA; Schema: public; Owner: -
--

INSERT INTO public.client (id_clt, nom, prenom, rue, cp, localite, telephone, email, pass_clt, matricule) VALUES (2, 'Youssoundur', 'Said', 'rue saddam 25', 7000, 'mons', '042165456', 'saidlegend@hotmail.com', 'undefaut', '2WZ7');
INSERT INTO public.client (id_clt, nom, prenom, rue, cp, localite, telephone, email, pass_clt, matricule) VALUES (1, 'Hamed', 'Bakayoko ', 'rue moulin rouge', 7500, 'Dour', '046587952', 'hambak@gmail.com', 'zero', '1E9X');
INSERT INTO public.client (id_clt, nom, prenom, rue, cp, localite, telephone, email, pass_clt, matricule) VALUES (3, 'Yimga', 'salomé', 'chemin du champs de mars', 7000, 'Mons', '047889785', 'yimga@gmail.com', 'morco', 'ZZV16');
INSERT INTO public.client (id_clt, nom, prenom, rue, cp, localite, telephone, email, pass_clt, matricule) VALUES (4, 'Loguet', 'Heric', 'rue de la fayette', 7100, 'Dour', '04789565', 'heric@gmail.com', '107come', '107B');


--
-- TOC entry 3046 (class 0 OID 25284)
-- Dependencies: 207
-- Data for Name: comfact; Type: TABLE DATA; Schema: public; Owner: -
--

INSERT INTO public.comfact (id_comfact, id_produit, prix, quantite, date_livraison, id_clt) VALUES (1, 3, 19.99, 1, '2021-06-21', 1);


--
-- TOC entry 3047 (class 0 OID 25288)
-- Dependencies: 208
-- Data for Name: panier; Type: TABLE DATA; Schema: public; Owner: -
--



--
-- TOC entry 3049 (class 0 OID 25293)
-- Dependencies: 210
-- Data for Name: produit; Type: TABLE DATA; Schema: public; Owner: -
--

INSERT INTO public.produit (id_produit, id_cat, nom_produit, description, image, prix, stock, reference) VALUES (1, 1, 'American Crew MATT CLAY', 'Huile pour faire briller,nourrir sa barbe', 'huilebarbe3.jpg', 38.99, 18, 'P1');
INSERT INTO public.produit (id_produit, id_cat, nom_produit, description, image, prix, stock, reference) VALUES (3, 1, 'Moustache wax', 'Cire à moustache 50ml', 'pdhom4.jpg
', 19.99, 8, 'P3');
INSERT INTO public.produit (id_produit, id_cat, nom_produit, description, image, prix, stock, reference) VALUES (4, 1, 'Darpedan', 'Baume après rasage 100ml', 'pdhom3.jpg', 88.99, 7, 'P4');
INSERT INTO public.produit (id_produit, id_cat, nom_produit, description, image, prix, stock, reference) VALUES (5, 1, 'Reuzel', 'Spray rafraichissant barbe 100ml', 'pdhom2.jpg', 15.99, 7, 'P5');
INSERT INTO public.produit (id_produit, id_cat, nom_produit, description, image, prix, stock, reference) VALUES (6, 1, 'O'' Barber shmpoing', 'Champoing pour barbe 25ml', 'pdhom1.jpg', 19.99, 5, 'P6');
INSERT INTO public.produit (id_produit, id_cat, nom_produit, description, image, prix, stock, reference) VALUES (7, 2, 'Huile D''Argan', 'Huile fait à base d''avocat 25ml', 'pdfem.jpg', 18.5, 25, 'P7');
INSERT INTO public.produit (id_produit, id_cat, nom_produit, description, image, prix, stock, reference) VALUES (8, 2, 'Gamme Hannah ', 'Gamme 4  in 1 
huile pour cheveux 25ml,parfum 50ml
crème pour chutte de cheveux 50ml
déodorant pour cheveux 25ml
', 'pdfem1.jpg', 15.5, 14, 'P8');
INSERT INTO public.produit (id_produit, id_cat, nom_produit, description, image, prix, stock, reference) VALUES (9, 2, 'Sleek cure Prestige', 'Pour l''éclat de vos cheveux ', 'pdfem2.jpg', 25.5, 25, 'P9');
INSERT INTO public.produit (id_produit, id_cat, nom_produit, description, image, prix, stock, reference) VALUES (2, 1, 'Bear Club''s', 'Baume à Barbe ', 'huilebarbe.jpg', 25.99, 12, 'P2');
INSERT INTO public.produit (id_produit, id_cat, nom_produit, description, image, prix, stock, reference) VALUES (10, 2, 'Prorasso hair', 'huile pour entretien cheveux artificiel', 'pdfem3.jpg', 35, 19, 'P10');
INSERT INTO public.produit (id_produit, id_cat, nom_produit, description, image, prix, stock, reference) VALUES (11, 1, 'huile pour repousse de cheveux', 'huile fait a base de meringa', 'pdhom.jpg', 75.99, 18, 'P11');
INSERT INTO public.produit (id_produit, id_cat, nom_produit, description, image, prix, stock, reference) VALUES (12, 2, 'American Crew MATT CLAY 2', 'Baume après rasage 125ml', 'pdhom3.jpg', 50, 18, 'P12');


--
-- TOC entry 3061 (class 0 OID 0)
-- Dependencies: 201
-- Name: bp_admin_id_admin_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('public.bp_admin_id_admin_seq', 1, true);


--
-- TOC entry 3062 (class 0 OID 0)
-- Dependencies: 202
-- Name: categorie_id_cat_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('public.categorie_id_cat_seq', 1, false);


--
-- TOC entry 3063 (class 0 OID 0)
-- Dependencies: 204
-- Name: client_id_clt_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('public.client_id_clt_seq', 7, true);


--
-- TOC entry 3064 (class 0 OID 0)
-- Dependencies: 206
-- Name: comfact_id_comfact_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('public.comfact_id_comfact_seq', 1, false);


--
-- TOC entry 3065 (class 0 OID 0)
-- Dependencies: 209
-- Name: produit_id_produit_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('public.produit_id_produit_seq', 13, true);


--
-- TOC entry 2894 (class 2606 OID 25306)
-- Name: bp_admin bp_admin_pkey; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.bp_admin
    ADD CONSTRAINT bp_admin_pkey PRIMARY KEY (id_admin);


--
-- TOC entry 2896 (class 2606 OID 25308)
-- Name: categorie categorie_pkey; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.categorie
    ADD CONSTRAINT categorie_pkey PRIMARY KEY (id_cat);


--
-- TOC entry 2898 (class 2606 OID 25310)
-- Name: client client_pkey; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.client
    ADD CONSTRAINT client_pkey PRIMARY KEY (id_clt);


--
-- TOC entry 2900 (class 2606 OID 25312)
-- Name: comfact comfact_pkey; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.comfact
    ADD CONSTRAINT comfact_pkey PRIMARY KEY (id_comfact);


--
-- TOC entry 2902 (class 2606 OID 25314)
-- Name: panier panier_pkey; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.panier
    ADD CONSTRAINT panier_pkey PRIMARY KEY (id_panier);


--
-- TOC entry 2904 (class 2606 OID 25316)
-- Name: produit produit_pkey; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.produit
    ADD CONSTRAINT produit_pkey PRIMARY KEY (id_produit);


--
-- TOC entry 2905 (class 2606 OID 25322)
-- Name: comfact comfact_id_produit_fkey; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.comfact
    ADD CONSTRAINT comfact_id_produit_fkey FOREIGN KEY (id_produit) REFERENCES public.produit(id_produit);


--
-- TOC entry 2906 (class 2606 OID 25327)
-- Name: panier panier_id_produit_fkey; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.panier
    ADD CONSTRAINT panier_id_produit_fkey FOREIGN KEY (id_produit) REFERENCES public.produit(id_produit);


--
-- TOC entry 2907 (class 2606 OID 25332)
-- Name: produit produit_id_cat_fkey; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.produit
    ADD CONSTRAINT produit_id_cat_fkey FOREIGN KEY (id_cat) REFERENCES public.categorie(id_cat);


-- Completed on 2021-05-24 18:19:06

--
-- PostgreSQL database dump complete
--

