\connect "apidb"

DROP TABLE "employee";

CREATE TABLE IF NOT EXISTS "public"."employee"
(
    "id"          SERIAL NOT NULL,
    "name"        character varying(255) NOT NULL,
    "email"       character varying(255) NOT NULL,
    "age"         integer,
    "designation" character varying(255) NOT NULL,
    "hiring_date" date                   NOT NULL,
    PRIMARY KEY ("id")
);

INSERT INTO employee ("id", "name", "email", "age", "designation", "hiring_date")
VALUES (1, 'John Doe', 'johndoe@gmail.com', 32, 'Data Scientist', '2012-06-01'),
       (2, 'David Costa', 'sam.mraz1996@yahoo.com', 29, 'Apparel Patternmaker',
        '2013-03-03'),
       (3, 'Todd Martell', 'liliane_hirt@gmail.com', 36, 'Accountant',
        '2014-09-20'),
       (4, 'Adela Marion', 'michael2004@yahoo.com', 42, 'Shipping Manager',
        '2015-04-11'),
       (5, 'Matthew Popp', 'krystel_wol7@gmail.com', 48,
        'Chief Sustainability Officer', '2016-01-04'),
       (6, 'Alan Wallin', 'neva_gutman10@hotmail.com', 37, 'Chemical Technician',
        '2017-01-10'),
       (7, 'Joyce Hinze', 'davonte.maye@yahoo.com', 44, 'Transportation Planner',
        '2017-05-02'),
       (8, 'Donna Andrews', 'joesph.quitz@yahoo.com', 49, 'Wind Energy Engineer',
        '2018-01-04'),
       (9, 'Andrew Best', 'jeramie_roh@hotmail.com', 51, 'Geneticist',
        '2019-01-02'),
       (10, 'Joel Ogle', 'summer_shanah@hotmail.com', 45, 'Space Sciences Teacher',
        '2020-02-01');