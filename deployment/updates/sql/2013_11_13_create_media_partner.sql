
INSERT INTO partner (id, prefix, partner_name, admin_secret, description, STATUS) 
VALUES (-5, '-5', 'Media', MD5(CONV(SUBSTRING(RAND(), 3), 10, 36)), 'Media Server', 1);