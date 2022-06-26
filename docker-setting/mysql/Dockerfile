FROM mysql:8.0

ENV MYSQL_DATABASE=tale-task \
    MYSQL_USER=tale-task_user \
    MYSQL_PASSWORD=tale-task_pass \
    MYSQL_ROOT_PASSWORD=root \
    TZ=Asia/Tokyo

COPY ./my.cnf /etc/my.cnf
RUN chmod 644 /etc/my.cnf