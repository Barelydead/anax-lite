<div class="container main">
    <div class="row">
        <div class="col-md-2">
            <nav class="side-nav">
                <ul>
                    <li><a href="#kmom01">Kursmoment 01</a></li>
                    <li><a href="#kmom02">Kursmoment 02</a></li>
                    <li><a href="#kmom03">Kursmoment 03</a></li>
                    <li><a href="#kmom04">Kursmoment 04</a></li>
                    <li><a href="#kmom05">Kursmoment 05</a></li>
                    <li><a href="#kmom06">Kursmoment 06</a></li>
                    <li><a href="#kmom10">Kursmoment 10</a></li>
                </ul>
            </nav>
        </div>
        <div class="col-md-10">
            <section>
            <a name="kmom01"></a>
            <h2>Kursmoment 01</h2>
            <p>Då var vi igång igen och det känns trevligt att köra vidare på oo-spåret. Det var mycket att läsa och komma in i denna kurs men tillslut så blev jag klart med allt. Att göra ett ramverk-lite tycker jag ska bli spännande och jag ser också fram emot att komma in i SQL på riktigt.</p>

            <h4>Hur känns det att hoppa rakt in i klasser med PHP, gick det bra?</h4>
            <p>Det gick ganska lätt att komma igång med klasserna då likheterna är väldigt stora med python. Jag jobbade igenom artikeln oophp20 och det gav en bra grund för hur man jobbar med klasser och det var också skönt att få skriva lite kod i PHP då det var ett par kurser sedan som vi höll på med det. </p>

            <p>Första uppgiften tyckte jag var lite klurig då jag till en början inte förstod hur jag skulle lagra informationen mellan sidans omladdnigar men när jag så småning om såg att man skulle spara det i formuläret så rullade det på ganska bra. Klasserna vi använde var ganska små så det blev framför allt en uppgift i att hantera formulär. På de sidor man använder sig av Session så skapade jag utöver de methoder man behövde göra en Session->destroy som rensar allt som är lagrat i session. Den funktionen använde jag senare för att kunna start om spelet på ett enkelt sätt.  </p>

            <h4>Berätta om dina reflektioner kring ramverk, anax-lite och din me-sida.</h4>
            <p>Som sagt så var det ganska mycket att läsa igenom och det tog lång tid för mig att komma igång med me-sidan eftersom att jag inte villa missa något så här i början. När jag hade kommit igenom övning "Bygg ett ramverk" så hade jag fått en ganska bra överblick i hur ramverket byggs upp med olika moduler som man sedan adderar in i sin frontcontroller. Det var kul att se lite mer övergripande hur allt hänger ihop men jag tyckte det var lite synd att vi fick alla moduler gratis. Jag inser att det hade blivit för mycket om vi skulle bygga alla moduler själv men jag tror det hade varit en bra att åtminstonde gör en modul själva så man fick en bättre förståelse för det.</p>

            <p>På min anax sida så skapade jag ett par egna vyer som jag lagt i mappen custom1. Navbaren är gjord från en key-value array som loopas igenom och lagrar html koden till en variabel. För att kunna sätta en active class så försökte jag först titta i url modulen efter en funktion som skriver ut den aktiva sidans URL men det fann jag inte. Så istället så använde jag ett par variabler från $_SERVER som kontrollerar vilken sida som är aktiv.</p>

            <p>Som stil till sidan så har jag valt att använda bootstrap. Jag valde den vägen för att jag ville fokusera på PHP-programmeringen i denna kurs och jag vill lägga mindre tid på att bygga upp CSS/LESS. Jag vet att jag kommer kunna få en ganska snygg stil med små ingrepp när jag använder bootstrap så då fick det bli så.</p>

            <h4>Gick det bra att komma igång med MySQL, har du liknande erfarenheter sedan tidigare?</h4>
            <p>Det gick okej men det verkar som att mitt workbench är utdaterat då jag får ett meddelande om att vissa funktioner kanske inte stödjs med min SQL version. Jag har inte kikat närmare på det eftersom att allt fungerade som det skulle. Jag gjorde inte så väldigt många uppgifter då allt annat hade tagit så mycket tid. Jag ska lägger mer fokus på det under de kommande veckorna. Jag har ingen erfarenhet av mySQL sedan tidigare och jag ser fram emot att lära mig mer.</p>
            </section>

            <section>
            <a name="kmom02"></a><h2>Kursmoment 02</h2>

            <h4>Hur känns det att skriva kod utanför och inuti ramverket, ser du fördelar och nackdelar med de olika sätten?</h4>
            <p>Hmm, jag är inte riktigt säker på vad man klassar som i och utanför ramverket men koden i sig ser jag ingen större skillnad på. Mer generellt sett så tycker jag vi har ordnat en bra struktur av koden där vi försöker lyfta bort innehållet från PHP-koden och det har jag lyckats till viss del med. Upplägget med att ha configfiler tycker jag också verkar trevligt, det blir väldigt lätt att ändra/utöka sidan efter behov. Det som jag tycker kan bli lite klurigt är felsökningen eftersom att exekveringen av koden inte alltid är solklar. Att hitta i mapstrukturen är också någon som jag lagt en del tid på.   </p>

            <h4>Hur väljer du att organisera dina vyer?</h4>
            <p>Jag har hittills valt att göra vyerna enkla och rena från php i så stor utsträckning som möjligt. Några av vyerna inkluderas på varje route såsom header, navbar och footer. Jag har än så länge inte lagt så stor tanke bakom strukturen då det har fungerat bra att ha lösa vyer som jag väljer att montera ihop i min router. Men när sidan växer och man får fler undersidor så tror jag att det kan bli nödvändigt att strukturera upp det på ett bättre sätt och kanske göra en template som inkluderar header/footer och försöka få innehållet ännu ett steg ifrån koden.</p>

            <h4>Berätta om hur du löste integreringen av klassen Session.</h4>
            <p>Jag började med att skapa session objektet med alla tillhörande metoder, inga konstigheter där. För att sedan göra den en del av ramverket så lade jag till session i $app så klassen sedan finns tillgäng att använda. Jag valde också att lägga till session->start() i frontontrollern så att jag slipper starta den på varje route. Jag skapade sedan en ny fil som jag kallar för session och inkluderade i route.php. I increment, decrement och destroy så lade jag koden direkt i routen och använde sedan header(location) för att redirecta tillbaka till /session och i status så använder jag $app->respons för att skicka json.</p>

            <h4>Berätta om hur du löste uppgiften med Tärningsspelet 100/Månadskalendern, hur du tänkte, planerade och utförde uppgiften samt hur du organiserade din kod?</h4>
            <p>Eftersom att vi har gjort diverse spel i tidigare kurser så tyckte jag det vore kul att göra någonting nytt så det fick bli kalenderuppgiften. All kod som krävs har jag lagt i en ny klass (Calender). Klassen initieras med en lista av alla månader, en lista med dagar per månad, currentdate och currentyear. I klassen finns också en del hjälpmetoder för att kunna sätta hämta info om månad år och dag. Dessa funktioner utgår från PHP-klassen dateTime och använder ->format för att få ut relevant information. För att sedan kunna skriva ut någonting på sidan så har jag gjort en loop som printar ut datumen till en tabell. Att utforma loopen på ett bra sätt tyckte jag var ganska svårt och jag använde mig av modulus operatorn för att ta reda på när det är dags för ny rad samt några hjälpmetoder i klassen för att sätta css klasser på söndagar och aktiv dag. Eftersom att jag ville undvika att använda kod i vyn så valde jag att spara min klass i session så att den sparas mellan sidomladdningar. </p>

            <h4>Några tankar kring SQL så här långt?</h4>
            <p>Det har gått bra än så länge och det är trevligt att få lite bättre förståelse för hur man kan hämta data på olika sätt. De mesta som jag hittills gått igenom är sånt som jag känner igen från tidigare kurser men jag uppskattar verkligen att köra en rejäl genomgång igen för att få en lite stadigare bas att stå på. </p>

            </section>

            <section>
            <a name="kmom03"></a><h2>Kursmoment 03</h2>
            <p>This is the report.</p>
            </section>

            <section>
            <a name="kmom04"></a><h2>Kursmoment 04</h2>
            <p>This is the report.</p>
            </section>

            <section>
            <a name="kmom05"></a><h2>Kursmoment 05</h2>
            <p>This is the report.</p>
            </section>

            <section>
            <a name="kmom06"></a><h2>Kursmoment 06</h2>
            <p>This is the report.</p>
            </section>

            <section>
            <a name="kmom10"></a><h2>Kursmoment 10</h2>
            <p>This is the report.</p>
            </section>


        </div>
    </div>
</div>
