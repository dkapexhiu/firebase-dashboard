<?php include('header.php'); ?>

        <h1>Firebase CRUD</h1>

        <div id="entries" class="row">

        </div>

    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
    <script src="https://www.gstatic.com/firebasejs/3.3.0/firebase.js"></script>
    <script>
        // firebase config
        var config = {
            apiKey: "",
            authDomain: "",
            databaseURL: "",
            projectId: "",
            storageBucket: "",
            messagingSenderId: "",
            appId: ""
        };
        firebase.initializeApp(config);

        firebase.auth().onAuthStateChanged(function (user) {
            if (user) { // if already logged in
                $('#logout').show();

        var Blog = firebase.database().ref('users').orderByChild('updatedAt');

        Blog.on('value', function (r) {

        $('#entries').html('Loading...');
            var html = '';
            r.forEach(function (item) {
                entry = item.val();
                html = '<div class="col-md-4">' +
                    '<div class="panel panel-info">' +
                    '<div class="panel-heading">' +
                    '<h3 class="panel-title"> GamerTag: ' + excerpt(entry.gamertag, 140) + '</h3>' +
                    '</div>' +
                    '<div class="panel-body">' +
                    '<small>Email: ' + entry.email + ' | '+ ' Password: ' + entry.password + '</small>' +
                    '<hr>' +
                    '</div>' +
                    '</div>' +
                    '</div>' + html; // prepend the entry because we need to display it in reverse order
            });
            $('#entries').html(html);
        });
            }else {
                // if not logged in yet
                window.location.href = 'login.php';

            }
        
        });
        


        /*************\
         * Utilities *
        \*************/

        function strip(html) {
            var tmp = document.createElement("DIV");
            tmp.innerHTML = html;
            return tmp.textContent || tmp.innerText || "";
        }

        function excerpt(text, length) {
            text = strip(text);
            text = $.trim(text); //trim whitespace
            if (text.length > length) {
                text = text.substring(0, length - 3) + '...';
            }
            return text;
        }

        function pad2Digit(num) {
            return ('0' + num.toString()).slice(-2);
        }

        function datetimeFormat(timestamp) {
            var dateObj = new Date(timestamp);
            var en_month = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
            return dateObj.getDate() + ' ' + en_month[dateObj.getMonth()] + ' ' + pad2Digit(dateObj.getFullYear()) + ' ' + pad2Digit(dateObj.getHours()) + ':' + pad2Digit(dateObj.getMinutes());
        }
    </script>

<?php include('footer.php'); ?>
