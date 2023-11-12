# docker/apache/Dockerfile
FROM httpd:2.4.51

COPY locatrack.apache.conf /usr/local/apache2/conf/locatrack.apache.conf

RUN echo "Include /usr/local/apache2/conf/locatrack.apache.conf" \
    >> /usr/local/apache2/conf/httpd.conf
