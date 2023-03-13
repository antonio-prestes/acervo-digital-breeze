describe('Public App Test', () => {
    it('shows a homepage', () => {
        cy.visit('/');

        cy.contains('Acervo Digital');
        cy.contains('Crie sua conta');
        cy.contains('Home');
        cy.contains('Sobre');
        cy.contains('Contato');
    });

    it('shows a contact us page', () => {
        cy.visit('/contact');

        cy.contains('Contact us');
        cy.contains('Send');
        cy.contains('Home');
        cy.contains('Sobre');
        cy.contains('Contato');
    });


    it('shows a login page', () => {
        cy.visit('/login');

        cy.contains('Email');
        cy.contains('Password');
        cy.contains('Remember me');
        cy.contains('Log in');
        cy.contains('Forgot your password?');
        cy.contains('Sign in with Github');
        cy.contains('Sign in with Google');
    });


    it('shows a register page', () => {
        cy.visit('/register');

        cy.contains('Avatar');
        cy.contains('Username');
        cy.contains('Name');
        cy.contains('Email');
        cy.contains('Password');
        cy.contains('Confirm Password');
        cy.contains('Already registered?');
        cy.contains('Register');
    });
});
