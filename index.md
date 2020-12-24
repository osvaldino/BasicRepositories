## 💻 Projeto

API REST.
Gerenciamento onde seja possível Criar, Listar, Editar, Visualizar e Remover.<br>
Optei por usar Repository Pattern, de forma bem simplificada.<br>
Utilizei a versão 8.x do Laravel.<br>
A API consiste no gerenciamento de dados relacionados a Categorias.<br>
Não possui validações de forma mais detalhada, apenas no campo name.

### Instalação do projeto

```
git clone https://github.com/osvaldino/BasicRepositories.git
```

Acesse a pasta

```
cd BasicRepositories
```

Faça a instalação das dependências através do composer:

```
composer install
```

Faça uma cópia do seu arquivo .env:

```
cp .env.example .env
```

Configure suas variáveis de ambiente para seu banco de dados:

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=database
DB_USERNAME=root
DB_PASSWORD=
```

Gere uma nova chave para APP_KEY:

```
php artisan key:generate
```

Gere uma nova chave para JWT_SECRET:

```
php artisan jwt:secret
```

Se necessário, dê as permissões necessárias para permitir a escrita nas seguintes pastas:

```storage``` e ```bootstrap```

Exemplo:

```
chmod -R 775 storage
```

```
chmod -R 775 bootstrap
```

Após a criação do banco de dados que será utilizado na aplicação e setá-lo no .env como descrito acima, execute o seguinte comando para a criação das tabelas através das migrations:

```
php artisan migrate
```

Para executar o projeto execute:

```
php artisan serve
```

---
Feito com ♥ by Osvaldino Neto
