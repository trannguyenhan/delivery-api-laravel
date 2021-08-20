API for Delivery App 

### Create users table default of Laravel
```
php artisan migrate
```

### Create 3 new table: roles, role_user, foods, orders
```
create table roles(
	id bigint unsigned not null auto_increment primary key,
    name varchar(15)
);

create table role_user(
	id bigint unsigned not null auto_increment primary key,
    user_id bigint unsigned,
    role_id bigint unsigned,
    foreign key (user_id) references users(id),
    foreign key (role_id) references roles(id)
);

create table foods(
	id bigint unsigned not null auto_increment primary key,
    name varchar(50),
    price int
);

create table orders(
	id bigint unsigned not null auto_increment primary key,
    user_id bigint unsigned,
    food_id bigint unsigned,
    address varchar(5),
    time datetime
);
alter table orders
add column status int;
alter table orders
add column code varchar(15);
```
### Run app
```
php artisan serve
```

and check API with POSTMAN.

### List API
```
/api/user/list
/api/food/list
/api/order/list
/api/login
/api/register
/api/order/update
```
