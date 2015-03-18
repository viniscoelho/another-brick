The site is not complete yet, but it is functional!
Created a connection with my database and it is working.
I changed my change_product.js to change_product.php so I can have access
of the PHP variables on JavaScript, which I am converting using json_encode.
The code is working, the problem is that I can't validate the page buy.php
because I am including the script change_product.php to create the 'ul' elements
based on the data gathered accessing the database. In other words, it is saying that
I should use &lt; instead of <, but I can't do that, since I am using that for my
for loop and doing so, the code won't work. Same think to the feedback form (contact.php).
If you know another way to do that, let me know.

EDIT: I talked with Dr. Scobey and we found a solution.
All pages should validate now, but the website is not complete. However, it is functional.

EDIT2: I tried to add a feature on the employment.php where a person could submit a resume file.
However, I think that the upload feature is not available in the server.
Besides that, the website is complete. I might add a php validation for the buy.php page yet,
since it is being done with javascript for now...

EDIT3: Added last feature on the catalog.php. Now you click a category and have access to a table
with all products from that category.
Added extra explanation to the howtobuy.php.
Fixed the Our time. The javascript was actually getting the location time instead of the server time.
Now, it is done via php, setting the default timezone to 'America/Halifax'.
All pages are also validating. 