FROM lnmp-image.tencentcloudcr.com/lnmp/centos7:v2
MAINTAINER xiangdemei

# 安装必要包
RUN yum makecache && yum -y install libxml2 libxml2-devel bzip2 bzip2-devel libjpeg-turbo libjpeg-turbo-devel \
    libpng libpng-devel freetype freetype-devel zlib zlib-devel libcurl libcurl-devel \
    libmcrypt libmcrypt-devel sqlite-devel \
    https://rpms.remirepo.net/enterprise/7/remi/x86_64/oniguruma5php-6.9.5+rev1-2.el7.remi.x86_64.rpm \
    https://rpms.remirepo.net/enterprise/7/remi/x86_64/oniguruma5php-devel-6.9.5+rev1-2.el7.remi.x86_64.rpm \
    # 清理缓存
    && yum clean all && rm -rf /var/cache/yum

ADD /resource/php-7.4.11.tar.gz /usr/local/src

WORKDIR /usr/local/src/php-7.4.11

RUN ./configure --prefix=/usr/local/php --enable-fpm --with-mysqli --with-pdo-mysql --with-iconv --with-freetype-dir --with-jpeg-dir --with-png-dir --with-zlib --enable-xml --disable-rpath --enable-bcmath --enable-shmop --enable-sysvsem --enable-inline-optimization --with-curl --enable-mbregex --enable-mbstring --with-mcrypt --enable-ftp --with-gd --enable-gd-native-ttf --with-openssl --with-mhash --enable-pcntl --enable-sockets --with-xmlrpc --enable-zip --without-pear --enable-maintainer-zts  && make && make install

COPY config/php.ini /usr/local/php/lib/php.ini
COPY config/php-fpm.conf /usr/local/php/etc/php-fpm.conf
COPY config/www.conf /usr/local/php/etc/php-fpm.d/www.conf

#composer
WORKDIR /home/work
COPY resource/composer /usr/local/bin
COPY --chown=work:work config/composer-config.json .composer/config.json

RUN chmod 755 /usr/local/bin/composer

ENV PATH="${PATH}:/usr/local/php/bin:/usr/local/php/sbin"