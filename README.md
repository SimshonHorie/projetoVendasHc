# projetoVendasHc

Primeiro passo clonar o projeto git clone https://github.com/SimshonHorie/projetoVendasHc.git

Alterar o .env, deixarei no meu github um arquivo criado.

Após isso terá de ter a versão 8 do php, para rodar o composer

Rodar o comando composer install, para instalar as dependências do sail

Feito isso rodar o ./vendor/bin/sail up -d, para subir os containers

Feito isso o projeto já estará rodando na porta 9000, localhost:9000/login

Terá que rodar o comando ./vendor/bin/sail npm run dev, para ativar o Vite para puxar as extensões js e css

Após isso é só realizar um cadastro e fazer o login

As tabelas são populadas através das migrations.