#Christofer Jungbergs webshop API

##Sammanfattning
Detta är ett API som är gjort för att fungera som grund till en webshop. Koden innehållet tabeller, vyer, funktioner och triggers som ska underlätta när man skapar sin webshop. All SQL-kod finns i filen setup-webshop.sql. Det är fullt körbar utan att addera eller ta bort något.

##Code Example

####Tabeller
- anax_cartRow
- anax_cart
- anax_lowStockList
- anax_stock
- anax_orderRow
- anax_product
- anax_order

####Vyer
- VLowStock
- VProductStock
- VOrderDetails
- VProductOverview


**Exempel på hur man kan skapa en kundvagn och göra den till en order**
*Start a new cart*
CALL startNewCart('`användarnamn`');

*Add items to cart*
CALL addItemToCart(cartId, prodId, units);

*turn cart to order*
CALL cartToOrder(`användarnamn`, cartId);

*If order needs to be canceled*
CALL cancelOrder(cartId);


**Beställa new producter till lager**
Produkter som har ett saldo på mindre än 5 läggs automatiskt till i vyn VLowStock så att man enkelt ska kunna hålla reda på vad som behövs beställas.

Fylls produktens saldo på till mer än 5 så tas den automatiskt bort från vyn.


**Uppdatera produktsaldo**
För att fylla på eller ta bort produktsaldo så kan man använda proceduren changeStock.

CALL changeStock(-4, 1); // tar bort 4 units från produkt 1
CALL changeStock(2, 2) // Lägger till 2 units på produkt 2
