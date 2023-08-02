## Api em Laravel Sail com autenticação JWT.

Este projeto é uma API construída em Laravel, que permite a criação, leitura, atualização e exclusão de recursos.

## Instalação
Obrigatório: Docker

Para instalar e executar este projeto, siga os seguintes passos:

Clone o repositório:
```terminal
git clone https://github.com/jadyelsousa/laravel-sail-api.git
```
Entre na pasta do projeto:
```terminal
cd laravel-sail-api
```
Crie um arquivo .env com as configurações do seu ambiente. Você pode copiar o arquivo .env.example e configurar as variáveis de ambiente de acordo com seu ambiente:
```terminal
cp .env.example .env
```
Para instalar as dependências, você pode executar o comando abaixo dentro do terminal, este comando usa um pequeno contêiner Docker contendo PHP e Composer para instalar as dependências:
```terminal
docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v "$(pwd):/var/www/html" \
    -w /var/www/html \
    laravelsail/php82-composer:latest \
    composer install --ignore-platform-reqs
```
Inicie o container docker do laravel com o comando:
```terminal
./vendor/bin/sail up -d
```
Gere uma chave para a aplicação:
```terminal
./vendor/bin/sail artisan key:generate
```
Gere uma chave da autenticação JWT com o comando:
```terminal
./vendor/bin/sail artisan jwt:secret
``` 
Execute as migrações e popule o banco de dados:
```terminal
./vendor/bin/sail artisan migrate --seed
```
O servidor de desenvolvimento estará disponível em http://localhost.

### Utilização
A API possui os seguintes endpoints:

* `POST api/login`, para fazer o login e pegar seu token de acesso;
* `GET api/user`, para pegar o objeto do usuário autenticado;
* `POST api/logout`, para desconectar o usuário invalidando o token passado;
* `GET api/cidades`, lista as cidades cadastradas;
* `GET api/cidades/{id_cidade}/medicos` lista os médicos de uma determinada cidade;
* `GET api/medicos`, lista os médicos cadastrados;
* `POST api/medicos`, cria um novo registro de médico no sistema;
* `POST api/medicos/{id_medico}/pacientes`, Vincula uma paciente a um médico;
* `GET api/medicos/{id_medico}/pacientes`, Retorna os pacientes de um determinado médico;
* `POST api/pacientes`, cria um novo paciente no sistema;
* `PUT api/pacientes/{id_paciente}`, para atualizar um paciente específico;

### Licença
Este projeto é licenciado sob a Licença MIT. Veja o arquivo LICENSE para mais detalhes.
