alter table client add matricule text;
update client set matricule ='1E9X' where id_clt = 1;
update client set matricule ='2WZ7' where id_clt = 2;
select * from client order by id_clt;