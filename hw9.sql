-- Видалення однієї з таблиць
DROP TABLE orders;

-- Модифікація поля таблиці
ALTER TABLE cars
    RENAME COLUMN model TO car_model;

-- Заповнення кожної таблиці хоча б по 3-5 записів
INSERT INTO parks (serial_number, address)
VALUES ('A333B', 'Sadova Street 5'),
       ('A234G', 'Naberezhna Street 6'),
       ('GJ555J', 'Luhova Street 7'),
       ('GH449', 'Kanalna Street 8'),
       ('GHJJ84', 'Ozerna Street 9');

INSERT INTO cars (park_id, car_model, year, price)
VALUES (1, 'BMW', 2017, 35),
       (2, 'Chevrolet', 2012, 30),
       (4, 'Audi', 2015, 30),
       (4, 'Ford', 2010, 25),
       (5, 'Kia', 2020, 40);

INSERT INTO drivers (cars_id, license_id, full_name, birthdate)
VALUES (1, 'GJ57484', 'Kyrylo Ivanov', '2000-05-06'),
       (2, 'GH454748', 'Alexandra Chelepis', '1996-06-08'),
       (4, 'FH657848', 'Oksana Smith', '1988-09-07'),
       (4, 'GHJ6788', 'Allan Scott', '2001-08-05'),
       (5, 'GJ6573839', 'Taras Shevchenko', '1999-03-09');

INSERT INTO customers (email, name, surname)
VALUES ('kyrylo@gmail.com', 'Kyrylo', 'Tkachenko'),
       ('koval@gmail.com', 'Serhiy', 'Koval'),
       ('alex@gmaol.com', 'Alexandra', 'Moroz'),
       ('lev@gmail.com', 'Kyrylo', 'Levchenko'),
       ('maz@gmail.com', 'Taras', 'Mazur');

-- Модифікації будь-якого запису
UPDATE customers
SET email = 'tkach@gmail.com'
WHERE id = 1;

-- Видалення запису з таблиці
DELETE
FROM cars
WHERE id = 3;

-- Пару різних запитів до бази даних (SELECT)
SELECT *
FROM customers;

SELECT full_name, birthdate
FROM drivers;

SELECT car_model, year, price
FROM cars
WHERE year BETWEEN 2010 AND 2015
ORDER BY price DESC;

SELECT car_model, year, price
FROM cars
WHERE price IN (25, 30);

SELECT c.car_model, d.full_name as driver, p.address as park_address
FROM cars as c,
     drivers as d,
     parks as p
WHERE c.id = d.cars_id
  AND c.park_id = p.id;

-- 1-2 приклади Join запиту
SELECT c.car_model, p.address
FROM cars as c
         LEFT JOIN parks p on p.id = c.park_id
GROUP BY car_model;

-- Додати/змінити колонку за допомогою команди ALTER TABLE
ALTER TABLE customers
    ADD COLUMN birthdate DATE;
