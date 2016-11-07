
<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Election Reactions</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="apple-touch-icon" href="apple-touch-icon.png">
        <!-- Place favicon.ico in the root directory -->

        <link rel="stylesheet" href="css/main.css">
        <script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    </head>
    <body>
      <header>
        <h1>President Who-now???</h1>
        <h3>In a fateful end to a tumultuous 18 months, the Presidential election is finally over. Get out all your post-election night rage/joy/confusion here by voting for the response that most closely approximates your reaction to America's decision. If none of them float your boat, submit your own!</h3>
      </header>
      <main>
        <section class="responses">

          <form action="php/submit_vote.php" class="highest-responses">
            <h3>Vote for a Top-5 Reaction</h3>

            <?php
               class MyDB extends SQLite3
               {
                  function __construct()
                  {
                     $this->open('../election.db');
                  }
               }
               $db = new MyDB();
               if(!$db){
                  echo $db->lastErrorMsg();
               } else {
            //      echo "Opened database successfully\n";
                }
               echo "<fieldset>";
               $ret = $db->query('select response, votes from responses order by votes desc limit 5');
               while ($row = $ret->fetchArray()) {
                  $response = $row['response'];
                  $votes = $row['votes'];
                  echo "<input name=\"submit\" type=\"submit\" value=\"$response $votes\">";
               }
               echo "</fieldset>";
               
               $db->close();
            ?>
            <fieldset>
              <input name="submit" type="submit" value="previous response number one">
              <input name="submit" type="submit" value="previous response number two is much longer than response number one">
              <input name="submit" type="submit" value="previous response number three is much longer than response number one">
              <input name="submit" type="submit" value="previous response number four is much longer than response number one">
            </fieldset>
          </form>

          <form action="php/submit_response.php" class="custom-response">
            <h3>...or write your own response!</h3>
            <fieldset>
              <input type="text" class="custom-reaction" name="textfield" value="My Reaction"><br>
              <input type="submit" value="Submit">
            </fieldset>
          </form>

          <form action="php/submit_vote.php" class="highest-responses">
            <h3>Newest Reactions</h3>
            <fieldset>
              <input name="submit" type="submit" value="previous response number one">
              <input name="submit" type="submit" value="previous response number two is much longer than response number one">
              <input name="submit" type="submit" value="previous response number three is much longer than response number one">
              <input name="submit" type="submit" value="previous response number four is much longer than response number one">
            </fieldset>
          </form>

        </section>

        <section class="hillary">
          <img src="img/hillary.jpg" width="100%">
          <p id="hillary-quote">"If a country doesn't recognize minority rights and human rights, including women's rights, you will not have the kind of stability and prosperity that is possible." <br> - Hillary Clinton</p>
        </section>

        <section class="donald">
          <img src="img/donald.jpg" width="100%">
            <p id="donald-quote">"In inner cities, African-Americans, Hispanics, are living in hell because it's so dangerous. You walk down the street, you get shot..." <br> - Donald Trump</p>
        </section>

        <script type="text/javascript">
          var texta = new Array();
          texta[0] = "\"“You know, to just be grossly generalistic, you could put half of Trump's supporters into what I call the 'basket of deplorables'. Right? [...] The racist, sexist, homophobic, xenophobic, Islamaphobic — you name it.\" <br> - Hillary Clinton";
          texta[1] = "\"It was a mistake for me to use personal email.\"  <br> - Hillary Clinton";
          texta[2] = "\"We need more good jobs that reward hard work with rising wages, dignity, and a ladder to a better life.\" <br> - Hillary Clinton";
          var countera = 0;
          var elema = document.getElementById("hillary-quote");
          setInterval(changea, 8000);
          function changea() {
           countera = (countera+1)%text.length;
           $("#hillary-quote").fadeOut(800);
           setTimeout(function(){elema.innerHTML = texta[countera];},800);
          $("#hillary-quote").fadeIn(800);

          }
        </script>

        <script type="text/javascript">
          var text = new Array();
          text[0] = "\"I got him to give the birth certificate,\"  <br> - Donald Trump (on President Barack Obama)";
          text[1] = "\"I think my strongest asset by far is my temperament. I have a winning temperament,\"  <br> - Donald Trump";
          text[2] = "\"Secretary Clinton doesn't want to use a few words: Law and order...\" <br> - Donald Trump";
          var counter = 0;
          var elem = document.getElementById("donald-quote");
          setInterval(change, 8000);
          function change() {
           counter = (counter+1)%text.length;
           $("#donald-quote").fadeOut(800);
           setTimeout(function(){elem.innerHTML = text[counter];},800);
          $("#donald-quote").fadeIn(800);

          }
        </script>

      </main>



    </body>
    <footer>&copy 2016 Daniel Henderson, Boulder CO</footer>
</html>
