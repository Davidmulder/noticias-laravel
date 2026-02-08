# 📰 Projeto Notícias – Laravel 11



- 📋 **Listagem de notícias**
- 📰 **Detalhe da notícia**

O projeto utiliza **SQLite** como banco de dados, **Seeder** para popular dados reais a partir de um feed XML e **Bootstrap** para layout responsivo no front-end.

---

## 🚀 Tecnologias Utilizadas

- **PHP 8.2+**
- **Laravel 11**
- **SQLite**
- **Blade**
- **Bootstrap 5**
- **Eloquent ORM**
- **Migrations, Seeders, Controllers, Models e Routes**

---

## 📂 Estrutura Funcional

- `routes/web.php` → rotas da aplicação
- `app/Models/News.php` → model da notícia
- `app/Http/Controllers/NewsController.php` → controller
- `database/migrations` → estrutura da tabela `news`
- `database/seeders/NewsSeeder.php` → seed com feed XML
- `resources/views/news` → views (listagem e detalhe)
- `storage/app/feed/tecnologia.xml` → feed local de notícias

---

## 🗄️ Banco de Dados

O projeto utiliza **SQLite** para facilitar a execução local.

Arquivo do banco:
```bash
database/database.sqlite


⚙️ Instalação do Projeto
1️⃣ Clonar o repositório
git clone https://seu-repositorio.git
cd noticias-laravel

2️⃣ Instalar dependências
composer install

3️⃣ Criar arquivo de ambiente
cp .env.example .env
php artisan key:generate

4️⃣ Criar banco SQLite
touch database/database.sqlite

5️⃣ Rodar migrations
php artisan migrate

🌱 Popular o Banco (Seeder)

O projeto usa um Seeder que lê um arquivo XML de feed de notícias, simulando dados reais.

Execute:

php artisan db:seed --class=NewsSeeder


✔️ O seeder:

Lê até 10 notícias

Evita duplicação por URL

Gera resumo automaticamente

Marca notícias como publicadas

🌐 Rotas da Aplicação
GET /              → Listagem de notícias
GET /noticia/{slug} → Detalhe da notícia

🖥️ Interface (Front-end)

Desenvolvida com Bootstrap 5

Totalmente responsiva

Listagem com:

Card de notícia

Imagem

Título

Resumo

Paginação

Página de detalhe com:

Título

Imagem

Texto completo

🔐 Segurança

O projeto segue as boas práticas padrão do Laravel:

✔️ Eloquent ORM (proteção automática contra SQL Injection)

✔️ Blade com escaping automático ({{ }})

✔️ Route Model Binding

✔️ CSRF Protection (nativo)

✔️ Nenhum SQL bruto (DB::raw) foi utilizado

▶️ Executar o Projeto
php artisan serve
