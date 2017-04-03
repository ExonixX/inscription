DROP DATABASE IF EXISTS inscription_ligne;

CREATE DATABASE IF NOT EXISTS inscription_ligne;
USE inscription_ligne;
# -----------------------------------------------------------------------------
#       TABLE : NATURE_PIECE
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS NATURE_PIECE
 (
   NTPCID SMALLINT(2) NOT NULL AUTO_INCREMENT,
   NTPCINTITULE CHAR(64) NULL  
   , PRIMARY KEY (NTPCID) 
 ) ENGINE=InnoDB DEFAULT CHARSET=utf8;

# -----------------------------------------------------------------------------
#       TABLE : ETUDIANT
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS ETUDIANT
 (
   EDNTID SMALLINT(4) NOT NULL AUTO_INCREMENT ,
   CMPTNUM INTEGER(11) NOT NULL  ,
   FRMTID SMALLINT(2) NOT NULL  ,
   EDNTNOMETU CHAR(32) NULL  ,
   EDNTPRENOMETU CHAR(32) NULL  ,
   EDNTINEBEA CHAR(10) NULL  ,
   EDNTSEXE CHAR(5) NULL  ,
   EDNTDATENAISS CHAR(10) NULL  ,
   EDNTLIEUNAISS CHAR(32) NULL  ,
   EDNTCPNAISS CHAR(5) NULL  ,
   EDNTPAYSNAISS CHAR(32) NULL  ,
   EDNTTEL CHAR(10) NULL  ,
   EDNTMAIL CHAR(64) NULL  ,
   EDNTBOURSIER BOOL NULL  ,
   EDNTCYCLE CHAR(16) NULL  ,
   EDNTADRESSETU CHAR(128) NULL  ,
   EDNTCPADRESSETU CHAR(5) NULL  ,
   EDNTVILLEADRESSETU CHAR(32) NULL  
   , PRIMARY KEY (EDNTID) 
 )ENGINE=InnoDB DEFAULT CHARSET=utf8;


# -----------------------------------------------------------------------------
#       INDEX DE LA TABLE ETUDIANT
# -----------------------------------------------------------------------------


CREATE  INDEX I_FK_ETUDIANT_COMPTE
     ON ETUDIANT (CMPTNUM ASC);

CREATE  INDEX I_FK_ETUDIANT_FORMATION
     ON ETUDIANT (FRMTID ASC);

# -----------------------------------------------------------------------------
#       TABLE : RESPONSABLE
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS RESPONSABLE
 (
   RPSLID SMALLINT(5) NOT NULL AUTO_INCREMENT ,
   PFSNID INTEGER(11) NOT NULL  ,
   STEPID INTEGER(11) NOT NULL  ,
   RPSLNOMRESP CHAR(32) NULL  ,
   RPSLPRENOMRESP CHAR(32) NULL  ,
   RPSLLIENPARENTE CHAR(16) NULL  ,
   RPSLADRESSRESP CHAR(64) NULL  ,
   RPSLCPADRESSRESP CHAR(5) NULL  ,
   RPSLVILLEADRESSRESP CHAR(32) NULL  ,
   RPSLPAYSADRESSRESP CHAR(32) NULL  ,
   RPSLTELRESP CHAR(10) NULL  ,
   RPSLFIXRESP CHAR(10) NULL  ,
   RPSLMAILRESP CHAR(64) NULL  ,
   RPSLLEGAL BOOL NULL  ,
   RPSLNBENFSCOLARISES INTEGER(1) NULL  ,
   RPSLNBTOTENFANTS INTEGER(2) NULL  
   , PRIMARY KEY (RPSLID) 
 ) ENGINE=InnoDB DEFAULT CHARSET=utf8;

# -----------------------------------------------------------------------------
#       INDEX DE LA TABLE RESPONSABLE
# -----------------------------------------------------------------------------


CREATE  INDEX I_FK_RESPONSABLE_PROFESSION
     ON RESPONSABLE (PFSNID ASC);

CREATE  INDEX I_FK_RESPONSABLE_SITUATION_EMPLOI
     ON RESPONSABLE (STEPID ASC);

# -----------------------------------------------------------------------------
#       TABLE : TYPECOMPTE
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS TYPECOMPTE
 (
   TCMPNUM INTEGER(11) NOT NULL AUTO_INCREMENT ,
   TCMPLIBELLE CHAR(32) NULL  
   , PRIMARY KEY (TCMPNUM) 
 ) ENGINE=InnoDB DEFAULT CHARSET=utf8;

# -----------------------------------------------------------------------------
#       TABLE : FORMATION
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS FORMATION
 (
   FRMTID SMALLINT(2) NOT NULL AUTO_INCREMENT ,
   FRMTNOM CHAR(255) NULL  
   , PRIMARY KEY (FRMTID) 
 ) ENGINE=InnoDB DEFAULT CHARSET=utf8;

