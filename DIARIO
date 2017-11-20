Teste de Programação

Considerações:

20/11 02:58 -> 

Foi muito legal fazer este teste. É a primeira fez que faço um teste de programação deste tipo.
Escolhi o framework CakePHP pois acreditei que ele pudesse facilitar o desenvolvimento ao entregar funções básicas de um sistema web já prontas e porque a linguagem que mais utilizo atualmente para back-end é o PHP, apesar de nunca tê-lo utilizado.
O código que entrego tem bastante coisa feita automaticamente pelo "cake bake" (similar ao "rails generate" do Ruby on Rails) e uns copypasta aqui e ali de diversos tutoriais e "stackoverflows" que li. Foquei em entregar as funcionalidades pedidas e não em criar algo do zero completamente meu, até porque acho isso desnecessário, obviamente dependendo do contexto.
Meu maior desafio foi aprender como funciona o CakePHP, suas regras e abstrações (que são muitas!) e o Elastic Search, este que não consegui implementar no sistema.
Devem haver vários bugs, nem realizei testes corretamente, além de falhas de segurança como XSS, CSRF, SQL Injection, etc. E também tem bastante coisa hard-coded que não deveria estar do jeito que está.
Com (muito) mais tempo eu refaria o front-end, implementaria algumas requisições async para melhorar a UX, implementaria as ferramentas de segurança do CakePHP, colocaria data para entrega da tarefa nas tarefas, um sistema de avisos (tanto por e-mail quanto por push) e, claro, o Elastic Search.

Abaixo o Diário com as informações requisitadas, alguns bugs que encontrei e as instruções para a instalação local do sistema (em um Windows).

-x-

Parte 1 - CRUD

Tempo Inicio: 18/11 12:00
Tempo Fim: 18/11 17:30
Tempo Real: 4h

Como uso diariamente o PHP em meu trabalho atual, resolvi utilizar o CakePHP neste teste. Além de ser um framework robusto e confiável, vai ajudar na resolução dos problemas e das necessidades apresentadas, agilizando o processo já que não terei que ficar "reinventando a roda". O CakePHP também é similar ao Ruby on Rails, um framework que utilizei por pouco tempo em um projeto de Ruby.
Noto que é a primeira vez que uso o CakePHP.

Demorei 4h nesta tarefa. Apesar da simplicidade tive que aprender a trabalhar com o CakePHP, que nunca usei antes. Apesar da dificuldade neste quesito, acredito que o framework deva me ajudar bastante nas próximas partes, principalmente por conta de seus plugins. Além disso uma task já possuí descrição, data de criação, data de modificação, dentre outros dados.

99% do código até agora foi baseado no tutorial de CakePHP disponível em https://book.cakephp.org/3.0/en/tutorials-and-examples/blog/blog.html.


Parte 2 - Login​ ​Autenticado​ ​com​ ​o​ ​Google

Tempo Inicio: 18/11 18:00
Tempo Fim: 19/11 00:22
Tempo Real: 4h

Fazer a autenticação com o Google demorou 30min utilizando um plugin de social login para CakePHP. O que demorou aqui mesmo foi criar todo o sistema de MVC para Users e o sistema básico de autenticação.
O sistema também possuí um sistema de Categorias para as Tarefas.


Parte 3 e 4 - Tasks​ ​Mais​ ​Complexas

Tempo Inicio: 19/11 00:50
Tempo Fim: 19:11 17:31
Tempo Real: 6h

Acabei por mesclar o desenvolvimento da parte 3 e 4. A parte 4 em sim demorou quase 1 hora pois não consegui criar a relação entre uma Tarefa e um Usuário seguindo as normas do CakePHP.
Demorei na implementação do plugin de upload, a documentação do mesmo está desatualizada. Nesta parte também acabei gastando tempo com detalhes de estruturação e apresentação das páginas.


Parte 5 - Suporte​ ​Robusto​ ​para​ ​Anexos​ ​+​ ​Busca

Tempo Inicio: 19/11 18:10
Tempo Fim: 19/11 01:53
Tempo Real: 7h

Consegui criar um worker para realizar em background o upload de arquivos em um bucket da AWS S3. Infelizmente não consegui integrar o elasticsearch no sistema de modo algum, precisaria estudar mais o ElasticSearch em si, outra tecnologia que nunca lidei, e o CakePHP para conseguir completar esta feature com sucesso.

-x-

