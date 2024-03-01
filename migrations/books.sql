-- Table authors
CREATE TABLE public.authors
(
    author_id  SERIAL PRIMARY KEY,
    first_name VARCHAR(50) NOT NULL,
    last_name  VARCHAR(50) NOT NULL
);

COMMENT
ON COLUMN "authors"."author_id" IS ' Nr identyfikacyjny autora';
COMMENT
ON COLUMN "authors"."first_name" IS 'Imię autora książki/ komentarza';
COMMENT
ON COLUMN "authors"."last_name" IS 'Nazwisko autora książki/ komentarza';

-- Table books
CREATE TABLE public.books
(
    book_id          SERIAL PRIMARY KEY,
    author_id        INTEGER      NOT NULL,
    title            VARCHAR(100) NOT NULL,
    publication_year INTEGER      NOT NULL,
    isbn             VARCHAR(20)  NOT NULL UNIQUE,
    CONSTRAINT valid_isbn CHECK (isbn ~ '^\d{3}-[\d\-]{10,15}$'
) );

ALTER TABLE public.books
    ADD CONSTRAINT fk_books_author_id FOREIGN KEY (author_id) REFERENCES public.authors (author_id) ON DELETE CASCADE;

CREATE INDEX idx_books_author_id ON public.books (author_id);

COMMENT
ON COLUMN "books"."book_id" IS 'Nr identyfikacyjny książki';
COMMENT
ON COLUMN "books"."author_id" IS 'Nr identyfikacyjny autora';
COMMENT
ON COLUMN "books"."title" IS 'Tytuł książki';
COMMENT
ON COLUMN "books"."publication_year" IS 'Rok publikacji książki';
COMMENT
ON COLUMN "books"."isbn" IS 'Numer ISBN książki';

-- Table reviews
CREATE TABLE public.reviews
(
    review_id   SERIAL PRIMARY KEY,
    book_id     INTEGER NOT NULL REFERENCES books (book_id) ON DELETE CASCADE,
    author_id   INTEGER NOT NULL,
    rating      INTEGER CHECK (rating >= 1 AND rating <= 10),
    description TEXT    NOT NULL
);

ALTER TABLE public.reviews
    ADD CONSTRAINT fk_reviews_book_id FOREIGN KEY (book_id) REFERENCES public.books (book_id) ON DELETE CASCADE;

ALTER TABLE public.reviews
    ADD CONSTRAINT fk_reviews_author_id FOREIGN KEY (author_id) REFERENCES public.authors (author_id) ON DELETE CASCADE;

CREATE INDEX idx_reviews_book_id ON public.reviews (book_id);
CREATE INDEX idx_reviews_author_id ON public.reviews (author_id);

COMMENT
ON COLUMN "reviews"."review_id" IS 'Nr identyfikacyjny recenzji';
COMMENT
ON COLUMN "reviews"."book_id" IS 'Nr identyfikacyjny książki';
COMMENT
ON COLUMN "reviews"."author_id" IS 'Nr identyfikacyjny autora recenzji';
COMMENT
ON COLUMN "reviews"."rating" IS 'Ocena książki';
COMMENT
ON COLUMN "reviews"."description" IS 'Opis recenzji';

-- view count books
CREATE
OR REPLACE VIEW public.authors_books_count AS
SELECT a.first_name,
       a.last_name,
       COUNT(b.book_id) AS books_count
FROM authors a
         JOIN books b USING (author_id)
GROUP BY author_id, a.first_name, a.last_name;

-- widok avg_rating
CREATE
OR REPLACE VIEW public.avg_rating AS
SELECT a.first_name,
       a.last_name,
       AVG(r.rating)::float AS avg_rating
FROM books b
         JOIN authors a USING (author_id)
         JOIN reviews r USING (book_id)
GROUP BY book_id, a.first_name, a.last_name
ORDER BY avg_rating DESC
LIMIT 5;

-- dane testowe
INSERT INTO public.authors (first_name, last_name) VALUES ('Adam', 'Mickiewicz');
INSERT INTO public.authors (first_name, last_name) VALUES ('Henryk', 'Sienkiewicz');
INSERT INTO public.authors (first_name, last_name) VALUES ('Juliusz', 'Słowacki');
INSERT INTO public.authors (first_name, last_name) VALUES ('Eliza', 'Orzeszkowa');
INSERT INTO public.authors (first_name, last_name) VALUES ('Bolesław', 'Prus');
INSERT INTO public.authors (first_name, last_name) VALUES ('Władysław', 'Reymont');
INSERT INTO public.authors (first_name, last_name) VALUES ('Stefan', 'Żeromski');
INSERT INTO public.authors (first_name, last_name) VALUES ('Stanisław', 'Wyspiański');
INSERT INTO public.authors (first_name, last_name) VALUES ('Maria', 'Dąbrowska');

