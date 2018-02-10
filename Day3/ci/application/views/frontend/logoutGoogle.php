<meta name="google-signin-scope" content="profile email">
<meta name="google-signin-client_id" content="277763897621-sm987c9acs22fbi7k1jlprao5ctq8p0q.apps.googleusercontent.com">
<script src="https://apis.google.com/js/platform.js" async defer></script>
<script type="text/javascript" src="<?=base_url('assets/html/template/plugins/jquery.min.js')?>"></script>
<a href="#" onclick="signOut();">Sign out</a>
<script>

  gapi.load('client', {
	  callback: function() {
	    var auth2 = gapi.auth2.getAuthInstance();
	    auth2.signOut().then(function () {
	      location.href='<?=base_url('logoutStep2')?>';
	    });
	  }
  });


</script>