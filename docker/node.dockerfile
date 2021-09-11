FROM node:14-alpine

WORKDIR /usr/src/app

COPY vite/package*.json vite/yarn.lock ./

RUN yarn install

COPY . .

EXPOSE 3000

CMD [ "yarn", "dev" ]
