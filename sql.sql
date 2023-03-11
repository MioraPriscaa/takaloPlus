create database takaloplus;
use takaloplus;

create table Membres(
    idMembre INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    nom VARCHAR(30) NOT NULL,
    prenom VARCHAR(30) NOT NULL,
    dateNaissance DATE NOT NULL,
    genre CHAR(1) NOT NULL,
    email VARCHAR(30) DEFAULT NULL,
    motDePasse VARCHAR(20) NOT NULL,
    pdp VARCHAR(50) default null,
    isAdmin INT DEFAULT 0
);

create table Contacts(
    idMembre INT NOT NULL,
    telephone INT DEFAULT NULL,
    facebook INT DEFAULT NULL,
    FOREIGN KEY(idMembre) REFERENCES Membres(idMembre)
);

create table Categories(
    idCategorie INT PRIMARY KEY AUTO_INCREMENT,
    libele VARCHAR(60) NOT NULL
);

create table filtres(
    idObjet INT NOT NULL,
    genre CHAR(1) DEFAULT NULL,
    typeAge INT DEFAULT 0 ,
    FOREIGN KEY(idObjet) REFERENCES Objets(idObjet)
);
-- 0 pour tous , 5 bebe , 10 enfant 20 adolescant , 30 adulte , 40 vieux

create table Objets(
    idObjet INT PRIMARY KEY AUTO_INCREMENT ,
    idCategorie INT ,
    DateHeurePublication DATETIME NOT NULL,
    titre VARCHAR(50) NOT NULL, 
    descri TEXT NOT NULL,
    photo VARCHAR(200) ,
    FOREIGN KEY(idCategorie) REFERENCES Categories(idCategorie)
);

create table Proprio(
    idMembre INT NOT NULL,
    idObjet INT NOT NULL,
    dateAcquis DATETIME NOT NULL,
    quantite INT DEFAULT 1 NOT NULL,
    FOREIGN KEY(idMembre) REFERENCES Membres(idMembre),
    FOREIGN KEY(idObjet) REFERENCES Objets(idObjet)
);

create table Prix(
    idMembre INT NOT NULL,
    idObjet INT NOT NULL,
    prix FLOAT NOT NULL,
    datePose DATETIME NOT NULL,
    FOREIGN KEY(idObjet) REFERENCES Objets(idObjet),
    FOREIGN KEY(idMembre) REFERENCES Membres(idMembre)
);

create table Images(
    idObjet INT NOT NULL,
    idMembre INT NOT NULL,
    photo VARCHAR(250) NOT NULL,
    datePublication DATETIME NOT NULL,
    FOREIGN KEY(idMembre) REFERENCES Membres(idMembre),
    FOREIGN KEY(idObjet) REFERENCES Objets(idObjet)
);

create table Echanges(
    idEchange INT PRIMARY KEY AUTO_INCREMENT,
    idMembre1 INT NOT NULL,
    idMembre2 INT NOT NULL,
    dateDemande DATETIME DEFAULT NOW(),
    dateAcceptation DATETIME DEFAULT NULL,
    etat INT DEFAULT 1,
    FOREIGN KEY(idMembre1) REFERENCES Membres(idMembre),
    FOREIGN KEY(idMembre2) REFERENCES Membres(idMembre)
);

create table DetailEchanges(
    idEchange INT NOT NULL,
    idObjet1 INT NOT NULL,
    idObjet2 INT NOT NULL,
    quantite1 INT NOT NULL DEFAULT 1,
    quantite2 INT NOT NULL DEFAULT 1,
    FOREIGN KEY(idEchange) REFERENCES echanges(idEchange),
    FOREIGN KEY(idObjet1) REFERENCES Objets(idObjet),
    FOREIGN KEY(idObjet2) REFERENCES Objets(idObjet)
);
-- idObjet1 a demander idObjet2 a donner 
create table ModePaiements(
    id INT PRIMARY KEY AUTO_INCREMENT,
    nom VARCHAR(100) NOT NULL
);

create table likes(
    idMembre INT NOT NULL,
    idObjet INT NOT NULL,
    dateLike DATETIME NOT NULL,
    dislike INT DEFAULT 0,
    class VARCHAR(30) default 'love',
    FOREIGN KEY(idMembre) REFERENCES Membres(idMembre),
    FOREIGN KEY(idObjet) REFERENCES Objets(idObjet)
);

insert into Membres values(NULL,'Arivelo','visica','23-08-1999','f','visica@gmail.com',"visica",'f2.png',0);
insert into Membres values(NULL,'Arivelo','ravaka','22-06-2002','f','ravaka@gmail.com',"ravaka",'f1.png',0);
insert into Membres values(NULL,'Arivelo','faly','23-11-2003','m','faly@gmail.com',"faly",'g10.png',1);
insert into Membres values(NULL,'Arivelo','aina','23-07-2005','f','aina@gmail.com',"aina",'f8.png',0);
insert into Membres values(NULL,'Arivelo','tovo','12-08-2006','m','tovo@gmail.com',"tovo",'g8.png',0);

