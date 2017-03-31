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
            <p>This is the report.</p>
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
