DELIMITIR $$

CREATE PROCEDURE 

CREATE PROCEDURE `consultarTemaForo` ()  NO SQL
BEGIN
SELECT * FROM temas_foro ORDER BY temas_foro.fecha DESC;
END$$

END&&