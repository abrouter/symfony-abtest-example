FROM webdevops/php-nginx:8.0 as abr-symfony-client

COPY . /app

RUN mkdir -p /entrypoint.d \
    && cp -R /app/docker/provision/entrypoint.d/* /entrypoint.d/ \
    && cp -R /app/docker/config/supervisor/conf.d/* /opt/docker/etc/supervisor.d/ \
    && mkdir -p /opt/docker/etc/php/7.1/conf.d \
    && cp /app/docker/config/php/app.ini /opt/docker/etc/php/7.1/conf.d/app.ini \
    && cp /app/docker/config/nginx/sites-enabled/app1.conf /opt/docker/etc/nginx/vhost.conf \
    && cp  /app/docker/config/php/fpm/application.conf /opt/docker/etc/php/fpm/pool.d/application.conf

EXPOSE 80

WORKDIR /app
