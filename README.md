# 📰 Projeto Notícias – Laravel 11


Aplicação simples para **listagem** e **detalhe** de notícias, desenvolvida em **Laravel 11+**, com **SQLite**, **Seeder** (lendo um feed XML local) e interface responsiva com **Bootstrap 5**.

## ✅ Requisitos do teste atendidos

- [x] Laravel 11+
- [x] Routes
- [x] Migration
- [x] Controller
- [x] Model
- [x] Seeder
- [x] Views (Blade)
- [x] Listagem com paginação
- [x] Tela de detalhe

---

## 🧰 Tecnologias

- PHP 8.2+
- Laravel 11
- SQLite
- Blade
- Bootstrap 5
- Eloquent ORM

---

## 📌 Funcionalidades

### 1) Listagem de notícias
- Cards responsivos com:
  - Imagem (quando existir)
  - Título
  - Resumo
  - Link para detalhe
- Paginação com Bootstrap

### 2) Detalhe da notícia
- Exibe:
  - Título
  - Imagem (quando existir)
  - Texto completo
- Acesso por URL amigável (`slug`)

---

## 🗂️ Estrutura (principais arquivos)

- `routes/web.php` → rotas
- `app/Models/News.php` → model `News`
- `app/Http/Controllers/NewsController.php` → controller
- `database/migrations/*create_news_table.php` → migration
- `database/seeders/NewsSeeder.php` → seed via feed XML
- `resources/views/news/index.blade.php` → listagem
- `resources/views/news/show.blade.php` → detalhe
- `storage/app/feed/tecnologia.xml` → feed local (XML)

---

## ⚙️ Como rodar o projeto localmente

### 1) Clonar o repositório
```bash
git clone https://github.com/Davidmulder/noticias-laravel.git
cd noticias-laravel
2) Instalar dependências
composer install
3) Criar .env e gerar chave
cp .env.example .env
php artisan key:generate
4) Configurar SQLite
Crie o arquivo do banco:

Windows (PowerShell):

New-Item -ItemType File -Path database\database.sqlite -Force
Linux/Mac:

touch database/database.sqlite
No .env, ajuste:

DB_CONNECTION=sqlite
DB_DATABASE=database/database.sqlite
5) Rodar migrations
php artisan migrate
6) Rodar Seeder (importa até 10 notícias do XML)
php artisan db:seed --class=NewsSeeder
O seed:

lê storage/app/feed/tecnologia.xml

insere/atualiza notícias usando a URL como chave (evita duplicados)

gera resumo automaticamente

marca publicar = true

7) Subir servidor local
php artisan serve
Acesse:

Listagem: http://127.0.0.1:8000/

Detalhe: http://127.0.0.1:8000/noticia/{slug}

🌐 Rotas
GET / → listagem (paginada)

GET /noticia/{slug} → detalhe da notícia

🔐 Segurança (boas práticas do Laravel)
Este projeto usa recursos nativos do Laravel que já entregam uma boa base de segurança:

Eloquent ORM → ajuda a prevenir SQL Injection (queries parametrizadas)

Blade com escaping ({{ }}) → reduz risco de XSS

Route Model Binding / busca por slug

CSRF protection (caso existam forms com POST no futuro)

Observação: como o escopo do teste é leitura (listagem/detalhe), não há formulários críticos no fluxo principal.

🧯 Troubleshooting
Seeder não encontra o XML
Verifique se o arquivo existe em:
storage/app/feed/tecnologia.xml

E se o caminho do seeder está correto:

$path = storage_path('app/feed/tecnologia.xml');
Banco SQLite não funciona
Confirme no .env:

DB_CONNECTION=sqlite
DB_DATABASE=database/database.sqlite
📤 Entrega
Publicado no GitHub: (cole aqui o link do repositório)

Instruções completas de execução neste README
