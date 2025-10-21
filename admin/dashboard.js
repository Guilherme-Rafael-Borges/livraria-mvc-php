// Dashboard Interativo - Livraria Universal
class DashboardManager {
    constructor() {
        this.charts = {};
        this.init();
    }

    init() {
        this.setupEventListeners();
        this.initializeCharts();
        this.setupRealTimeUpdates();
    }

    setupEventListeners() {
        // Botão de análise de IA
        const aiBtn = document.getElementById('aiAnalysisBtn');
        if (aiBtn) {
            aiBtn.addEventListener('click', () => this.showAIAnalysis());
        }

        // Botão de fechar análise de IA
        const closeBtn = document.getElementById('closeAiAnalysis');
        if (closeBtn) {
            closeBtn.addEventListener('click', () => this.hideAIAnalysis());
        }

        // Atualização automática dos dados
        setInterval(() => this.updateDashboardData(), 30000); // A cada 30 segundos
    }

    initializeCharts() {
        this.createSalesChart();
        this.createCategoryChart();
        this.createRevenueChart();
    }

    createSalesChart() {
        const ctx = document.getElementById('salesChart');
        if (!ctx) return;

        this.charts.sales = new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun'],
                datasets: [{
                    label: 'Vendas',
                    data: [12, 19, 3, 5, 2, 3],
                    borderColor: '#00A9A5',
                    backgroundColor: 'rgba(0, 169, 165, 0.1)',
                    tension: 0.4,
                    fill: true,
                    pointBackgroundColor: '#00A9A5',
                    pointBorderColor: '#ffffff',
                    pointBorderWidth: 2,
                    pointRadius: 6
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false
                    },
                    tooltip: {
                        backgroundColor: 'rgba(0, 0, 0, 0.8)',
                        titleColor: '#ffffff',
                        bodyColor: '#ffffff',
                        borderColor: '#00A9A5',
                        borderWidth: 1
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        grid: {
                            color: 'rgba(0, 0, 0, 0.1)'
                        },
                        ticks: {
                            color: '#666666'
                        }
                    },
                    x: {
                        grid: {
                            display: false
                        },
                        ticks: {
                            color: '#666666'
                        }
                    }
                },
                animation: {
                    duration: 2000,
                    easing: 'easeInOutQuart'
                }
            }
        });
    }

    createCategoryChart() {
        const ctx = document.getElementById('categoryChart');
        if (!ctx) return;

        this.charts.category = new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: ['Ficção', 'Não-Ficção', 'Técnico', 'Infantil', 'Outros'],
                datasets: [{
                    data: [30, 25, 20, 15, 10],
                    backgroundColor: [
                        '#00A9A5',
                        '#007E79',
                        '#FF6B6B',
                        '#4ECDC4',
                        '#45B7D1'
                    ],
                    borderWidth: 0,
                    hoverOffset: 10
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'bottom',
                        labels: {
                            padding: 20,
                            usePointStyle: true,
                            font: {
                                size: 12
                            }
                        }
                    },
                    tooltip: {
                        backgroundColor: 'rgba(0, 0, 0, 0.8)',
                        titleColor: '#ffffff',
                        bodyColor: '#ffffff',
                        callbacks: {
                            label: function(context) {
                                const label = context.label || '';
                                const value = context.parsed;
                                const total = context.dataset.data.reduce((a, b) => a + b, 0);
                                const percentage = ((value / total) * 100).toFixed(1);
                                return `${label}: ${value} (${percentage}%)`;
                            }
                        }
                    }
                },
                animation: {
                    animateRotate: true,
                    animateScale: true,
                    duration: 2000
                }
            }
        });
    }

    createRevenueChart() {
        const ctx = document.getElementById('revenueChart');
        if (!ctx) return;

        this.charts.revenue = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Q1', 'Q2', 'Q3', 'Q4'],
                datasets: [{
                    label: 'Receita (R$)',
                    data: [12000, 19000, 15000, 25000],
                    backgroundColor: 'rgba(0, 169, 165, 0.8)',
                    borderColor: '#00A9A5',
                    borderWidth: 2,
                    borderRadius: 8,
                    borderSkipped: false
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false
                    },
                    tooltip: {
                        backgroundColor: 'rgba(0, 0, 0, 0.8)',
                        titleColor: '#ffffff',
                        bodyColor: '#ffffff',
                        callbacks: {
                            label: function(context) {
                                return `Receita: R$ ${context.parsed.y.toLocaleString('pt-BR')}`;
                            }
                        }
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        grid: {
                            color: 'rgba(0, 0, 0, 0.1)'
                        },
                        ticks: {
                            color: '#666666',
                            callback: function(value) {
                                return 'R$ ' + value.toLocaleString('pt-BR');
                            }
                        }
                    },
                    x: {
                        grid: {
                            display: false
                        },
                        ticks: {
                            color: '#666666'
                        }
                    }
                },
                animation: {
                    duration: 2000,
                    easing: 'easeInOutQuart'
                }
            }
        });
    }

    async showAIAnalysis() {
        const aiSection = document.getElementById('aiAnalysisSection');
        const aiLoading = document.getElementById('aiLoading');
        const aiResults = document.getElementById('aiResults');
        
        if (!aiSection) return;

        aiSection.classList.remove('hidden');
        aiLoading.classList.remove('hidden');
        aiResults.classList.add('hidden');
        
        try {
            const response = await fetch('./ai_analysis.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                }
            });

            const data = await response.json();
            
            if (data.success && data.analysis) {
                this.displayAIAnalysis(data.analysis);
            } else {
                this.displayFallbackAnalysis(data.analysis);
            }
            
        } catch (error) {
            console.error('Erro na análise de IA:', error);
            this.displayFallbackAnalysis();
        }
        
        aiLoading.classList.add('hidden');
        aiResults.classList.remove('hidden');
    }

    displayAIAnalysis(analysis) {
        document.getElementById('marketInsights').textContent = analysis.marketInsights;
        document.getElementById('recommendations').textContent = analysis.recommendations;
        document.getElementById('alerts').textContent = analysis.alerts;
        document.getElementById('trends').textContent = analysis.trends;
    }

    displayFallbackAnalysis(analysis = null) {
        const fallbackAnalysis = analysis || {
            marketInsights: 'Baseado nos dados atuais, a livraria apresenta crescimento consistente no número de usuários e livros disponíveis.',
            recommendations: 'Recomendamos expandir o catálogo de livros técnicos e implementar um sistema de recomendações personalizadas.',
            alerts: 'Monitorar o preço médio dos livros para manter competitividade no mercado.',
            trends: 'Tendência crescente de digitalização e preferência por livros técnicos e educacionais.'
        };

        this.displayAIAnalysis(fallbackAnalysis);
    }

    hideAIAnalysis() {
        const aiSection = document.getElementById('aiAnalysisSection');
        if (aiSection) {
            aiSection.classList.add('hidden');
        }
    }

    async updateDashboardData() {
        try {
            // Simular atualização de dados em tempo real
            const newData = this.generateRandomData();
            this.updateCharts(newData);
            this.updateStats(newData);
        } catch (error) {
            console.error('Erro ao atualizar dados:', error);
        }
    }

    generateRandomData() {
        return {
            sales: Array.from({length: 6}, () => Math.floor(Math.random() * 20) + 5),
            categories: Array.from({length: 5}, () => Math.floor(Math.random() * 30) + 10),
            revenue: Array.from({length: 4}, () => Math.floor(Math.random() * 20000) + 10000)
        };
    }

    updateCharts(data) {
        if (this.charts.sales) {
            this.charts.sales.data.datasets[0].data = data.sales;
            this.charts.sales.update('active');
        }

        if (this.charts.category) {
            this.charts.category.data.datasets[0].data = data.categories;
            this.charts.category.update('active');
        }

        if (this.charts.revenue) {
            this.charts.revenue.data.datasets[0].data = data.revenue;
            this.charts.revenue.update('active');
        }
    }

    updateStats(data) {
        // Atualizar estatísticas nos cards
        const totalSales = data.sales.reduce((a, b) => a + b, 0);
        const totalRevenue = data.revenue.reduce((a, b) => a + b, 0);
        
        // Atualizar elementos DOM se existirem
        const salesElement = document.querySelector('[data-stat="sales"]');
        const revenueElement = document.querySelector('[data-stat="revenue"]');
        
        if (salesElement) {
            salesElement.textContent = totalSales;
        }
        
        if (revenueElement) {
            revenueElement.textContent = `R$ ${totalRevenue.toLocaleString('pt-BR')}`;
        }
    }

    // Método para exportar dados do dashboard
    exportDashboardData() {
        const data = {
            timestamp: new Date().toISOString(),
            charts: {
                sales: this.charts.sales?.data,
                category: this.charts.category?.data,
                revenue: this.charts.revenue?.data
            }
        };
        
        const blob = new Blob([JSON.stringify(data, null, 2)], {type: 'application/json'});
        const url = URL.createObjectURL(blob);
        const a = document.createElement('a');
        a.href = url;
        a.download = `dashboard-data-${new Date().toISOString().split('T')[0]}.json`;
        document.body.appendChild(a);
        a.click();
        document.body.removeChild(a);
        URL.revokeObjectURL(url);
    }
}

