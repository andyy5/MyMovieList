drop table movie_update_records;
create table movie_update_records
	(id raw(16) default sys_guid() primary key,
	time TIMESTAMP,
	movieid INTEGER, 
	uname varchar(50));

CREATE OR REPLACE TRIGGER record_insert99
	AFTER INSERT
	ON Movie
	FOR EACH ROW
	DECLARE v_username varchar2(50);
	BEGIN 
	SELECT user INTO v_username FROM dual;
   	INSERT INTO movie_update_records VALUES (SYS_GUID(), CURRENT_TIMESTAMP, :NEW.movieId, v_username);
END; 
/

/*** update these as you go along because PK needs to be changed after every insertion. **/
insert into Movie values (15734, 'XY', 'Foobar', 'Test Movie');
insert into Movie values (42734, 'XY', 'Foobar2', 'Test Movie2');
insert into Movie values (12444, 'XY', 'Foobar3', 'Test Movie3');

