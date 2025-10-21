# 🏪 Livraria Universal - Projeto com Tailwind CSS

## 📋 Pré-requisitos

Para executar este projeto, você precisa ter instalado:

1. **PHP 7.4+** com extensões:
   - PDO MySQL
   - GD (para processamento de imagens)
   - Fileinfo (para validação de arquivos)

2. **MySQL 5.7+** ou **MariaDB 10.3+**

3. **Servidor Web** (Apache/Nginx) ou usar o servidor embutido do PHP

## 🚀 Como Executar

### 1. Configurar o Banco de Dados

1. Abra o MySQL/MariaDB
2. Execute o script SQL fornecido:
   ```sql
   mysql -u root -p < database_setup.sql
   ```
   Ou importe o arquivo `database_setup.sql` através do phpMyAdmin

### 2. Configurar a Conexão

O arquivo `DAO/Connection.php` está configurado para:
- **Host:** localhost:3306
- **Database:** bookstore
- **Username:** root
- **Password:** (vazio)

Se suas configurações forem diferentes, edite o arquivo `DAO/Connection.php`.

### 3. Executar o Servidor

#### Opção 1: Servidor PHP Embarcado (Recomendado para desenvolvimento)
```bash
cd projeto
php -S localhost:8000
```

#### Opção 2: Apache/Nginx
Configure seu servidor web para apontar para a pasta `projeto`.

### 4. Acessar o Sistema

Abra seu navegador e acesse:
- **Site Principal:** http://localhost:8000
- **Admin:** http://localhost:8000/admin/index.php

## 👤 Contas de Teste

### Administrador
- **Email:** admin@livraria.com
- **Senha:** admin123
- **Nome da mãe:** admin

### Usuário Comum
- **Email:** user@teste.com
- **Senha:** user123
- **Nome da mãe:** teste

## 🎨 Recursos Implementados

### ✅ Frontend com Tailwind CSS
- Design responsivo e moderno
- Componentes reutilizáveis
- Animações suaves
- Paleta de cores personalizada

### ✅ Funcionalidades
- **Catálogo de livros** com busca
- **Sistema de login/cadastro**
- **Carrinho de compras**
- **Biblioteca pessoal**
- **Painel administrativo**
- **Upload de imagens e PDFs**

### ✅ Estrutura MVC
- **Model:** Lógica de negócio
- **View:** Interface do usuário
- **Controller:** Controle de fluxo
- **DAO:** Acesso a dados

## 📁 Estrutura do Projeto

```
projeto/
├── assets/
│   ├── css/          # (Removido - agora usa Tailwind)
│   ├── images/       # Imagens dos livros
│   ├── js/           # JavaScript
│   └── pdfs/         # Arquivos PDF dos livros
├── admin/            # Painel administrativo
├── component/        # Componentes reutilizáveis
├── Controller/       # Controladores MVC
├── DAO/             # Data Access Objects
├── Model/           # Modelos MVC
├── database_setup.sql # Script de configuração do BD
└── *.php            # Páginas principais
```

## 🔧 Configurações Avançadas

### Upload de Arquivos
- **Imagens:** Máximo 2MB (JPG, PNG, GIF)
- **PDFs:** Máximo 20MB
- **Diretórios:** Criados automaticamente

### Segurança
- Validação de tipos MIME
- Sanitização de dados
- Prepared statements (PDO)

## 🐛 Solução de Problemas

### Erro de Conexão com Banco
1. Verifique se o MySQL está rodando
2. Confirme as credenciais em `DAO/Connection.php`
3. Execute o script `database_setup.sql`

### Erro de Upload
1. Verifique permissões das pastas `assets/images/` e `assets/pdfs/`
2. Confirme se as extensões PHP necessárias estão instaladas

### Problemas de CSS
1. Verifique se o Tailwind CSS está carregando via CDN
2. Confirme conexão com a internet para o CDN

## 📞 Suporte

Se encontrar problemas:
1. Verifique os logs do PHP
2. Confirme se todas as dependências estão instaladas
3. Teste com os dados de exemplo fornecidos

---

**Desenvolvido com ❤️ usando PHP, MySQL e Tailwind CSS**
