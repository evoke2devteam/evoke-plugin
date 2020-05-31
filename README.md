# evoke-plugin

Evoke plugin for moodle

##### Installing a new plugin
1. Upload the folder containing the plugin files in the blocks folder of the Moodle installation
2. Enter the moodle administration panel
3. Go to Site administration -> Notifications to see if the new plugin requires any decisions or updating of Moodle code
4. To add block go to the main page of course and "turn editing on". 
5. Go to " Add block" section and select "Tus poderes"
6. To synchronize the powers graph open the file block_simple_html.php find at:

    ```/var/www/html/Moodle/blocks/simplehtml/block_simple_html.php```

    Change the id of each power once the competency framework has been created. The change must be made on lines 43 to 103 and 157 to 619.
