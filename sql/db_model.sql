create table categories
(
    id        int auto_increment
        primary key,
    name      varchar(50) null,
    parent_id int         null
);

create table comments
(
    id       int auto_increment
        primary key,
    order_id int          null,
    comment  varchar(100) null
);

create table locations
(
    id   int auto_increment
        primary key,
    name varchar(100) null
);

create table products
(
    id          int auto_increment
        primary key,
    category_id int          null,
    name        varchar(255) null,
    price       double       null,
    constraint category_id
        foreign key (category_id) references categories (id)
);

create table roles
(
    id   int auto_increment
        primary key,
    name varchar(50) null
);

create table tables
(
    id           int auto_increment
        primary key,
    table_number int null,
    max_persons  int null,
    location_id  int null,
    constraint location_fk
        foreign key (location_id) references locations (id)
);

create table users
(
    id       int auto_increment
        primary key,
    role_id  int          null,
    password varchar(100) null,
    username varchar(50)  null,
    constraint role_fk
        foreign key (role_id) references roles (id)
);

create table orders
(
    id          int auto_increment
        primary key,
    table_id    int         null,
    user_id     int         null,
    total_price double      null,
    status      varchar(25) null,
    timestamp   datetime    null,
    constraint table_fk
        foreign key (table_id) references tables (id),
    constraint user_fk
        foreign key (user_id) references users (id)
);

create table orderlines
(
    order_id   int null,
    product_id int null,
    price      int null,
    amount     int null,
    comment_id int null,
    constraint orderline_id
        unique (product_id, order_id),
    constraint comment_fk
        foreign key (comment_id) references comments (id),
    constraint order_fk
        foreign key (order_id) references orders (id),
    constraint product_id
        foreign key (product_id) references products (id)
);