Bugs não resolvidos (que eu notei, deve haver outros):
A - Sistema não aceita upload de arquivos sem extensão. Provavelmente por conta de nome ser interpretado como 'path' ao invés de um 'filename', ex:
	* arquivo: teste.pdf -> www.exemplo.com.br/teste.pdf -> um arquivo *.pdf
	* arquivo: teste -> www.exemplo.com.br/teste -> um arquivo ou uma url?!

	** Possíveis soluções:
	1 - Impedir upload de arquivos sem extensão.
	2 - Inserir extenão padrão no arquivo, como *.txt, antes do upload.
	3 - Pedir para nenhum colaborador fazer upload com arquivo sem extensão.

	A melhor possível solução que pensei é a 1. Não faz sentido os colaboradores da empresa ficarem subindo arquivos sem extensão alguma. A 3 é uma solução placeholder que fica até a 1 estar no ar. A 2 não é muito boa, inserir uma extensão *.txt poderia corromper o arquivo/dados originais.

B - O sistema permite criar uma tarefa sem nenhuma categoria associada. Isso fará que ela nunca apareça na listagem de tarefas, apesar de estar no banco de dados.
	** Possíveis soluções:
	1 - Impedir criação da tarefa sem ter categoria associada.
	2 - Pedir para nenhum colaborador criar uma tarefa sem categoria.

	Aqui o ideal era que esse bug nem existisse mesmo. Deve ser bem simples resolver isso, mas como estou aprendendo o CakePHP enquanto realizo este teste, a solução não está "clara" para mim. Sendo assim, os passos de possível solução do bug A devem ser seguidos igualmente para o bug B.


-x-

Deploy Local em Windows

- Instalar XAMPP (Apache, MySQL e PHP) em C:\

- Instalar Composer (adicionar Composer ao PATH)

- Instalar Git

- Adicionar os seguintes diretórios em PATH do ambiente:
	C:\xampp\mysql\bin;
	C:\xampp\php;

- Em C:\xampp\apache\conf\extra\ no arquivo "httpd-vhosts.conf" colocar:
	<VirtualHost *:80>
	    DocumentRoot "C:/xampp/htdocs/taskvoxus/"
	    ServerName taskvoxus.com
	</VirtualHost>

- No arquivo "hosts" do Windows (geralmente em C:\Windows\System32\drivers\etc) colocar:
	127.0.0.1 taskvoxus.com

- EM C:\xampp\php no arquivo "php.ini" descomentar (tirar o ;) de:
	extension=php_intl.dll

- Ligar Apache e MySQL no XAMPP

- Criar banco "taskvoxus" no MySQL, certificar que o usuário "root" está sem senha, utf8mb4 / utf8mb4_general_ci

- Em C:\xampp\htdocs clonar o repositório em "taskvoxus":
	git clone https://github.com/smacabra/taskvoxus.git

- Adicionar o seguinte diretório em PATH do ambiente:
	C:\xampp\htdocs\taskvoxus\bin

- Pelo prompt de comando, em C:\xampp\htdocs\taskvoxus\ , rodar:
	composer install
	* responder Y para "Set Folder Permissions?"

- Em C:\xampp\htdocs\taskvoxus\config\ :
	* deletar "app.php"
	* renomear "app.taskvoxus.php" para "app.php"

- Pelo prompt de comando, em C:\xampp\htdocs\taskvoxus\ , rodar:
	cake migrations migrate

- Pelo prompt de comando, em C:\xampp\htdocs\taskvoxus\ , rodar:
	cake migrations migrate -p ADmad/SocialAuth

- Pelo prompt de comando, em C:\xampp\htdocs\taskvoxus\ , rodar:
	cake migrations migrate --plugin Josegonzalez/CakeQueuesadilla

- Pelo prompt de comando, em C:\xampp\htdocs\taskvoxus\ , rodar:
	cake queuesadilla
	* deixar prompt aberto e executando, este é o background worker

- No browser agora é só acessar:
	http://taskvoxus.com

- Faça login pelo Google, usuário será criado automaticamente na primeira vez

- Crie uma categoria em "New Category"
	* Você pode ver as categorias criadas em "List Categories"
	* Você pode editar ou deletar uma categoria em "List Categoires"->View

- Crie uma tarefa em "New Tasks"
	* Você pode ver as tarefa criadas em "List Tasks"
	* Você pode editar ou deletar uma tarefa em "List Tasks"->View
	* Para marcar uma tarefa como "Done" é em "List Tasks"->View->Mark Task as Done
	* Para anexar um arquivo a tarefa  é em "List Tasks"->View->Attach File to Task
		** Enquanto o arquivo é enviado para o AWS S3 ele aparecerá como "processing"
		** Terminado o processo você pode acessá-lo em "List Tasks"->View->Check File "nome do arquivo"

- Você também pode criar, editar e deletar um usuário, mesmo procedimento que os anteriores.
	* Um usuário criado manualmente aqui que tiver e-mail igual ao do Google, ao logar pelo Google, será logado neste usuário criado manualmente

- Clique em "logout" para deslogar

- Para acessar o AWS S3, que guarda os arquivos:
	https://505755844082.signin.aws.amazon.com/console
	user: taskvoxus
	pass: senhaSuperSecreta1o1