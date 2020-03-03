SELECT id_genre, genre.name AS name_genre, id_distrib, distrib.name AS name_distrib, film.title AS title_film
FROM film
INNER JOIN genre USING (id_genre)
INNER JOIN distrib USING (id_distrib)
WHERE id_genre BETWEEN 4 AND 8;
