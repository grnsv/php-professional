const btn = document.getElementById('loadProducts');
btn.addEventListener('click', () => {
    const offset = document.getElementsByClassName('product').length;
    const url = `/api/getProducts?offset=${offset}`;
    fetch(url, { method: 'GET' })
        .then(response => response.json())
        .then(result => {
            result.forEach(product => {
                let div = document.createElement('div');
                div.classList.add('product');
                let title = document.createElement('div');
                title.textContent = product.title;
                let description = document.createElement('div');
                description.textContent = product.description;
                let price = document.createElement('div');
                price.textContent = product.price;
                let link = document.createElement('a');
                link.href = `/product/${product.id}`;
                link.textContent = `/product/${product.id}`;
                div.append(title, description, price, link);
                btn.before(div);
            });
        });
})