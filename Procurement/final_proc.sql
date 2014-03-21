--
-- PostgreSQL database dump
--

SET statement_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SET check_function_bodies = false;
SET client_min_messages = warning;

SET search_path = public, pg_catalog;

SET default_tablespace = '';

SET default_with_oids = false;

--
-- Name: user; Type: TABLE; Schema: public; Owner: mypguser; Tablespace: 
--

CREATE TABLE "user" (
    id integer DEFAULT nextval('user_id_sequence'::regclass) NOT NULL,
    first_name character varying NOT NULL,
    middle_name character varying NOT NULL,
    last_name character varying NOT NULL,
    birth_date date,
    role character varying DEFAULT 'default'::character varying,
    username character varying NOT NULL,
    password character varying NOT NULL,
    sex character varying,
    account_status character varying DEFAULT 'pending'::character varying,
    other_contact_details character varying,
    date_created date,
    time_created time without time zone,
    date_approved date,
    time_approved time without time zone,
    email_add character varying,
    country character varying,
    province character varying,
    region character varying,
    city_or_municipality character varying,
    street_address character varying,
    zip_code character varying,
    date_last_modified date,
    time_last_modified time without time zone,
    tel_num character varying,
    fax_num character varying,
    "position" character varying,
    organization_id integer,
    is_bac_member character varying DEFAULT 'false'::character varying,
    is_bac_secretariat character varying(20) DEFAULT 'false'::character varying,
    is_bac_chairman character varying DEFAULT 'false'::character varying,
    is_local_chief_executive character varying DEFAULT 'false'::character varying
);


ALTER TABLE public."user" OWNER TO mypguser;

--
-- Name: COLUMN "user".role; Type: COMMENT; Schema: public; Owner: mypguser
--

COMMENT ON COLUMN "user".role IS 'government,bac,private';


--
-- Name: COLUMN "user".account_status; Type: COMMENT; Schema: public; Owner: mypguser
--

COMMENT ON COLUMN "user".account_status IS 'active/pending/blocked';


--
-- Name: COLUMN "user".tel_num; Type: COMMENT; Schema: public; Owner: mypguser
--

COMMENT ON COLUMN "user".tel_num IS 'telephone number';


--
-- Name: COLUMN "user"."position"; Type: COMMENT; Schema: public; Owner: mypguser
--

COMMENT ON COLUMN "user"."position" IS 'government designation/ corporate title';


--
-- Data for Name: user; Type: TABLE DATA; Schema: public; Owner: mypguser
--

