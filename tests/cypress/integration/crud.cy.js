describe('Crud Test', () => {
    it('create item', () => {
        cy.visit('/login');

        cy.get("input[name=email]").type('teste@diego.com');
        cy.get("input[name=password]").type('q1w2e3r4').type("{enter}");

        cy.contains("Acervo").click()
        cy.location("pathname").should("include", "/collection");

        cy.contains('Adicionar').click();
        cy.location("pathname").should("include", "/collection/create");

        cy.get("input[name=title]").type('title test');
        cy.get("input[name=author]").type('author test');
        cy.get("input[name=publishing_company]").type('company test');
        cy.get("textarea[name=description]").type('description test');
        cy.get('input[type=file]').selectFile('tests/cypress/imgTest.jpeg')

        cy.contains('Criar').click();

        cy.contains('Item adicionado com Sucesso!')
        cy.location("pathname").should("include", "/collection");

        cy.contains('title test')
        cy.contains('author test')
        cy.contains('Visualizar')
        cy.contains('Editar')
        cy.contains('Excluir')
    });

    it('edit item', () => {
        cy.visit('/login');

        cy.get("input[name=email]").type('teste@diego.com');
        cy.get("input[name=password]").type('q1w2e3r4').type("{enter}");

        cy.visit('/collection');
        cy.contains('Editar').click()
        cy.get("input[name=title]").clear().type('new title test');
        cy.get("button").contains('Editar').click();

        cy.location("pathname").should("include", "/collection");
        cy.contains('new title test')
    });

    it('delete  item', () => {
        cy.visit('/login');

        cy.get("input[name=email]").type('teste@diego.com');
        cy.get("input[name=password]").type('q1w2e3r4').type("{enter}");

        cy.visit('/collection');
        cy.contains('Excluir').click()
        cy.contains("Item excluido com Sucesso!");
    });
})