# -----------------------------------------------------------------------------
#       TABLE : PROFESSION
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS PROFESSION
 (
   PFSNID INTEGER(11) NOT NULL AUTO_INCREMENT ,
   CATGID INTEGER(11) NOT NULL  ,
   PFSNLIBELLE CHAR(255) NULL  
   , PRIMARY KEY (PFSNID) 
 ) ENGINE=InnoDB DEFAULT CHARSET=utf8;

# -----------------------------------------------------------------------------
#       INDEX DE LA TABLE PROFESSION
# -----------------------------------------------------------------------------


CREATE  INDEX I_FK_PROFESSION_CATEGORIE
     ON PROFESSION (CATGID ASC);

# -----------------------------------------------------------------------------
#       TABLE : AGENT
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS AGENT
 (
   AGNTID SMALLINT(11) NOT NULL AUTO_INCREMENT ,
   CMPTNUM INTEGER(11) NOT NULL  ,
   AGNTNOM CHAR(32) NULL  ,
   AGNTPRENOM CHAR(32) NULL  
   , PRIMARY KEY (AGNTID) 
 ) ENGINE=InnoDB DEFAULT CHARSET=utf8;

# -----------------------------------------------------------------------------
#       INDEX DE LA TABLE AGENT
# -----------------------------------------------------------------------------


CREATE  INDEX I_FK_AGENT_COMPTE
     ON AGENT (CMPTNUM ASC);

# -----------------------------------------------------------------------------
#       TABLE : SITUATION_EMPLOI
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS SITUATION_EMPLOI
 (
   STEPID INTEGER(11) NOT NULL AUTO_INCREMENT ,
   STEPLIBELLE CHAR(32) NULL  
   , PRIMARY KEY (STEPID) 
 ) ENGINE=InnoDB DEFAULT CHARSET=utf8;

# -----------------------------------------------------------------------------
#       TABLE : CATEGORIE
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS CATEGORIE
 (
   CATGID INTEGER(11) NOT NULL AUTO_INCREMENT ,
   CATGLIBELLE CHAR(32) NULL  
   , PRIMARY KEY (CATGID) 
 ) ENGINE=InnoDB DEFAULT CHARSET=utf8;

# -----------------------------------------------------------------------------
#       TABLE : PIECE_DEPOSE
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS PIECE_DEPOSE
 (
   PIDEID INTEGER(11) NOT NULL AUTO_INCREMENT ,
   PIDENOMFICHIER CHAR(32) NULL  ,
   PIDEVALIDEE BOOL NULL  
   , PRIMARY KEY (PIDEID) 
 ) ENGINE=InnoDB DEFAULT CHARSET=utf8;

# -----------------------------------------------------------------------------
#       TABLE : COMPTE
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS COMPTE
 (
   CMPTNUM INTEGER(11) NOT NULL AUTO_INCREMENT ,
   TCMPNUM INTEGER(11) NOT NULL  ,
   CMPTLOGIN CHAR(32) NULL  ,
   CMPTPASSWORD CHAR(32) NULL  
   , PRIMARY KEY (CMPTNUM) 
 ) ENGINE=InnoDB DEFAULT CHARSET=utf8;

# -----------------------------------------------------------------------------
#       INDEX DE LA TABLE COMPTE
# -----------------------------------------------------------------------------


CREATE  INDEX I_FK_COMPTE_TYPECOMPTE
     ON COMPTE (TCMPNUM ASC);

# -----------------------------------------------------------------------------
#       TABLE : COMPOSER
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS COMPOSER
 (
   FRMTID SMALLINT(2) NOT NULL AUTO_INCREMENT ,
   NTPCID SMALLINT(2) NOT NULL  ,
   CMPRNUMRANG SMALLINT(2) NULL  
   , PRIMARY KEY (FRMTID,NTPCID) 
 ) ENGINE=InnoDB DEFAULT CHARSET=utf8;

# -----------------------------------------------------------------------------
#       INDEX DE LA TABLE COMPOSER
# -----------------------------------------------------------------------------


CREATE  INDEX I_FK_COMPOSER_FORMATION
     ON COMPOSER (FRMTID ASC);

CREATE  INDEX I_FK_COMPOSER_NATURE_PIECE
     ON COMPOSER (NTPCID ASC);

# -----------------------------------------------------------------------------
#       TABLE : APPARTENIR
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS APPARTENIR
 (
   RPSLID SMALLINT(5) NOT NULL AUTO_INCREMENT ,
   EDNTID SMALLINT(4) NOT NULL  
   , PRIMARY KEY (RPSLID,EDNTID) 
 ) ENGINE=InnoDB DEFAULT CHARSET=utf8;

# -----------------------------------------------------------------------------
#       INDEX DE LA TABLE APPARTENIR
# -----------------------------------------------------------------------------


CREATE  INDEX I_FK_APPARTENIR_RESPONSABLE
     ON APPARTENIR (RPSLID ASC);

