# API Laravel 10 - Teste Técnico  Projeto Teste UEFS.

## Instalação

 1. Configuração de ambiente.

 - Sistema Operacional deve ter instalado o PHP na versão ^8.1.

2. Clone o repositório
   ```bash
   git clone https://github.com/Agostinhoneto/teste-uefs.git

 2.1 - execute o comando na pasta que clonou o projeto :  cd teste-uefs

 2.2 -  execute o comando: composer install

 2.3 -  execute o comando para alterar o arquivo : cp .env.example .env renomear para .env

 2.4 -  execute o comando : php artisan key:generate

3. **Configuração da Base de Dados:**
   - Instruções para configurar e migrar o banco de dados.

## Configuração da Base de Dados

3.1 - Configure o arquivo `.env` com as informações do banco de dados nesse caso usei o Mysql.

 - DB_CONNECTION=mysql
 - DB_HOST=127.0.0.1
 - DB_PORT=3306
 - DB_DATABASE=teste-uefs
 - DB_USERNAME=
 - DB_PASSWORD=

3.2 - execute o comando :  php artisan migrate.

3.3 - Para rodar os seeders de todas as tabelas : users ,posts,tags.
 php artisan db:seed

3.4 - Para rodar a aplicação exceute :  php artisan serve

### 5 - Endpoints
- para rodar os Endpoints eu utilizei a ferramenta Postman ou Insomnia.
---------------------------------------------------------------

Inicio

### `http://localhost:8000/api/` - para retornar que API está funcionando.

#######################################################################################################

Users
### `http://localhost:8000/api/users`

- **GET** :  `http://localhost:8000/api/users/index` - Obter a lista de todos os users.
- **POST**:  `http://localhost:8000/api/users/store` -  Inserir users.
- **GET** : `http://localhost:8000/api/users/show/{id}` - Obter um users.
- **PUT** : `http://localhost:8000/api/users/update/{id}` - Atualiza um users.
- **Delete** : `http://localhost:8000/api/users/destroy/{id}` - deleta um users.`

#######################################################################################################

### `http://localhost:8000/api/post`

Posts.
- **GET**: `http://localhost:8000/api/post/index` - listar Posts .
- **POST**: `http://localhost:8000/api/post/store` - Cadastrar Posts.
- **GET** : `http://localhost:8000/api/post/show/{id}` - Obter um Post.
- **PUT** : `http://localhost:8000/api/post/update/{id}` - Atualiza um Post.
- **Delete** : `http://localhost:8000/api/post/destroy/{id}` - deleta um Post.

Tags.
### `http://localhost:8000/api/tags`

- **GET**: `http://localhost:8000/api/tags/index` - listar tags .
- **POST**: `http://localhost:8000/api/tags/store` - Criar uma nova tags 
- **GET** : `http://localhost:8000/api/tags/show/{id}` - Obter um tags.
- **PUT** : `http://localhost:8000/api/tags/update/{id}` - Atualiza um tags.
- **Delete** : `http://localhost:8000/api/tags/destroy/{id}` - deleta um tags.
