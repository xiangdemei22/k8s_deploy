FROM centos:7
MAINTAINER xiangdemei

RUN /bin/cp /usr/share/zoneinfo/Asia/Shanghai /etc/localtime -R

RUN \
    #设置镜像源
    curl -o /etc/yum.repos.d/CentOS-Base.repo https://mirrors.aliyun.com/repo/Centos-7.repo \
    && curl -o /etc/yum.repos.d/epel.repo http://mirrors.aliyun.com/repo/epel-7.repo \
    # 安装公用的包
    && yum install -y wget gcc gcc-c++ make autoconf openssl openssl-devel \
       libxslt-devel gd gd-devel GeoIP GeoIP-devel pcre-devel libxslt-devel \
       net-tools telnet lsof bind-utils sudo vim less \
    # 清理缓存,减少镜像体积
    && yum clean all && rm -rf /var/cache/yum

RUN useradd -d /home/work -m -s /bin/bash work && echo "work ALL=(ALL) NOPASSWD:ALL" >> /etc/sudoers

RUN touch /home/work/v1.log && echo "done" >> /home/work/v1.log