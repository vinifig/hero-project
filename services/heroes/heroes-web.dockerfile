FROM nginx:1.10

ADD heroes-vhost.conf /etc/nginx/conf.d/default.conf