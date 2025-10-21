// Script simples para inicializar os gráficos do dashboard
document.addEventListener('DOMContentLoaded', function() {
    console.log('Inicializando gráficos...');
    
    // Verificar se Chart.js está disponível
    if (typeof Chart === 'undefined') {
        console.error('Chart.js não foi carregado!');
        return;
    }
    
    // Aguardar um pouco para garantir que os elementos estejam prontos
    setTimeout(function() {
        initSalesChart();
        initCategoryChart();
    }, 200);
});

function initSalesChart() {
    const ctx = document.getElementById('salesChart');
    if (!ctx) {
        console.error('Elemento salesChart não encontrado');
        return;
    }
    
    try {
        new Chart(ctx, {
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
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        grid: {
                            color: 'rgba(0, 0, 0, 0.1)'
                        }
                    },
                    x: {
                        grid: {
                            display: false
                        }
                    }
                }
            }
        });
        console.log('Gráfico de vendas inicializado com sucesso');
    } catch (error) {
        console.error('Erro ao inicializar gráfico de vendas:', error);
    }
}

function initCategoryChart() {
    const ctx = document.getElementById('categoryChart');
    if (!ctx) {
        console.error('Elemento categoryChart não encontrado');
        return;
    }
    
    try {
        new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: ['Ficção', 'Educação', 'Romance', 'Tecnologia', 'Outros'],
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
                    }
                }
            }
        });
        console.log('Gráfico de categorias inicializado com sucesso');
    } catch (error) {
        console.error('Erro ao inicializar gráfico de categorias:', error);
    }
}
