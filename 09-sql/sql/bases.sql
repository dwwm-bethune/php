-- INSERT
INSERT INTO user (username, email, password) VALUES ('Fiorella', 'fiorella@boxydev.com', 'password');

-- SELECT
SELECT * FROM user;

-- UPDATE
UPDATE `user` SET `password` = 'daddy' WHERE id = 1;

-- DELETE
DELETE FROM user WHERE email = 'fiorella2@boxydev.com';
