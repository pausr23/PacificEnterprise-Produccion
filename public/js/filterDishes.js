function filterDishes() {
    const input = document.getElementById('dish').value.toLowerCase();
    const dishes = document.querySelectorAll('.product-item');

    dishes.forEach(dish => {
        const title = dish.getAttribute('data-dish-title');

        if (title.includes(input)) {
            dish.style.display = '';
        } else {
            dish.style.display = 'none';
        }
    });
}