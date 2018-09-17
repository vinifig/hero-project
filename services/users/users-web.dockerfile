FROM nginx:1.10

ADD users-vhost.conf /etc/nginx/conf.d/default.conf