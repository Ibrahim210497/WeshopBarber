--
-- PostgreSQL database dump
--

-- Dumped from database version 13.2
-- Dumped by pg_dump version 13.2

-- Started on 2021-04-19 23:14:32

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
-- TOC entry 3039 (class 0 OID 0)
-- Dependencies: 3
-- Name: SCHEMA public; Type: COMMENT; Schema: -; Owner: -
--

COMMENT ON SCHEMA public IS 'standard public schema';


--
-- TOC entry 208 (class 1255 OID 17064)
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


SET default_tablespace = '';

SET default_table_access_method = heap;

--
-- TOC entry 207 (class 1259 OID 17050)
-- Name: bp_admin; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE public.bp_admin (
    id_admin integer NOT NULL,
    login text,
    password text
);


--
-- TOC entry 206 (class 1259 OID 17048)
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
-- TOC entry 3040 (class 0 OID 0)
-- Dependencies: 206
-- Name: bp_admin_id_admin_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE public.bp_admin_id_admin_seq OWNED BY public.bp_admin.id_admin;


--
-- TOC entry 202 (class 1259 OID 16986)
-- Name: categorie; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE public.categorie (
    id_cat integer NOT NULL,
    nom_cat text,
    photo text NOT NULL
);


--
-- TOC entry 200 (class 1259 OID 16970)
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
    pass_clt text
);


--
-- TOC entry 203 (class 1259 OID 16994)
-- Name: comfact; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE public.comfact (
    id_comfact integer NOT NULL,
    id_client integer NOT NULL,
    id_produit integer NOT NULL,
    prix real,
    quantite integer,
    date_livraison date
);


--
-- TOC entry 204 (class 1259 OID 16999)
-- Name: panier; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE public.panier (
    id_panier integer NOT NULL,
    id_produit integer NOT NULL
);


--
-- TOC entry 201 (class 1259 OID 16978)
-- Name: produit; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE public.produit (
    id_produit integer NOT NULL,
    id_cat integer NOT NULL,
    nom_produit text,
    description text NOT NULL,
    image text NOT NULL,
    prix real,
    stock integer
);


--
-- TOC entry 205 (class 1259 OID 17033)
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
-- TOC entry 2879 (class 2604 OID 17053)
-- Name: bp_admin id_admin; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.bp_admin ALTER COLUMN id_admin SET DEFAULT nextval('public.bp_admin_id_admin_seq'::regclass);


--
-- TOC entry 3033 (class 0 OID 17050)
-- Dependencies: 207
-- Data for Name: bp_admin; Type: TABLE DATA; Schema: public; Owner: -
--

INSERT INTO public.bp_admin (id_admin, login, password) VALUES (1, 'barber', 'af2f73a588dcc5696e37514328f2ae76');


--
-- TOC entry 3029 (class 0 OID 16986)
-- Dependencies: 202
-- Data for Name: categorie; Type: TABLE DATA; Schema: public; Owner: -
--

