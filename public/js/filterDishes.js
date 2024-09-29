function filterDishes() {
    const input = document.getElementById('dish').value.toLowerCase(); // Obtener el valor del input
    const dishes = document.querySelectorAll('.product-item'); // Seleccionar todos los ítems

    dishes.forEach(dish => {
        const title = dish.getAttribute('data-dish-title'); // Obtener el título del ítem

        // Verifica si el título contiene el texto del input
        if (title.includes(input)) {
            dish.style.display = ''; // Mostrar el ítem
        } else {
            dish.style.display = 'none'; // Ocultar el ítem
        }
    });
}