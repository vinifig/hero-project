FROM node:alpine

RUN npm install

RUN npm install -g nodemon

CMD nodemon .