// Inicializar dashboard quando o DOM estiver carregado
document.addEventListener('DOMContentLoaded', function() {
    window.dashboardManager = new DashboardManager();
    
    // Adicionar funcionalidade de tema escuro
    const themeToggle = document.getElementById('themeToggle');
    if (themeToggle) {
        themeToggle.addEventListener('click', function() {
            document.body.classList.toggle('dark');
            localStorage.setItem('theme', document.body.classList.contains('dark') ? 'dark' : 'light');
        });
        
        // Aplicar tema salvo
        const savedTheme = localStorage.getItem('theme');
        if (savedTheme === 'dark') {
            document.body.classList.add('dark');
        }
    }
    
    // Adicionar animações de entrada
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };
    
    const observer = new IntersectionObserver(function(entries) {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('animate-fade-in');
            }
        });
    }, observerOptions);
    
    // Observar elementos para animação
    document.querySelectorAll('.card, .chart-container').forEach(el => {
        observer.observe(el);
    });
});

// Utilitários globais
window.DashboardUtils = {
    formatCurrency: (value) => {
        return new Intl.NumberFormat('pt-BR', {
            style: 'currency',
            currency: 'BRL'
        }).format(value);
    },
    
    formatNumber: (value) => {
        return new Intl.NumberFormat('pt-BR').format(value);
    },
    
    formatDate: (date) => {
        return new Intl.DateTimeFormat('pt-BR').format(new Date(date));
    },
    
    showNotification: (message, type = 'info') => {
        const notification = document.createElement('div');
        notification.className = `fixed top-4 right-4 p-4 rounded-lg shadow-lg z-50 ${
            type === 'success' ? 'bg-green-500' :
            type === 'error' ? 'bg-red-500' :
            type === 'warning' ? 'bg-yellow-500' :
            'bg-blue-500'
        } text-white`;
        notification.textContent = message;
        
        document.body.appendChild(notification);
        
        setTimeout(() => {
            notification.remove();
        }, 3000);
    }
};