
# PrimAPI

Este projeto serve de base para a palestra sobre APIS e o modelo de maturidade de Leonard Richardson - APIS Rests e RMM

### Motivação da API

Minha familia está espalhada por todo o Brasil, tenho parentes no Maranhão, Piauí, Ceará, Rio, Brasília e por ai vai... Porém, apesar da distância, todos os netos se conhecem e de certa forma, cresceram juntos.

Curiosamente, tenho várias primas que ingressaram no ramo do desenvolvimento de software, talvez inspiradas por ADA, ou pelos filmes que nosso avô adorava colocar naquele velho aparelho de fita cassete. Vivemos belos momentos assintindo Hackers operação takedown...

Enfim, pensando em estreitar meu contato com minhas primas em especial, decidi criar uma API com algumas informações úteis sobre elas, como local aonde mora atualmente e o preço por hora de trabalho.

### Funcionalidades
A API deverá fornecer umas listagem das primas cadastradas, bem como detalhes de uma prima em questão. Cadastro e atualização das informações de uma prima e caso alguma prima decida vender coco na praia, permitir a exclusão de um registro.

Por fim deve ser possível fazer uma buscar por uma prima a fim de explicar alguns conceitos interessantes a cerca dos verbos, estado http e etc...


### Configuração do Virtual Host
```sh
<VirtualHost *:80>
    ServerName rmmapi.dev
    DocumentRoot /var/www/html/rmmapi/public
    <Directory /var/www/html/rmmapi/public>
            DirectoryIndex index.php
            AllowOverride All
            Order allow,deny
            Allow from all

            RewriteEngine On
            # Redirect all requests not pointing at an actual file to index.php
            RewriteCond %{REQUEST_FILENAME} !-f
            RewriteRule . index.php [L] 
    </Directory>
</VirtualHost>
```

**Free Software, Hell Yeah!**

[Willian Mano]:http://willianmano.net