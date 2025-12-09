# Build stage
FROM node:20-alpine AS builder

WORKDIR /app
COPY package*.json ./
FROM node:20-alpine AS builder

WORKDIR /app

COPY package*.json ./
RUN npm ci

COPY . .

RUN npm run build -- --configuration=production

FROM node:20-alpine AS builder

WORKDIR /app

COPY package*.json ./
RUN npm ci

COPY . .

RUN npm run build -- --configuration=production

# Verificar archivos generados
RUN ls -la dist/happy-client/browser/

FROM nginx:alpine

RUN rm -rf /usr/share/nginx/html/*
RUN rm -f /etc/nginx/conf.d/default.conf

# Con SSR deshabilitado, los archivos estarán aquí:
COPY --from=builder /app/dist/happy-client/browser /usr/share/nginx/html

COPY nginx.conf /etc/nginx/conf.d/default.conf

# Verificar
RUN ls -la /usr/share/nginx/html/

EXPOSE 80

CMD ["nginx", "-g", "daemon off;"]