k#Istruzioni Utilizzo:

- Clonare la repository
- Creare un database
- Rinominare il file .env.example in .env e inserire i dati del database e della email:
   > Per il test ho usato https://mailtrap.io/, l'iscrizione é gratuita e in seguito si possono copiare le impostazioni nel file .env e verranno visualizzate tutte le email che partono dall'applicazione.

- Dal terminale lanciare i comandi: 
    ```
    composer install
    npm install
    ```
- Finita l'installazione lanciare i comandi:
  ```
  php artisan key:generate
  php artisan migrate
  php artisan db:seed 
  ```

- Per lanciare l'applicazione tramite artisan infine:
    ```
  php artisan serve
    ```

- Alla parte gestionale si potrá accedere inizialmente solo con l'utente admin creato automaticamente con le credenziali
  ```
  Email: admin@user.com
  Password: useradmin
  ```

- La tabella ordini sará inizialmente vuota.
  

