CREATE TABLE IF NOT EXISTS taller_2.positions (
  id INT NOT NULL AUTO_INCREMENT,
  latitude FLOAT(9,6) NOT NULL,
  longitude FLOAT(9,6) NOT NULL,
  registered_at DATETIME,
  PRIMARY KEY(id)
);
