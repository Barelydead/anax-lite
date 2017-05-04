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

            <h4>Hur kändes det att jobba med PHP PDO, SQL och MySQL?</h4>
            <p>Det känns roligt att jobbat mot databaser igen måste jag säga. Det är ju lite bekant från htmlPHP men jag har fått en väldigt mycket bättre förståelse för hur allt fungerar nu när vi kikat på hur klasser och objekt används också. Just PDO tyckte jag var ordentligt svårt i första kursen när jag inte var bekant med klassbegreppet. Att vi jobbar med MySQL tycker jag också är ett plus då det verkar vara standard ute i arbetslivet vilket alltid gör att det känns extra motiverande att lösa uppgifterna på ett bra sätt. SQL-kod var jag ganska dålig på när vi startade kursen så SQL-övningen har varit guld för mig och det är väldigt smidigt att kunna gå tillbaka och titta i filen när det är något som inte går som man tänkt sig.</p>

            <h4>Reflektera kring koden du skrev för att lösa uppgifterna, klasser, formulär, integration Anax Lite?</h4>
            <p>Jag har implementerat två nya klasser, Cookie och Database. Jag har lagt till en del "bra att ha" funktioner i Database som hjälper mig med att skriva ut html table, hämta password hash och liknande. Men för det mesta så  har jag använt mig av executeFetchAll och skrivit SQL-satser i koden. Det har fungerat bra men jag skulle nog ha gjort en User och Admin klass för att underlätta ytterligare. Cookie klassen är en ganska enkel wrapper-Klass och fungerar i stort sätt på samma sätt som Session klassen.</p>
            <p>Det har blivit många formulär och det är inget svårt i sig men jag tycker att min struktur inte är tillräckligt bra och det har blivit ganska rörigt med alla post-forms sidor som ska skapas och underhållas. Detta är något jag kommer kika på under kursens gång och förhoppningsvis så hittar jag ett bättre sätt att strukturera min kod på. Jag tycker det har blivit för mycket kod i vyerna men och andra sidan så löser det uppgiften.</p>

            <h4>Känner du dig hemma i ramverket, dess komponenter och struktur?</h4>
            <p>I det stora hela ja. Jag tycker att jag hittar det jag ska att jag kan göra ändringar, förbättringar och tillägg där det behövs. Det saker som jag inte har så bra koll på är det moduler som vi implementerade i kursmoment 1 och hur traits/ConfigureInterface fungerar. </p>

            <h4>Hur bedömmer du svårighetsgraden på kursens inledande kursmoment, känner du att du lär dig något/bra saker?</h4>
            <p>Det har varit en ganska tuff kurs med mycket att ta in och en del moment som jag har behövt klura på både en och två gånger. Att uppgifterna är kluriga och på en ganska hög nivå uppskattar jag eftersom att jag trots allt är här för att lära mig saker. Däremot så kanske det är lite för många uppgifter att göra i varje moment. Det tar för mycket tid att göra klart allting. Tidsfördelningen mellan de två kurser som vi har nu blir lite skev. Jag måste lägga ungefär 70% av min tid på denna kurs för att hinna med vilket gör att kvaliteten på det jag gör i webapp bli lidande. </p>
            <p>Svaret på frågan om jag lär mig något är ja. Jag har lärt mig väldigt mycket om hur man jobbar med klasser och objekt, hur man jobbar och till viss del bygger ett ramverk samt fått en mycket bättre förståelse för SQL och hur det kan användas i en PHP-värld. </p>

            </section>

            <section>
            <a name="kmom04"></a><h2>Kursmoment 04</h2>

            <h4>Finns något att säga kring din klass för texfilter, eller rent allmänt om formattering och filtrering av text som sparas i databasen av användaren?</h4>
            <p>Jag har valt att inte ha någon sanering av det som skrivs till databasen utan har istället sanering av texten innan den skrivs ut till hemsidan. Nu i efterhand så tycker jag att det skulle varit bättre att göra tvärtom eftersom att saneringen då bara behöver ske på ett ställe. Nu krävs det att man sanerar texten på alla ställen där den kan tänkas skriva ut. Filterklassen är gjord med de metoder som efterfrågades i uppgiften. Jag gav mig på att skriva makeClickable metoden själv för att fräscha upp minnet i hur man använder regexp vilket var en trevlig övning. I övrigt så har jag tagit koden från exemplet. </p>

            <h4>Berätta hur du tänkte när du strukturerade klasserna och databasen för webbsidor och bloggposter?</h4>
            <p>Strukturen på databasen har jag tagit helt och hållet från uppgiften då jag ville vara säker på att jag fick med allt som var nödvändigt. Vad gäller koden så har jag skapat en del hjälpfunktioner som som skapar tabeller och tar hand om formulärdata. Det har jag lagt i src/functions. Tyvärr så det återigen blivit mer kod i vyerna än vad jag hade önskat och det beror främst på att jag inte skapat någon Content klass. Istället har jag använt databasklassen och skrivit SQL-frågorna direkt i koden. </p>

            <h4>Förklara vilka routes som används för att demonstrera funktionaliteten för webbsidor och blogg (så att en utomstående kan testa).</h4>
            <p>De routsen som visar innehållet är content/view_pages och content/blog. Jag har lagt in navigering till dessa routes i navbaren. För content med typ block så har jag lagt till det i footern där jag gjort en triptych. Det innehållet är skrivet i markdown.</p>

            <h4>Hur känns det att dokumentera databasen så här i efterhand?</h4>
            <p>Det känns bra och vettigt. Hittills så har vi gjort enkla databaser där de olika tabellerna har minimal koppling till varandra. När detta växer och databasen får fler tabeller med störra koppling så tror jag att man snabbt kan tappa bort sig. I det läget så kan det nog vara väldigt trevligt att ha en beskrivning och/eller grafisk representation av databasen som man kan gå tillbaks och titta på. Att dokumentera uppläget är ju också relevant för projekt där man är fler än en person som jobbar med databasen.</p>

            <h4>Om du är självkritisk till koden du skriver i Anax Lite, ser du förbättringspotential och möjligheter till alternativ struktur av din kod?</h4>
            <p>Ja jag skulle definitvt kunna jobba mer med klasser och skapa metoder istället för att skriva kod rakt upp och ner i routsen/vyerna. Problemet med det har varit att uppgifterna har kännts stora och det är svårt att förutse vilka metoder och klasser som kommer behövas i förväg. Av den anledningen så har jag fokuserat (för mycket) på att göra klart sidan efter specifikationen och inte tänkt särskilt mycket på att skapa återanvändbar kod. </p>


            </section>

            <section>
            <a name="kmom05"></a><h2>Kursmoment 05</h2>

            <h4>Gick det bra att komma igång med det vi kallar programmering av databas, med transaktioner, lagrade procedurer, triggers, funktioner?</h4>
            <p>Det gick bra att komma igång med små exempelprogram då artiklarna var väldigt tydliga och lätta att följa. Att komma igång med uppgiften var dock svårare. Jag hade problem med att veta vart jag skulle börja och hur jag skulle bygga upp allting. Så jag starade med det jag kände att jag hade koll på vilket var att skapa alla tabeller som behövs för webshoppen. När tabellerna var på plats så funderade jag över vilka operationer som skulle kunna återanvändas samt vilka som är lite mer komplexa att utföra. Utifrån det jag kom på så skapade jag triggers och procedurer.</p>

            <h4>Hur är din syn på att programmera på detta viset i databasen?</h4>
            <p>Jag tror det kan vara ett fantastiskt verktyg att ha. Mycket av det man gör när man skapar en webbplats kopplas ju till en databas, så att kunna förenkla kopplingen mellan databas och webbplats känns väldigt trevligt. De gör att PHP-koden blir mer kompakt och läsbar, och jag tror att man i kan eliminera många vanliga fel genom att använda sig av mer programmering i databasen.  </p>

            <h4>Några reflektioner kring din kod för backenden till webbshopen?</h4>
            <p>Jag skapade alla tabeller själv men hade exmeplet som en mall att gå efter. Jag valde att göra tabellerna själv för att jag ville förstå hur man kan bygga upp kopplingstabeller och hur man sedan kan använda dessa. Det var en bra övning i sig men det tog längre tid än jag hade hoppats så jag skippade att göra tabeller för lagerhållning osv. Vad gäller kundvagnen så har jag gjort 3 procedurer som löser det man behöver för att skapa en kudnvagn, lägga till produkter och göra kundvagn till order. Detta är det som varit svårast då jag behövde implmentera loopar i procedurerna vilket jag tyckte var ganska krångligt.    </p>
            <p>Det finns nog en hel del som man skulle kunna göra bättre men med tanke på att det är första gången jag gjort något liknande så känner jag mig relativt nöjd över hur de fungerar. </p>

            <h4>Något du vill säga om koden generellt i och kring Anax Lite?</h4>
            <p>Jag tycker att det går bra att jobba med ramverker och jag har lärt mig hur man hittar runt och vart saker och ting ska finnas. Däremot så finns det väldigt mycket i koden som jag skulle behhöva städa upp. Min kod är för tillfället inte enhetlig alls. Jag har använt olika lösningar på liknande problem allt eftersom att kursen har gått och man lärt sig nya tekniker. Detta gör att det blir väldigt jobbigt när man går tillbaks och ska ändra nått som man inte har färskt i minnet. </p>


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
