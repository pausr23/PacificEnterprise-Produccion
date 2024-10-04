describe('Pruebas de Admin', () => {
  it('Prueba de búsqueda por nombre y categoría', () => {
    cy.visit('http://pacificenterprise-produccion.test/')

    cy.get('#dish').
    should('be.visible').
    type('Maduro');

    cy.get('#category').
    should('be.visible').
    select('Desayunos');

    cy.get('a').contains('Agregar un Item').
    should('be.visible').
    click();
  });

  it('Prueba de agregar un item', () => {
    cy.visit('http://pacificenterprise-produccion.test/dishes/create')

    cy.get('input[placeholder="Nombre del platillo"]', { timeout: 10000 })
      .should('be.visible')
      .type('Maduro');

      cy.get('#dishes_categories_id', { timeout: 10000 })
      .should('be.visible')
      .select('Desayunos');

      cy.get('#subcategories_id', { timeout: 10000 })
      .should('be.visible')
      .select('Agregados');

      cy.get('#subcategories_id', { timeout: 10000 })
      .should('be.visible')
      .select('Agregados');

      cy.get('input[placeholder="Unidades disponibles"]', { timeout: 10000 })
      .should('be.visible')
      .type('1');

      cy.get('input[placeholder="Precio del platillo"]', { timeout: 10000 })
      .should('be.visible')
      .type('Gato');

      cy.get('textarea[placeholder="Descripción del platillo"]', { timeout: 10000 })
      .should('be.visible')
      .type('Gato naranja');

      cy.get('button', { timeout: 10000 }).contains('Guardar')
      .should('be.visible')
      .click();
  });
});

  describe('Pruebas de Punto de Venta', () => {

    it('Prueba de orden por efectivo', () => {
      cy.visit('http://pacificenterprise-produccion.test/') 
      
      cy.get('a', { timeout: 10000 }).contains('Punto de Venta')
      .should('be.visible')
      .click();

      cy.get('div', { timeout: 10000 }).contains('Bebidas')
      .should('be.visible')
      .click();

      cy.get('div[data-dish-id="8"] button[onclick="updateQuantity(\'8\', 1)\"]')
      .should('be.visible')
      .click();

      cy.get('button[data-value="1"]')
      .should('be.visible')
      .click();

      cy.get('button', { timeout: 10000 }).contains('Terminar orden')
      .should('be.visible')
      .click();
    });

    it('Prueba de orden por tarjeta', () => {
      cy.visit('http://pacificenterprise-produccion.test/') 
      
      cy.get('a', { timeout: 10000 }).contains('Punto de Venta')
      .should('be.visible')
      .click();

      cy.get('div', { timeout: 10000 }).contains('Bebidas')
      .should('be.visible')
      .click();

      cy.get('div[data-dish-id="8"] button[onclick="updateQuantity(\'8\', 1)\"]')
      .should('be.visible')
      .click();

      cy.get('button[data-value="2"]')
      .should('be.visible')
      .click();

      cy.get('button', { timeout: 10000 }).contains('Terminar orden')
      .should('be.visible')
      .click();
    });

    it('Prueba de orden por Sinpe', () => {
      cy.visit('http://pacificenterprise-produccion.test/') 
      
      cy.get('a', { timeout: 10000 }).contains('Punto de Venta')
      .should('be.visible')
      .click();

      cy.get('div', { timeout: 10000 }).contains('Bebidas')
      .should('be.visible')
      .click();

      cy.get('div[data-dish-id="8"] button[onclick="updateQuantity(\'8\', 1)\"]')
      .should('be.visible')
      .click();

      cy.get('button[data-value="3"]')
      .should('be.visible')
      .click();

      cy.get('button', { timeout: 10000 }).contains('Terminar orden')
      .should('be.visible')
      .click();
    });

});

describe('Pruebas de Inventario', () => {

  it('Prueba de filtrado por Desayunos', () => {
    cy.visit('http://pacificenterprise-produccion.test/') 

    cy.get('a', { timeout: 10000 }).contains('Inventario')
      .should('be.visible')
      .click();

      cy.get('#category', { timeout: 10000 })
      .should('be.visible')
      .select('Desayunos');

      cy.get('button', { timeout: 10000 }).contains('Buscar')
      .should('be.visible')
      .click();
  });

  it('Prueba de filtrado por Bebidas', () => {
    cy.visit('http://pacificenterprise-produccion.test/') 

    cy.get('a', { timeout: 10000 }).contains('Inventario')
      .should('be.visible')
      .click();

      cy.get('#category', { timeout: 10000 })
      .should('be.visible')
      .select('Bebidas');

      cy.get('button', { timeout: 10000 }).contains('Buscar')
      .should('be.visible')
      .click();
  });

  it('Prueba de filtrado por Comidas', () => {
    cy.visit('http://pacificenterprise-produccion.test/') 

    cy.get('a', { timeout: 10000 }).contains('Inventario')
      .should('be.visible')
      .click();

      cy.get('#category', { timeout: 10000 })
      .should('be.visible')
      .select('Comidas');

      cy.get('button', { timeout: 10000 }).contains('Buscar')
      .should('be.visible')
      .click();
  });

  it('Prueba de filtrado por Postres', () => {
    cy.visit('http://pacificenterprise-produccion.test/') 

    cy.get('a', { timeout: 10000 }).contains('Inventario')
      .should('be.visible')
      .click();

      cy.get('#category', { timeout: 10000 })
      .should('be.visible')
      .select('Postres');

      cy.get('button', { timeout: 10000 }).contains('Buscar')
      .should('be.visible')
      .click();
  });  
});

  describe('Pruebas de Inventario', () => {

    it('Prueba de filtrado por Desayunos', () => {
      cy.visit('http://pacificenterprise-produccion.test/') 
      cy.get('a', { timeout: 10000 }).contains('Proveedores')
      .should('be.visible')
      .click();
    });
  });

