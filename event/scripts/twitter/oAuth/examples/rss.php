<?php

/**
 * Obtain the home_timeline RSS feed using OAuth
 *
 * Instructions:
 * 1) If you don't have one already, create a Twitter application on
 *      http://dev.twitter.com/apps
 * 2) From the application details page copy the consumer key and consumer
 *      secret into the place in this code marked with (YOUR_CONSUMER_KEY
 *      and YOUR_CONSUMER_SECRET)
 * 4) Visit the 'My Access Token' screen linked to from your application
 *      details page
 * 5) Copy the user token and user secret into the place in this code marked
 *      with (A_USER_TOKEN and A_USER_SECRET)
 * 6) Visit this page using your web browser.
 *
 * @author themattharris
 */

require '../tmhOAuth.php';
$tmhOAuth = new tmhOAuth(array(
  'consumer_key'    => 'YOUR_CONSUMER_KEY',
  'consumer_secret' => 'YOUR_CONSUMER_SECRET',
  'user_token'      => 'A_USER_TOKEN',
  'user_secret'     => 'A_USER_SECRET',
));

$code = $tmhOAuth->request('GET', $tmhOAuth->url('1/statuses/home_timeline', 'rss'));

if ($code == 200) {
  header('Content-Type: application/rss+xml; charset=utf-8');
  echo $tmhOAuth->response['response'];
} else {
  $tmhOAuth->pr(htmlentities($tmhOAuth->response['response']));
}

?>