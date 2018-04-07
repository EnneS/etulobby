CREATE TABLE users (
  id INTEGER PRIMARY KEY,
  nom TEXT,
  prenom TEXT,
  login TEXT,
  mdp TEXT,
  numSemestre INT,
  rang INT,
  FOREIGN KEY(numSemestre) REFERENCES semestre(id)
);

CREATE TABLE cours (
  id INTEGER PRIMARY KEY,
  nomCours TEXT,
  numModule INT,
  FOREIGN KEY(numModule) REFERENCES module(id)
);

CREATE TABLE module (
  id INTEGER PRIMARY KEY,
  nomModule TEXT,
  numSemestre INT,
  FOREIGN KEY(numSemestre) REFERENCES semestre(id)
);

CREATE TABLE semestre (
  id INTEGER PRIMARY KEY,
  nomSemestre TEXT
);

CREATE TABLE enseigne (
  idUser INT,
  idModule INT,
  FOREIGN KEY(idUser) REFERENCES users(id),
  FOREIGN KEY (idModule) REFERENCES module(id),
  PRIMARY KEY(idUser, idModule)
);

CREATE TABLE revision (
  idUser INT,
  idCours INT,
  FOREIGN KEY(idUser) REFERENCES users(id),
  FOREIGN KEY (idCours) REFERENCES cours(id),
  PRIMARY KEY(idUser, idCours)
);

CREATE TABLE message (
  id INTEGER PRIMARY KEY,
  titre TEXT,
  message TEXT
);
