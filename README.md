# 🚗 Maquine Auto Center - API (MVP)

Este projeto é um **MVP (Minimum Viable Product)** desenvolvido para a **Maquiné Auto Center**, com o objetivo de fornecer uma base sólida para um sistema de gestão de mecânica.

A aplicação foi construída utilizando **Laravel** e containerizada com **Docker**, utilizando **PostgreSQL** como banco de dados.

---

# 📌 Objetivo do Projeto

Este projeto representa a primeira versão funcional (**MVP**) de um sistema para:

* Gerenciamento de clientes
* Organização de serviços automotivos
* Estrutura para futuras integrações (BI, front-end, etc.)
* Base para evolução do sistema completo da empresa

---

# 🛠️ Tecnologias Utilizadas

* PHP 8.3
* Laravel (API)
* Docker + Docker Compose
* PostgreSQL
* Nginx

---

# ⚙️ Pré-requisitos

Antes de rodar o projeto, você precisa ter instalado:

## 🐳 Docker

* Docker Engine
* Docker Compose

## 💻 Ambiente

* Linux ou WSL (Windows Subsystem for Linux)
* Git
* Composer (opcional, pois usamos dentro do container)

---

# 🐧 Instalando no WSL (Windows)

## 1. Instalar WSL

No PowerShell (como administrador):

```bash
wsl --install
```

---

## 2. Instalar Ubuntu

Após reiniciar, escolha Ubuntu e crie seu usuário.

---

## 3. Instalar Docker Desktop (Windows)

* Baixe e instale o Docker Desktop
* Vá em:

  * Settings → Resources → WSL Integration
* Ative sua distro (Ubuntu)

---

## 4. Testar Docker no WSL

```bash
docker ps
```

Se aparecer erro de permissão:

```bash
sudo usermod -aG docker $USER
newgrp docker
```

---

# 🚀 Como rodar o projeto

## 1. Clonar o repositório

```bash
git clone <url-do-repo>
cd maquine-auto-center
```

---

## 2. Subir os containers

```bash
docker-compose up -d --build
```

---

## 3. Configurar o ambiente

Copie o `.env`:

```bash
cp .env.example .env
```

---

## 4. Configurar banco de dados no `.env`

```env
DB_CONNECTION=pgsql
DB_HOST=db
DB_PORT=5432
DB_DATABASE=laravel
DB_USERNAME=laravel
DB_PASSWORD=secret
```

---

## 5. Gerar chave da aplicação

```bash
docker exec -it laravel_app php artisan key:generate
```

---

## 6. Rodar migrations

```bash
docker exec -it laravel_app php artisan migrate
```

---

## 7. Acessar o projeto

Abra no navegador:

```
http://localhost:8000
```

---

# 🔌 Testando a API

Exemplo de rota de teste:

```
GET http://localhost:8000/api/teste
```

Resposta esperada:

```json
{
  "status": true,
  "msg": "API funcionando 🚀"
}
```

---

# 🧪 Comandos úteis

## Ver containers rodando

```bash
docker ps
```

## Entrar no container

```bash
docker exec -it laravel_app bash
```

## Parar containers

```bash
docker-compose down
```

## Limpar cache Laravel

```bash
php artisan optimize:clear
```

---

# ⚠️ Problemas comuns e soluções

## ❌ Erro: Permission denied (Docker)

```bash
permission denied while trying to connect to the Docker daemon
```

### ✔️ Solução:

```bash
sudo usermod -aG docker $USER
newgrp docker
```

---

## ❌ Erro: PHP versão incompatível

```bash
requires php ^8.3
```

### ✔️ Solução:

Atualizar o `Dockerfile` para:

```dockerfile
FROM php:8.3-fpm
```

---

## ❌ Erro: 404 nas rotas da API

### ✔️ Verifique:

* Se está acessando com `/api`
* Se o `api.php` está registrado no `bootstrap/app.php`
* Se o Nginx aponta para `/public`

---

## ❌ Erro: banco não conecta

### ✔️ Verifique:

```env
DB_HOST=db
```

⚠️ Nunca use `localhost` no Docker

---

## ❌ Warning: tempnam()

### ✔️ Solução:

```bash
chmod -R 777 storage bootstrap/cache
```

---

# 📂 Estrutura do Projeto

```
app/
routes/
docker/
├── nginx/
│   └── default.conf
Dockerfile
docker-compose.yml
```

---

# 🚀 Próximos Passos (Evolução do Projeto)

* Implementação de autenticação (JWT ou Sanctum)
* CRUD completo (clientes, serviços, veículos)
* Integração com frontend (React ou mobile)
* Dashboard com BI
* Deploy em produção

---

# 👨‍💻 Autor

Projeto desenvolvido como parte de evolução profissional em desenvolvimento backend e sistemas para gestão empresarial.

---

# 📄 Licença

Este projeto está sob a licença MIT.
