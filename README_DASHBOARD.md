# Livraria Universal - Dashboard com IA

## 🚀 Funcionalidades Implementadas

### ✅ Dashboard Administrativo Moderno
- **Interface Responsiva**: Design moderno com Tailwind CSS
- **Gráficos Interativos**: Chart.js para visualização de dados
- **Cards de Estatísticas**: Métricas em tempo real
- **Tabela de Livros**: Listagem dos livros mais vendidos

### ✅ Integração com API Gemini
- **Análise Inteligente**: Insights automáticos sobre vendas e mercado
- **Recomendações IA**: Sugestões estratégicas baseadas em dados
- **Alertas Inteligentes**: Identificação de pontos de atenção
- **Tendências**: Análise de padrões e oportunidades

### ✅ Interface Modernizada
- **Tailwind CSS**: Framework CSS moderno e responsivo
- **Animações Suaves**: Transições e efeitos visuais
- **Design System**: Cores e componentes consistentes
- **Responsividade**: Funciona em todos os dispositivos

## 🛠️ Tecnologias Utilizadas

### Frontend
- **Tailwind CSS**: Framework CSS utilitário
- **Chart.js**: Biblioteca para gráficos interativos
- **Font Awesome**: Ícones vetoriais
- **JavaScript ES6+**: Funcionalidades interativas

### Backend
- **PHP 7.4+**: Linguagem de programação
- **MySQL**: Banco de dados
- **PDO**: Camada de abstração de dados

### IA e APIs
- **Google Gemini API**: Inteligência artificial para análises
- **REST API**: Comunicação com serviços externos

## 📁 Estrutura do Projeto

```
projeto/
├── admin/
│   ├── index.php          # Dashboard principal
│   ├── ai_analysis.php    # Endpoint para análise IA
│   ├── dashboard.js       # JavaScript do dashboard
│   └── assets/
│       └── component/
│           └── header.php # Header administrativo
├── assets/
│   ├── css/
│   │   └── custom.css     # Estilos personalizados
│   ├── js/
│   │   └── script.js      # JavaScript principal
│   └── images/            # Imagens dos livros
├── component/
│   └── header.php         # Header principal
├── DAO/                   # Data Access Objects
├── Model/                  # Modelos de dados
├── Controller/             # Controladores
├── index.php              # Página principal
├── library.php            # Biblioteca do usuário
└── tailwind.config.js     # Configuração Tailwind
```

## 🎯 Funcionalidades do Dashboard

### 📊 Gráficos Disponíveis
1. **Vendas por Mês**: Gráfico de linha mostrando tendências
2. **Livros por Categoria**: Gráfico de rosca com distribuição
3. **Receita Trimestral**: Gráfico de barras com valores

### 🤖 Análise de IA
- **Insights de Mercado**: Análise do desempenho atual
- **Recomendações**: Sugestões estratégicas
- **Alertas**: Pontos de atenção importantes
- **Tendências**: Identificação de padrões

### 📈 Métricas em Tempo Real
- Total de livros cadastrados
- Número de usuários ativos
- Receita total acumulada
- Preço médio dos livros

## 🔧 Configuração

### 1. Instalação
```bash
# Clone o repositório
git clone [url-do-repositorio]

# Configure o banco de dados
# Edite o arquivo DAO/Connection.php com suas credenciais
```

### 2. Configuração da API Gemini
```php
// No arquivo admin/ai_analysis.php
$apiKey = 'SUA_CHAVE_API_GEMINI';
```

### 3. Personalização
```javascript
// No arquivo tailwind.config.js
module.exports = {
  theme: {
    extend: {
      colors: {
        primary: '#00A9A5',        // Cor primária
        'primary-hover': '#007E79', // Cor hover
        // ... outras cores
      }
    }
  }
}
```

## 🚀 Como Usar

### Dashboard Administrativo
1. Acesse `/admin/index.php`
2. Faça login como administrador
3. Visualize as métricas e gráficos
4. Clique em "Análise IA" para insights inteligentes

### Análise de IA
1. No dashboard, clique no botão "Análise IA"
2. Aguarde o processamento (2-3 segundos)
3. Visualize os insights gerados automaticamente
4. Use as recomendações para tomar decisões

## 📱 Responsividade

O dashboard é totalmente responsivo e funciona em:
- **Desktop**: Layout completo com sidebar
- **Tablet**: Layout adaptado com navegação otimizada
- **Mobile**: Interface simplificada e touch-friendly

## 🎨 Personalização Visual

### Cores
- **Primária**: #00A9A5 (Verde água)
- **Hover**: #007E79 (Verde escuro)
- **Background**: Gradientes suaves
- **Cards**: Sombras e bordas arredondadas

### Animações
- **Hover Effects**: Elevação e brilho
- **Loading States**: Spinners e skeletons
- **Transitions**: Suaves e naturais

## 🔒 Segurança

- **Autenticação**: Verificação de sessão admin
- **Sanitização**: Escape de dados HTML
- **API Key**: Proteção da chave Gemini
- **Headers**: CORS e Content-Type adequados

## 📊 Monitoramento

### Métricas Disponíveis
- Vendas por período
- Usuários ativos
- Receita total
- Preço médio dos livros
- Distribuição por categoria

### Alertas Automáticos
- Preços muito altos/baixos
- Baixa performance de vendas
- Necessidade de estoque
- Oportunidades de crescimento

## 🚀 Próximas Funcionalidades

- [ ] Exportação de relatórios PDF
- [ ] Notificações push em tempo real
- [ ] Integração com redes sociais
- [ ] Sistema de recomendações personalizadas
- [ ] Chatbot com IA para suporte
- [ ] Análise de sentimento dos clientes

## 📞 Suporte

Para dúvidas ou problemas:
- **Email**: suporte@livrariauniversal.com
- **Documentação**: [Link para docs]
- **Issues**: [Link para issues do GitHub]

---

**Desenvolvido com ❤️ usando Tailwind CSS, Chart.js e Google Gemini API**
