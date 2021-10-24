# max3w.github.io

<blockquote><p>Web development is the practice of converting data into a graphical interface using PHP, HTML, CSS, and JavaScript so that users can view and interact with that data.</p></blockquote>
<h2>What you will learn</h2>
<ul>
<li>Interesting projects and tasks solved within the framework of programming</li>
<li>Basic programming functions PHP, HTML, CSS, JS</li>
<li>A brief demonstration of their work</li>
<li>Let’s go 🚀 🙂</li>
</ul>
<h2>Table of Contents</h2>
<ol>
<li><a href="#s1">Plugin-Cards (Add menu admin bar add/remove card in bd)</a></li>
<li><a href="#s2">Add a readmore button and less when inserting the <!-–Readmore--> tag</a></li>
<li><a href="#s3">Creating order steps in the online store</a></li>
<li><a href="#s4">Create a beautiful feedback widget (links to Viber, Telegram, Email, etc.)</a></li>
<li><a href="#s5">Script for calculating the balcony by price, size. Online calculation of values</a></li>
<li><a href="#s6">Synchronization of unloading of goods between the application from the playmarket, 1C and the Woo site</a></li>
<li><a href="#s7">As part of site optimization by GooglePageSpeed, deferred loading of third-party scripts</a></li>
<li><a href="#s8">Connecting SMS notifications to the store</a></li>
<li><a href="#s9">Creating a simple menu widget to display subcategories in the spoiler</a></li>
<li><a href="#s10">A plugin that implements schema.org markup</a></li>
<li><a href="#s11">Refinement of the service order form</a></li>
<li><a href="#s12">Modification of the order conditions in the shopping cart</a></li>
</ol>
<h3 id="s1">1. Plugin-Cards (Add menu admin bar add/remove card in bd)</h3>
<p>✍🏻 Task:</p>
<ul>
<li>Initial development of a plugin for WP for adding custom cards through the admin.</li>
<li>Saving in the database, working with the CRUD method</li>
</ul>
<p>👀 Examples:</p>
<ul>
<li><a href="https://github.com/max3w/Plugin-Cards" target="_blank" rel="noopener">https://github.com/max3w/Plugin-Cards</a></li>
<li>Video work: <a href="https://drive.google.com/file/d/1Djq5BCRafuVuZ1-xllmabCw7NoC5YuXk/view" target="_blank" rel="noopener">https://drive.google.com/file/d/1Djq5BCRafuVuZ1-xllmabCw7NoC5YuXk/view</a></li>
</ul>
<h3 id="s2">2. Add a readmore button and less when inserting the <!--Readmore--> tag</h3>
<p>✍🏻 Task:</p>
<ul>
<li>When the user inserts the <!--Readmore--> button in the visual editor, in the output template, divide and hide the text, change the Read / Less buttons</li>
</ul>
<p>👀 Examples:</p>
<ul>
<li>Change a variable in a template:<br>
<p>📄 <a href="https://github.com/max3w/max3w.github.io/blob/main/files/readmore.php">View code</a></p></li>
<li><a href="https://jsfiddle.net/max3w/mubo6zw3/12/" target="_blank" rel="noopener">https://jsfiddle.net/max3w/mubo6zw3/12/</a></li>
</ul>
<h3 id="s3">3. Creating order steps in the online store</h3>
<p>✍🏻 Task:</p>
<ul>
<li>Creating stages of the order on the example of the site https://dnipro-m.ua/checkout/</li>
<li>Modification of the basket of the online store Woo</li>
</ul>
<p>👀 Examples:</p>
<ul>
<li>Developed a prototype script <a href="https://jsfiddle.net/max3w/7furoxbm/3/" target="_blank" rel="noopener">https://jsfiddle.net/max3w/7furoxbm/3/</a></li>
<li>Redesigned shopping cart, to the desired type and functionality. The final result: <a href="https://skr.sh/sAbOMpA9a2S?a" target="_blank" rel="noopener">https://skr.sh/sAbOMpA9a2S?a</a></li>
</ul>
<h3 id="s4">4. Create a beautiful feedback widget (links to Viber, Telegram, Email, etc.)</h3>
<p>✍🏻 Task:</p>
<ul>
<li>Development of a universal widget for communication with svg icons.</li>
</ul>
<p>👀 Examples:</p>
<ul>
<li><a href="https://jsfiddle.net/max3w/z41u7nhr/7/" target="_blank" rel="noopener">https://jsfiddle.net/max3w/z41u7nhr/7/</a></li>
</ul>
<h3 id="s5">5. Script for calculating the balcony by price, size. Online calculation of values</h3>
<p>✍🏻 Task:</p>
<ul>
<li>Online calculation of values at specified prices</li>
</ul>
<p>👀 Examples:</p>
<ul>
<li><a href="https://jsfiddle.net/max3w/fn3jhbvo/30/" target="_blank" rel="noopener">https://jsfiddle.net/max3w/fn3jhbvo/30/</a></li>
</ul>
<h3 id="s6">6. Synchronization of unloading of goods between the application from the playmarket, 1C and the Woo site</h3>
<p>✍🏻 Task:</p>
<p>Configure the upload of goods to the online store at the specified prices:</p>
<ul>
<li><a href="https://sales-box-photos.s3.eu-central-1.amazonaws.com/vikaua/yml_ru.xml" target="_blank" rel="noopener">https://sales-box-photos.s3.eu-central-1.amazonaws.com/vikaua/yml_ru.xml</a></li>
<li><a href="https://sales-box-photos.s3.eu-central-1.amazonaws.com/vikaua/yml_uk.xml" target="_blank" rel="noopener">https://sales-box-photos.s3.eu-central-1.amazonaws.com/vikaua/yml_uk.xml</a></li>
<li>Adaptation of the upload to the requirements of the WP All Import plugin</li>
<li>Generation of missing fields for the store</li>
<li>Automatic addition of products in two languages</li>
</ul>
<p>👀 Examples:</p>
<ul>
<li>As part of the task, a script was developed that converts the nested category chains to the desired export format. It also adds fields to xml and creates a new xml file.</li>
<li>Converted file: <a href="https://vika.market/xml/vika-ua.xml" target="_blank" rel="noopener">https://vika.market/xml/vika-ua.xml</a> ; <a href="https://vika.market/xml/vika-ru.xml" target="_blank" rel="noopener">https://vika.market/xml/vika-ru.xml</a></li>
<li>Then the export plugin just does its job 🙂 <a href="https://skr.sh/sAbGPDyyRzb?a" target="_blank" rel="noopener">https://skr.sh/sAbGPDyyRzb?a</a></li>
</ul>
<p>Handler:</p>
<p>📄 <a href="https://github.com/max3w/max3w.github.io/blob/main/files/handler-vika.php">View code</a><p>
<h3 id="s7">7. As part of site optimization by GooglePageSpeed, deferred loading of third-party scripts</h3>
<p>✍🏻 Task:</p>
<ul>
<li>Lazy loading resources to display the first screen</li>
</ul>
<p>👀 Examples:</p>
<p><pre><script type="text/javascript" >
var fired = false;
window.addEventListener('scroll', () => {
    if (fired === false) {
        fired = true;    
        setTimeout(() => {
            // Здесь все что можно отложить
        }, 1000)
    }
});
</script></pre></p>
<h3 id="s8">8. Connecting SMS notifications to the store</h3>
<p>✍🏻 Task:</p>
<ul>
<li>Connecting the Turbo.sms service</li>
<li>Sending messages with order parameters and shoe sizes to the buyer and administrator</li>
<li>Additional check of the order date and the current date so that SMS is not sent twice when the page is reloaded</li>
</ul>
<p>👀 Examples:</p>
<p>📄 <a href="https://github.com/max3w/max3w.github.io/blob/main/files/sms.php">View code</a></p>
<h3 id="s9">9. Creating a simple menu widget to display subcategories in the spoiler</h3>
<p>✍🏻 Task:</p>
<ul>
<li>Compact output of categories in a template</li>
<li>Working with arrays and different nesting levels</li>
<li>Highlighting the active category</li>
</ul>
<p>👀 Examples:</p>
<p>📄 <a href="https://github.com/max3w/max3w.github.io/blob/main/files/subcategories.php">View code</a></p>
<ul>
<li>Result: <a href="https://skr.sh/vAbX33PXu7c?a" target="_blank" rel="noopener">https://skr.sh/vAbX33PXu7c?a</a></li>
</ul>
<h3 id="s10">10. A plugin that implements schema.org markup</h3>
<p>✍🏻 Task:</p>
<ul>
<li>Develop a convenient option for inserting micro-markup of categories/post</li>
<li>Contains sample embed code and editable options</li>
<li>Stores data in post meta fields</li>
</ul>
<p>👀 Examples:</p>
<p>📄 <a href="https://github.com/max3w/max3w.github.io/blob/main/files/schema.php">View code</a></p>
<p>View in the admin panel part: <a href="https://skr.sh/sAcR8jPI20b" target="_blank" rel="noopener">https://skr.sh/sAcR8jPI20b</a></p>
<ul>
<li>Output in the template:</li>
</ul>
<p><pre>
/* Вывод keywords для Записей */
if(is_single()){ echo get_post_meta($post->ID, 'description', 1);}
</pre></p>
<ul>
<li>Result: <a href="https://skr.sh/sAbBSBkzlJs" target="_blank" rel="noopener">https://skr.sh/sAbBSBkzlJs</a></li>
</ul>
<h3 id="s11">11. Refinement of the service order form</h3>
<p>✍🏻 Task:</p>
<ul>
<li>
In the order form, which consists of 4 buttons, finalize the definition and transfer of the parameter to the order form which button was clicked on</li>
<li>Integrate into an existing form</li>
</ul>
<p>👀 Examples:</p>
<p>Jsfiidle prototyping and script development: <a href="https://jsfiddle.net/max3w/wr5kqchg/67/">https://jsfiddle.net/max3w/wr5kqchg/67/</a></p>
<p>Demonstration of work: <a href="https://skr.sh/vAfBDpT9U82?a">https://skr.sh/vAfBDpT9U82?a</a></p>
<h3 id="s12">12. Modification of the order conditions in the shopping cart</h3>
<p>✍🏻 Task:</p>
<ul>
<li>Finalization of the minimum order amount</li>
<li>Automatic 20% discount on condition that 51 items of a certain category are ordered</li>
<li>Adding an automatic recount when changing the quantity of goods with a delay of 1s</li>
</ul>
<p>👀 Examples:</p>
<p>Message about the minimum order amount and adding notifications in the basket: https://skr.sh/sAgnNSw0HcZ?a</p>
<p>Video of work 20% discount when ordering 51 products from category id = 15: https://skr.sh/vAfT1qfFFZI?a</p>
<p>📄 <a href="https://github.com/max3w/max3w.github.io/blob/main/files/cart-update.php">View code</a></p>