INSERT INTO public.books (author_id, title, publication_year, isbn) VALUES (1, 'Pan Tadeusz', 1834, '978-83-288-2373-1');
INSERT INTO public.books (author_id, title, publication_year, isbn) VALUES (1, 'Dziady', 1823, '978-83-288-2373-2');
INSERT INTO public.books (author_id, title, publication_year, isbn) VALUES (2, 'Ogniem i mieczem', 1884, '978-83-288-2373-3');
INSERT INTO public.books (author_id, title, publication_year, isbn) VALUES (2, 'Potop', 1886, '978-83-288-2373-4');
INSERT INTO public.books (author_id, title, publication_year, isbn) VALUES (3, 'Balladyna', 1839, '978-83-288-2373-5');
INSERT INTO public.books (author_id, title, publication_year, isbn) VALUES (3, 'Kordian', 1834, '978-83-288-2373-6');
INSERT INTO public.books (author_id, title, publication_year, isbn) VALUES (4, 'Nad Niemnem', 1888, '978-83-288-2373-7');
INSERT INTO public.books (author_id, title, publication_year, isbn) VALUES (4, 'Gloria victis', 1887, '978-83-288-2373-8');
INSERT INTO public.books (author_id, title, publication_year, isbn) VALUES (5, 'Lalka', 1890, '978-83-288-2373-9');
INSERT INTO public.books (author_id, title, publication_year, isbn) VALUES (5, 'Faraon', 1897, '978-83-288-2373-10');
INSERT INTO public.books (author_id, title, publication_year, isbn) VALUES (6, 'Chłopi', 1904, '978-83-288-2373-11');
INSERT INTO public.books (author_id, title, publication_year, isbn) VALUES (6, 'Ziemia obiecana', 1899, '978-83-288-2373-12');
INSERT INTO public.books (author_id, title, publication_year, isbn) VALUES (7, 'Ludzie bezdomni', 1900, '978-83-288-2373-13');
INSERT INTO public.books (author_id, title, publication_year, isbn) VALUES (7, 'Przedwiośnie', 1924, '978-83-288-2373-14');
INSERT INTO public.books (author_id, title, publication_year, isbn) VALUES (8, 'Wesele', 1901, '978-83-288-2373-15');
INSERT INTO public.books (author_id, title, publication_year, isbn) VALUES (8, 'Wyzwolenie', 1903, '978-83-288-2373-16');
INSERT INTO public.books (author_id, title, publication_year, isbn) VALUES (9, 'Noce i dnie', 1932, '978-83-288-2373-17');
INSERT INTO public.books (author_id, title, publication_year, isbn) VALUES (9, 'Córka nędzarza', 1910, '978-83-288-2373-18');

INSERT INTO public.reviews (book_id, author_id, rating, description) VALUES (1, 1, 10, 'Najlepsza polska epopeja narodowa');
INSERT INTO public.reviews (book_id, author_id, rating, description) VALUES (2, 1, 9, 'Bardzo dobra lektura');
INSERT INTO public.reviews (book_id, author_id, rating, description) VALUES (3, 2, 10, 'Polecam');
INSERT INTO public.reviews (book_id, author_id, rating, description) VALUES (4, 2, 9, 'Warto przeczytać');
INSERT INTO public.reviews (book_id, author_id, rating, description) VALUES (5, 3, 8, 'Ciekawa lektura');
INSERT INTO public.reviews (book_id, author_id, rating, description) VALUES (6, 3, 7, 'Nie polecam');
INSERT INTO public.reviews (book_id, author_id, rating, description) VALUES (7, 4, 10, 'Polecam');
INSERT INTO public.reviews (book_id, author_id, rating, description) VALUES (8, 4, 9, 'Warto przeczytać');
INSERT INTO public.reviews (book_id, author_id, rating, description) VALUES (9, 5, 8, 'Ciekawa lektura');
INSERT INTO public.reviews (book_id, author_id, rating, description) VALUES (10, 5, 7, 'Nie polecam');
INSERT INTO public.reviews (book_id, author_id, rating, description) VALUES (11, 6, 10, 'Polecam');
INSERT INTO public.reviews (book_id, author_id, rating, description) VALUES (12, 6, 9, 'Warto przeczytać');

