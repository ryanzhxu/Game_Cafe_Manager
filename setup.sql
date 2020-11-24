drop table Reserves;
drop table Maintains;
drop table Has;
drop table Available_On;
drop table Member;
drop table Has_CardInformation;
drop table Food_Order;
drop table Cooks_By;

drop table Make_Orders;
drop table AccessLevels;

drop table Staff;
drop table Chef;
drop table Food;

drop table Seat;
drop table ConsoleSystem;
drop table Game;

drop table Customer;




CREATE TABLE Staff (
    eid integer,
    ename VARCHAR(30),
    ewage REAL,
    ejoindate DATE,
    responsibility VARCHAR(15),
    PRIMARY KEY(eid)
);
grant select on Staff to public;


CREATE TABLE Chef (
    eid integer,
    ename varchar(30),
    ewage REAL,
    ejoindate DATE,
    station varchar(15),
    PRIMARY KEY (eid)
);
grant select on Chef to public;


CREATE TABLE Game (
    title VARCHAR(40) NOT NULL,
    platform varchar(30),
    publishDate DATE,
    PRIMARY KEY (title, platform)
);
grant select on Game to public;


CREATE TABLE ConsoleSystem (
    console# INTEGER NOT NULL,
    platform VARCHAR(30),
    PRIMARY KEY (console#)
);
grant select on ConsoleSystem to public;


CREATE TABLE Seat (
    seat# INTEGER NOT NULL,
    rate REAL,
    PRIMARY KEY (seat#)
);
grant select on Seat to public;


CREATE TABLE Customer (
    cid integer,
    cname VARCHAR(30),
    age INTEGER,
    -- accessLevel VARCHAR(30),
    PRIMARY KEY (cid)
);
grant select on Customer to public;


CREATE TABLE AccessLevels (
    age INTEGER,
    accessLevel VARCHAR(30),
    PRIMARY KEY (age)
);
grant select on AccessLevels to public;

CREATE TABLE Make_Orders (
    orderid INTEGER,
    cid integer,
    odate DATE,
    amount integer,
    method VARCHAR(10),
    PRIMARY KEY(orderid),
    FOREIGN KEY (cid) REFERENCES Customer
);
grant select on Make_Orders to public;


CREATE TABLE Food (
    fname VARCHAR(20),
    price REAL,
    food_description varchar(40),
    PRIMARY KEY (fname)
);
grant select on Food to public;


CREATE TABLE Food_Order (
    fname varchar(20),
    orderid integer,
    qty INTEGER,
    PRIMARY KEY (fname, orderid),
    FOREIGN KEY (fname) REFERENCES Food ON DELETE CASCADE,
    FOREIGN KEY (orderid) REFERENCES Make_Orders ON DELETE CASCADE
);
grant select on Food_Order to public;



CREATE TABLE Reserves (
    orderid integer not null,
    seat# INTEGER,
    hrs integer,
    PRIMARY KEY (orderid),
    FOREIGN KEY (orderid) REFERENCES Make_Orders ON DELETE CASCADE,
    FOREIGN KEY (seat#) REFERENCES Seat ON DELETE CASCADE
);
grant select on Reserves to public;


CREATE TABLE Available_On (
    console# INTEGER NOT NULL,
    title VARCHAR(40) NOT NULL,
    platform varchar(30),
    PRIMARY KEY(console#, title, platform),
    FOREIGN KEY(console#) REFERENCES ConsoleSystem ON DELETE CASCADE,
    FOREIGN KEY(title, platform) REFERENCES Game ON DELETE CASCADE
);
grant select on Available_On to public;


CREATE TABLE Maintains (
    eid integer,
    seat# INTEGER,
    PRIMARY KEY(eid, seat#),
    FOREIGN KEY(eid) REFERENCES Staff ON DELETE CASCADE,
    FOREIGN KEY(seat#) REFERENCES Seat ON DELETE CASCADE
);
grant select on Maintains to public;


CREATE TABLE Member (
    cid integer,
    mid integer,
    since DATE,
    hours_spent INTEGER,
    PRIMARY KEY(cid),
    -- UNIQUE(mid),
    FOREIGN KEY (cid) REFERENCES Customer ON DELETE CASCADE
);
grant select on Member to public;

CREATE TABLE Has_CardInformation (
    cnum CHAR(16) NOT NULL,
    cid integer NOT NULL,
    ctype VARCHAR(15),
    maddress VARCHAR(20),
    phone# CHAR(10),
    PRIMARY KEY(cnum, cid),
    FOREIGN KEY (cid) REFERENCES Customer ON DELETE CASCADE
);
grant select on Has_CardInformation to public;


CREATE TABLE Has (
    seat# INTEGER NOT NULL,
    console# INTEGER NOT NULL,
    -- rate REAL,
    -- platform VARCHAR(30),
    PRIMARY KEY (seat#, console#),
    FOREIGN KEY (seat#) REFERENCES Seat ON DELETE CASCADE,
    FOREIGN KEY (console#) REFERENCES ConsoleSystem ON DELETE CASCADE
);
grant select on Has to public;



CREATE TABLE Cooks_By (
    eid integer,
    fname VARCHAR(20),
    PRIMARY KEY (eid, fname),
    FOREIGN KEY (eid) REFERENCES Chef ON DELETE CASCADE,
    FOREIGN KEY (fname) REFERENCES Food ON DELETE CASCADE
);
grant select on Cooks_By to public;


insert into Staff
values(1234, 'Mike Reeves', 16.00, DATE '2020-06-23', 'wipe down');
insert into Staff
values(1235, 'Richard Reeves', 17.00, DATE '2020-04-23', 'wipe down');
insert into Staff
values(1236, 'Karl Reeves', 18.00, DATE '2020-02-23', 'wipe down');

insert into Chef
values(2345, 'Brayden Mitchell', 10.00, DATE '2020-03-23', 'sautee');
insert into Chef
values(2346, 'Rhys Moore', 10.00, DATE '2020-04-23', 'grill');
insert into Chef
values(2347, 'Jun Choi', 10.00, DATE '2020-06-23', 'apps');

-- 3 games per platform - platforms are: PS4, PC, or Switch
insert into Game
values('Little Big Planet', 'PS4', DATE '2009-03-22');
insert into Game
values('Call of duty 1', 'PS4', DATE '2004-03-22');
insert into Game
values('Bioshock Infinite', 'PS4', DATE '2010-03-11');

insert into Game
values('Cyberpunk 2077', 'PS5', DATE '2020-12-12');

insert into Game
values('Counter Strike: Global Offensive', 'PC', DATE '2012-10-09');
insert into Game
values('League of Legends', 'PC', DATE '2010-08-13');
insert into Game
values('Valorant', 'PC', DATE '2020-03-22');
insert into Game
values('Grand Theft Auto V', 'PC', DATE '2015-04-15');

insert into Game
values('Mario Party', 'Switch', DATE '2009-03-01');
insert into Game
values('Zelda: Breath of the Wild', 'Switch', DATE '2018-03-22');
insert into Game
values('Super Mario Galaxy', 'Switch', DATE '2017-12-18');


-- 9 seats in total from # 1-9: 1-3 have PS4, 4-6 have PC, 7-9 have Switch
insert into Seat
values(1, 5.00);
insert into Seat
values(2, 5.00);
insert into Seat
values(3, 5.00);

insert into Seat
values(4, 3.00);
insert into Seat
values(5, 3.00);
insert into Seat
values(6, 3.00);

insert into Seat
values(7, 8.00);
insert into Seat
values(8, 8.00);
insert into Seat
values(9, 8.00);


-- Consoles: 1-3 are PS4, 4-6 are PC, 7-9 are Switch
insert into ConsoleSystem
values(1, 'PS4');
insert into ConsoleSystem
values(2, 'PS4');
insert into ConsoleSystem
values(3, 'PS4');
insert into ConsoleSystem
values(4, 'PC');
insert into ConsoleSystem
values(5, 'PC');
insert into ConsoleSystem
values(6, 'PC');
insert into ConsoleSystem
values(7, 'Switch');
insert into ConsoleSystem
values(8, 'Switch');
insert into ConsoleSystem
values(9, 'Switch');


-- Has
insert into Has
values(1, 1);
insert into Has
values(2, 2);
insert into Has
values(3, 3);
insert into Has
values(4, 4);
insert into Has
values(5, 5);
insert into Has
values(6, 6);
insert into Has
values(7, 7);
insert into Has
values(8, 8);
insert into Has
values(9, 9);


-- food
insert into Food
values('Cheeseburger', 10.00, 'Our classic cheeseburger.');
insert into Food
values('Hotdog', 8.00, 'Our classic hotdog.');
insert into Food
values('Tacos', 5.00, 'Nice Tacos.');
insert into Food
values('Fries', 3.00, 'Our classic Fries.');
insert into Food
values('Pop', 2.00, 'A refreshing beverage.');




-- ********** EXISTING DATABASE **********
insert into Customer
values(111, 'Bob Smith', 1);
insert into Customer
values(222, 'Gerry Smith', 1);
insert into Customer
values(333, 'John Smith', 1);
insert into Customer
values(444, 'Boba Fett', 1);
insert into Customer
values(555, 'Jango Fett', 1);
insert into Customer
values(666, 'Hank Smith', 1);


insert into Make_Orders
values(1, 111, Date '2020-06-23', 32,'CASH');
insert into Make_Orders
values(2, 222, Date '2020-06-23', 5, 'CASH');
insert into Make_Orders
values(3, 333, Date '2020-06-23', 5, 'CASH');
insert into Make_Orders
values(4, 444, Date '2020-06-23', 3, 'CASH');
insert into Make_Orders
values(5, 555, Date '2020-06-23', 3, 'CASH');
insert into Make_Orders
values(6, 666, Date '2020-06-23', 8, 'CASH');


insert into Make_Orders
values(7, 111, Date '2020-06-14', 5, 'CASH');
insert into Make_Orders
values(8, 111, Date '2020-06-15', 5, 'CASH');
insert into Make_Orders
values(9, 111, Date '2020-06-16', 5, 'CASH');

insert into Make_Orders
values(10, 222, Date '2020-06-14', 3, 'CASH');
insert into Make_Orders
values(11, 222, Date '2020-06-15', 3, 'CASH');


insert into Reserves
values(1, 1, 1);
insert into Reserves
values(2, 1, 1);
insert into Reserves
values(3, 2, 1);
insert into Reserves
values(4, 4, 1);
insert into Reserves
values(5, 4, 1);

insert into Reserves
values(6, 8, 1);

insert into Reserves
values(7, 1, 1);
insert into Reserves
values(8, 1, 1);
insert into Reserves
values(9, 1, 1);

insert into Reserves
values(10, 4, 1);
insert into Reserves
values(11, 5, 1);

-- Customer 111 ordered every food in one order
insert into Food_Order
values('Cheeseburger', 1, 1);
insert into Food_Order
values('Hotdog', 1, 1);
insert into Food_Order
values('Tacos', 1, 1);
insert into Food_Order
values('Fries', 1, 1);
insert into Food_Order
values('Pop', 1, 1);

-- Customer 222 ordered every food across multiple orders
insert into Food_Order
values('Cheeseburger', 2, 1);
insert into Food_Order
values('Hotdog', 2, 1);
insert into Food_Order
values('Tacos', 10, 1);
insert into Food_Order
values('Fries', 10, 1);
insert into Food_Order
values('Pop', 10, 1);

insert into Food_Order
values('Pop', 3, 1);

insert into Food_Order
values('Cheeseburger', 5, 1);