-- vetements
insert into Categories values (NULL,'t-shirt');
insert into Categories values (NULL,'pull');


-- informatique
insert into Categories values (NULL,'smartphone');
insert into Categories values (NULL,'smartWatch');
insert into Categories values (NULL,'laptop');
insert into Categories values (NULL,'console');
insert into Categories values (NULL,'accessoirs pc');
insert into Categories values (NULL,'chemise');

-- jouet
-- chaussures
insert into Categories values (NULL,'chaussures');


insert into Objets values (NULL,1,NOW(),'Tshirt','100% coton','f4.jpg');
insert into Objets values (NULL,2,NOW(),'pull','100% coton','f8.jpg');
insert into Objets values (NULL,3,NOW(),'smartphone','','Image-10.jpg');
insert into Objets values (NULL,4,NOW(),'smartWatch','','Image-19.jpg');
insert into Objets values (NULL,5,NOW(),'pc portable','','8729493_R_Z001A.jpeg');
insert into Objets values (NULL,5,NOW(),'mac book','','product-1.jpg');
insert into Objets values (NULL,7,NOW(),'camera','marque canon','camera.jpg');
insert into Objets values (NULL,7,NOW(),'casque','gamer','Image-25.jpg');
insert into Objets values (NULL,8,NOW(),'Nike Air Force 1','nike','nikeairforce1.jpg');
insert into Objets values (NULL,8,NOW(),'Nike Phamtom GT2 Elite','sport','nikephantomgt2elitesg-proac.jpg');

insert into Proprio values (1,1,now(),default);
insert into Proprio values (2,2,now(),default);
insert into Proprio values (3,3,now(),default);
insert into Proprio values (4,4,now(),default);
insert into Proprio values (5,5,now(),default);
insert into Proprio values (1,6,now(),default);
insert into Proprio values (2,7,now(),default);
insert into Proprio values (3,8,now(),default);
insert into Proprio values (4,9,now(),default);
insert into Proprio values (5,10,now(),default);

insert into Prix values (1,1,2000,now());
insert into Prix values (2,2,500,now());
insert into Prix values (3,3,10000,now());
insert into Prix values (4,4,1255,now());
insert into Prix values (5,5,577,now());
insert into Prix values (1,6,1256,now());
insert into Prix values (2,7,7899,now());
insert into Prix values (3,8,666,now());
insert into Prix values (4,9,900,now());
insert into Prix values (5,10,1275,now());


INSERT into Echanges VALUES( NULL , 1 , 2 , NOW() , NULL , 1 );
INSERT into Echanges VALUES( NULL , 2 , 3 , NOW() , NULL , 1 );
INSERT into Echanges VALUES( NULL , 3 , 4 , NOW() , NULL , 1 );
INSERT into Echanges VALUES( NULL , 4 , 5 , NOW() , NULL , 1 );
INSERT into Echanges VALUES( NULL , 5 , 1 , NOW() , NULL , 1 );

insert into DetailEchanges values(1,1,2,default,default);
insert into DetailEchanges values(2,2,3,default,default);
insert into DetailEchanges values(3,3,4,default,default);
insert into DetailEchanges values(4,4,5,default,default);
insert into DetailEchanges values(5,5,1,default,default);

insert into ModePaiements values(null,'MVola');
insert into ModePaiements values(null,'Orange Money');
insert into ModePaiements values(null,'Airtel Money');
insert into ModePaiements values(null,'Compte Bancaire');



-- -- 
-- SELECT m.idMembre,m.nom,m.prenom,m.dateNaissance,m.genre,m.email,m.motDePasse,m.photo,m.isAdmin,p.dateAcquis,p.quantite,o.idCategorie,o.DateHeurePublication,o.titre,o.descri,o.photo FROM Proprio p 
-- join Membres m on p.idMembre = m.idMembre
-- join Objets o on p.idObjet = o.idObjet
-- WHERE m.idMembre = ( SELECT idMembre FROM Proprio WHERE idObjet = 1 order by dateAcquis desc LIMIT 1 ) ;


-- proprio last
create or replace view changeProprio as (select max(dateAcquis) as dateAcquis ,idObjet from Proprio group by idObjet);

create or replace view DernierProprio as select p.dateAcquis , p.idObjet,quantite ,idMembre from Proprio p ,changeProprio t where p.dateAcquis = t.dateAcquis and p.idObjet = t.idObjet;

-- objet

create or replace view DetailObjets as
select * from DernierProprio dp ,Membres m ,Objets o,prix pr
where dp.idMembre = m.idMembre 
and dp.idObjet = o.idObjet
and pr.idObjet = o.idObjet 
and pr.idMembre = dp.idMembre
and dp.idMembre != %s ;

-- un objet
select * from Proprio p ,Membres m ,Objets o,prix pr
where p.idMembre = m.idMembre 
and p.idObjet = o.idObjet
and pr.idObjet = o.idObjet and pr.idMembre = p.idMembre
and m.idMembre = ( SELECT idMembre FROM Proprio WHERE idObjet = 1 order by dateAcquis desc LIMIT 1 ) ;

