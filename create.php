<footer>
        
    </footer>
    <div id="create-account" class="modal">
        <form class="modal-content" method="post" action="create_account.php">
            <span class="close">&times;</span>
            <h2>Fill the form with correct information</h2>
            <label for="new-username">Username:</label>
            <input type="text" id="new-username" name="new-username" required><br>
            <label for="new-password">Password:</label>
            <input type="password" id="new-password" name="new-password" required><br>
            <button type="submit" name="logout'php">Create Account</button><br>
			<a href="logout.php">click here if you already have an account</a><br>
			<a href="index.php">Back to Home</a>
			
        </form>
    </div>
    <script>
    // Modal for create account form
    var modal = document.getElementById("create-account");
    var link = document.querySelector("a[href=' index.php-account']");
    var close = document.getElementsByClassName("close")[0];

    link.onclick = function() {
        modal.style.display = "block";
    }

    close.onclick = function() {
        modal.style.display = "none";
    }

    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
    </script>