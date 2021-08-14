create database CML;
use CML;

CREATE TABLE caseentry(
case_num char(8) not null primary key,
facts varchar(1000) not null,
advice varchar(500) not null,
client_email varchar(50) not null
);

CREATE TABLE lawyer(
lawyer_id int not null primary key,
lawyer_name varchar(40) not null,
lawyer_email varchar(50) not null,
rating double not null,
languages varchar(15) not null,
lawyer_description varchar(500) not null
);

CREATE TABLE legal_areas(
    la_id int not null primary key,
    la_name varchar(30) not null
);

CREATE TABLE lawyer_legal_areas
(
    lawyer_id int not null,
    la_id int not null,

    CONSTRAINT lawyer_la_pk PRIMARY KEY (lawyer_id, la_id),
    CONSTRAINT lawyer_la_fk1 FOREIGN KEY (lawyer_id) REFERENCES lawyer(lawyer_id),
    CONSTRAINT lawyer_la_fk2 FOREIGN KEY (la_id) REFERENCES legal_areas(la_id)
);
CREATE TABLE case_legal_areas
(
    case_num char(8) not null,
    la_id int not null,

    CONSTRAINT case_la_pk PRIMARY KEY (case_num, la_id),
    CONSTRAINT case_la_fk1 FOREIGN KEY (case_num) REFERENCES caseentry(case_num),
    CONSTRAINT case_la_fk2 FOREIGN KEY (la_id) REFERENCES legal_areas(la_id)
);

      INSERT INTO lawyer ( lawyer_id, lawyer_name, lawyer_email, rating, languages, lawyer_description)
values ('1', 'Sylvia Lim Ki Chan','sylvialim123@yahoo.com','4.8', 'English, Mandarin','Sylvia Lim Ki Chan is a Head of the Criminal Defence Department at ABC Law Firm. She is well-versed in many areas but especially CyberCrime and Criminal Defence.');

INSERT INTO lawyer ( lawyer_id, lawyer_name, lawyer_email, rating, languages, lawyer_description)
values ('2', 'Kim Chan Hee','chanhee123@yahoo.com','4.8', 'English, Mandarin','Kim Chan hee is a Head of Banking and Finance and BRB Law. She has a wide expertise on commercial matters and an extensive knowledge of the banking industry. Chan Hee has acted on various matters involving regulatory compliance and anti-fraud.');

INSERT INTO lawyer ( lawyer_id, lawyer_name, lawyer_email, rating, languages, lawyer_description)
values ('3', 'Oh Yu Hee','yuhee123@yahoo.com','4.8', 'English, Mandarin','Oh Yu Hee is an avid advocate of pro bono and giving back to the community, and regularly involves herself in volunteering efforts with the Pro Bono Society whilst juggling her day job at MAJULAH Law Firm.');

INSERT INTO lawyer ( lawyer_id, lawyer_name, lawyer_email, rating, languages, lawyer_description)
values ('4', 'Remus Lim Chee Heng','remuslim123@yahoo.com','4.8', 'English, Mandarin','Remus Lim Chee Heng is the Director of Remus & Associates LLP. When Remus is not busy answering phone calls and defending his clients, he can be found playing football at Turf City (although he has recently not been on-form because of COVID restrictions).');

INSERT INTO lawyer ( lawyer_id, lawyer_name, lawyer_email, rating, languages, lawyer_description)
values ('5', 'Rachel Lee Jia En','rachellee123@yahoo.com','4.8', 'English, Mandarin', 'Rachel Lee is the founder of Law&Me, an innovative legaltech startup that aims to make legal information accessible to everybody. Rachel previously worked in a Big Four law firm before making the decision to venture into the legaltech field, and has not regretted it since.');

INSERT INTO lawyer ( lawyer_id, lawyer_name, lawyer_email, rating, languages, lawyer_description)
values ('6', 'Nathaniel Michael Yeo','nathaniel123@yahoo.com','4.8', 'English, Mandarin', 'Nathaniel (or as his friends call him, Natty) is a senior associate of Convictus Law. Nathaniel has successfully defended many clients over the course of his 2-year career. Nathaniel graduated from the National Singapore University with a Bachelor of Laws in 2017.');

INSERT INTO lawyer ( lawyer_id, lawyer_name, lawyer_email, rating, languages, lawyer_description)
values ('7', 'Johnny Neo Ren Jie','johnny123@yahoo.com','4.8', 'English, Mandarin', 'Johnny SC is a revered litigator, and Managing Partner at Achar & Pang Asia. Johnny is well-known across Asia as the best lawyer in Asia. Johnny has an international presence, and a win-rate of 100%.');

