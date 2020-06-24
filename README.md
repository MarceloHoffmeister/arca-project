## Descrição
Esse projeto foi criado apenas com a intenção de demonstrar algumas capacidades e passa longe de ser um sistema completo.

 - Linguagens utilizadas
	 - PHP (*backend*)
	 - Javascript (*frontend*)
- Frameworks utilizados:
	- Laravel (*backend*)
	- Vue CLI (*frontend*)
- Banco de dados utilizado:
	- PostgreSQL
- Patterns utilizados:
	- Factory
	- Service layer
	- Repository
	- Dependency injection

A estrutura de pastas desse projeto em Laravel foi alterada para um padrão *DDD-based*, baseado em domínios. Caso o projeto escale, sua estrutura de pastas não ficaria tão desorganizada haja visto que estão separados e por domínio e função e sua classes bases abstraídas como classes *support*.
Para desenvolvimento de todo projeto foi utilizado a técnica TDD com PHPUnit e seu *code coverage* pode ser visualizado em um dos passos do *step by step*.
Outra técnica utilizada foi a componentização para "montar" o *layout* do *frontend*

Porém há muito o que melhorar nesse projeto, como por exemplo:

- Exclusão dos *incidents*;
- *Logout* do sistema
- Melhoria das respostas em tela;
- Validação dos formulários no frontend;
- Melhoria nas respostas das rotas;
- Tratamento de excessões;
- *Middlewares* com/e/ou autenticação;
- Configurações de CORS;
- Melhoria nos testes;
... e tantas outras coisas que eu nem devo saber!

## Step By Step
Para deixar o repositório pronto para uso execute os seguintes passos:

 1. Clone o repositório no [Github](https://github.com/MarceloHoffmeister/arca-project) ou utilizando esse [link](https://github.com/MarceloHoffmeister/arca-project.git)
 
> git clone https://github.com/MarceloHoffmeister/arca-project.git

 2. Para que tudo funcione corretamente, necessitará de um banco de dados *PostgreSQL*. Haverá a necessidade de duas base de dados, **arca** e **testing**, uma para o *CRUD* do sistema e outra para teste, como sugere o nome. Crie-as.
 3. Crie uma arquivo *.env* e configure as entradas de acesso ao seu BD local. Lembrando que o banco de dados deve ser *PostgreSQL*.
 4. Após isso gere a chave da aplicação com o comando:

> php artisan key:generate
 
 5. Para baixar as dependências necessárias do *Laravel framework*, invoque o instalador do *composer*. Para isso execute o comando na raíz do projeto:
 
> composer install

 6. Para carregar as tabelas na base da dados, execute as *migrations*. Para tal execute o comando:

> php artisan migrate:fresh --path=app/Domains/Ocurrence/Database/Migrations

**Obs.: é de suma importância que acrescente o atributo *path* ao comando do *migrate*, pois os arquivos que são buscados não se encontram em seu diretório padrão.**

 7. Esse sistema utiliza uma função padrão do *PostgreSQL* para gerar *ID's* no formato *UUID*. Porém essa função não é nativa, para incluir execute os seguintes comandos, necessariamente nessa ordem:
 
> CREATE EXTENSION IF NOT EXISTS "uuid-ossp";
> ALTER TABLE public.companies ALTER COLUMN company_id SET DEFAULT uuid_generate_v4();
> ALTER TABLE public.incidents  ALTER COLUMN incident_id SET DEFAULT uuid_generate_v4();

 9. Para os arquivos de *frontend* deve-se entrar na pasta *client*, que se encontra na raíz do projeto e instalar as dependências, dessa vez pelo *NPM*. Para isso execute o comando: 

> npm install

9. Para gerar os *bundles* do *Vue CLI* execute o seguinte comando na mesma pasta:

> npm run build

 10. Com essas configuração, teoricamente, o sistema deve estar funcionando. Para iniciar o servidor local do *Laravel*, volte à pasta raíz do projeto e execute o comando:
 
> php artisan serve

 11. Caso queira visualizar o *code coverage* do projeto, deve-se editar um arquivo do *laravel/framework*. Os testes do *PHPUnit* estão configurados para montar uma base de dados idêntica à de produção, utilizando as *migrations* e na base de dados *testing*. Após o fim dos testes executa-se *rollback* em todo o banco de dados *testing* automaticamente. Para que isso ocorra edite as linhas **16** e **21** do arquivo *DatabaseMigrations*, localizado em *vendor/laravel/framework/src/Illuminate/Foundation/Testing/DatabaseMigrations.php*. As linhas se encontram assim em sua forma original:
 
 >$this->artisan('migrate:fresh');
> $this->artisan('migrate:rollback');

Deixe-as assim:

> $this->artisan('migrate:fresh --path=app/Domains/Ocurrence/Database/Migrations');
> $this->artisan('migrate:rollback --path=app/Domains/Ocurrence/Database/Migrations');

12. Agora basta executar:

> ./vendor/bin/phpunit

13. Para visualizar o *code coverage* gerado basta abrir em qualquer navegador o arquivo *index.html* contido em:

> public/phpunit/index.html

Enjoy!
