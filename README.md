# Docker

## Configuracoes iniciais

- Requisitos: Docker e Docker Compose
- Baixar configuracao do ambiente: 
- Ajustar paths no docker-compose.yml
- Adicionar api.teste.local ao seu arquivo hosts, com o ip do Docker

# Projeto User API

## Configuracoes Iniciais

- Requisitos: composer
- Na pasta raiz do projeto, executar o comando composer install
- Se nao existir, criar arquivo .env
- Se nao existir, gerar app key com o comando php artisan key:generate e inseri-la no .env na variavel APP_KEY
- Ajustar configuracoes de bancos de dados do arquivo .env com as senhas existentes no docker-compose.yml do Docker
- Executar o comando php artisan migrate:fresh para que as tabelas sejam criadas apropriadamente

## Rotas disponiveis

- GET      | api/user     | Retornas informacoes de um usuario. Parametro obrigatorio: user_id
- POST     | api/user     | Cria um novo usuario. Parametro obrigatorio: name,email,password
- PUT      | api/user     | Atualiza informacoes de um usuario. Parametro obrigatorio: user_id
- DELETE   | api/user     | Remove um usuario do sistema. Parametro obrigatorio: user_id

## Testes

- Para executar os testes, basta executar o seguinte comando no terminal, dentro da pasta raiz do projeto: vendor/bin/phpunit