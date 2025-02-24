# Sistema de Gestão de Grupo Econômico

## Instalação

1. Clone o repositório:

   ```bash
   git clone https://github.com/seu-usuario/gestao-grupo-economico.git
   cd gestao-grupo-economico


2. Instale as dependências:

    composer install

3. Configure o ambiente:

    cp .env.example .env

4. Configure o ambiente com Sail:

    ./vendor/bin/sail up -d
    ./vendor/bin/sail artisan migrate

6. Acesse o sistema:
 
    http://localhost/

### Uso

Acesse a API em http://localhost:8000/api.

Utilize os endpoints para gerenciar grupos econômicos, bandeiras, unidades e colaboradores.

Gere relatórios e exporte dados para Excel.


### Conclusão

Este é um guia básico para implementar o sistema de gestão descrito. Você pode expandir e melhorar o sistema conforme necessário, adicionando mais funcionalidades, melhorando a interface do usuário e garantindo a segurança e escalabilidade do sistema.
