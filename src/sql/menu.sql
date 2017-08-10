drop table menu_item;
drop table menu;

create table menu(
  id integer not null,
  name varchar(50) not null,
  primary key(id)
);

create table menu_item(
  id integer not null,
  id_menu integer not null ,
  url varchar(200) not null,
  name varchar(50) not null,
  primary key (id),
  foreign key(id_menu) references menu(id)
);


insert into menu(id, name) values(0, 'main');

insert into menu_item(id, id_menu, url, name)
values(1,0,'http://www.google.com', 'Google');

insert into menu_item(id, id_menu, url, name)
values(2,0,'http://www.cnn.com', 'CNN');

insert into menu_item(id, id_menu, url, name)
values(3,0,'http://www.fox.com', 'Fox');

