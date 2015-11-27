Getting LOLDB setup

1. Save package in the htdocs directory of xxamp
2. launch xxamp and start the appache server and mysql
3. launch mysql workbench. Either create a new connect or use another one.
   either way make note of your hostname, username, and password (if you use one).
4. restore the sql database file in MySQL Workbench.
5. launch your IDE (I use NetBeans. I will explain this for NetBeans).
6. Switch to the Services Window in NetBeans (crtl+5). Expand database node.
7. navigate to MySQL database server node. Right click "Connect"
8. a new node should be available now, it should look like
                  jdbc::mysql::localhost:3306/mysql......
9. right click the above node, select "execute command"
10. in the new window, attempt "select * from user". The output
     should be that of the database leaguedb
11. open project in NetBeans. Navigate to the directory containg the package.
12. in the projects window, open the includes directory and open db.php for editing
13. look for the following code

        private $user = 'root';
        private $pass = '';
        private $dbName = 'leaguedb';
        private $dbHost = 'localhost';

change the respective code to match that of your MySQL connection. 
for instance, my username is root, my password is an empty string,
the dbname is leaguedb, and my databases hostname is localhost.

save the file (ctrs+s)

14. open a browser. in your url field, typle localhost/LOLDB
15. If all was done correctly, assuming I detailed the steps correctly,
    you should now see a simple website powered by php.