 drop table mLooksUp;
 drop table ReviewsmDisplays;
 drop table lists;
 drop table tLooksUp;
 drop table ReviewstDisplays;
 drop table TVShowstHave;
 drop table MoviesmHave;
 drop table Producers;
 drop table Actors;
 drop table Directors;
 drop table Workers;
 drop table ReviewsWrites;
 drop table NonSubscribers;
 drop table mLists;
 drop table Movie;
 drop table TVShow;
 drop table Subscribers;
 drop table Users;
 
 /*==============================================================================*/
 create table Users
	(userId int not null,
	primary key (userId));
grant select on Users to public;

insert into Users
values (10001);
insert into Users
values (10002);
insert into Users
values (10003);
insert into Users
values (10004);
insert into Users
values (10005);
insert into Users
values (20001);
insert into Users
values (20002);
insert into Users
values (20003);
insert into Users
values (20004);
insert into Users
values (20005);
insert into Users
values (21);

 /*==============================================================================*/
 create table Subscribers
	(userId int not null,
	birthdate varchar(20),
	username varchar(20),
	name varchar(20),
	email varchar(20),
	fee int,
	primary key (userId),
	foreign key(userId) references Users on delete cascade);
grant select on Subscribers to public;

insert into Subscribers
values (10001,'05-14-93','tim01','Tim Hanks','timhanks@gmail.com',10);
insert into Subscribers
values (10002,'08-13-83','jim01','Jim Dim','jimdim@gmail.com',10);
insert into Subscribers
values (10003,'02-28-99','pam01','Pam Lam','pamlam@gmail.com',10);
insert into Subscribers
values (10004,'03-4-92','steve01','Steve Wong','stevewong@gmail.com',10);
insert into Subscribers
values (10005,'03-16-96','jake01','Jake Josh','jakejosh@gmail.com',10);
insert into Subscribers
values (21,'01-01-55','donald','donald t','dt@gmail.com',10);


/*==============================================================================*/
create table NonSubscribers 
	(userId int not null, 
	username varchar(20), 
	birthdate varchar (20),
	primary key (userId),
	foreign key(userId) references Users on delete cascade);
grant select on NonSubscribers to public;

insert into NonSubscribers
values (20001,'tom01','06-15-94');
insert into NonSubscribers
values (20002,'drake01','09-14-84');
insert into NonSubscribers
values (20003,'sam01','03-28-00');
insert into NonSubscribers
values (20004,'hot01','04-5-96');
insert into NonSubscribers
values (20005,'cheese01','04-17-97');


/*==============================================================================*/
create table Workers
	(workerId int not null,
	name varchar(20),
	contactinfo varchar(30),
	primary key (workerId));
grant select on Workers to public;

insert into Workers
values (30001,'Paul Ham','640 889 9745');
insert into Workers
values (30002,'Sam Bakes','607 546 8799');
insert into Workers
values (30003,'Michael Scott','911');
insert into Workers
values (30004,'Bill Gates','604 899 9999');
insert into Workers
values (30005,'Jesse Allen','778 956 6456');

insert into Workers
values (30006,'Grant Gustin','894 312 4656');
insert into Workers
values (30007,'Candice Patton','607 895 3321');
insert into Workers
values (30008,'Danielle Panabaker','604 978 6546 ');
insert into Workers
values (30009,'Carlos Valdes','604 789 1123');
insert into Workers
values (30010,'Tom Cavanagh','778 689 1125');

insert into Workers
values (30011,'Tim Allan','608 123 5497');
insert into Workers
values (30012,'Jason Bourne','607 654 3295');
insert into Workers
values (30013,'Alicia Scott','778 632 2545');
insert into Workers
values (30014,'Tim Cook','604 871 6598');
insert into Workers
values (30015,'Steven Allen','778 111 1111');


/*==============================================================================*/
create table Directors
	(workerId int not null,
	primary key (workerId),
	foreign key (workerId) references Workers on delete set null);
grant select on Directors to public;

insert into Directors
values (30001);
insert into Directors
values (30002);
insert into Directors
values (30003);
insert into Directors
values (30004);
insert into Directors
values (30005);


/*==============================================================================*/
create table Actors
	(workerId int not null,
	primary key (workerId),
	foreign key (workerId) references Workers on delete set null);
grant select on Actors to public;

insert into Actors
values (30006);
insert into Actors
values (30007);
insert into Actors
values (30008);
insert into Actors
values (30009);
insert into Actors
values (30010);


/*==============================================================================*/
create table Producers
	(workerId int not null,
	primary key (workerId),
	foreign key (workerId) references Workers on delete set null);
grant select on Producers to public;

insert into Producers
values (30011);
insert into Producers
values (30012);
insert into Producers
values (30013);
insert into Producers
values (30014);
insert into Producers
values (30015);


