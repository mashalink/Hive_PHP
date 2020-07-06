INSERT INTO db_mlink.ft_table(login, `group`, creation_date)
SELECT last_name, 'other', birthdate
FROM db_mlink.user_card
WHERE
	(length(last_name) < 9) AND
	(last_name LIKE '%a%')
ORDER BY last_name ASC
LIMIT 10;