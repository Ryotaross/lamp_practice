CREATE TABLE history(
    order_id int(11) NOT NULL AUTO_INCREMENT,
    customer_id int(11) NOT NULL,
    order_date datetime,
    primary key(order_id)
);

CREATE TABLE details(
    order_id INT(11) NOT NULL,
    item_id INT(11) NOT NULL,
    item_name VARCHAR(100) NOT NULL,
    item_price INT(11) NOT NULL,
    quentity INT(11) NOT NULL
);