/*==============================================================================*/
create table TVShow
	(TVShowId int not null,
	name varchar(20),
	genre varchar(30),
	description varchar(300),
	primary key (TVShowId));
grant select on TVShow to public;

insert into TVShow
values (40001, 'The Flash','Action,Adventure,Drama','After being struck by lightning, Barry Allen wakes up from his 9 month coma to discover the bolt gave him the power of super speed. With his new team and powers, Barry becomes a superhero, The Flash, fighting crime in Central City.');
insert into TVShow
values (40002, 'Arrow','Action,Adventure,Crime','Spoiled billionaire playboy Oliver Queen is missing and presumed dead when his yacht is lost at sea. He returns five years later a changed man, determined to clean up the city as a hooded vigilante armed with a bow.');
insert into TVShow
values (40003, 'Family Guy','Animation, Comedy','In a wacky Rhode Island town, a dysfunctional family strive to cope with everyday life as they are thrown from one crazy scenario to another.');
insert into TVShow
values (40004, 'Lucifer', 'Crime,Drama,Fantasy','Lucifer takes up residence in Los Angeles.');
insert into TVShow
values (40005, 'Supergirl','Action,Adventure,Drama','The adventures of Supermans cousin in her own superhero career.');


/*==============================================================================*/	
create table Movie
	(movieId int not null,
	name varchar(40),
	genre varchar(40),
	description varchar(300),
	primary key (movieId));
grant select on Movie to public;

insert into Movie
values (50001,'The Avengers','Action,Sci-Fi,Thriller', 'Earths mightiest heroes must come together and learn to fight as a team if they are to stop the mischievous Loki and his alien army from enslaving humanity.');
insert into Movie
values (50002,'Captain America: The Winter Soldier','Action,Adventure,Sci-Fi','As Steve Rogers struggles to embrace his role in the modern world, he teams up with a fellow Avenger and S.H.I.E.L.D agent, Black Widow, to battle a new threat from history: an assassin known as the Winter Soldier.');
insert into Movie
values (50003, 'Iron Man','Action,Adventure,Sci-Fi','After being held captive in an Afghan cave, billionaire engineer Tony Stark creates a unique weaponized suit of armor to fight evil.');
insert into Movie
values (50004,'Guardians of the Galaxy','Action,Adventure,Sci-Fi','A group of intergalactic criminals are forced to work together to stop a fanatical warrior from taking control of the universe.');
insert into Movie
values (50005,'Ant-Man','Action,Adventure,Comedy','Armed with a super-suit with the astonishing ability to shrink in scale but increase in strength, cat burglar Scott Lang must embrace his inner hero and help his mentor, Dr. Hank Pym, plan and pull off a heist that will save the world.');

/*==============================================================================*/	

create table mLists 
	(movieId int not null,
	userId int not null,
	rating int,
	status char(15),
	primary key (movieId,userId),
	foreign key (movieId) references Movie on delete set null,
	foreign key (userId) references Subscribers on delete set null);
grant select on mLists to public;

insert into mLists
values (50001,10001,5,'dropped');
insert into mLists
values (50002,10001,2,'completed');
insert into mLists
values (50003,10001,3,'plan to watch');
insert into mLists
values (50004,10002,5,'dropped');
insert into mLists
values (50004,10003,1,'dropped');

/*==============================================================================*/
create table mLooksUp 
	(userId int not null,
	movieId int not null,
	primary key(userId,movieId),
	foreign key (userId) references Users on delete set null,
	foreign key (movieId) references Movie on delete set null);
grant select on mLooksUp to public;

insert into mLooksUp
values (10001,50002);
insert into mLooksUp
values (20001,50003);
insert into mLooksUp
values (10003,50004);
insert into mLooksUp
values (20004,50005);
insert into mLooksUp
values (10005,50002);


/*==============================================================================*/
create table TVShowstHave
	(TVShowId int not null,
	workerId int not null,
	primary key (TVShowId,workerId),
	foreign key (TVShowId) references TVShow on delete set null,
	foreign key (workerId) references Workers on delete set null);
grant select on TVShowstHave to public;

insert into TVShowstHave
values (40001,30006);
insert into TVShowstHave
values (40001,30007);
insert into TVShowstHave
values (40001,30008);
insert into TVShowstHave
values (40001,30009);
insert into TVShowstHave
values (40001,30010);
insert into TVShowstHave
values (40002,30006);


/*==============================================================================*/
create table MoviesmHave 
	(movieId int not null,
	workerId int not null,
	primary key (movieId,workerId),
	foreign key (movieId) references Movie on delete set null,
	foreign key (workerId) references Workers on delete set null);
grant select on MoviesmHave to public;

