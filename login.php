<?php include('header.php'); ?>
        
        <h1>Firebase - Login</h1>

        <div id="firebaseui-auth-container"></div>

        <div id="logged" style="display:none;">You are logged in!</div>

    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
    <script src="https://www.gstatic.com/firebasejs/3.3.0/firebase.js"></script>

    <!-- member plugins -->
    <script src="https://www.gstatic.com/firebasejs/ui/live/0.4/firebase-ui-auth.js"></script>
    <link type="text/css" rel="stylesheet" href="https://www.gstatic.com/firebasejs/ui/live/0.4/firebase-ui-auth.css" />
    <!-- End - member plugins -->

    <script>
        // firebase config
        var config = {
            apiKey: "AIzaSyBz4bWcC_h6rKV7Mq5bG6z2tN5zEWJ5U2Y",
            authDomain: "scrim-58b33.firebaseapp.com",
            databaseURL: "https://scrim-58b33.firebaseio.com",
            projectId: "scrim-58b33",
            storageBucket: "scrim-58b33.appspot.com",
            messagingSenderId: "108163156657",
            appId: "1:108163156657:web:a0f780a0afe1543b303090"
        };
        firebase.initializeApp(config);

        /////////////////////////////////////


        /**********************\
         * Check login status *
        \**********************/

        firebase.auth().onAuthStateChanged(function (user) {
            if (user) { // if already logged in
                $('#logout').show();
                $('#firebaseui-auth-container').hide();
                $('#logged').show();
            }
        });

        /*******************\
         * init Login UI *
        \*******************/

        // FirebaseUI config.
        var uiConfig = {
            'signInSuccessUrl': false,
            'signInOptions': [
              // comment unused sign-in method
              firebase.auth.GoogleAuthProvider.PROVIDER_ID,
              //firebase.auth.FacebookAuthProvider.PROVIDER_ID,
              //firebase.auth.TwitterAuthProvider.PROVIDER_ID,
              //firebase.auth.GithubAuthProvider.PROVIDER_ID,
              //firebase.auth.EmailAuthProvider.PROVIDER_ID
            ],
            // Terms of service url.
            'tosUrl': false,
        };

        // Initialize the FirebaseUI Widget using Firebase.
        var ui = new firebaseui.auth.AuthUI(firebase.auth());
        // The start method will wait until the DOM is loaded.
        ui.start('#firebaseui-auth-container', uiConfig);

        ////////////////////////////////////////
    </script>

<?php include('footer.php'); ?>
