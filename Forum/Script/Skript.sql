DROP Database forum;
Create Database forum;
use forum;
create table if not Exists tblOberkategorien(

	p_okatID 		 	int unsigned NOT NUll Auto_increment primary key,
	okatName		 	varchar(30) NOT NUll

);

create table if not Exists tblUnterkategorie(
	p_ukatID 			int unsigned Not NUll Auto_increment primary key,
	ukatname  			varchar(30) Not NUll,
	f_okatID 			int unsigned Not NUll,
	foreign key(f_okatID) references tblOberkategorien(p_okatID)

);

create table if not Exists tblStati(
	p_stID 				int unsigned Not Null Auto_increment primary key,
	stBezeichnung 		varchar(30) Not Null

);
create table if not Exists tblBenutzergruppe(
	p_beGrupID 			int unsigned Not Null Auto_increment primary key,
	beGrupName 			varchar(30) Not Null
);

create table if not Exists tblBenutzer(
	p_benID 			int unsigned not Null Auto_increment primary key,
	benName 			varchar(30) Not Null UNIQUE,
	benPasswd	 		varchar(32) Not Null ,
	benMail 			varchar(100) Not Null UNIQUE,
	benGebDatum 		date Not Null,
	benGeschlecht 		char(1) Not Null, 
	benRegDatum 		datetime not null,
	benBild 			varchar(255),
	benUeberMich 		text,
	benIsBanned		boolean,
	f_beGrupID 			int unsigned Not Null,
	foreign key(f_beGrupID)references tblBenutzergruppe(p_beGrupID)


);

create table if not Exists tblThemen(
	p_tID 				int unsigned Not NUll Auto_increment primary key,
	tErstellDatum 		datetime Not Null,
	tTitel 				varchar(30) Not Null,
	f_stdID 			int unsigned Not Null,
	f_ukatID 			int unsigned Not Null,
	f_benID				int unsigned not null,
	foreign key(f_stdID) references tblStati(p_stID),
	foreign key(f_ukatID) references tblUnterkategorie(p_ukatID),
	foreign key(f_benID) references tblBenutzer(p_benID)

);



create table if not Exists tblBeitraege(
	p_beiID 			int unsigned Not Null Auto_increment primary key,
	beiErstellDatum 	datetime Not Null,
	beiInhalt 			text Not Null,
	f_tID 				int unsigned Not Null,
	f_benID 			int unsigned Not Null,
	foreign key(f_tID) references tblThemen(p_tID),
	foreign key(f_benID) references tblBenutzer(p_benID)

);

create table if not Exists tblLogins(
	p_logID 			int unsigned not null Auto_increment primary key,
	logZeitVon 			datetime Not null,
	logZeitBis 			datetime,
	logIP 				varchar(15) Not Null ,
	f_benID 			int unsigned Not Null,
	foreign key (f_benID) references tblBenutzer(p_benID)
);