INSERT INTO public.categorie (id_cat, nom_cat, photo) VALUES (1, 'Produits  Hommes', 'cathomme.jpg
');
INSERT INTO public.categorie (id_cat, nom_cat, photo) VALUES (2, 'Produits  Femmes', 'catfemme.jpg');


--
-- TOC entry 3027 (class 0 OID 16970)
-- Dependencies: 200
-- Data for Name: client; Type: TABLE DATA; Schema: public; Owner: -
--

INSERT INTO public.client (id_clt, nom, prenom, rue, cp, localite, telephone, email, pass_clt) VALUES (1, 'Hamed', 'Bakayoko ', 'rue moulin rouge', 7500, 'Dour', '046587952', 'hambak@gmail.com', 'zerofaute');
INSERT INTO public.client (id_clt, nom, prenom, rue, cp, localite, telephone, email, pass_clt) VALUES (2, 'Youssoundur', 'Said', 'rue saddam 25', 7000, 'mons', '042165456', 'saidlegend@hotmail.com', 'undefaut');


--
-- TOC entry 3030 (class 0 OID 16994)
-- Dependencies: 203
-- Data for Name: comfact; Type: TABLE DATA; Schema: public; Owner: -
--



--
-- TOC entry 3031 (class 0 OID 16999)
-- Dependencies: 204
-- Data for Name: panier; Type: TABLE DATA; Schema: public; Owner: -
--



--
-- TOC entry 3028 (class 0 OID 16978)
-- Dependencies: 201
-- Data for Name: produit; Type: TABLE DATA; Schema: public; Owner: -
--

INSERT INTO public.produit (id_produit, id_cat, nom_produit, description, image, prix, stock) VALUES (1, 1, 'American Crew MATT CLAY', 'Huile pour faire briller,nourrir sa barbe', 'huilebarbe3.jpg', 38.99, 18);
INSERT INTO public.produit (id_produit, id_cat, nom_produit, description, image, prix, stock) VALUES (2, 1, 'Bear Club', 'Baume à Barbe ', 'huilebarbe.jpg', 25.99, 12);
INSERT INTO public.produit (id_produit, id_cat, nom_produit, description, image, prix, stock) VALUES (3, 1, 'Moustache wax', 'Cire à moustache 50ml', 'pdhom4.jpg
', 19.99, 8);
INSERT INTO public.produit (id_produit, id_cat, nom_produit, description, image, prix, stock) VALUES (6, 1, 'O'' Barber shmpoing', 'Champoing pour barbe 25ml', 'pdhom1.jpg', 19.99, 5);
INSERT INTO public.produit (id_produit, id_cat, nom_produit, description, image, prix, stock) VALUES (7, 2, 'Huile D''Argan', 'Huile fait à base d''avocat 25ml', 'pdfem.jpg', 18.5, 25);
INSERT INTO public.produit (id_produit, id_cat, nom_produit, description, image, prix, stock) VALUES (8, 2, 'Gamme Hannah ', 'Gamme 4  in 1 
huile pour cheveux 25ml,parfum 50ml
crème pour chutte de cheveux 50ml
déodorant pour cheveux 25ml
', 'pdfem1.jpg', 15.5, 14);
INSERT INTO public.produit (id_produit, id_cat, nom_produit, description, image, prix, stock) VALUES (9, 2, 'Sleek cure Prestige', 'Pour l''éclat de vos cheveux ', 'pdfem2.jpg', 25.5, 25);
INSERT INTO public.produit (id_produit, id_cat, nom_produit, description, image, prix, stock) VALUES (4, 1, 'Darpedan', 'Baume après rasage 100ml', 'pdhom3.jpg', 88.99, 7);
INSERT INTO public.produit (id_produit, id_cat, nom_produit, description, image, prix, stock) VALUES (5, 1, 'Reuzel', 'Spray rafraichissant barbe 100ml', 'pdhom2.jpg', 15.99, 7);


--
-- TOC entry 3041 (class 0 OID 0)
-- Dependencies: 206
-- Name: bp_admin_id_admin_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('public.bp_admin_id_admin_seq', 1, true);


--
-- TOC entry 2891 (class 2606 OID 17058)
-- Name: bp_admin bp_admin_pkey; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.bp_admin
    ADD CONSTRAINT bp_admin_pkey PRIMARY KEY (id_admin);


--
-- TOC entry 2885 (class 2606 OID 16993)
-- Name: categorie categorie_pkey; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.categorie
    ADD CONSTRAINT categorie_pkey PRIMARY KEY (id_cat);


--
-- TOC entry 2881 (class 2606 OID 16977)
-- Name: client client_pkey; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.client
    ADD CONSTRAINT client_pkey PRIMARY KEY (id_clt);


--
-- TOC entry 2887 (class 2606 OID 16998)
-- Name: comfact comfact_pkey; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.comfact
    ADD CONSTRAINT comfact_pkey PRIMARY KEY (id_comfact);


--
-- TOC entry 2889 (class 2606 OID 17003)
-- Name: panier panier_pkey; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.panier
    ADD CONSTRAINT panier_pkey PRIMARY KEY (id_panier);


--
-- TOC entry 2883 (class 2606 OID 16985)
-- Name: produit produit_pkey; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.produit
    ADD CONSTRAINT produit_pkey PRIMARY KEY (id_produit);


--
-- TOC entry 2893 (class 2606 OID 17009)
-- Name: comfact comfact_id_client_fkey; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.comfact
    ADD CONSTRAINT comfact_id_client_fkey FOREIGN KEY (id_client) REFERENCES public.client(id_clt);


--
-- TOC entry 2894 (class 2606 OID 17014)
-- Name: comfact comfact_id_produit_fkey; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.comfact
    ADD CONSTRAINT comfact_id_produit_fkey FOREIGN KEY (id_produit) REFERENCES public.produit(id_produit);


--
-- TOC entry 2895 (class 2606 OID 17019)
-- Name: panier panier_id_produit_fkey; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.panier
    ADD CONSTRAINT panier_id_produit_fkey FOREIGN KEY (id_produit) REFERENCES public.produit(id_produit);


--
-- TOC entry 2892 (class 2606 OID 17004)
-- Name: produit produit_id_cat_fkey; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.produit
    ADD CONSTRAINT produit_id_cat_fkey FOREIGN KEY (id_cat) REFERENCES public.categorie(id_cat);


-- Completed on 2021-04-19 23:14:34

--
-- PostgreSQL database dump complete
--