COPY "user" (id, first_name, middle_name, last_name, birth_date, role, username, password, sex, account_status, other_contact_details, date_created, time_created, date_approved, time_approved, email_add, country, province, region, city_or_municipality, street_address, zip_code, date_last_modified, time_last_modified, tel_num, fax_num, "position", organization_id, is_bac_member, is_bac_secretariat, is_bac_chairman, is_local_chief_executive) FROM stdin;
0	Admin	Admin	Admin	2001-01-01	Admin	admin	21232f297a57a5a743894a0e4a801fc3	male	active	\N	2013-02-24	18:08:54	2013-02-24	18:08:54	\N	Philippines	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	false	false	false	false
64	Private	User	Bidder	1985-09-26	Private User	bidder1	e10adc3949ba59abbe56e057f20f883e	Male	inactive		2014-01-22	19:48:05	2014-01-22	22:43:31	privatebidder@yahoo.com	Philippines	Cavite	Region IV-A	Dolores	123 Street	4100	2014-01-22	22:52:13	532-0099	532-0099	Manager	64	false	false	false	false
63	Super	Super	Inday	1999-01-01	Government User	superinday	e10adc3949ba59abbe56e057f20f883e	Female	inactive		2014-01-08	21:06:25	2014-01-14	06:16:18		Philippines	Basilan	ARMM	Baay-Licuan			2014-01-08	21:06:25			BAC	0	false	true	false	false
79	BAC	SEC	2	1990-02-01	Government User	bacsec2	ed8d175a6b02c3d6608e6a240117a199	Male	active		2014-02-03	00:26:51	2014-02-03	00:27:12	govuser@yahoo.com	Philippines	Batangas	Region IV-A	Nasugbu	Street Address	4123	2014-02-03	00:26:51	532-0000	532-0099	A02	0	false	true	false	false
61	Rhealyn	Princess	Bergado	1992-03-07	Government User	rpabergado	e10adc3949ba59abbe56e057f20f883e	Female	active		2014-01-01	17:13:48	2014-01-23	05:59:28		Philippines	Abra	Region IV-A	Diplahan			2014-01-01	17:13:48			Manager	0	false	true	false	false
58	Julio	Andal	dela Cruz	2013-03-18	Private User	priv	908b453051b556e053731714a5193921	Male	inactive		2013-03-18	08:11:14	2014-01-14	06:38:05			Basilan	ARMM	Baay-Licuan			2013-03-18	08:11:14			temp	58	false	false	false	false
59	John	Erwin	Tulfo	2013-03-18	Private User	priv3	a6984cbe3ffff472edd0fb93526ff333	Male	inactive		2013-03-18	08:16:16	2013-03-18	08:19:06			Basilan	ARMM	Baay-Licuan			2013-03-18	08:16:16			asd	59	false	false	false	false
60	Jake	Matapang	Smith	2013-03-18	Private User	priv4	3157ce0ab078ce4fbfe0a9a522156dd0	Male	inactive		2013-03-18	08:18:37	2013-03-18	08:19:15			Basilan	ARMM	Baay-Licuan			2013-03-18	08:18:37			president	60	false	false	false	false
62	Rhea	Lyn	Bergado	1992-03-07	Private User	mcdonalds	e10adc3949ba59abbe56e057f20f883e	Male	inactive		2014-01-01	17:35:13	\N	\N		Philippines	Basilan	ARMM	Baay-Licuan			2014-01-05	21:30:27			Owner	62	false	false	false	false
68	Clara	Ara	Maria	1960-02-14	Private User	titaclara	e10adc3949ba59abbe56e057f20f883e	Female	inactive		2014-02-01	18:34:21	2014-02-01	18:40:24	privatebidder@yahoo.com	Philippines	Laguna	Region IV-A	Los Baños	Oregano Street	4130	2014-02-01	18:34:21	532-0099	532-0099	CEO	68	false	false	false	false
65	Anne	S	Curtis	2014-01-23	Private User	bidder2	e10adc3949ba59abbe56e057f20f883e	Male	inactive		2014-01-23	05:31:20	2014-02-01	20:46:33		Philippines	Ilocos Norte	Region VI	Peñarrubia			2014-01-23	05:31:20			Manager	65	false	false	false	false
66	San	Pedro	Juan	2014-01-27	Private User	bidder3	e10adc3949ba59abbe56e057f20f883e	Male	inactive		2014-01-23	05:47:06	2014-02-02	22:27:52	privatebidder@yahoo.com	Philippines	Basilan	ARMM	Baay-Licuan	123	4101	2014-01-23	05:47:06	532-0099	532-0099	Manager	66	false	false	false	false
67	Rhea	Ay	Ganda	1985-09-26	Private User	bidder4	e10adc3949ba59abbe56e057f20f883e	Female	inactive		2014-01-23	05:55:08	2014-02-02	22:27:56	privatebidder@yahoo.com	Philippines	Basilan	ARMM	Baay-Licuan	123 Street		2014-01-23	05:55:08	532-0099	532-0099	Manager	67	false	false	false	false
78	Bidder	Bidder	3	1990-02-01	Private User	biduser3	5cefc0cd7e319cc6ad9bae1183b49031	Female	active		2014-02-02	22:59:13	2014-02-02	23:00:04	bidder3@yahoo.com	Philippines	Batangas	Region IV-A	Calatagan	Street Address	4100	2014-02-02	22:59:13	532-0000	532-0099	Account Executive	78	false	false	false	false
70	BAC	MEM	1	1990-02-01	Government User	bacmem1	ed8d175a6b02c3d6608e6a240117a199	Female	active		2014-02-02	22:30:09	2014-02-02	22:41:18	bidder@yahoo.com	Philippines	Cavite	Region IV-A	Sta. Ana	Street Address	1234	2014-02-02	22:30:09	532-0000	532-0099	prof1	0	true	false	false	false
74	BAC	MEM	5	1990-02-01	Government User	bacmem5	ed8d175a6b02c3d6608e6a240117a199	Female	active		2014-02-02	22:35:01	2014-02-02	22:41:44	bacmem@yahoo.com	Philippines	Ilocos Sur	Region III	La Paz	Street Address	1234	2014-02-02	22:35:01	532-0000	532-0099	prof5	0	true	false	false	false
71	BAC 	MEM	2	1990-02-01	Government User	bacmem2	ed8d175a6b02c3d6608e6a240117a199	Male	active		2014-02-02	22:31:34	2014-02-02	22:41:25	bacmem@yahoo.com	Philippines	Ilocos Norte	Region II	Peñarrubia	Street Address	1234	2014-02-02	22:31:34	532-0000	532-0099	prof2	0	true	false	false	false
72	BAC	MEM	3	1990-02-01	Government User	bacmem3	ed8d175a6b02c3d6608e6a240117a199	Male	active		2014-02-02	22:32:51	2014-02-02	22:41:33	bacmem@yahoo.com	Philippines	Ilocos Norte	Region VIII	Pidigan	Street Address	1233	2014-02-02	22:32:51	532-0000	532-0099	prof3	0	true	false	false	false
75	BAC	SEC	1	1990-02-02	Government User	bacsec1	ed8d175a6b02c3d6608e6a240117a199	Female	active		2014-02-02	22:36:30	2014-02-02	22:41:58	bacsec@yahoo.com	Philippines	Cavite	Region IV-A	Magallanes	Street Address	1234	2014-02-02	22:36:30	532-0000	532-0099	AO1	0	false	true	false	false
73	BAC	MEM	4	1990-02-01	Government User	bacmem4	ed8d175a6b02c3d6608e6a240117a199	Female	active		2014-02-02	22:33:53	2014-02-02	22:41:38	bacmem@yahoo.com	Philippines	Surigao Del Sur	Region IX	Bucay	Street Address	1234	2014-02-02	22:33:53	532-0000	532-0099	prof4	0	true	false	false	false
51	Juan	Isaac	dela Cruz	1970-03-03	Government User	gov4	3249d5ef0125ae6da19a2e4c99dcc4f6	Male	active		2013-03-03	11:49:39	2014-02-02	23:59:59	juan@gmail.com	Philippines	Tawi-Tawi	CAR	Bucloc		4253	2013-12-17	15:13:27			Municipal Engineer	\N	true	false	false	false
77	Bidder	Bidder	2	1990-01-07	Private User	biduser2	5cefc0cd7e319cc6ad9bae1183b49031	Male	active		2014-02-02	22:56:30	2014-02-02	22:59:54	bidder2@yahoo.com	Philippines	Basilan	ARMM	Baay-Licuan	Street Address	4100	2014-02-02	22:56:30	532-0000	532-0099	Account Executive	77	false	false	false	false
76	Bidder	Bidder	1	1990-01-01	Private User	biduser1	5cefc0cd7e319cc6ad9bae1183b49031	Male	active		2014-02-02	22:52:04	2014-02-02	23:00:01	bidder@yahoo.com	Philippines	Basilan	ARMM	Baay-Licuan	Street Address	4100	2014-02-02	22:52:04	532-0000	532-0099	Account Executive	76	false	false	false	false
69	Bac	I	Member	1960-02-14	Government User	checker	e10adc3949ba59abbe56e057f20f883e	Male	active		2014-02-02	21:14:39	2014-02-03	00:02:11	bacuser@yahoo.com	Philippines	Kalinga	Region III	Dolores	Street Address	1234	2014-02-02	21:14:39	532-0099	532-0099	Admin Aide	0	true	false	false	false
\.


--
-- Name: user_id_key; Type: CONSTRAINT; Schema: public; Owner: mypguser; Tablespace: 
--

ALTER TABLE ONLY "user"
    ADD CONSTRAINT user_id_key UNIQUE (id);


--
-- Name: user_pkey; Type: CONSTRAINT; Schema: public; Owner: mypguser; Tablespace: 
--

ALTER TABLE ONLY "user"
    ADD CONSTRAINT user_pkey PRIMARY KEY (id);


--
-- Name: user_username_key; Type: CONSTRAINT; Schema: public; Owner: mypguser; Tablespace: 
--

ALTER TABLE ONLY "user"
    ADD CONSTRAINT user_username_key UNIQUE (username);


--
-- Name: user_organization_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: mypguser
--

ALTER TABLE ONLY "user"
    ADD CONSTRAINT user_organization_id_fkey FOREIGN KEY (organization_id) REFERENCES organization(id);


--
-- PostgreSQL database dump complete
--

