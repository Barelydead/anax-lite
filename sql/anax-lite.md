#Christofer Jungbergs anax-lite databas

Min databas består för tillfället av 3 tabeller.
* anax_users
* anax_admin
* anax_content


### anax_content
Detta är basen av innehållet på hemsidan. Den innehåller rader för att hålla koll på när innehållet skapades, uppdaterades och eventuelt togs bort och såklart själva innehållet i sig. De finns just nu tre typer av innehåll. Block, page och post.

### anax_users
Användarinformation såsom användarnamn, lösenord, namn mm. Har också information om användarens profil.

### anax_admin
Admininfo. Användarnamn Lösenord och behörighetsnivå.

### anax webshop
Jag har lagt till flertalet tabeller som fungerar som grunden till en webshop. Detta utgår framförallt ifrån tabellen anax_product som är produkttabellen.


### index
Jag har adderat index på platser som ofta används för filtrering av sökfrågorna.
