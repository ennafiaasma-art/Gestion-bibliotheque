CREATE DATABASE libcore;

CREATE TABLE libraries (
    id_library INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL
);


CREATE TABLE members (
    member_id INT AUTO_INCREMENT PRIMARY KEY
);


CREATE TABLE users (
    id_user INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) UNIQUE NOT NULL,
    member_id INT,
    CONSTRAINT fk_user_member FOREIGN KEY (member_id) REFERENCES members(member_id)
);


CREATE TABLE librarian (
    id_librarian INT AUTO_INCREMENT PRIMARY KEY,
    id_user INT,
    CONSTRAINT fk_librarian_user FOREIGN KEY (id_user) REFERENCES users(id_user)
);


CREATE TABLE books (
    isbn VARCHAR(20) PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    isAvailable VARCHAR(10) DEFAULT 'Yes', 
    id_library INT,
    CONSTRAINT fk_book_library FOREIGN KEY (id_library) REFERENCES libraries(id_library)
);


CREATE TABLE emprunts (
    id_emprunt INT AUTO_INCREMENT PRIMARY KEY,
    dateReturn DATE,
    member_id INT,
    id_book VARCHAR(20),
    CONSTRAINT fk_emprunt_member FOREIGN KEY (member_id) REFERENCES members(member_id),
    CONSTRAINT fk_emprunt_book FOREIGN KEY (id_book) REFERENCES books(isbn)
);



--insertion 


INSERT INTO libraries (name) VALUES 
('Bibliothèque Nationale'),
('Al-Qarawiyyin Library');


INSERT INTO members () VALUES (), (), ();


INSERT INTO users (name, email, member_id) VALUES 
('Ahmed Alami', 'ahmed@email.com', 1),
('Fatima Zahra', 'fatima@email.com', 2),
('Yassine Benani', 'yassine@email.com', 3);


INSERT INTO librarian (id_user) VALUES (1);


INSERT INTO books (isbn, title, isAvailable, id_library) VALUES 
('978-0123', 'Le Petit Prince', 'Yes', 1),
('978-4567', 'L-Alchimiste', 'Yes', 1),
('978-8910', 'Introduction to SQL', 'No', 2);


INSERT INTO emprunts (dateReturn, member_id, id_book) VALUES 
('2024-06-15', 2, '978-0123'),
('2024-07-01', 3, '978-8910');