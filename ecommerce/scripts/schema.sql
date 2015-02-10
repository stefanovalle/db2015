--
-- PostgreSQL database dump
--

SET statement_timeout = 0;
SET lock_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SET check_function_bodies = false;
SET client_min_messages = warning;

SET search_path = public, pg_catalog;

--
-- Name: categorie_id_seq; Type: SEQUENCE; Schema: public; Owner: ecommerce
--

CREATE SEQUENCE categorie_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;

ALTER TABLE categorie_id_seq OWNER TO ecommerce;

SET default_tablespace = '';

SET default_with_oids = false;

--
-- Name: categorie; Type: TABLE; Schema: public; Owner: ecommerce; Tablespace: 
--

CREATE TABLE categorie (
    id integer DEFAULT nextval('categorie_id_seq'::regclass) NOT NULL,
    categoria character varying(50) NOT NULL,
    macrocategoria_id integer NOT NULL
);


ALTER TABLE categorie OWNER TO ecommerce;

--
-- Name: macrocategorie_id_seq; Type: SEQUENCE; Schema: public; Owner: ecommerce
--

CREATE SEQUENCE macrocategorie_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE macrocategorie_id_seq OWNER TO ecommerce;

--
-- Name: macrocategorie; Type: TABLE; Schema: public; Owner: ecommerce; Tablespace: 
--

CREATE TABLE macrocategorie (
    id integer DEFAULT nextval('macrocategorie_id_seq'::regclass) NOT NULL,
    macrocategoria character varying(50) NOT NULL
);


ALTER TABLE macrocategorie OWNER TO ecommerce;

--
-- Name: prodotti_id_seq; Type: SEQUENCE; Schema: public; Owner: ecommerce
--

CREATE SEQUENCE prodotti_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE prodotti_id_seq OWNER TO ecommerce;

--
-- Name: prodotti; Type: TABLE; Schema: public; Owner: ecommerce; Tablespace: 
--

CREATE TABLE prodotti (
    id integer DEFAULT nextval('prodotti_id_seq'::regclass) NOT NULL,
    nome character varying(100) NOT NULL,
    prezzo numeric(8,2) NOT NULL,
    descrizione character varying(1000),
    dataarrivo timestamp with time zone,
    categoria_id integer NOT NULL
);


ALTER TABLE prodotti OWNER TO ecommerce;

--
-- Name: prodottivarianti; Type: TABLE; Schema: public; Owner: ecommerce; Tablespace: 
--

CREATE TABLE prodottivarianti (
    prodotto_id integer NOT NULL,
    variante_id integer NOT NULL
);


ALTER TABLE prodottivarianti OWNER TO ecommerce;

--
-- Name: varianti_id_seq; Type: SEQUENCE; Schema: public; Owner: ecommerce
--

CREATE SEQUENCE varianti_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE varianti_id_seq OWNER TO ecommerce;

--
-- Name: varianti; Type: TABLE; Schema: public; Owner: ecommerce; Tablespace: 
--

CREATE TABLE varianti (
    id integer DEFAULT nextval('varianti_id_seq'::regclass) NOT NULL,
    nome character varying(200)
);


ALTER TABLE varianti OWNER TO ecommerce;

--
-- Name: categorie_pkey; Type: CONSTRAINT; Schema: public; Owner: ecommerce; Tablespace: 
--

ALTER TABLE ONLY categorie
    ADD CONSTRAINT categorie_pkey PRIMARY KEY (id);


--
-- Name: macrocategorie_pkey; Type: CONSTRAINT; Schema: public; Owner: ecommerce; Tablespace: 
--

ALTER TABLE ONLY macrocategorie
    ADD CONSTRAINT macrocategorie_pkey PRIMARY KEY (id);


--
-- Name: prodotti_pkey; Type: CONSTRAINT; Schema: public; Owner: ecommerce; Tablespace: 
--

ALTER TABLE ONLY prodotti
    ADD CONSTRAINT prodotti_pkey PRIMARY KEY (id);


--
-- Name: prodottivarianti_pkey; Type: CONSTRAINT; Schema: public; Owner: ecommerce; Tablespace: 
--

ALTER TABLE ONLY prodottivarianti
    ADD CONSTRAINT prodottivarianti_pkey PRIMARY KEY (prodotto_id, variante_id);


--
-- Name: varianti_pkey; Type: CONSTRAINT; Schema: public; Owner: ecommerce; Tablespace: 
--

ALTER TABLE ONLY varianti
    ADD CONSTRAINT varianti_pkey PRIMARY KEY (id);


--
-- Name: fk_categoria; Type: FK CONSTRAINT; Schema: public; Owner: ecommerce
--

ALTER TABLE ONLY prodotti
    ADD CONSTRAINT fk_categoria FOREIGN KEY (categoria_id) REFERENCES categorie(id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: fk_macrocategoria; Type: FK CONSTRAINT; Schema: public; Owner: ecommerce
--

ALTER TABLE ONLY categorie
    ADD CONSTRAINT fk_macrocategoria FOREIGN KEY (macrocategoria_id) REFERENCES macrocategorie(id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: fk_pv_prodotto; Type: FK CONSTRAINT; Schema: public; Owner: ecommerce
--

ALTER TABLE ONLY prodottivarianti
    ADD CONSTRAINT fk_pv_prodotto FOREIGN KEY (prodotto_id) REFERENCES prodotti(id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: fk_pv_variante; Type: FK CONSTRAINT; Schema: public; Owner: ecommerce
--

ALTER TABLE ONLY prodottivarianti
    ADD CONSTRAINT fk_pv_variante FOREIGN KEY (variante_id) REFERENCES varianti(id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: public; Type: ACL; Schema: -; Owner: postgres
--

REVOKE ALL ON SCHEMA public FROM PUBLIC;
REVOKE ALL ON SCHEMA public FROM postgres;
GRANT ALL ON SCHEMA public TO postgres;
GRANT ALL ON SCHEMA public TO PUBLIC;


--
-- PostgreSQL database dump complete
--


