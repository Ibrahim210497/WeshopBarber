create function is_client(text,text) returns integer as
'
	declare f_email alias for $1;
	declare f_pass_clt alias for $2;
	declare  id integer;
	declare retour integer;
BEGIN
	select into id id_clt from client where email = f_email and pass_clt = f_pass_clt;
IF NOT FOUND
THEN 
		retour = 0;
		else
		retour = 1;
		END IF;
		return retour;
END;

'
language plpgsql;

select is_client('hambak@gmail.com','zerofaute');