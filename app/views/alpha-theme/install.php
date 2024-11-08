<section class="container">
<style>
        h2 {
    text-align: center;
    }
    input[type="text"],
    input[type="password"],
    input[type="file"] {
    width: 100%;
    padding: 10px;
    margin: 5px 0 15px 0;
    box-sizing: border-box;
    }
    input[type="submit"],.action_button{
    background-color: #4CAF50;
    padding: 10px;
    color: white;
    }
</style>
<form action="<?=ROOT?>/init/" method="POST" enctype="multipart/form-data">
            <h2>Database Connection Form</h2>
			<div class="form-group">
                <label for="dbhost">Database Host:</label>
                <input type="text" name="host" value="localhost" required>
            </div>
            <div class="form-group">
                <label for="dbuser">Database User:</label>
                <input type="text" name="user" value="root" required>
            </div>
            <div class="form-group">
                <label for="dbpass">Database Password:</label>
                <input type="password" name="pass" value="">
            </div>

			<div class="form-group">
                <label for="dbname">Database Name:</label>
                <input type="text" name="db" placeholder="dbName" required>
            </div>
            <div class="form-group">
                <label for="file">OR,Choose your file:</label>
                <input type="file" name="sqlfile">
            </div>
            <input type="submit" name="submit" value="Install SQL File">
            <a class="action_button" href="<?=ROOT?>/export">Export Database</a>
        </form>
</section>