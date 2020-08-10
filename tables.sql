/*
CREATE TABLE Employee(
	employeeId int NOT NULL,
    firstName varchar( 50 ) NOT NULL,
    lastName varchar( 50 ) NOT NULL,
    phoneNumber varchar( 10 ) NOT NULL,
    CONSTRAINT employee_pk PRIMARY KEY( employeeId )
); 

CREATE TABLE Food(
	foodId int NOT NULL AUTO_INCREMENT,
    foodName varchar( 50 ) NOT NULL,
    foodDescription tinytext NOT NULL,
    foodCost float NOT NULL,
    CONSTRAINT foods_pk PRIMARY KEY( foodId )
);

CREATE TABLE Orders(
	customerName varchar( 50 ) NOT NULL,
    customerPhone varchar( 10 ) NOT NULL,
    foodId int NOT NULL,
    orderDate date NOT NULL,
    orderQuantity int NOT NULL, 
    CONSTRAINT orders_pk PRIMARY KEY( customerName, customerPhone, foodId ),
    CONSTRAINT orders_food_fk FOREIGN KEY( foodId ) REFERENCES Food( foodId )
); 
*/
/*
INSERT INTO Food( foodName, foodDescription, foodCost ) VALUES( "Cheeseburger", "Cheese, beef, lettuce, tomato, ketchup", 1.59 );
INSERT INTO Food( foodName, foodDescription, foodCost ) VALUES( "Hamburger", "Beef, lettuce, tomato, ketchup", 1.29 );
INSERT INTO Food( foodName, foodDescription, foodCost ) VALUES( "Veggie Burger", "Veggie patty, lettuce, tomato, ketchup", 1.00 );
*/
/*
INSERT INTO Employee VALUES( 1, "Coraline", "Jones", "1111111111" );
INSERT INTO Employee VALUES( 2, "Wyborn", "Lovat", "2222222222" );
*/






