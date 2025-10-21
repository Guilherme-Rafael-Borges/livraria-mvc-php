document.addEventListener('DOMContentLoaded', function() {
    // Variáveis
    const searchInput = document.querySelector('input[type="text"]');
    const bookItems = document.querySelectorAll('.book-item');
    const allBooks = Array.from(bookItems);  // Converte a NodeList para um array

    // Função para filtrar livros
    function filterBooks(query) {
        query = query.toLowerCase();  // Converte a consulta para minúsculas para comparação
        allBooks.forEach(book => {
            const bookTitle = book.querySelector('h3').textContent.toLowerCase();  // Pega o título do livro
            if (bookTitle.includes(query)) {
                book.style.display = 'block';  // Exibe o livro se o título corresponder à pesquisa
            } else {
                book.style.display = 'none';  // Oculta o livro se não corresponder
            }
        });
    }

    // Event listener para quando o usuário digitar na caixa de pesquisa
    searchInput.addEventListener('input', function(event) {
        const query = event.target.value.trim();  // Pega o valor da pesquisa
        if (query) {
            filterBooks(query);  // Filtra os livros com base na pesquisa
        } else {
            // Se não houver nada na pesquisa, mostra todos os livros novamente
            allBooks.forEach(book => {
                book.style.display = 'block';
            });
        }
    });
});
