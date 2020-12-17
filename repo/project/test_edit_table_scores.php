<?php require_once(__DIR__ . "/partials/nav.php"); ?>
<?php
if (!has_role("Admin")) {
    //this will redirect to login and kill the rest of this script (prevent it from executing)
    flash("You don't have permission to access this page");
    die(header("Location: login.php"));
}
?>
<?php
if(isset($_GET["user_id"])){
    $id = $_GET["user_id"];
}
?>



<?php
if(isset($_POST["save"])){
    $user = get_user_id();
    $score = $_POST["score"];
    $db = getDB();
    if(isset($id)){
        $stmt = $db->prepare("UPDATE Scores (user_id, score) VALUES(:user, :score)");
        $r = $stmt->execute([
            ":user"=>$user,
            ":score"=>$score
        ]);
        if($r){
            flash("Created successfully with id: " . $db->lastInsertId());
        }
        else{
            $e = $stmt->errorInfo();
            flash("Error creating: " . var_export($e, true));
        }
    }
    else{
        flash("ID isn't set, we need an ID in order to update");
    }
}
?>
<?php
$result = [];
if (isset($id)){
    $id = $_GET["user_id"];
    $db = getDB();
    $stmt = $db->prepare("SELECT * FROM Scores where id = :id");
    $r = $stmt->execute([":id"=>$id]);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);zend_version()
}

?>

    <form method="POST">
        <label>Score</label>
        <input type="number" min="1" name="score"/>
        <input type="submit" name="save" value="Create"/>
    </form>
<?php require(__DIR__ . "/partials/flash.php");
