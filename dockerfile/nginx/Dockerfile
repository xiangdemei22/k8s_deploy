FROM lnmp-image.tencentcloudcr.com/lnmp/centos7:v2
MAINTAINER xiangdemei

ADD /resource/nginx-1.18.0.tar.gz /usr/local/src

WORKDIR /usr/local/src/nginx-1.18.0

RUN ./configure --prefix=/usr/local/nginx --with-http_ssl_module \
    && make && make install

ENV PATH="${PATH}:/usr/local/nginx/sbin"

COPY config/nginx.conf /usr/local/nginx/conf/nginx.conf

RUN chmod 4755 /usr/local/nginx/sbin/nginx \
    && mkdir /usr/local/nginx/conf/vhost \
    && chmod -R 777 /usr/local/nginx/conf