create database CML;
use CML;

CREATE TABLE CASEENTRY
(
    case_num UNIQUEIDENTIFIER not null,
    facts varchar(1000) not null,
    advice varchar(500) not null,
    legal_areas varchar(30) not null,
    client_email varchar(50) not null,
    case_id varchar(20) not null

    CONSTRAINT CASEENTRY_PK PRIMARY KEY (case_num)
);

CREATE TABLE LAWYER
(
    lawyer_id int not null AUTO_INCREMENT, 
    lawyer_name varchar(40) not null, 
    specialisation varchar(30) not null,
    lawyer_email varchar(50) not null,
    rating double(2,1) not null,
    languages varchar(15) null, 
    lawyer_description varchar(500) null 

    CONSTRAINT LAWYER_PK PRIMARY KEY (lawyer_id) 
);

