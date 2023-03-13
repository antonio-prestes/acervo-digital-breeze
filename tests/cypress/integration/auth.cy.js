describe('Auth Test', () => {
    it('auth fail', () => {
        cy.visit('/login');

        cy.get("input[name=email]").type('test@teste.com');
        cy.get("input[name=password]").type('fail').type("{enter}");

        cy.location("pathname").should("include", "/login");

        cy.contains('Whoops! Something went wrong.');
        cy.contains('auth.failed');
    });

    it('auth success', () => {
        cy.visit('/login');

        cy.get("input[name=email]").type('teste@diego.com');
        cy.get("input[name=password]").type('q1w2e3r4').type("{enter}");

        cy.location("pathname").should("include", "/dashboard");

        cy.contains('Dashboard');
        cy.contains('Acervo');
        cy.contains('Ver Todos');
        cy.contains('Últimos itens cadastrados');
    });

    it('logout', () => {
        cy.visit('/login');

        cy.get("input[name=email]").type('teste@diego.com');
        cy.get("input[name=password]").type('q1w2e3r4').type("{enter}");
        cy.contains(' diego ').click();
        cy.contains('Sair').click();
        cy.location("pathname").should("include", "/");
    });
});
