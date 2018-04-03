CREATE TABLE users {
  id INTEGER PRIMARY KEY,
  nom TEXT,
  mdp TEXT,
  numSemestre INT,
  FOREIGN KEY(numSemestre) REFERENCES semestre(id)
}

CREATE TABLE cours {
  id INTEGER PRIMARY KEY,
  nomCours TEXT,
  numModule INT,
  path TEXT,
  FOREIGN KEY(numModule) REFERENCES module(id)
}

CREATE TABLE module {
  id INTEGER PRIMARY KEY,
  nomModule TEXT,
  numSemestre INT,
  FOREIGN KEY(numSemestre) REFERENCES semestre(id)

}

CREATE TABLE semestre {
  id INTEGER PRIMARY KEY,
  nomSemestre TEXT,
}



