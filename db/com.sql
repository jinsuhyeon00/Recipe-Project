create table com (
   num int not null auto_increment,
	post_num int not null,
	rv_id char(20) not null,
	sd_id char(20) not null,
	subject char(200) not null,
	com text not null,
	regist_day char(20),      
   primary key(num)
);