insert into MoviesmHave
values (50001,30012);
insert into MoviesmHave
values (50002,30013);
insert into MoviesmHave
values (50003,30015);
insert into MoviesmHave
values (50003,30013);
insert into MoviesmHave
values (50004,30001);


/*==============================================================================*/
create table tLooksUp
	(userId int not null,
	TVShowId int not null,
	primary key (userId, TVShowId),
	foreign key (userId) references Users on delete set null,
	foreign key (TVShowId) references TVShow on delete set null);
grant select on tLooksUp to public;

insert into tLooksUp
values(10001,40001);
insert into tLooksUp
values(10001,40002);
insert into tLooksUp
values(20001,40001);
insert into tLooksUp
values(20001,40004);
insert into tLooksUp
values(10005,40005);
	
	
/*==============================================================================*/
create table ReviewsWrites
	(reviewId int not null,
	comments varchar(500),
	rating int, 
	primary key (reviewId));
grant select on ReviewsWrites to public;

insert into ReviewsWrites
values(60001,'some long comment...',5);
insert into ReviewsWrites
values(60002,'some long comment...',4);
insert into ReviewsWrites
values(60003,'some long comment...',4);
insert into ReviewsWrites
values(60004,'some long comment...',5);
insert into ReviewsWrites
values(60005,'some long comment...',3);


/*==============================================================================*/
create table ReviewsmDisplays
	(reviewId int not null,
	movieId int not null,
	comments varchar(500),
	rating int,
	primary key (reviewId),
	foreign key (movieId) references Movie on delete set null);
grant select on ReviewsmDisplays to public;

insert into ReviewsmDisplays
values(60001,50001,'uhh',5);
insert into ReviewsmDisplays
values(60002,50003,'uhh',4);
insert into ReviewsmDisplays
values(60005,50002,'uhh',3);
insert into ReviewsmDisplays
values(60003,50001,'uhh',3);
insert into ReviewsmDisplays
values(60004,50005,'uhh',3);

insert into ReviewsmDisplays
values(4,50003,'Director Jon Favreau keeps the film light and bright; the special effects are impressively crafted, and the setup for another film is handled gently and well.',8);
insert into ReviewsmDisplays
values(6,50004,'Colourful, tongue-in-cheek fun, purpose-built for grown-up lovers of kitsch ’80s science-fiction. But the Marvel formula is starting to feel, well, a little too formulaic.',8);
insert into ReviewsmDisplays
values(7,50005,'Though being a formulaic Marvel superhero origin tale, Ant-Man gets a boost from a good ensemble cast and an overall tone of fun and creativity from director Peyton Reed.',7);
/* i think this should correspond to the comments and ratings in reviewswrites... */


/*==============================================================================*/
create table ReviewstDisplays
	(reviewId int not null,
	TVShowId int not null,
	comments varchar(500),
	rating int,
	primary key (reviewId),
	foreign key (TVShowId) references TVShow on delete set null);
grant select on ReviewsmDisplays to public;

insert into ReviewstDisplays
values(60001,40001,'uhh',5);
insert into ReviewstDisplays
values(60002,40003,'uhh',4);
insert into ReviewstDisplays
values(60005,40002,'uhh',3);
insert into ReviewstDisplays
values(60003,40001,'uhh',3);
insert into ReviewstDisplays
values(60004,40005,'uhh',3);

insert into ReviewstDisplays
values(8,40004,'A light dusting of Milton notwithstanding, its pitch is mainstream and middlebrow. A decently made series that is neither particularly original nor entirely predictable.',7);
insert into ReviewstDisplays
values(9,40005,'Supergirl manages to capture the comic book spirit of the characters without becoming either too unbelievable or overly ironic.',8);
/* i think this should correspond to the comments and ratings in reviewswrites... */


/*==============================================================================*/
create table lists 
	(movieId int not null,
	userId int not null,
	primary key (movieId,userId),
	foreign key (movieId) references Movie on delete set null,
	foreign key (userId) references Subscribers on delete set null);
grant select on lists to public;

insert into lists
values (50001,10001);
insert into lists
values (50002,10001);
insert into lists
values (50003,10001);
insert into lists
values (50004,10002);
insert into lists
values (50004,10003);



/*==============================================================================*/
select * from Users;
select * from Subscribers;
select * from NonSubscribers;
select * from Workers;
select * from Directors;
select * from Actors;
select * from Producers;
select * from TVShow;
select * from Movie;
select * from mLooksUp;
select * from TVShowstHave;
select * from MoviesmHave;
select * from tLooksUp;
select * from ReviewsWrites;
select * from ReviewsmDisplays;
select * from ReviewstDisplays;
select * from lists;
select * from mLists;


	
	
	
	
	
	
	
	
	
	
	
	
	
	
	