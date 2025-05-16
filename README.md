<h1 align="center">Catálogo de Filmes</h1>

## 🔖 Sobre

Catálogo de filmes com possibilidade de marcar e desmarcar favoritos, listar filmes e filtrar os favoritos por gênero.

## 🚀 Tecnologias utilizadas

O projeto foi desenvolvido utilizando as seguintes tecnologias:

<ul>
    <li>
        <a href="https://laravel.com/docs/12.x">Laravel</a>
    </li>
    <li>
        <a href="https://vuejs.org/guide/introduction.html">Vue 3</a>
    </li>
    <li>
        <a href="https://tailwindcss.com/docs/installation/using-vite">Tailwind CSS</a>
    </li>
    <li>
        MySQL
    </li>
    <li>
        <a href="https://developer.themoviedb.org/reference/intro/getting-started">API pública do The Movie Database (TMDB)</a>
    </li>
</ul>

## 🔑 Como obter a chave da API do TMDB

Para que o projeto funcione corretamente, é necessário obter uma chave da API pública do TMDB:

1. Acesse o site oficial: [https://www.themoviedb.org/](https://www.themoviedb.org/)
2. Crie uma conta ou faça login
3. Acesse [https://www.themoviedb.org/settings/api](https://www.themoviedb.org/settings/api)
4. Preencha os dados solicitados no formulário de solicitação da API
5. Após a aprovação, você verá a **API Key (v3 auth)**. Copie essa chave.
6. Adicione a chave no `index()` e no `searchMovie` do `MovieController.php` da API Laravel:
   ```env
   'api_key' => '84653e4663ec36cd834823697dcc42ee',
   ```

## 💻 Como compilar o projeto

### GitHub

```bash
# Clone o projeto
git clone https://github.com/DudaFranca/catalogoFilmes.git

# Entre no diretório
cd catalogoFilmes

```

### Laravel

```bash
# Acesse a pasta do back-end
$ cd api_tmdb

# Instale as dependências
$ composer install

# Configure o arquivo .env (exemplo)
DB_DATABASE=catalogofilmes

# Execute as migrations
$ php artisan migrate

# Inicie o servidor
$ php artisan serve
```

### Vue.js

```bash
# Acesse a pasta do front-end
$ cd front_tmdb

# Instale as dependências
$ npm install

# Inicie o projeto
$ npm run dev
```

## 💻 Como testar

<ul>
    <li>
        Ao acessar a tela, os filmes devem ser exibidos automaticamente.
    </li>
    <li>
        Ao clicar no ícone de coração, ele deve ser preenchido completamente na cor roxa, e o filme selecionado deve ser salvo no banco de dados como favorito.
    </li>
    <li>
        Ao clicar em "Favoritos", devem ser exibidos apenas os filmes marcados como favoritos.
    </li>
    <li>
        Ao utilizar o filtro de gênero, devem aparecer apenas os filmes do gênero selecionado.
    </li>
    <li>
        Ao utilizar o campo de busca, a tela deve ser atualizada e exibir apenas os filmes que contenham a palavra digitada.
    </li>
</ul>
