<Html> <!-- This tag is compulsory for any HTML document. -->
<Head>
    <!-- The Head tag is used to create a title of web page, CSS syntax for a web page, and helps in written a JavaScript code. -->
</Head>
<Body>
<!-- The Body tag is used to display the content on a web page. In this example we do not specify any content or any tag, so in output nothing will display on the web page. -->
<form id="frmClientes" name="frmClientes" novalidate="novalidate" action="/multiplos/procesar" method="post">
    @csrf
    @method('post')
    <label for="numero">Introduce un número: </label>
    <input type="number" id="numero_final" name="numero_final" min="0" max="1000"  value="0"/>
    <input type="submit" value="Enviar">
</form>
</Body>
</Html>