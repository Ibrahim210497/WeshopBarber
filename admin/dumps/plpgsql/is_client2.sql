CREATE OR REPLACE FUNCTION public.is_client(IN text,IN text)
    RETURNS integer
    LANGUAGE 'plpgsql'
    VOLATILE
    PARALLEL UNSAFE
    COST 100
    
AS $BODY$
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
		retour = id;
		END IF;
		return retour;
END;

$BODY$;