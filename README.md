### Prerequite
- Used a RESTful API at [Pokéapi](https://pokeapi.co/) to return the results.
- Create a web app to display the list of pokemons using the API
- The implementation is done using CorePHP and basic HTML, CSS, JQuery, AJAX
- XAMPP Server is used  web server solution followed by Apache and Mysql

### Functionality
 
 A search page implemented using the Datatable that will view all the records in the table and show the list of pokemons.
 
 Each Pokemon has a unique detailed page as follows:
 - each pokémon returned by the search or listing will link to its own page showing
 - options to browse the full list of pokémon with a search on pokemon name. 

 We need to fetch the "Card Of the Day" for every unique user
 Here, we'll be using cookies with a time limit of a day to set the card of the user

 The Crux of the algorithm is as follows:
 1. Get the count of pokemon in "result" which is our universal set
 2. Use the rand() function to get a random number from 0-number of pokemon - 1
 3. Set the value of the cookie to the strip of the result['url']
 4. If the cookie is not set, then set it, and then query on the basis of number obtained
 5. If cookie is set, read from the cookie and query pokeapi, get the identifier
 6. Pass this identifier to "single.php" to get the "card".