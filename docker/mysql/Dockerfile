FROM mysql:5.7

CMD [ "--innodb-use-native-aio=0" ]

COPY setupp.sql /docker-entrypoint-initdb.d/