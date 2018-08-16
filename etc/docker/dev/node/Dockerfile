FROM node:10-alpine
MAINTAINER lordjancso <lordjancso@gmail.com>

RUN apk update \
    && apk upgrade \
    && apk --no-cache add git g++ gcc libgcc libstdc++ linux-headers make python

ENV SASS_BINARY_PATH=/usr/lib/node_modules/node-sass/build/Release/binding.node
RUN git clone --recursive https://github.com/sass/node-sass.git \
    && cd node-sass \
    && git submodule update --init --recursive \
    && npm install \
    && node scripts/build -f \
    && cd ../ \
    && rm -rf node-sass

RUN apk --no-cache add curl tar \
    && mkdir /tmp/phantomjs \
    && curl -L https://bitbucket.org/ariya/phantomjs/downloads/phantomjs-2.1.1-linux-x86_64.tar.bz2 \
        | tar -xj --strip-components=1 -C /tmp/phantomjs \
    && cd /tmp/phantomjs \
    && mv bin/phantomjs /usr/local/bin \
    && cd \
    && rm -rf /tmp/*

RUN yarn global add jscs foundation-cli

WORKDIR /app
