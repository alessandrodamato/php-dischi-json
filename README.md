PHP Dischi JSON
===
**Descrizione**  
Dobbiamo creare una web-app che permetta di leggere una lista di dischi presente nel nostro server.  

**Stack**  
Html, CSS, VueJS (importato tramite CDN), axios, PHP  

**Consigli**  
Nello svolgere l’esercizio seguite un approccio graduale.  
Prima assicuratevi che la vostra pagina *index.php* (il vostro front-end) riesca a comunicare correttamente con il vostro script PHP (le vostre “API”).
Solo a questo punto sarà utile passare alla lettura della lista da un file JSON. 
 
****

**Bonus**  
Al click su un disco, recuperare e mostrare i dati del disco selezionato.

****

**Descrizione 2**  

1. Aggiungere un post per l’aggiunta (in modo permanente) di un nuovo disco con tutti i dati ad esso relativo (titolo, url immagine, artista, ecc).
2. Aggiungere la possibilità di eliminare un disco in modo permanente.

**Bonus 2** 
1. Aggiungere “mi piace”. I dischi con “mi piace” avranno un cuoricino pieno e gli altri vuoto. Al click del cuoricino avviene il toggle del “mi piace”.
2. (Extrabonus) Al click della card linkare a una pagina PHP di dettaglio che riceve in GET l’indice dell’elemento da mostrare e lo stampa in pagina.