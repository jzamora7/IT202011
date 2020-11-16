<?php require_once(__DIR__ . "/partials/nav.php"); ?>
<?php
if (!has_role("Admin")) {
	//this will redirect to login and kill the rest of this script (prevent it from executing)
	flash("You don't have permission to access this page");
    die(header("Location: login.php"));
}
?>
<form method="POST">
	<label>User Name</label>
	<input name="name" placeholder="Name"/>

	<label>Score</label>
	<input type="number" min="1" name="score_num"/>

	<input type="submit" name="save" value="Create"/>
</form>

<?php
if(isset($_POST["save"])){
	//TODO add proper validation/checks
	$name = $_POST["name"];
	$score = $_POST["score_num"];
	$nst = date('Y-m-d H:i:s');//calc
	$user = get_user_id();
	$db = getDB();
	$stmt = $db->prepare("INSERT INTO 006_create_table_scores (name, score_num, next_stage_time, user_id) VALUES(:name,:score, :nst,:user)");
	$r = $stmt->execute([
		":name"=>$name,
		":score"=>$score,
		":nst"=>$nst,
		":user"=>$user
	]);
	if($r){
		flash("Created successfully with id: " . $db->lastInsertId());
	}
	else{
		$e = $stmt->errorInfo();
		flash("Error creating: " . var_export($e, true));
	}
}
?>
<?php require(__DIR__ . "/partials/flash.php");