left JOIN Membres m ON o.id m

SELECT * FROM Membres m WHERE idMembre = ( SELECT idMembre FROM Proprio WHERE idObjet = %s order by dateAcquis desc LIMIT 1 ) 


ORDER BY DateHeurePublication DESC




 SELECT * FROM Objets WHERE idObjet = %s  


 SELECT m.prenom,o.titre,l.class from DernierProprio dp ,Membres m ,Objets o,Prix pr,Likes l 
where dp.idMembre = m.idMembre 
and dp.idObjet = o.idObjet
and pr.idObjet = o.idObjet 
and pr.idMembre = dp.idMembre
and l.idMembre = dp.idMembre 
and dp.idMembre != 1 
ORDER BY dp.dateAcquis DESC;

SELECT * from DernierProprio dp ,Membres m ,Objets o,prix pr
where dp.idMembre = m.idMembre 
and dp.idObjet = o.idObjet
and pr.idObjet = o.idObjet 
and pr.idMembre = dp.idMembre 
and dp.idMembre != 1 
ORDER BY dp.dateAcquis DESC 


select 
o.idObjet,o.idCategorie,o.DateHeurePublication,o.titre,o.descri,o.photo,
dp.idMembre,dp.dateAcquis,dp.quantite,
m.nom,m.prenom,m.dateNaissance,m.genre,m.email,m.photo,m.isAdmin,
pr.prix,pr.datePose,
l.dateLike,l.dislike,l.class
from Objets o  
join DernierProprio dp on dp.idObjet = o.idObjet
join Membres m on dp.idMembre = m.idMembre
join Prix pr on ( pr.idObjet = o.idObjet and pr.idMembre = dp.idMembre)
left join Likes l on (o.idObjet = l.idObjet and  o.idObjet = l.idObjet);

select 
o.idObjet,dp.idMembre,m.prenom,l.dateLike,NVL(l.dislike,-1,4),NVL(l.class,'df','rh' )
from Objets o  
join DernierProprio dp on dp.idObjet = o.idObjet
join Membres m on dp.idMembre = m.idMembre
join Prix pr on ( pr.idObjet = o.idObjet and pr.idMembre = dp.idMembre)
left join Likes l on (o.idObjet = l.idObjet and  o.idObjet = l.idObjet);

-- TOUS LES OBJETS
create or replace view allObjets as select 
o.idObjet,o.DateHeurePublication,o.titre,o.descri,o.photo,
p.idMembre,p.dateAcquis,p.quantite,
m.nom,m.prenom,m.dateNaissance,m.genre,m.email,m.isAdmin,
c.idCategorie,c.libele,
pr.prix,pr.datePose
from Proprio p 
join Objets o on p.idObjet = o.idObjet
join Membres m on p.idMembre = m.idMembre
join Categories c on o.idCategorie = c.idCategorie
join Prix pr on ( o.idObjet = pr.idObjet and p.idMembre = pr.idMembre);

l.dateLike,l.dislike,l.class

join Likes l on (o.idObjet = l.idObjet and m.idMembre = l.idMembre);

-- TOUS LES OBJETS MAIS GROUPER PAR SON PROPRIO ACTUEL
create or replace view rendue as select
dp.idObjet,DateHeurePublication,titre,descri,photo,
dp.idMembre,dp.dateAcquis,dp.quantite,
nom,prenom,dateNaissance,genre,email,isAdmin,pdp,
idCategorie,libele,
prix,datePose
from DernierProprio dp 
join allObjets a on (dp.idMembre = a.idMembre and dp.idObjet = a.idObjet);


-- AVEC MES LIKES
SELECT * from rendue r
left join likes l on r.idObjet = l.idObjet and l.idMembre = %s
where idMembre != %s 
and idCategorie = %s
ORDER BY dateAcquis DESC

-- LISTE DES DEMANDES D'ECHANGES
-- etat 
    
    -- -2 : refuser par membre 2
    -- -1 : annuler par membre 1
    -- 10 : en attente acceptation
    -- 20 : accepeter par membre 2

create or replace view Details_echanges as select e.*,de.idObjet1,de.idObjet2,de.quantite1,de.quantite2 from DetailEchanges de
join Echanges e on de.idEchange = e.idEchange
where e.dateAcceptation is  null and etat = 10 ;



create or replace view allObjets as select 
p.dateAcquis,p.quantite,o.*,m.*,c.libele,pr.prix,pr.datePose
from Proprio p 
join Objets o on p.idObjet = o.idObjet
join Membres m on p.idMembre = m.idMembre
join Categories c on o.idCategorie = c.idCategorie
join Prix pr on o.idObjet = pr.idObjet;


-- nombre de transactions
select *  from (
select count(idEchange) ,e.* as idMembre from echanges e group by idMembre1
union select count(idEchange) , idMembre2 as idMembre from echanges group by idMembre2
) as t;


