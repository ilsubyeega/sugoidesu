<script type="text/javascript">

function formSubmit(f) {

    // 업로드 할 수 있는 파일 확장자를 제한합니다.

	var extArray = new Array('png', 'jpeg');

	var path = document.getElementById("upfile").value;

	if(path == "") {
		alert("Please select the file.");
		return false;
	}
	var pos = path.indexOf(".");
	if(pos < 0) {
		alert("There is no file extension!");
		return false;
	}
	var ext = path.slice(path.indexOf(".") + 1).toLowerCase();
	var checkExt = false;
	for(var i = 0; i < extArray.length; i++) {
		if(ext == extArray[i]) {
			checkExt = true;
			break;
		}
	}
	if(checkExt == false) {
		alert("We only supports png and jpeg.");
	    return false;
	}
	return true;
}
</script>
<?php
if ($_SERVER['REQUEST_METHOD']=="POST"){
    if (isset($_FILES['avatar']) && isset($_POST['password'])){
        echo 'worked1<br>';
        
        echo basename( $_FILES['avatar']['name']);
        echo '<br>';
        echo basename( $_FILES['avatar']['tmp_name']);
        echo '<br>';

        if(move_uploaded_file($_FILES['avatar']['tmp_name'], $_FILES['avatar']['name'])){
            echo 'Sucessfully uploaded!';
        } else {
            echo 'Failed';
        }


    }
}




























?>

<form name="uploadForm" id="uploadForm" method="post" action="upload" 
      enctype="multipart/form-data" onsubmit="return formSubmit(this);">
    <div>
        <label for="avatar">첨부파일</label>
        <input type="file" name="avatar" id="avatar" />
        <label for="password">비밀번호</label>
        <input id="passwrod" type="password" class="form-control" name="password" tabindex="2" required>
    </div>
    <input type="submit" value="업로드" />
</form>


