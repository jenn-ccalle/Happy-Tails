# Etapa 1: Build de Angular
FROM node:18-alpine AS build

WORKDIR /app

# Copiar package.json y package-lock.json
COPY package*.json ./

# Instalar dependencias
RUN npm ci

# Copiar el código fuente
COPY . .

# Build de producción de Angular
RUN npm run build -- --configuration production

# Etapa 2: Servir con Nginx
FROM nginx:1.29.3-alpine

# Copiar los archivos compilados de Angular desde la etapa de build
COPY --from=build /app/dist/Happy-Client /usr/share/nginx/html

# Copiar configuración personalizada de Nginx
COPY nginx.conf /etc/nginx/conf.d/default.conf

# Exponer el puerto 80
EXPOSE 80

# Comando para iniciar Nginx
CMD ["nginx", "-g", "daemon off;"]