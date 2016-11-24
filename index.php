<?php

if(isset($_GET['keywords'])){
        require_once('OAuth.php');
        require_once('twitteroauth.php');

               $ConsumerKey="8zGBepLLBK3slwOFL0iP01dlf";
               $ConsumerSecret="T0uQGbSyT0lHOrUaZ2r2JQY4AWdFEdnWbaaVNHujpFb2IVKOIV";
               $AccessToken="221709769-IY4CjVkAAz9g1ODrZ64ibJQDWRPvcvXtKZXPY7dv";
               $AccessTokenSecret="r6kqi6qlVNnpOdYFgwcYSNnPMX2BylaovnRK0vRA8IQK1";

      $twitter=new TwitterOAuth($ConsumerKey, $ConsumerSecret, $AccessToken,$AccessTokenSecret);
      
     $lang=$_GET['lang']?:'en';
      $keywords=$_GET['keywords'];

      $q="https://api.twitter.com/1.1/search/tweets.json?q=$keywords&result_type=mixed&count=100&lang=".$lang; 

      $tweets=$twitter->get($q);                          
      //call_user_func(array($_SESSION['api'],'get'),$q );

    }else{
      $keywords='';
    }
 
 ?>

<!DOCTYPE html>
<html>
<head>
  <title></title>
  <link href='https://fonts.googleapis.com/css?family=lato:400,700|Source+Sans+Pro:200,400,700,600,400italic,700italic' rel='stylesheet'>

  <style type="text/css">
  body{
    font-family: lato;
  }
    .panel{
      margin: 0 auto;
      min-width: 200px;
      max-width: 400px;
      border: 1px solid #eee;
      padding: 15px;
    }
   .input {
    height: 30px;
    width: 66%;
    padding-left:4px;
    border: 1px solid #eee;
     display: inline-block;
    float: left;

   }
   .input:focus{
    outline: none;
   }
   select{
    outline: none;
    background-color: #FFF;
    color: #FFF;
    border: 1px solid #eee;
    margin-left:3px;
    width: 17%;
    display: inline-block;
    float: left;
    height: 34px;
    color: blue;

   }
   .tweet{
    padding: 5px;
    border-radius: 4px;
    border:1px solid #eee;
    background: #eee;
   }
   .search,.tweets{
    display: block;
   }
   .search{
    height: 28px;
   }
   select::before { /*  Custom dropdown arrow cover */
        width: 2em;
        right: 0; top: 0; bottom: 0;
        border-radius: 0 3px 3px 0;
    }


.btn{
 height: 34px;
 background-color:#FFF;
 border:1px solid #eee;
 display: inline-block;
 float: left;
 margin-left: 3px;

}
  </style>

</head>
<body>
<div class="panel">
<div class="search">
  <form action="" method="get">
    <input type="text" name="keywords" class="input" placeholder="search for" value="<?php echo $keywords ?>">
    <select name="lang" value="en">
     <option value="en"> english</option>
      <option value="ar" > arabic</option>
      <option value="fr"> français</option>
      
    </select>  
    <button type="submit" class="btn"> search</button>
  </form>
  </div>
  <div class="tweets">
  <?php
  if(isset($tweets->statuses)){
     foreach ($tweets->statuses as $tweet) {
         echo '<p class="tweet">',$tweet->text,'</p>';

    }
   }
    

    ?>
  </div>
</div>
</body>
</html>