CREATE  INDEX I_FK_APPARTENIR_ETUDIANT
     ON APPARTENIR (EDNTID ASC);

# -----------------------------------------------------------------------------
#       TABLE : DEPOSER
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS DEPOSER
 (
   EDNTID SMALLINT(4) NOT NULL AUTO_INCREMENT ,
   PIDEID INTEGER(11) NOT NULL  ,
   DPSRDATEDEPOT DATE NULL  
   , PRIMARY KEY (EDNTID,PIDEID) 
 ) ENGINE=InnoDB DEFAULT CHARSET=utf8;

# -----------------------------------------------------------------------------
#       INDEX DE LA TABLE DEPOSER
# -----------------------------------------------------------------------------


CREATE  INDEX I_FK_DEPOSER_ETUDIANT
     ON DEPOSER (EDNTID ASC);

CREATE  INDEX I_FK_DEPOSER_PIECE_DEPOSE
     ON DEPOSER (PIDEID ASC);

# -----------------------------------------------------------------------------
#       TABLE : VERIFIER
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS VERIFIER
 (
   PIDEID INTEGER(11) NOT NULL AUTO_INCREMENT ,
   AGNTID SMALLINT(11) NOT NULL  ,
   VRFEDATECONTROLE DATE NULL  
   , PRIMARY KEY (PIDEID,AGNTID) 
 ) ENGINE=InnoDB DEFAULT CHARSET=utf8;

# -----------------------------------------------------------------------------
#       INDEX DE LA TABLE VERIFIER
# -----------------------------------------------------------------------------


CREATE  INDEX I_FK_VERIFIER_PIECE_DEPOSE
     ON VERIFIER (PIDEID ASC);

CREATE  INDEX I_FK_VERIFIER_AGENT
     ON VERIFIER (AGNTID ASC);


# -----------------------------------------------------------------------------
#       CREATION DES REFERENCES DE TABLE
# -----------------------------------------------------------------------------


ALTER TABLE ETUDIANT 
  ADD FOREIGN KEY FK_ETUDIANT_COMPTE (CMPTNUM)
      REFERENCES COMPTE (CMPTNUM) ;


ALTER TABLE ETUDIANT 
  ADD FOREIGN KEY FK_ETUDIANT_FORMATION (FRMTID)
      REFERENCES FORMATION (FRMTID) ;


ALTER TABLE RESPONSABLE 
  ADD FOREIGN KEY FK_RESPONSABLE_PROFESSION (PFSNID)
      REFERENCES PROFESSION (PFSNID) ;


ALTER TABLE RESPONSABLE 
  ADD FOREIGN KEY FK_RESPONSABLE_SITUATION_EMPLOI (STEPID)
      REFERENCES SITUATION_EMPLOI (STEPID) ;


ALTER TABLE PROFESSION 
  ADD FOREIGN KEY FK_PROFESSION_CATEGORIE (CATGID)
      REFERENCES CATEGORIE (CATGID) ;


ALTER TABLE AGENT 
  ADD FOREIGN KEY FK_AGENT_COMPTE (CMPTNUM)
      REFERENCES COMPTE (CMPTNUM) ;


ALTER TABLE COMPTE 
  ADD FOREIGN KEY FK_COMPTE_TYPECOMPTE (TCMPNUM)
      REFERENCES TYPECOMPTE (TCMPNUM) ;


ALTER TABLE COMPOSER 
  ADD FOREIGN KEY FK_COMPOSER_FORMATION (FRMTID)
      REFERENCES FORMATION (FRMTID) ;


ALTER TABLE COMPOSER 
  ADD FOREIGN KEY FK_COMPOSER_NATURE_PIECE (NTPCID)
      REFERENCES NATURE_PIECE (NTPCID) ;


ALTER TABLE APPARTENIR 
  ADD FOREIGN KEY FK_APPARTENIR_RESPONSABLE (RPSLID)
      REFERENCES RESPONSABLE (RPSLID) ;


ALTER TABLE APPARTENIR 
  ADD FOREIGN KEY FK_APPARTENIR_ETUDIANT (EDNTID)
      REFERENCES ETUDIANT (EDNTID) ;


ALTER TABLE DEPOSER 
  ADD FOREIGN KEY FK_DEPOSER_ETUDIANT (EDNTID)
      REFERENCES ETUDIANT (EDNTID) ;


ALTER TABLE DEPOSER 
  ADD FOREIGN KEY FK_DEPOSER_PIECE_DEPOSE (PIDEID)
      REFERENCES PIECE_DEPOSE (PIDEID) ;


ALTER TABLE VERIFIER 
  ADD FOREIGN KEY FK_VERIFIER_PIECE_DEPOSE (PIDEID)
      REFERENCES PIECE_DEPOSE (PIDEID) ;


ALTER TABLE VERIFIER 
  ADD FOREIGN KEY FK_VERIFIER_AGENT (AGNTID)
      REFERENCES AGENT (AGNTID) ;