INSERT INTO lawyer ( lawyer_id, lawyer_name, lawyer_email, rating, languages, lawyer_description)
values ('8', 'Ginny Annabelle Foo','ginny123@yahoo.com','4.8', 'English, Mandarin', 'Ginny Foo is Head of Insurance and Reinsurance at Blue & Papier LLP, where she has been for the past 24 years and counting. Ginny is described as ‘’thorough’’, ‘has an eye for detail’’, ‘’very strategic’’, and ‘’nerves of steel’’. Ginny will not let you down. ');

INSERT INTO lawyer ( lawyer_id, lawyer_name, lawyer_email, rating, languages, lawyer_description)
values ('9', 'Finn Bolton','finn123@yahoo.com','4.8', 'English, Mandarin', 'Finn is the Senior Head of International Arbitration at Wlan and Network LLC and the President of the Singapore Arbitration Centre (International). Finn is regarded as one of the best arbitrators in both Singapore and the wider region, and has represented clients at some of the hottest arbitration seats in Singapore, London, Hong Kong, to name a few.');

INSERT INTO lawyer ( lawyer_id, lawyer_name, lawyer_email, rating, languages, lawyer_description)
values ('10', 'Regan Scott','regan123@yahoo.com','4.8', 'English, Mandarin', ‘Dr. Regan Scott is an associate of Medical Law at Giving Chance, one of the world’s pre-eminent law firms with an international reach. Dr. Scott holds both medical and law degrees, as well as Masters in Philosophy and Chinese Literature from Cambridge and Harvard respectively. Dr. Scott is more than qualified to serve you in all matters related to medical negligence.');

INSERT INTO lawyer ( lawyer_id, lawyer_name, lawyer_email, rating, languages, lawyer_description)
values ('11', 'Grace Wise','grace123@yahoo.com','4.8', 'English, Mandarin', 'Grace Wise is a Partner in Crime (Criminal Defence) at PinkBirch LLP. Grace has represented defendants in some of the most high-profile criminal cases in Singapore, and has received wide acclaim for her ability to turn the tide of the cases she is tasked with.');

INSERT INTO lawyer ( lawyer_id, lawyer_name, lawyer_email, rating, languages, lawyer_description)
values ('12', 'Haylie Lee Wan Ling','haylie123@yahoo.com','4.8', 'English, Mandarin', 'Professor Haylie Lee teaches Constitutional and Administrative Law at the Singapore University, and also serves as advisor to MSTL Law Corporation. Professor Haylie has authored numerous papers on the relationship between environmental law and the Singapore Constitution, and has been cited by the apex court of Singapore.');

INSERT INTO lawyer ( lawyer_id, lawyer_name, lawyer_email, rating, languages, lawyer_description)
values ('13', 'Bailee Kelly','bailee123@yahoo.com','4.8', 'English, Mandarin', 'Bailee Kelly is an associate at Cavenagh Bill Chambers, with a wide range of experience in commercial and corporate disputes. Bailee has been featured in Legal Who’s Who 2018, AsiaLegal 2019 and Legal300 2020. In other words, Bailee is simply one of the best.');

INSERT INTO lawyer ( lawyer_id, lawyer_name, lawyer_email, rating, languages, lawyer_description)
values ('14', 'Lynn Brooks','lynn123@yahoo.com','4.8', 'English, Mandarin', 'Lynn is Managing Partner at Brook Lyn & Shock LLP, where she has worked with her husband Shock for over 25 years. Lynn’’s expertise includes family law, insolvency law, wills and probate, and civil disputes.');

INSERT INTO lawyer ( lawyer_id, lawyer_name, lawyer_email, rating, languages, lawyer_description)
values ('15', 'Ian Wyatt','ianwyatt123@yahoo.com','4.8', 'English, Mandarin', ‘Ian Wyatt graduated from the Singapore University with an LLB (Honours) in 2020, and took the Bar in the same year. Ian has not yet found a firm to work at, but is eager to represent willing clients.');

INSERT INTO lawyer ( lawyer_id, lawyer_name, lawyer_email, rating, languages, lawyer_description)
values ('16', 'Ali Juarez','alijuarez123@yahoo.com','4.8', 'English, Mandarin', 'Ali Juarez is the CEO of Shiokness, a food-delivery service with footprint in Singapore and Batam, and practices law as a side hustle. He does surprisingly well for a part-time lawyer, and has a wealth of experience in civil matters, family matters, and any uncomplicated paperwork.');

INSERT INTO lawyer ( lawyer_id, lawyer_name, lawyer_email, rating, languages, lawyer_description)
values ('17', 'Nola Ryan','nolaryan123@yahoo.com','4.8', 'English, Mandarin','Nola Ryan is a Senior Associate at Giving Chance, an international law firm with international presence. He has helped clients in disputes amounting to more than $200m. He believes that any good dispute starts with a good lawyer, and he is committed to helping you get back more than what you lost.');

INSERT INTO lawyer ( lawyer_id, lawyer_name, lawyer_email, rating, languages, lawyer_description)
values ('18', 'Diego Lynn','diegolynn123@yahoo.com','4.8', 'English, Mandarin', 'Diego is a Partner at Worrison & Faster (Singapore) LLP, where he is the Partner of Trust Issues. Diego takes his work seriously, and has been commended by his clients for his diligence and commercial sensibility. He has represented clients at all levels of Singapore’’s and Malaysia’’s courts, and some say Batam.');

INSERT INTO lawyer ( lawyer_id, lawyer_name, lawyer_email, rating, languages, lawyer_description)
values ('19', 'Terence Lee','terencelee877@gmail.com','5.0', 'English, Mandarin', 'Terence Lee has acted for clients from diverse countries in cross-border disputes involving renovation and contractor defaults. He has also represented highly publicised renovation litigants in the Singapore High Court and Court of Appeal. His contractor dispute experiences span various international jurisdictions.
He is the current chairman of the Renovation Law Practice Committee and holds an LLM in Renovation Law.');


INSERT INTO legal_areas VALUES 
(1, 'Criminal Defence'), (2, 'Divorce'), (3, 'Commercial Crime and Regulatory Compliance'), 
(4, 'Magistrate''s Complaint'), (5, 'Cybercrime'), (6, 'Protection from Harassment Order'), (7, 'Syariah Divorce'), (8, 'Adoption'), (9, 'Lasting Power of Attorney (LPA)'), (10, 'Renovation Claims'), (11, 'Landlord-Tenant Disputes'), (12, 'Trusts'), (13, 'Employment Disputes'), (14, 'Civil Litigation'), (15, 'Personal Injury'), (16, 'Power of Attorney');

INSERT INTO lawyer_legal_areas VALUES (11, 1), (11, 14), (2, 2), (2, 16), (2, 14), (5, 14), (5, 2), (6, 14), (6, 12), (3, 3), (4, 3), (4, 7), (12, 8), (14, 4), (14, 5);
INSERT INTO lawyer_legal_areas VALUES (11, 2), (11, 3), (2, 4), (2, 10), (2, 3), (5, 3), (6, 3), (10, 12), (13, 3), (18, 3), (9,3), (16,3), (14, 14), (15, 14);
INSERT INTO lawyer_legal_areas VALUES (19, 14), (19, 10);

INSERT INTO CASEENTRY VALUES
('a0b1c2z5', 'Ah Choy worked as sub-contractor with a main con for 5 years, and at the end of the 4th year, ex-employer stopped paying, citing COVID as a reason. Ah Choy accepted the non-payment but continued to work with the main con, doing various jobs. However, the main con has recently vanished into Malaysia and Ah Choy cannot contact him. Ah Choy is owed about $8k from a particular renovation, as well as almost $4k for another job.',
 'Lawyer may be of some help, check if main con still has any accounts in Singapore. Could sue his company.', 'wongahchoy@gmail.com' ),
 ('c1d5l3o2', 'Landlord wants to evict Bernard from the residence immediately, not willing to give Bernard any time to find a new place. Landlord cites their oral agreement two years ago in which the landlord had mentioned that he could terminate the lease upon notice. Bernard said some reasonable time should be given to him but landlord refuses.',
 'Bernard was advised to engaged a lawyer, who would provide more force in Bernards refutation of the landlords demands. Bernard could send a lawyers letter over to the landlord, failing which, more action might have to be taken. If the landlords behaviour worsens, Bernard may possibly apply for a protection order (POHA) so that his family would not continue to be harassed.',
 'bernard.chan@yahoo.com'),
 ('vb102cal', 'a.	Terry got into a fight with some gangsters. He was simply drinking some juice at a restaurant when they began to beat him up. They have refused to provide any compensation whatsoever.',
 'Terry is advised to seek legal representation - although going to court would take very long, it is likely the only way he can recover some compensation for the hospitalisation fees and loss of income (almost $20k).',
 'terry.thong@yahoo.com');

 INSERT INTO CASE_LEGAL_AREAS VALUES
 ('a0b1c2z5', 14), ('c1d5l3o2', 3), ('c1d5l3o2', 2), ('vb102cal', 3);
